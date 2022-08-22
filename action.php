<?php
/***************************************************************************
*
*   Copyright(c) Leaf Linux and Jeff V. Merkey 1997-2022.
*   All rights reserved.
*
*   Leaf PHP Web Console
*
**************************************************************************/

session_start();
include "config.php";
include "defs.php";
include "classes.php";
include "lib.php";

if (isset($force_https) and $force_https and (!isset($_SERVER['HTTPS']) or 'on' != $_SERVER['HTTPS'])) {
   header("Location: ".httpsURL());
   exit;
}
tracking();
check_logout();

foreach ($_POST as $f => $v) {
   $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);
}

$redir = baseURL();

if (valid($function))
   $action = $function;

if (!valid($action))
   header('Location:'.$redir);

if (!function_exists($action))
   header('Location:'.$redir);
else
   $return = $action();

if (valid($return))
   $redir .= '?page='.$return;

if (strcmp($return, "break"))
   header('Location: '.$redir);

function crawl()
{
   global $adminuser, $adminpassword;

   foreach ($_POST as $f => $v)
      $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   if (!check_permissions($adminuser, 0))
      return $referrer;

   unset($_SESSION['crawl']);

   if (file_exists($_SERVER['DOCUMENT_ROOT'].'/logs/spider.lock')) {
      $_SESSION['crawl'] = "web crawler is already active";
      return $referrer;
   }

   $fp = fopen($_SERVER['DOCUMENT_ROOT'].'/logs/spider.lock', 'wb');
   if ($fp)
      fclose($fp);

   exec("php spider.php ".$_SERVER['DOCUMENT_ROOT']."/logs/spider.lock >& ./logs/spider.log &");

   $_SESSION['crawl'] = "web crawler activated";
   return $forward;
}

function spider()
{
   global $adminuser, $adminpassword;
   global $db_client;

   foreach ($_POST as $f => $v)
      $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   if (!check_permissions($adminuser, 0))
      return $referrer;

   unset($_SESSION['errors']);

   if ($_submit_url and valid($targeturl))
   {
      $_SESSION['targeturl'] = $targeturl; 
      $_SESSION['targetdepth'] = $targetdepth; 

      $dbh = new DB;
      $ret = $dbh->connect($db_client);
      if (!$ret)
      {
         $_SESSION['errors'] = "Could not connect to database";
         return $referer;
      }

      $sql = "SELECT id from spider where url='$targeturl' and deleted='0'";
      $res = $dbh->query($sql);
      $o = $dbh->fetch_object($res);
      if ($o)
      {
         $_SESSION['errors'] = "$targeturl was previously submitted";
         $dbh->close();
         return $referrer;
      }

      $ins = array(
	 'create_date' => date('Y-m-d H:i:s'),
	 'crawl_date' => date('Y-m-d H:i:s'),
	 'url' => $targeturl,
      );
      $cid = $dbh->insert('spider',$ins);
      $_SESSION['errors'] = "$targeturl sucessfully submitted";
      $dbh->close();
      return $forward;
   }
   return $referrer;
}

