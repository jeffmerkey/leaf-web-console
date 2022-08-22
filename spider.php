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

$ignored = array(
   "1" => "page=all",
   "2" => "page=search",
);

if (isset($_SERVER['REMOTE_ADDR']))
{
   echo '<center><big><big><b>Remote script invocation is not permitted.<br/>';
   echo '403 Permission Denied.</b></big></big></center>';
   return;
}

if ($argc < 2)
{
   echo "USAGE: php spider.php <lockfile> <targetfile>\n";
   return;
}
else if ($argc > 2 and $argv[2])
{
   $file = file_get_contents($argv[2]);
   if (!$file)
   {
      echo "SPIDER: targetfile $argv[2] not found\n";
      return;
   }
   echo "SPIDER: opened targetfile $argv[2]\n";

   if (!file_exists($argv[1])) {
      $fp = fopen($argv[1], 'wb');
      if ($fp)
         fclose($fp);
   }

   $dbh = new DB;
   $ret = $dbh->connect($db_client);
   if (!$ret) 
   {
      echo "Could not connect to database\n";
      if (file_exists($argv[1])) 
         unlink($argv[1]);
      return;
   }

   reset_tables($dbh);

   $list = array();
   $list = explode("\n", $file);

   foreach ($list as $url)
   {
      $url = trim($url);
      if ($url and (substr($url,0,1) != '#'))
      {
         echo 'SPIDER: '.$url."\n";
         $spider = new SPIDER;
         $spider->site = $url;
         $spider->ignored = $ignored;
         $spider->urllist = $url;
         $spider->depth = 2;
         $spider->verbose = 1;
         $spider->dom = 0;
         $spider->CRAWL(0, $proxy_server);
      }
   }
   $dbh->close();

   if (file_exists($argv[1])) 
      unlink($argv[1]);
   return;
}
else
{
   if (!file_exists($argv[1])) {
      $fp = fopen($argv[1], 'wb');
      if ($fp)
         fclose($fp);
   }

   $dbh = new DB;
   $ret = $dbh->connect($db_client);
   if (!$ret) 
   {
      echo "Could not connect to database\n";
      if (file_exists($argv[1])) 
         unlink($argv[1]);
      return;
   }

   reset_tables($dbh);

   $sql = "SELECT * from spider WHERE deleted='0'";
   $res = $dbh->query($sql);
   while ($o = $dbh->fetch_object($res))
   {
      $spider = new SPIDER;
      $spider->site = $o->url;
      $spider->ignored = $ignored;
      $spider->urllist = $o->url;
      $spider->depth = 2;
      $spider->verbose = 1;
      $spider->dom = 0;
      $spider->CRAWL(0, $proxy_server);
   }
   $dbh->close();

   if (file_exists($argv[1])) 
      unlink($argv[1]);
   return;
}

function reset_tables($dbh) {

   // clear out the working database tables
   $sql = "TRUNCATE TABLE allurls";
   $res = $dbh->query($sql);
   if ($res)
      echo "TRUNCATE TABLE allurls SUCCESS\n";
   else
      echo "TRUNCATE TABLE allurls ERROR\n";

   $sql = "TRUNCATE TABLE staging";
   $res = $dbh->query($sql);
   if ($res)
      echo "TRUNCATE TABLE staging SUCCESS\n";
   else
      echo "TRUNCATE TABLE staging ERROR\n";

   $sql = "TRUNCATE TABLE targets";
   $res = $dbh->query($sql);
   if ($res)
      echo "TRUNCATE TABLE targets SUCCESS\n";
   else
      echo "TRUNCATE TABLE targets ERROR\n";
   return;
}

?>
