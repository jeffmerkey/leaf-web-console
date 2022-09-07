<?php
/***************************************************************************
*
*   Copyright(c) Leaf Linux and Jeff V. Merkey 1997-2022.
*   All rights reserved.
*
*   Leaf PHP Web Console
*
**************************************************************************/

date_default_timezone_set('America/Vancouver');
$active="0";
$stylesheet = 1;
$force_https = 1;
$traffic_monitor="1";
$language_detection = 0;
$emailnotify = 0; 
$showpassword = 0; 
$autologin = 1; 
$autoactivate = 1; 

$http_port = "";
$https_port = "";

$imagedir="/images/";
$fontsdir="/fonts/";
$keywords="https capture, http capture, network security, packet capture, stream to disk, networks, networking, network forensics";
$sitename="ICAPSQL";
$siteowner="Leaf Linux";
$logoname="ICAPSQL";
$shortname="ICAPSQL";
$tagline="ICAP AI Solutions";
$style='style.php';
$siteurl="http://www.icapsql.com/";
$logoimage="leaflinux.png";
$supportphone="(385) 299-2437";
$copyright_years="1997-2022";

if ($active == "1")
{
   $db_host = "localhost";
   $db_name = "leaf-linux";
   $db_client = "leaf";
   $db_table = "capture";
   $db_user = "leaf";
   $db_pass = "leaf123777!";
}
else
{
   $db_host = "localhost";
   $db_name = "leafpage";
   $db_client = "leaf";
   $db_table = "capture";
   $db_user = "root";
   $db_pass = "";
}

$adminuser = "admin";
$adminpassword = "leaf123777!";
$site_email = "support@icapsql.com";
$service_email = "support@icapsql.com";
$admin_email = "support@icapsql.com";

if ($active == "1")
{
   $smtphost = 'localhost';
   $smtpuser = '';
   $smtppass = '';
   $smtpauth = FALSE;
}
else
{
   $smtphost = 'localhost';
   $smtpuser = '';
   $smtppass = '';
   $smtpauth = FALSE;
}

$proxy_server = "127.0.0.1:3128";

# cache settings
$use_netcache="1";
$key_algo = "sha256";  // defaults to md5 if no also provided

# memcache/memcached settings
$use_memcache="0";
$use_libmemcached = 0;
$use_sasl = 0;
$use_authfile = 0;
$compress_threshold = 0;

$MEMCACHE_SASL = "admin:pass";
$MEMCACHE_SERVERS[] = "127.0.0.1,11211";
$MEMCACHE_SERVERS[] = "[::1],11211";

# redis settings
$use_redis = 1;
$use_redisauth = 0;
$REDIS_AUTH = "password";
//$REDIS_SERVERS[] = array();
$REDIS_SERVERS[] = array('localhost',              '127.0.0.1',     6379);
$REDIS_SERVERS[] = array('www.leaf.[::1]',         '[::1]',         6379);

/*
   echo '<select name="lang">';
   echo '<option value="none"> -- Select Language </option>';
   if (!isset($lang))
      $lang = 'none';
   else
      $_SESSION['lang'] = $lang;

   foreach($languages as $t => $d) {
   	$sel = ($lang == $t) ? ' SELECTED' : '';
   	echo "<option value=\"".$t."\" $sel>$d</option>";
   }  
   echo '</select>';
*/
// this string breaks the vim editor highlighting so it is moved here
$search_hack = '#(<br */?>\s*)+#i';

?>