function editaccount()
{
   global $adminuser, $adminpassword;
   global $db_client;

   unset($_SESSION['errors']);

   foreach ($_POST as $f => $v)
      $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   if (!check_permissions(0, 0)) {
      $_SESSION['errors'] = "403 permissions error";
      return $referrer;
   }

   $targetname = "";
   if (isset($_SESSION['targetname']) and $_SESSION['targetname'])
      $targetname = $_SESSION['targetname'];

   if (!isset($targetname) or !$targetname)
   {
      $_SESSION['errors'] = 'invalid username specified';
      return $referrer;
   }

   if (!check_permissions($adminuser, 0) and ($_SESSION['activename'] != $targetname))
   {
      $_SESSION['errors'] = 'username permission error';
      return $referrer;
   }

   $username = $targetname;

   if ($submit == "Save")
   {
      $_SESSION['first_name'] = $first_name;
      $_SESSION['last_name'] = $last_name;
      $_SESSION['company_name'] = $company_name;
      $_SESSION['address'] = $address;
      $_SESSION['address2'] = $address2;
      $_SESSION['city'] = $city;
      $_SESSION['state'] = $state;
      $_SESSION['zip'] = $zip;
      $_SESSION['country'] = $country;
      $_SESSION['email'] = $email;
      $_SESSION['email2'] = $email2;
      $_SESSION['phone'] = preg_replace('/[^\d]/','',$phone);
      $_SESSION['phone2'] = preg_replace('/[^\d]/','',$phone2);

      $_POST['first_name'] = $first_name;
      $_POST['last_name'] = $last_name;
      $_POST['company_name'] = $company_name;
      $_POST['address'] = $address;
      $_POST['address2'] = $address2;
      $_POST['city'] = $city;
      $_POST['state'] = $state;
      $_POST['zip'] = $zip;
      $_POST['country'] = $country;
      $_POST['email'] = $email;
      $_POST['email2'] = $email2;
      $_POST['phone'] = preg_replace('/[^\d]/','',$phone);
      $_POST['phone2'] = preg_replace('/[^\d]/','',$phone2);


      //print_r($_POST);
      //exit;


      // only admin can update groups
      if (!check_permissions($adminuser, 0))
         unset($_POST['groups']);

      if (!$first_name or !$last_name or !$email or !$phone)
      {
          $_SESSION['errors'] = 'You must fill in all required fields';
          return $referrer;
      }

      if (($_POST['country'] == "US") and !validateZip($_POST['zip']))
      {
          $_SESSION['errors'] = 'Invalid zip code.  Please enter a valid zip code.';
          return $referrer;
      }

      if (!validateEmail($_POST['email']))
      {
          $_SESSION['errors'] = 'Invalid email address.  Please enter a valid email address.';
          return $referrer;
      }

      $dbh = new DB;
      $ret = $dbh->connect($db_client);
      if (!$ret)
      {
         $_SESSION['errors'] = "Could not connect to database";
         return $referer;
      }

      $sql = "SELECT * from clients where username='".$username."' and deleted='0' LIMIT 1";
      $res = $dbh->query($sql);
      $o = $dbh->fetch_object($res);
      if (!$o)
      {
         $_SESSION['errors'] = 'User account could not be located or has been disabled';
         $dbh->close();
         return $referrer;
      }

      $cid = $dbh->update('clients', $o->id);
      if (!$cid)
      {
         $_SESSION['errors'] = 'UPDATE FAILED: account '.$username;
         return $referrer;
      }

      $_SESSION['errors'] = "account successfully updated";
      $dbh->close();
      return $forward;
   }
   return $referrer;
}

