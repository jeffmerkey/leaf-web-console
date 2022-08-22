<?php
/***************************************************************************
*
*   Copyright(c) Leaf Linux and Jeff V. Merkey 1997-2022.
*   All rights reserved.
*
*   Leaf PHP Web Console
*
**************************************************************************/

//phpinfo();

session_start();

include "config.php";
include "defs.php";
include "classes.php";
include "lib.php";
include "cluster.php";


if (isset($force_https) and $force_https and (!isset($_SERVER['HTTPS']) or 'on' != $_SERVER['HTTPS'])) {
   header("Location: ".httpsURL());
   exit;
}
tracking();
check_logout();

$page = NULL;
foreach ($_GET as $f => $v) {
   $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);
}

switch ($page)
{
      case NULL:
            header('Location: '.baseURL().'?page=home');
	    break;

      case "login":
         top($sitename." | Login");
         login("Account Login", "login", "account"); 
         bottom();
         break;

      case "newaccount":
         top($sitename." | Create Account");
         clear_register_form();
         register("Register New Account", 1, "register", "account"); 
         bottom();
         break;

      case "register":
         top($sitename." | Register");
         register("Register New Account", 1, "register", "account"); 
         bottom();
         break;

     case "account":
         //if (isset($new) and $new and new_uuid($new))
         //   break;

         if (isset($uuid) and $uuid and verify_uuid($uuid))
            break;

         if (!check_permissions(NULL, NULL))
            header('Location: '.baseURL().'?page=login');
         else {
            top($sitename." | Account");
            show_accounts();
            bottom();
         }
         break;

      case "logout":
         logout(); 
         header('Location: '.baseURL().'?page=login');
         break;

      case "termsofservice":
         top("Terms of Service | ".$sitename);
         termsofservice();
         bottom();
         break;

      case "privacy":
         top("Privacy Policy | ".$sitename);
         privacy();
         bottom();
         break;

      case "findname":
         top($sitename." | Account Name Recovery");
         account_recovery();
         bottom();
         break;

      case "findpasswd":
         top($sitename." | Account Password Recovery");
         password_recovery();
         bottom();
         break;

      case "about":
         top($sitename." | About Us");
         bottom();
         break;

      case "news":
         top($sitename." | News");
         bottom();
         break;

      case "contact":
         top($sitename." | Contacts");
         bottom();
         break;

      case "support":
         top($sitename." | Support");
         bottom();
         break;

      // site admin pages
      case "spider":
         if (check_permissions($adminuser, NULL) != 1)
            header('Location: '.baseURL().'?page=login');
         else
         {
            top($sitename." | Web Crawler");
            submit_url();
            bottom();
         }
         break;

      case "sql":
         if (check_permissions($adminuser, NULL) != 1)
            header('Location: '.baseURL().'?page=login');
         else
         {
            top($sitename." | SQL Console");
            sql();
            bottom();
         }
         break;

      case "add":
         if (check_permissions($adminuser, NULL) != 1)
            header('Location: '.baseURL().'?page=login');
         else
         {
            top($sitename." | Add Page");
            add();
            bottom();
         }
         break;

      case "edit":
         if (check_permissions($adminuser, NULL) != 1)
            header('Location: '.baseURL().'?page=login');
         else
         {
            top($sitename." | Edit Page");
            edit();
            bottom();
         }
         break;

      case "allaccounts":
         if (check_permissions($adminuser, NULL)) {
            top($sitename." | Manage Accounts");
            show_all_accounts();
            bottom();
         } else
            header('Location: '.baseURL().'?page=login');
         break;

      case "accesslog":
         if (check_permissions($adminuser, NULL)) {
            top($sitename." | Access Logs");
            show_access_log();
            bottom();
         } else 
            header('Location: '.baseURL().'?page=login');
         break;

      case "digest":
         if (!check_permissions(NULL, NULL))
            header('Location: '.baseURL().'?page=login');
         else
         {
            top($sitename." | Digest");
            digest();
            bottom();
	 }
         break;

      case "home":
         if (!check_permissions(NULL, NULL))
            header('Location: '.baseURL().'?page=login');
         else {
            top($sitename." | Account");
            show_accounts();
            bottom();
         }
	 break;

      case "alerts":
      case "tagged":
      case "all":
      case "search":
         if (!check_permissions(NULL, NULL))
            header('Location: '.baseURL().'?page=login');
         else
         {
            top($sitename." | Search");
            search($page);
            bottom();
         }
         break;

      case "graphs":
         if (!check_permissions(NULL, NULL))
            header('Location: '.baseURL().'?page=login');
         else
         {
            top($sitename." | Graphs");
            charts();
            bottom();
         }
         break;

      case "condensed":
         if (!check_permissions(NULL, NULL))
            header('Location: '.baseURL().'?page=login');
         else
         {
            top_sparse($sitename." | Extract");
            extractcondensed();
            bottom_sparse();
         }
         break;

      case "extract":
         if (!check_permissions(NULL, NULL))
            header('Location: '.baseURL().'?page=login');
         else
         {
            top_sparse($sitename." | Extract");
            extractcache();
            bottom_sparse();
         }
         break;

      case "linkcache":
         if (!check_permissions(NULL, NULL))
            header('Location: '.baseURL().'?page=login');
         else
         {
            top_sparse($sitename." | Links");
            linkcache();
            bottom_sparse();
         }
         break;

      case "mailcache":
         if (!check_permissions(NULL, NULL))
            header('Location: '.baseURL().'?page=login');
         else
         {
            top_sparse($sitename." | email");
            mailcache();
            bottom_sparse();
         }
         break;

      case "pdfcache":
         if (!check_permissions(NULL, NULL))
            header('Location: '.baseURL().'?page=login');
         else
         {
            top_sparse($sitename." | PDFs");
            pdfcache();
            bottom_sparse();
         }
         break;

      case "imagecache":
         if (!check_permissions(NULL, NULL))
            header('Location: '.baseURL().'?page=login');
         else
         {
            top_sparse($sitename." | Images");
            imagecache();
            bottom_sparse();
         }
         break;

      case "enable":
         if (!check_permissions(NULL, NULL))
            header('Location: '.baseURL().'?page=login');
         else
         {
            top($sitename." | Enable Page");
            bottom();
         }
         break;

      case "disable":
         if (!check_permissions(NULL, NULL))
            header('Location: '.baseURL().'?page=login');
         else
         {
            top($sitename." | Disable Page");
            bottom();
         }
         break;

      case "cache":
         if (!check_permissions(NULL, NULL))
            header('Location: '.baseURL().'?page=login');
         else
            cache(0);
         break;

      case "viewcache":
         if (!check_permissions(NULL, NULL))
            header('Location: '.baseURL().'?page=login');
         else
            cache(1);
         break;

      case "viewlive":
         if (!check_permissions(NULL, NULL))
            header('Location: '.baseURL().'?page=login');
         else
            cache(2);
         break;

      case "viewrequest":
         if (!check_permissions(NULL, NULL))
            header('Location: '.baseURL().'?page=login');
         else
            http_headers(0);
         break;

      case "viewresponse":
         if (!check_permissions(NULL, NULL))
            header('Location: '.baseURL().'?page=login');
         else
            http_headers(1);
         break;

      case "cluster":
         if (!check_permissions(NULL, NULL))
            header('Location: '.baseURL().'?page=login');
         else
            cluster_get(); 
         break;

      case "system":
         if (check_permissions($adminuser, NULL) != 1) 
            header('Location: '.baseURL().'?page=login');
         else {
            ob_start();
            phpinfo();
            $info = ob_get_contents();
            ob_end_clean();
            $sheet = 
'table {color:black; font-size:12pt; font-family: Arial, Helvetica, sans-serif; border-collapse: collapse; border: 0; width: 934px;}
.center {text-align: center;}
.center table {margin: 1em auto; text-align: left;}
.center th {text-align: center !important;}
td, th {border: 1px solid #666; font-size: 100%; vertical-align: baseline; padding: 4px 5px;}
th {position: sticky; top: 0; background: inherit;}
.p {text-align: left;}
.e {background-color: #ccf; width: 300px; font-weight: bold;}
.h {background-color: #99c; font-weight: bold;}
.v {background-color: #ddd; max-width: 300px; overflow-x: auto; word-wrap: break-word;}
.v i {color: #999;}';
            preg_match("/<body[^>]*>(.*?)<\/body>/is", $info, $sections);

            top($sitename." | System");
            echo '<style type="text/css">'.$sheet.'</style>';
            echo '<div class=content>'.$sections[1].'</div>';
            echo '<br style="clear:both;"/>';
            bottom();
         }
         break;

      case "config":
         if (check_permissions($adminuser, NULL) != 1)
            header('Location: '.baseURL().'?page=login');
         else
         {
            top($sitename." | Configure");
            //configure();
            bottom();
         }
         break;

      default:
         top($sitename." | 404 Page Not Found");
         echo '<div style="text-align:center;">';
         echo '<fieldset>';
         echo '<big><br/>The requested page <strong>\''.$page.'\'</strong> was not found on this server.<br/><br/><br style="clear:both;"/></big>'; 
         echo '</fieldset>';
         echo '</div>';
         echo '<br style="clear:both;"/>';
         bottom();
         break;
}
?>
