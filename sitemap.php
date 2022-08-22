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

if (isset($_SERVER['REMOTE_ADDR']))
{
   echo '<center><big><big><b>Remote script invocation is not permitted.<br/>';
   echo '403 Permission Denied.</b></big></big></center>';
   return;
}

$crlf = "\n";
$siteurls = array(
    array ( "https://www.icapsql.com",				 "monthly", "0.8"),
    array ( "https://www.icapsql.com/?page=home",		 "monthly", "0.8"),
    array ( "https://www.icapsql.com/?page=all",		 "monthly", "0.8"),
    array ( "https://www.icapsql.com/?page=account",		 "monthly", "0.5"),
    array ( "https://www.icapsql.com/?page=register",		 "monthly", "0.5"),
    array ( "https://www.icapsql.com/?page=login",		 "monthly", "0.5"),
    array ( "https://www.icapsql.com/?page=termsofservice",	 "monthly", "0.5"),
    array ( "https://www.icapsql.com/?page=privacy",		 "monthly", "0.5"),
    array ( "https://repository.icapsql.com",			 "monthly", "0.8"),
    array ( "https://public.icapsql.com",			 "monthly", "0.8"),
);

echo '<?xml version="1.0" encoding="UTF-8"?>'.$crlf;
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'.$crlf;
foreach ($siteurls as $f => $v) {
   echo '   <url>'.$crlf;
   echo '      <loc>'.$v[0].'</loc>'.$crlf;
   echo '      <lastmod>'.date('Y-m-d').'</lastmod>'.$crlf;
   echo '      <changefreq>'.$v[1].'</changefreq>'.$crlf;
   echo '      <priority>'.$v[2].'</priority>'.$crlf;
   echo '   </url>'.$crlf;
}
echo '</urlset>'.$crlf;

?>