function newpasswd()
{
   global $adminuser, $adminpassword;
   global $db_client;

   unset($_SESSION['errors']);

   foreach ($_POST as $f => $v)
      $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   if (!check_permissions(0, 0))
      return $referrer;

   $targetname = "";
   if (isset($_SESSION['targetname']) and $_SESSION['targetname'])
      $targetname = $_SESSION['targetname'];

   if (!isset($targetname) or !$targetname)
   {
      $_SESSION['errors'] = 'invalid username specified';
      return $referrer;
   }

   if (($_SESSION['activename'] != $adminuser) and ($_SESSION['activename'] != $targetname))
   {
      $_SESSION['errors'] = 'username permission error';
      return $referrer;
   }

   $username = $targetname;

   if ($_change_passwd)
   {
      if ($username == $adminuser)
      {
         $_SESSION['errors'] = "password for account 'admin' must be changed from the console";
         return $referrer;
      }

      $_SESSION['currentpassword'] = $currentpassword;
      $_SESSION['newpassword'] = $newpassword;
      $_SESSION['confirmpassword'] = $confirmpassword;
      $_SESSION['verify'] = $verify;

      if (!$currentpassword or !$newpassword or !$confirmpassword)
      {
          $_SESSION['errors'] = 'You must complete all password fields';
          return $referrer;
      }

      if (strcmp($newpassword, $confirmpassword))
      {
          $_SESSION['errors'] = 'New/Confirm Password fields do not match. Re-enter password fields';
          return $referrer;
      }

      if (!isset($_SESSION['imagehash']) or !isset($verify))
      {
          $_SESSION['errors'] = 'Image verify code missing.  Please enter the image code.';
          return $referrer;
      }

      if ($_SESSION['imagehash'] != sha1($verify))
      {
          $_SESSION['errors'] = 'Image verification code mismatch.  Please reenter the image code.';
          return $referrer;
      }

      $dbh = new DB;
      $ret = $dbh->connect($db_client);
      if (!$ret)
      {
         $_SESSION['errors'] = "Could not connect to database";
         return $referer;
      }

      $sql = "SELECT * from clients where username='".$username."' and deleted='0' LIMIT 1";
      $res = $dbh->query($sql);
      $o = $dbh->fetch_object($res);
      if (!$o)
      {
         $_SESSION['errors'] = 'User account could not be located or has been disabled';
         $dbh->close();
         return $referrer;
      }

      if (strcmp($o->password, $currentpassword))
      {
         $_SESSION['errors'] = 'current password is incorrect. Re-enter current password field';
         $dbh->close();
         return $referrer;
      }

      // only admin can update groups
      if (!check_permissions($adminuser, 0))
         unset($_POST['groups']);

      $_POST['password'] = $newpassword;

      $cid = $dbh->update('clients', $o->id);
      if (!$cid)
      {
          $_SESSION['errors'] = 'password could not be updated and was not changed.';
          return $referrer;
      }

      $_SESSION['errors'] = "password successfully changed";
      $dbh->close();
      return $forward;
   }
   return $referrer;
}

function recoverpasswd()
{
   global $service_email, $admin_email;
   global $smtphost, $smtpuser, $smtppass, $smtpauth;
   global $db_client;
   global $emailnotify;
   global $showpassword;
   global $autologin;

   foreach ($_POST as $f => $v)
      $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   if (!isset($accountusername) or $accountusername == NULL)
   {
      unset($_SESSION['errors']);
      $_SESSION['errors'] = 'Please Specify a User Account';
      return $referrer;
   }

   if ($_submit_account_passwd and $accountusername)
   {
        unset($_SESSION['errors']);

        $dbh = new DB;
        $ret = $dbh->connect($db_client);
        if (!$ret)
        {
           $_SESSION['errors'] = "Could not connect to database";
           return $referer;
        }

	$sql = "SELECT * FROM clients WHERE username='$accountusername' and deleted='0' LIMIT 1";
	$res = $dbh->query($sql);
	$o = $dbh->fetch_object($res);
        if (!$o)
        {
            $_SESSION['errors'] = 'No User Account Exists in our Database for '.$accountusername;
            return $referrer;
        }

        if ($emailnotify) 
        {
	   $text =  "Account Name:  $o->first_name $o->last_name\n";
	   $text .= "Email Address:  $o->email\n";
	   $text .= "uuid: $o->uuid\n";
	   $text .= "Username: $o->username\n";
	   $text .= "Password: $o->password\n";

	   require_once('htmlMimeMail.php');
	   $m = new htmlMimeMail();
	   $m->setSubject('Leaf Account '.$o->uuid.' Password Request');
	   $m->setText($text);
	   $m->setFrom('service <'.$service_email.'>');
	   $m->setReturnPath(''.$admin_email.'');
           $m->setSMTPParams($smtphost, '', '', $smtpauth, $smtpuser, $smtppass);
	   $to = array($o->first_name.' '.$o->last_name. '<'.$o->email.'>');
	   $m->send($to);
        } else {
            $_SESSION['errors'] = 'Outbound emails are currently disabled. Email not sent.';
            $dbh->close();
            return $referrer;
        }

        $dbh->close();
        $_SESSION['errors'] = 'A password has been sent to the email address associated with account '.$accountusername;
        $_SESSION['passwd_sent'] = TRUE;
   }
   return $referrer;
}

function recoveraccount()
{
   global $service_email, $admin_email;
   global $smtphost, $smtpuser, $smtppass, $smtpauth;
   global $db_client;
   global $emailnotify;
   global $showpassword;
   global $autologin;

   foreach ($_POST as $f => $v)
      $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   if (!isset($accountemail) or $accountemail == NULL)
   {
      unset($_SESSION['errors']);
      $_SESSION['errors'] = 'Please Specify a User Email';
      return $referrer;
   }

   if ($_submit_account_email and $accountemail)
   {
        unset($_SESSION['errors']);

        $dbh = new DB;
        $ret = $dbh->connect($db_client);
        if (!$ret)
        {
           $_SESSION['errors'] = "Could not connect to database";
           return $referer;
        }

	$sql = "SELECT * FROM clients WHERE email='$accountemail' and deleted='0' LIMIT 1";
	$res = $dbh->query($sql);
	$o = $dbh->fetch_object($res);
        if (!$o)
        {
            $_SESSION['errors'] = 'No User Account Exists in our Database for '.$accountemail;
            return $referrer;
        }

        if ($emailnotify) 
        {
	   $text =  "Account Name:  $o->first_name $o->last_name\n";
	   $text .= "Email Address:  $o->email\n";
	   $text .= "uuid: $o->uuid\n";
	   $text .= "Username: $o->username\n";

	   require_once('htmlMimeMail.php');
	   $m = new htmlMimeMail();
	   $m->setSubject('Leaf Account '.$o->uuid.' Username Request');
	   $m->setText($text);
	   $m->setFrom('service <'.$service_email.'>');
	   $m->setReturnPath(''.$admin_email.'');
           $m->setSMTPParams($smtphost, '', '', $smtpauth, $smtpuser, $smtppass);
	   $to = array($o->first_name.' '.$o->last_name. '<'.$o->email.'>');
	   $m->send($to);
        } else {
            $_SESSION['errors'] = 'Outbound emails are currently disabled. Email not sent.';
            $dbh->close();
            return $referrer;
        }

        $dbh->close();
        $_SESSION['errors'] = 'An email containing the username associated with '.$accountemail.' has been sent.';
        $_SESSION['account_sent'] = TRUE;
   }
   return $referrer;
}

function accountlogin()
{
   global $adminuser, $adminpassword;
   global $db_client;

   foreach ($_POST as $f => $v)
      $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   if ($_submit_login) 
   {
      unset($_SESSION['errors']);

      $_SESSION['accountname'] = $accountname;
      $_SESSION['password'] = $password;

      if (!strcmp($accountname, $adminuser))
      {
         if (!strcmp($password, $adminpassword))
         {
            $_SESSION['activename'] = $accountname;
            return $forward;
         }
         $_SESSION['errors'] = 'Please enter a valid password.';
         return $referrer;
      }

      $dbh = new DB;
      $ret = $dbh->connect($db_client);
      if (!$ret)
      {
         $_SESSION['errors'] = "Could not connect to database";
         return $referer;
      }

      $dups=array();
      $sql = "SELECT id,groups,email,active,username,password FROM clients WHERE (username='$accountname' OR email='$accountname') and deleted='0' LIMIT 1";
      $res = $dbh->query($sql);

      // check only the first found record
      if ($o = $dbh->fetch_object($res))
      {
         if (!$o->active)
         {
            $_SESSION['errors'] = 'Account is currently disabled';
            $dbh->close();
            return $referrer;
         }

         if (!strcmp($o->password, $password))
         {
            session_regenerate_id(TRUE);
            $_SESSION = array();
            $_SESSION['activename'] = $o->username;
            $_SESSION['email'] = $o->email;
            $_SESSION[$o->username]['groups'] = $o->groups;

            $dbh->close();
            return $forward;
         }
         $_SESSION['errors'] = 'Please enter a valid password.';
         $dbh->close();
         return $referrer;
      }
      $_SESSION['errors'] = 'Please enter a valid account name.';
      $dbh->close();
      return $referrer;
   } 
   return $referrer;
}

function sqlquery()
{
   global $adminuser, $adminpassword;
   global $db_client;

   $response = '';
   foreach ($_POST as $f => $v)
      $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   if (!check_permissions($adminuser, 0))
      return $referrer;

   unset($_SESSION['responsetext']);
   $_SESSION['querytext'] = $querytext;

   if ($_sql_query and valid($querytext)) 
   {
      unset($_SESSION['mysql_error']);

      $dbh = new DB;
      $ret = $dbh->connect($db_client);
      if (!$ret)
      {
         $_SESSION['errors'] = "Could not connect to database";
         return $referer;
      }

      $res = $dbh->query($querytext);

      if (isset($_SESSION['mysql_error']))
         $response .= $_SESSION['mysql_error'];

      if (is_bool($res)) {
               $response .= $res;
            $response .= "\n";
      } 
      else {
         while ($o = $dbh->fetch_array($res))
         {
            foreach ($o as $f => $v)
               $response .= $v." ";
            $response .= "\n";
         }
      }
      $_SESSION['responsetext'] = $response;
      $dbh->close();
   } 
   return $referrer;
}
  
function addrecord()
{
   global $service_email, $admin_email, $adminuser, $adminpassword, $siteurl;
   global $smtphost, $smtpuser, $smtppass, $smtpauth;
   global $db_client;
   global $emailnotify;
   global $showpassword;
   global $autologin;
   global $autoactivate;

   foreach ($_POST as $f => $v)
      $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   if ($submit == "Check Username Availability")
   {
      if (!isset($newusername) or !$newusername and isset($first_name) and isset($last_name)
         and $first_name and $last_name)
         $newusername = $first_name[0].$last_name;

      $_SESSION['first_name'] = $first_name;
      $_SESSION['last_name'] = $last_name;
      $_SESSION['company_name'] = $company_name;
      $_SESSION['address'] = $address;
      $_SESSION['address2'] = $address2;
      $_SESSION['city'] = $city;
      $_SESSION['state'] = $state;
      $_SESSION['zip'] = $zip;
      $_SESSION['country'] = $country;
      $_SESSION['email'] = $email;
      $_SESSION['email2'] = $email2;
      $_SESSION['phone'] = preg_replace('/[^\d]/','',$phone);
      $_SESSION['phone2'] = preg_replace('/[^\d]/','',$phone2);
      $_SESSION['newusername'] = $newusername;
      $_SESSION['newpassword'] = $newpassword;
      $_SESSION['confirmpassword'] = $confirmpassword;
      $_SESSION['verify'] = $verify;

      if (!valid($newusername))
      {
         unset($_SESSION['newusername']);
         $_SESSION['username_errors'] = "Please enter a valid username";
         return $referrer;
      }

      if (!strcasecmp($newusername, $adminuser))
      {
         unset($_SESSION['newusername']);
         $_SESSION['username_errors'] = "Username '$newusername' is unavailable";
         return $referrer;
      }

      $dbh = new DB;
      $ret = $dbh->connect($db_client);
      if (!$ret)
      {
         $_SESSION['errors'] = "Could not connect to database";
         return $referer;
      }

      $dups=array();
      $sql = "SELECT id FROM clients WHERE username='$newusername' and deleted='0'";
      $res = $dbh->query($sql);

      while ($dup = $dbh->fetch_object($res))
         $dups[] = $dup->id;

      if (count($dups) >= 1)
      {
          $_SESSION['username_errors'] = "Username '$newusername' is unavailable";
      }
      else
          $_SESSION['username_errors'] = "Username '$newusername' is available";

      $dbh->close();
      return $referrer;
   }
   else
   if ($submit == "Register")
   {
      $_SESSION['first_name'] = $first_name;
      $_SESSION['last_name'] = $last_name;
      $_SESSION['company_name'] = $company_name;
      $_SESSION['address'] = $address;
      $_SESSION['address2'] = $address2;
      $_SESSION['city'] = $city;
      $_SESSION['state'] = $state;
      $_SESSION['zip'] = $zip;
      $_SESSION['country'] = $country;
      $_SESSION['email'] = $email;
      $_SESSION['email2'] = $email2;
      $_SESSION['phone'] = preg_replace('/[^\d]/','',$phone);
      $_SESSION['phone2'] = preg_replace('/[^\d]/','',$phone2);
      $_SESSION['newusername'] = $newusername;
      $_SESSION['newpassword'] = $newpassword;
      $_SESSION['confirmpassword'] = $confirmpassword;
      $_SESSION['verify'] = $verify;

      if (!$first_name or !$last_name or !$email or !$phone)
      {
          $_SESSION['errors'] = 'You must fill in all required fields';
          return $referrer;
      }

      if (!$newusername or !$newpassword or !$confirmpassword)
      {
          $_SESSION['errors'] = 'You must provide an account name and password';
          return $referrer;
      }

      if (strcmp($newpassword, $confirmpassword))
      {
          $_SESSION['errors'] = 'Password fields do not match. Re-enter password fields';
          return $referrer;
      }

      if (!strcasecmp($newusername, $adminuser))
      {
          $_SESSION['errors'] = 'Invalid account name.  Choose a different name';
          return $referrer;
      }

      if (!isset($_SESSION['imagehash']) or !isset($verify))
      {
          $_SESSION['errors'] = 'Image verify code missing.  Please enter the image code.';
          return $referrer;
      }

      if (($_SESSION['country'] == "US") and !validateZip($_SESSION['zip']))
      {
          $_SESSION['errors'] = 'Invalid zip code.  Please enter a valid zip code.';
          return $referrer;
      }

      if (!validateEmail($_SESSION['email']))
      {
          $_SESSION['errors'] = 'Invalid email address.  Please enter a valid email address.';
          return $referrer;
      }

      if ($_SESSION['imagehash'] != sha1($verify))
      {
          $_SESSION['errors'] = 'Image verification code mismatch.  Please reenter the image code.';
          return $referrer;
      }

      $dbh = new DB;
      $ret = $dbh->connect($db_client);
      if (!$ret)
      {
         $_SESSION['errors'] = "Could not connect to database";
         return $referer;
      }

      $dups=array();
      $sql = "SELECT id FROM clients WHERE username='$newusername' OR email='$email' OR (first_name='$first_name' AND last_name='$last_name' AND phone='$phone') and deleted='0'";

      $res = $dbh->query($sql);
      while ($dup = $dbh->fetch_object($res))
         $dups[] = $dup->id;

      if (count($dups) > 1)
      {
          // MULTIPLE ENTRIES EXIST
          $_SESSION['errors'] = 
                      'User Account ('.$newusername.':'.$email.') Already Exists.<br/>'.
                                'Try&nbsp;'.
                                '<a href="'.baseURL().'?page=findname">account</a>'.
                                '&nbsp;or&nbsp;'.
                                '<a href="'.baseURL().'?page=findpasswd">password</a>'.
                                '&nbsp;recovery.';
          $dbh->close();
          return $referrer;
      }
      else 
      if (count($dups) == 1)
      {
          // exists
          $_SESSION['errors'] = 
                      'User Account ('.$newusername.':'.$email.') Already Exists.<br/>'.
                                'Try&nbsp;'.
                                '<a href="'.baseURL().'?page=findname">account</a>'.
                                '&nbsp;or&nbsp;'.
                                '<a href="'.baseURL().'?page=findpasswd">password</a>'.
                                '&nbsp;recovery.';
          $dbh->close();
          return $referrer;
      }
      else
      {
         $u = new UUID;
         $u->gen_uuid();

         $newuuid = "";
         for ($i=0; $i < 16; $i++)
            $newuuid .= $u->raw[$i];

         // add record
         $ins = array(
		'create_date' => date('Y-m-d H:i:s'),
		'first_name' => $first_name,
                'last_name' => $last_name,
                'company_name' => $company_name,
                'address' => $address,
                'address2' => $address2,
                'city' => $city,
                'state' => $state,
                'zip' => $zip,
                'country' => $country,
                'email' => $email,
                'email2' => $email2,
                'phone' => preg_replace('/[^\d]/','',$phone),
                'phone2' => preg_replace('/[^\d]/','',$phone2),
                'username' => $newusername,
                'password' => $newpassword,
                'active' => $autoactivate ? '1' : '0',       
                'uuid' => $newuuid,
         );
	 
         $cid = $dbh->insert('clients',$ins);
	 if ($cid)
         {
            set_groups($dbh, 'users', $cid);
            set_groups($dbh, 'downloads', $cid);

            if ($emailnotify and !$autoactivate) 
            {
	       $text =  "Account Name:  $first_name $last_name\n";
	       $text .= "Email Address:  $email\n";
	       $text .= "uuid: $newuuid\n";
	       $text .= "Username: $newusername\n";
               if ($showpassword)
	          $text .= "Password: $newpassword\n\n";
               else
	          $text .= "Password: ************\n\n";
	       $text .= "A new account was registered on our website specifying ".
                        "this email address for account activation.  Please click ".
                        "through the attached link or paste it into your web browser ".
                        "to activate this account.  If you did not register this ".
                        "account then please ".
                        "disregard this email. \n\n";
               $text .= $siteurl."?page=account&uuid=".$newuuid."\n\n";

	       require_once('htmlMimeMail.php');
	       $m = new htmlMimeMail();
	       $m->setSubject('Leaf New User Account');
	       $m->setText($text);
	       $m->setFrom('service <'.$service_email.'>');
	       $m->setReturnPath(''.$admin_email.'');
               $m->setSMTPParams($smtphost, '', '', $smtpauth, $smtpuser, $smtppass);
	       $to = array($first_name.' '.$last_name. '<'.$email.'>');
	       $error = $m->send($to);
               if ($error === false)
               {
                  $_SESSION['errors'] = 'Mail Send Error: '.$m->errors;
                  $dbh->close();
                  return $referrer;
               }

	       $text =  "Account Name:  $first_name $last_name\n";
	       $text .= "Email Address:  $email\n";
	       $text .= "uuid: $newuuid\n";
	       $text .= "Username: $newusername\n";
               if ($showpassword)
	          $text .= "Password: $newpassword\n\n";
               else
	          $text .= "Password: ************\n\n";
	       $text .= "A new account was registered on our website specifying this ".
                        "email address for account activation.  Please click through ".
                        "the attached link or paste it into your web browser ".
                        "to activate this account.  If you did not register this ".
                        "account then please ".
                        "disregard this email. \n\n";
               $text .= $siteurl."?page=account&uuid=".$newuuid."\n\n";

	       require_once('htmlMimeMail.php');
	       $m = new htmlMimeMail();
	       $m->setSubject('Admin Alert: New User Account');
	       $m->setText($text);
	       $m->setFrom('service <'.$service_email.'>');
	       $m->setReturnPath(''.$admin_email.'');
               $m->setSMTPParams($smtphost, '', '', $smtpauth, $smtpuser, $smtppass);
	       $to = array($first_name.' '.$last_name. '<'.$admin_email.'>');
	       $error = $m->send($to);
               if ($error === false)
               {
                  $_SESSION['errors'] = 'Mail Send Error: '.$m->errors;
                  $dbh->close();
                  return $referrer;
               }
            }

            //$_SESSION['errors'] = 'ACCOUNT SUCCESSFULLY CREATED<br/><br/>';
            $_SESSION['register_result'] = 'ACCOUNT SUCCESSFULLY CREATED<br/><br/>';

            // log the user in
            if ($autologin) 
               $_SESSION['activename'] = $newusername; 

            unset($_SESSION['first_name']);
            unset($_SESSION['last_name']);
            unset($_SESSION['company_name']);
            unset($_SESSION['address']);
            unset($_SESSION['address2']);
            unset($_SESSION['city']);
            unset($_SESSION['state']);
            unset($_SESSION['zip']);
            unset($_SESSION['country']);
            unset($_SESSION['email']);
            unset($_SESSION['email2']);
            unset($_SESSION['phone']);
            unset($_SESSION['phone2']);
            unset($_SESSION['newusername']);
            unset($_SESSION['newpassword']);
            unset($_SESSION['confirmpassword']);
            unset($_SESSION['verify']);

         }
         else {
            $_SESSION['errors'] = 'ACCOUNT CREATION FAILED<br/><br/>';
	 }
	 $dbh->close();
         return $referrer;
      }
   } 
   $dbh->close();
   return $referrer;
}
  
function updatepage()
{
   global $adminuser, $adminpassword;
   global $db_client;

   foreach ($_POST as $f => $v)
      $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   if (!check_permissions($adminuser, 0))
      return $referrer."&cache=".$cache;

   if ($_update_page) 
   {
      // strip HTML from raw text field
      $pagetext = html2txt(html_entity_decode($_POST['pagedata'], ENT_COMPAT, 'UTF-8'));

      $_SESSION['url'] = $url;
      $_SESSION['title'] = $title;
      $_SESSION['page'] = $_POST['pagedata'];
      $_SESSION['name'] = $name;
      $_SESSION['meta'] = $meta;
      $_SESSION['pagetext'] = $pagetext;
      $_SESSION['language'] = $language;

      $_POST['page'] = $_POST['pagedata'];

      $dbh = new DB;
      $ret = $dbh->connect($db_client);
      if (!$ret)
      {
         $_SESSION['errors'] = "Could not connect to database";
         return $referrer."&cache=".$cache;
      }

      $cid = $dbh->update('page', $cache);

      if (!$cid)
         $_SESSION['errors'] = 'UPDATE FAILED: '.$cache;
      else
         $_SESSION['errors'] = 'RECORD UPDATED: '.$cache;

      $dbh->close();
      return $referrer."&cache=".$cache;
   } 
   return $referrer."&cache=".$cache;
}
  
function addpage()
{
   global $adminuser, $adminpassword;
   global $db_client;

   foreach ($_POST as $f => $v)
      $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

   if (!check_permissions($adminuser, 0))
      return $referrer;

   if ($_add_page) 
   {
      // strip HTML from raw text field
      $pagetext = html2txt(html_entity_decode($_POST['pagedata'], ENT_COMPAT, 'UTF-8'));

      $_SESSION['url'] = $url;
      $_SESSION['title'] = $title;
      $_SESSION['page'] = $_POST['pagedata'];
      $_SESSION['name'] = $name;
      $_SESSION['meta'] = $meta;
      $_SESSION['pagetext'] = $pagetext;
      $_SESSION['language'] = $language;

      if (!$name)
      {
          $_SESSION['errors'] = 'Page must have a unique valid name field';
          return $referrer;
      }

      $dbh = new DB;
      $ret = $dbh->connect($db_client);
      if (!$ret)
      {
         $_SESSION['errors'] = "Could not connect to database";
         return $referer;
      }

      $dups=array();
      $sql = "SELECT id FROM page WHERE name='$name' and deleted='0'";

      $res = $dbh->query($sql);
      while ($dup = $dbh->fetch_object($res))
         $dups[] = $dup->id;

      if (count($dups) > 1)
      {
          // MULTIPLE ENTRIES EXIST
          $_SESSION['errors'] = 'MULTIPLE ENTRIES EXIST';
          $dbh->close();
          return $referrer;
      }
      else 
      if (count($dups) == 1)
      {
          // exists
          $_SESSION['errors'] = 'PAGE EXISTS';
          $dbh->close();
          return $referrer;
      }
      else
      {
         // add record
         $ins = array(
		'create_date' => date('Y-m-d H:i:s'),
		'url' => $url,
                'title' => $title,
                'language' => $language,
                'name' => $name,
                'meta' => $meta,
                'page' => $_POST['pagedata'],
                'pagetext' => $pagetext,
         );

         $cid = $dbh->insert('page',$ins);
         $_SESSION['errors'] = 'PAGE ADDED';
         $dbh->close();
         return $forward."&cache=".$cid;
      }
   } 
   return $referrer;
}

?>
