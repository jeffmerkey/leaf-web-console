<?php
/***************************************************************************
*
*   Copyright(c) Leaf Linux and Jeff V. Merkey 1997-2022.
*   All rights reserved.
*
*   Leaf PHP Web Console
*
**************************************************************************/

define('ADMIN_USERNAME','admin');
define('ADMIN_PASSWORD','pass');
define('DATE_FORMAT','Y/m/d H:i:s');
define('GRAPH_SIZE',200);
define('MAX_ITEM_DUMP',50);

$ACTIVE_SERVERS = array();
$SASL = '';
$PHP_SELF = '';
$time = '';
$style_sheet = "<style type=\"text/css\">
ol.menu { 
        //margin:1em 0 0 0; 
        margin:0 0 0 0; 
        //padding:0.2em; 
        //margin-left:1em;}
ol.menu li { display:inline; margin-right:0.7em; list-style:none; font-size:100%}
ol.menu a {
	//background:rgb(153,153,204);
	//border:solid rgb(102,102,153) 2px;
	//color:white;
	//font-weight:bold;
	margin-right:0em;
	//padding:0.1em 0.5em 0.1em 0.5em;
        padding: 12px 15px 10px 15px;
	text-decoration:none;
        font-size:13pt;
	margin-left: 5px;
	}
ol.menu a.current_page { border-bottom: 3px solid; font-weight:bold;}

/*
ol.menu a.child_active {
	background:rgb(153,153,204);
	border:solid rgb(102,102,153) 2px;
	color:white;
	font-weight:bold;
	margin-right:0em;
	padding:0.1em 0.5em 0.1em 0.5em;
	text-decoration:none;
	border-left: solid black 5px;
	margin-left: 0px;
	}
ol.menu span.active {
	background:rgb(153,153,204);
	border:solid rgb(102,102,153) 2px;
	color:black;
	font-weight:bold;
	margin-right:0em;
	padding:0.1em 0.5em 0.1em 0.5em;
	text-decoration:none;
	border-left: solid black 5px;
	}
ol.menu span.inactive {
	background:rgb(193,193,244);
	border:solid rgb(182,182,233) 2px;
	color:white;
	font-weight:bold;
	margin-right:0em;
	padding:0.1em 0.5em 0.1em 0.5em;
	text-decoration:none;
	margin-left: 5px;
	}
*/

ol.menu a:hover {
	//background:rgb(193,193,244);
	text-decoration:none;
	}

//.flex-container {  display: flex; }
//.flex-child {  flex: 1; margin-right: 20px; margin-left: 20px; text-align: left;}  
//.flex-child:first-child { margin-right: 20px; margin-left: 20px; } 
//.grid-container {  display: grid;  grid-template-columns: 1fr 1fr;  grid-gap: 20px; }

.parent {
  margin: 1rem;
  text-align: left;
}

.child {
  display: inline-block;
  padding: 0 1rem;
  vertical-align: top;
  text-align: left;
}

div.slab {
	background:rgb(204,204,204);
	border:solid rgb(204,204,204) 1px;
	margin-bottom:1em;
        margin-left:0%;
        margin-right:0%;
	color:black;
	font-size:11pt;
	}
div.slab a { color:blue; text-shadow:none; text-decoration: underline; }
div.slab a:visited { color:darkslateblue; }
div.slab a:hover { color:grey; }
div.slab h2 {
	background:rgb(204,204,204);
	color:black;
	font-size:1em;
	margin:0;
	padding:0.1em 1em 0.1em 1em;
	}
div.slab table {
	border:solid rgb(204,204,204) 1px;
	border-spacing:0;
	width:100%;
        color:black;
	}
div.slab table th {
	background:rgb(204,204,204);
	color:white;
	margin:0;
	padding:0.1em 1em 0.1em 1em;
	}
div.slab table th a.sortable { color:black; }
div.slab table tr.tr-0 { background:rgb(238,238,238); }
div.slab table tr.tr-1 { background:rgb(221,221,221); }
div.slab table td { vertical-align:top; padding:0.3em 1em 0.3em 1em; }
div.slab table td.td-0 { border-right:solid rgb(102,102,153) 1px; white-space:nowrap; }
div.slab table td.td-n { border-right:solid rgb(102,102,153) 1px; }
div.slab table td h3 {
	color:black;
	font-size:1.1em;
	margin-left:-0.3em;
	}
div.info {
	background:rgb(204,204,204);
	border:solid rgb(204,204,204) 1px;
	margin-bottom:1em;
	width:35em;
        margin-left:3%;
        margin-right:3%;
	}
div.info a { color:blue; text-shadow:none; text-decoration: underline; }
div.info a:hover { color:grey; }
div.info h2 {
	background:rgb(204,204,204);
	color:black;
	font-size:1em;
	margin:0;
	padding:0.1em 1em 0.1em 1em;
	}
div.info table {
	border:solid rgb(204,204,204) 1px;
	border-spacing:0;
	width:100%;
        color:black;
	}
div.info table th {
	background:rgb(204,204,204);
	color:white;
	margin:0;
	padding:0.1em 1em 0.1em 1em;
	}
div.info table th a.sortable { color:black; }
div.info table tr.tr-0 { background:rgb(238,238,238); }
div.info table tr.tr-1 { background:rgb(221,221,221); }
div.info table td { padding:0.3em 1em 0.3em 1em; word-wrap:break-word;max-width:1px; }
div.info table td.td-0 { border-right:solid rgb(102,102,153) 1px; white-space:nowrap; }
div.info table td.td-n { border-right:solid rgb(102,102,153) 1px; }
div.info table td h3 {
	color:black;
	font-size:1.1em;
	margin-left:-0.3em;
	}
.td-0 a , .td-n a, .tr-0 a , tr-1 a {
    text-decoration:underline;
}

div.graph {
      margin-bottom:1em;
      margin-left:3%;
      margin-right:3%;
    }
div.graph h2 { background:rgb(204,204,204);; color:black; font-size:1em; margin:0; padding:0.1em 1em 0.1em 1em; }
div.graph table { border:solid rgb(204,204,204) 1px; color:black; font-weight:normal; width:100%; }
div.graph table td.td-0 { background:rgb(238,238,238); }
div.graph table td.td-1 { background:rgb(221,221,221); }
div.graph table td { padding:0.2em 1em 0.4em 1em; }

div.div1,div.div2 { margin-bottom:1em; width:35em; }
div.div3 { left:40em; top:1em; width:580px; }
//div.div3 { position:absolute; left:37em; top:1em; right:1em; }

div.sorting { margin:1.5em 0em 1.5em 2em }
span.box {
	border: black solid 1px;
	border-right:solid black 2px;
	border-bottom:solid black 2px;
	padding:0 0.5em 0 0.5em;
	margin-right:1em;
}

//span.green { background:#60F060; padding:0 0.5em 0 0.5em}
//span.red { background:#D06030; padding:0 0.5em 0 0.5em }

span.green { background:#00FF00; padding:0 0.5em 0 0.5em}
span.red { background:#FF0000; padding:0 0.5em 0 0.5em }

span.blue { background:#0000FF; padding:0 0.5em 0 0.5em }
span.yellow { background:#FFFF00; padding:0 0.5em 0 0.5em }
span.cyan { background:#00FFFF; padding:0 0.5em 0 0.5em }
span.skyblue { background:#87CEEB; padding:0 0.5em 0 0.5em }
span.tan { background:#F7EFC6; padding:0 0.5em 0 0.5em }

div.authneeded {
	background:rgb(238,238,238);
	border:solid rgb(204,204,204) 1px;
	color:rgb(200,0,0);
	font-size:1.2em;
	font-weight:bold;
	padding:2em;
	text-align:center;
	}

input {
	background:rgb(153,153,204);
	border:solid rgb(102,102,153) 2px;
	color:white;
	font-weight:bold;
	margin-right:1em;
	padding:0.1em 0.5em 0.1em 0.5em;
	}
</style>";

function get_host_port_from_server($server){
	$values = explode(',', $server);
	if (($values[0] == 'unix') && (!is_numeric( $values[1]))) {
		return array($server, 0);
	}
	else {
		return $values;
	}
}

function sendMemcacheCommands($command){
        global $ACTIVE_SERVERS;

	$result = array();

	foreach($ACTIVE_SERVERS as $server){
                if ($server) {
			$strs = get_host_port_from_server($server);
			$host = $strs[0];
			$port = $strs[1];
			$result[$server] = sendMemcacheCommand($host,$port,$command);
		}

	}
	return $result;
}
function sendMemcacheCommand($server,$port,$command){
	global $use_authfile;

        # may require setsebool -P httpd_can_network_connect 1
	$s = @fsockopen($server, $port, $errorcode, $errormsg, 1);
	if (!$s){
           print '<div style="text-align:left; margin-left: 5%; font-size:13pt; font-weight:bold;">';
           print "Cannot connect to memcache server".$server.':'.$port.' => '.$errormsg;
           print "</div>";
           return NULL;
	}

        // authfile text authentication
        if ($use_authfile) {
		fwrite($s, "set auth 0 0 10\r\nadmin pass\r\n");
		$buf='';
		while ((!feof($s))) {
			$buf .= fgets($s, 256);
			if (strpos($buf,"STORED\r\n")!==false){ // stat says end
			    break;
			}
			if (strpos($buf,"CLIENT_ERROR")!==false){ // stat says end
			    return NULL;
			}
		}
        }

	fwrite($s, $command."\r\n");
	$buf='';
	while ((!feof($s))) {
		$buf .= fgets($s, 256);
		if (strpos($buf,"END\r\n")!==false){ // stat says end
		    break;
		}
		if (strpos($buf,"DELETED\r\n")!==false || strpos($buf,"NOT_FOUND\r\n")!==false){ // delete says these
		    break;
		}
		if (strpos($buf,"OK\r\n")!==false){ // flush_all says ok
		    break;
		}
	}
        fclose($s);
        return parseMemcacheResults($buf);
}

function parseMemcacheResults($str){
    
	$res = array();
	$lines = explode("\r\n",$str);
	$cnt = count($lines);
	for($i=0; $i< $cnt; $i++){
	    $line = $lines[$i];
		$l = explode(' ',$line,3);
		if (count($l)==3){
			$res[$l[0]][$l[1]]=$l[2];
			if ($l[0]=='VALUE'){ // next line is the value
			    $res[$l[0]][$l[1]] = array();
			    list ($flag,$size)=explode(' ',$l[2]);
			    $res[$l[0]][$l[1]]['stat']=array('flag'=>$flag,'size'=>$size);
			    $res[$l[0]][$l[1]]['value']=$lines[++$i];
			}
		}elseif($line=='DELETED' || $line=='NOT_FOUND' || $line=='OK'){
		    return $line;
		}
	}
	return $res;

}

function dumpCacheSlab($server,$slabId,$limit){
    list($host,$port) = get_host_port_from_server($server);
    $resp = sendMemcacheCommand($host,$port,'stats cachedump '.$slabId.' '.$limit);
    return $resp;

}

function flushServer($server){
    list($host,$port) = get_host_port_from_server($server);
    $resp = sendMemcacheCommand($host,$port,'flush_all');
    return $resp;
}

function getCacheItems(){
    $items = sendMemcacheCommands('stats items');
    $serverItems = array();
    $totalItems = array();
    foreach ($items as $server=>$itemlist){
       $serverItems[$server] = array();
       $totalItems[$server]=0;
       if (!isset($itemlist['STAT'])){
             continue;
       }

       $iteminfo = $itemlist['STAT'];

       foreach($iteminfo as $keyinfo=>$value){
          if (preg_match('/items\:(\d+?)\:(.+?)$/',$keyinfo,$matches)){
             $serverItems[$server][$matches[1]][$matches[2]] = $value;
             if ($matches[2]=='number'){
                $totalItems[$server] +=$value;
             }
          }
       }
    }
    return array('items'=>$serverItems,'counts'=>$totalItems);
}

/*
pid:1948
uptime:12521
time:1651460798
version:1.5.22
libevent:2.1.8-stable
pointer_size:64
rusage_user:1.081143
rusage_system:1.477597
max_connections:1024
curr_connections:50
total_connections:11962
rejected_connections:0
connection_structures:59
reserved_fds:20
cmd_get:352
cmd_set:63
cmd_flush:2
cmd_touch:0
cmd_meta:0
get_hits:289
get_misses:63
get_expired:0
get_flushed:0
delete_misses:0
delete_hits:0
incr_misses:0
incr_hits:0
decr_misses:0
decr_hits:0
cas_misses:0
cas_hits:0
cas_badval:0
touch_hits:0
touch_misses:0
auth_cmds:0
auth_errors:0
bytes_read:90936
bytes_written:17684165
limit_maxbytes:67108864
accepting_conns:1
listen_disabled_num:0
time_in_listen_disabled_us:0
threads:4
conn_yields:0
hash_power_level:16
hash_bytes:524288
hash_is_expanding:0
slab_reassign_rescues:0
slab_reassign_chunk_rescues:0
slab_reassign_evictions_nomem:0
slab_reassign_inline_reclaim:0
slab_reassign_busy_items:0
slab_reassign_busy_deletes:0
slab_reassign_running:0
slabs_moved:0
lru_crawler_running:0
lru_crawler_starts:5106
lru_maintainer_juggles:29617
malloc_fails:0
log_worker_dropped:0
log_worker_written:0
log_watcher_skipped:0
log_watcher_sent:0
bytes:0
curr_items:0
total_items:63
slab_global_page_pool:0
expired_unfetched:18
evicted_unfetched:0
evicted_active:0
evictions:0
reclaimed:63
crawler_reclaimed:0
crawler_items_checked:29
lrutail_reflocked:92
moves_to_cold:177
moves_to_warm:120
moves_within_lru:43
direct_reclaims:0
lru_bumps_dropped:0
*/

function getMemcacheStats($total=true){
	$resp = sendMemcacheCommands('stats');
	if ($total){
		$res = array();
		foreach($resp as $server=>$r){
			foreach($r['STAT'] as $key=>$row){
				if (!isset($res[$key])){
					$res[$key]=null;
				}
				switch ($key){
					case 'pid':
						$res['pid'][$server]=$row;
						break;
					case 'uptime':
						$res['uptime'][$server]=$row;
						break;
					case 'time':
						$res['time'][$server]=$row;
						break;
					case 'version':
						$res['version'][$server]=$row;
						break;
					case 'pointer_size':
						$res['pointer_size'][$server]=$row;
						break;
					case 'rusage_user':
						$res['rusage_user'][$server]=$row;
						break;
					case 'rusage_system':
						$res['rusage_system'][$server]=$row;
						break;
					case 'curr_items':
						$res['curr_items']+=$row;
						break;
					case 'total_items':
						$res['total_items']+=$row;
						break;
					case 'bytes':
						$res['bytes']+=$row;
						break;
					case 'curr_connections':
						$res['curr_connections']+=$row;
						break;
					case 'total_connections':
						$res['total_connections']+=$row;
						break;
					case 'connection_structures':
						$res['connection_structures']+=$row;
						break;
					case 'cmd_get':
						$res['cmd_get']+=$row;
						break;
					case 'cmd_set':
						$res['cmd_set']+=$row;
						break;
					case 'get_hits':
						$res['get_hits']+=$row;
						break;
					case 'get_misses':
						$res['get_misses']+=$row;
						break;
					case 'evictions':
						$res['evictions']+=$row;
						break;
					case 'bytes_read':
						$res['bytes_read']+=$row;
						break;
					case 'bytes_written':
						$res['bytes_written']+=$row;
						break;
					case 'limit_maxbytes':
						$res['limit_maxbytes']+=$row;
						break;
					case 'threads':
						$res['rusage_system'][$server]=$row;
						break;
				}
			}
		}
		return $res;
	}
	return $resp;
}

function duration($ts) {
    global $time;

    if (!$time or !$ts)
       return NULL;

    $years = (int)((($time - $ts)/(7*86400))/52.177457);
    $rem = (int)(($time-$ts)-($years * 52.177457 * 7 * 86400));
    $weeks = (int)(($rem)/(7*86400));
    $days = (int)(($rem)/86400) - $weeks*7;
    $hours = (int)(($rem)/3600) - $days*24 - $weeks*7*24;
    $mins = (int)(($rem)/60) - $hours*60 - $days*24*60 - $weeks*7*24*60;
    $str = '';
    if($years==1) $str .= "$years year, ";
    if($years>1) $str .= "$years years, ";
    if($weeks==1) $str .= "$weeks week, ";
    if($weeks>1) $str .= "$weeks weeks, ";
    if($days==1) $str .= "$days day,";
    if($days>1) $str .= "$days days,";
    if($hours == 1) $str .= " $hours hour and";
    if($hours>1) $str .= " $hours hours and";
    if($mins == 1) $str .= " 1 minute";
    else $str .= " $mins minutes";
    return $str;
}

function graphics_avail() {
	return extension_loaded('gd');
}

function bsize($s) {
	foreach (array('','K','M','G') as $i => $k) {
		if ($s < 1024) break;
		$s/=1024;
	}
	return sprintf("%5.1f %sBytes",$s,$k);
}

function getHeader(){
    global $PHP_SELF;
    $url = baseURL().'?page=cluster';
    //$header = '<div class=content>';
    $header = '';
    return $header;
}

function getFooter(){
    global $VERSION;
    //$footer = '</div>';
    $footer = '';
    return $footer;
}

// create menu entry
function menu_entry($ob, $title) {
	global $PHP_SELF;

	if ($ob==$_GET['op']){
	    //return "<li><a class=\"child_active\" href=\"$PHP_SELF&op=$ob\">$title</a></li>";
	    return "<li><a class=\"current_page\" href=\"$PHP_SELF&op=$ob\">$title</a></li>";
	}
	//return "<li><a class=\"active\" href=\"$PHP_SELF&op=$ob\">$title</a></li>";
	return "<li><a href=\"$PHP_SELF&op=$ob\">$title</a></li>";
}

function getMenu(){
    global $PHP_SELF;

    //$url = baseURL().'?page=cluster';

    echo '<ol class="menu">';
    echo '<ul>';

    //echo <<<EOB
    //<li><a href="$url">Cluster</a></li>
    //EOB;

    switch ($_GET['op']) {
    case 6:
       echo <<<EOB
<li><a href="$PHP_SELF&op=1">Home</a></li>
EOB;
       break;

    case 5:
      echo <<<EOB
<li><a href="$PHP_SELF&op=2">Back</a></li>
EOB;
       break;

    case 4:
       echo <<<EOB
<li><a href="$PHP_SELF&op={$_GET['op']}&key={$_GET['key']}&server={$_GET['server']}">Refresh</a></li>
EOB;
      break;

    case 3:
    case 2:
    case 1:
       echo <<<EOB
<li><a href="$PHP_SELF&op={$_GET['op']}">Home</a></li>
EOB;
       break;
   }
   echo
 	menu_entry(1,'Host Statistics'),
	menu_entry(2,'View Cache');

echo <<<EOB
	</ul>
	</ol>
	<br/>
EOB;
}

function fill_box($im, $x, $y, $w, $h, $color1, $color2,$text='',$placeindex='') {
		global $col_black;
		$x1=$x+$w-1;
		$y1=$y+$h-1;

		imagerectangle($im, $x, $y1, $x1+1, $y+1, $col_black);
		if($y1>$y) imagefilledrectangle($im, $x, $y, $x1, $y1, $color2);
		else imagefilledrectangle($im, $x, $y1, $x1, $y, $color2);
		imagerectangle($im, $x, $y1, $x1, $y, $color1);
		if ($text) {
			if ($placeindex>0) {

				if ($placeindex<16)
				{
					$px=5;
					$py=$placeindex*12+6;
					imagefilledrectangle($im, $px+90, $py+3, $px+90-4, $py-3, $color2);
					imageline($im,$x,$y+$h/2,$px+90,$py,$color2);
					imagestring($im,2,$px,$py-6,$text,$color1);

				} else {
					if ($placeindex<31) {
						$px=$x+40*2;
						$py=($placeindex-15)*12+6;
					} else {
						$px=$x+40*2+100*intval(($placeindex-15)/15);
						$py=($placeindex%15)*12+6;
					}
					imagefilledrectangle($im, $px, $py+3, $px-4, $py-3, $color2);
					imageline($im,$x+$w,$y+$h/2,$px,$py,$color2);
					imagestring($im,2,$px+2,$py-6,$text,$color1);
				}
			} else {
				imagestring($im,4,$x+5,$y1-16,$text,$color1);
			}
		}
}

function fill_arc($im, $centerX, $centerY, $diameter, $start, $end, $color1,$color2,$text='',$placeindex=0) {
		$r=$diameter/2;
		$w=deg2rad((360+$start+($end-$start)/2)%360);


		if (function_exists("imagefilledarc")) {
			// exists only if GD 2.0.1 is avaliable
			imagefilledarc($im, $centerX+1, $centerY+1, $diameter, $diameter, $start, $end,
                                       $color1, IMG_ARC_PIE);
			imagefilledarc($im, $centerX, $centerY, $diameter, $diameter, $start, $end,
                                       $color2, IMG_ARC_PIE);
			imagefilledarc($im, $centerX, $centerY, $diameter, $diameter, $start, $end,
                                       $color1, IMG_ARC_NOFILL|IMG_ARC_EDGED);
		} else {
			imagearc($im, $centerX, $centerY, $diameter, $diameter, $start, $end, $color2);
			imageline($im, $centerX, $centerY, $centerX + cos(deg2rad($start)) * $r,
                                  $centerY + sin(deg2rad($start)) * $r, $color2);
			imageline($im, $centerX, $centerY, $centerX + cos(deg2rad($start+1)) * $r,
                                  $centerY + sin(deg2rad($start)) * $r, $color2);
			imageline($im, $centerX, $centerY, $centerX + cos(deg2rad($end-1))   * $r,
                                  $centerY + sin(deg2rad($end))   * $r, $color2);
			imageline($im, $centerX, $centerY, $centerX + cos(deg2rad($end))   * $r,
                                  $centerY + sin(deg2rad($end))   * $r, $color2);
			imagefill($im,$centerX + $r*cos($w)/2, $centerY + $r*sin($w)/2, $color2);
		}
		if ($text) {
			if ($placeindex>0) {
				imageline($im,$centerX + $r*cos($w)/2, $centerY + $r*sin($w)/2,$diameter,
                                          $placeindex*12,$color1);
				imagestring($im,4,$diameter, $placeindex*12,$text,$color1);

			} else {
				imagestring($im,4,$centerX + $r*cos($w)/2, $centerY + $r*sin($w)/2,
                                            $text,$color1);
			}
		}
}


function cluster_get()
{
   global $PHP_SELF, $time, $style_sheet;
   global $MEMCACHE_SERVERS, $sitename;
   global $ACTIVE_SERVERS, $SASL;
   global $MEMCACHE_SASL;
   global $REDIS_SERVERS;

   $usepassword = 0;
   if ($usepassword) {
      if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
          $_SERVER['PHP_AUTH_USER'] != ADMIN_USERNAME ||$_SERVER['PHP_AUTH_PW'] != ADMIN_PASSWORD) 
      {
         header("WWW-Authenticate: Basic realm=\"Memcache Login\"");
         header("HTTP/1.0 401 Unauthorized");

         echo <<<EOB
	   <html><body>
           <h1>Rejected!</h1>
	   <big>Wrong Username or Password!</big>
	   </body></html>
EOB;
         exit;
      }
   }

   //
   // don't cache this page
   //
   header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
   header("Cache-Control: post-check=0, pre-check=0", false);
   header("Pragma: no-cache");                                    // HTTP/1.0

   $_GET['op'] = !isset($_GET['op']) ? '1': $_GET['op'];
   $PHP_SELF = isset($_SERVER['PHP_SELF']) ? htmlentities(strip_tags($_SERVER['PHP_SELF'],'')) : '';

   $PHP_SELF = str_replace('index.php', '', $PHP_SELF);
   $PHP_SELF = $PHP_SELF.'?page=cluster';

   $time = time();
   // sanitize _GET

   foreach($_GET as $key=>$g) {
      $_GET[$key]=htmlentities($g);
   }

   //cleanup memcache server array and remove empty or malformed servers
   $MEMCACHE_SERVERS = array_values(array_filter($MEMCACHE_SERVERS));

   unset($_SESSION['errmsg']);
   foreach ($MEMCACHE_SERVERS as $server) {
         if ($server) {
		$strs = get_host_port_from_server($server);
		$host = $strs[0];
		$port = $strs[1];
	        $s = @fsockopen($host, $port, $errorcode, $errormsg, 1);
		if (!$s) {
			$_SESSION['errmsg'][] = "Cannot connect to memcache server ".$host.':'.$port.
                                                ' => '.$errormsg;
		} else {
		        fclose($s);
			$ACTIVE_SERVERS[] = $server;
		}
	
	}
   }
   $SASL = $MEMCACHE_SASL;
   // save verified server list for key lookups
   $SERVER_LOOKUP = $ACTIVE_SERVERS;

   // check for redis servers
   //$redisinfo = redis_get($REDIS_SERVERS);
   //foreach($redisinfo as $redis) {
   //}

   // singleout
   // when singleout is set, it only gives details for that server.
   if (isset($_GET['singleout']) && $_GET['singleout'] >= 0 &&
       $_GET['singleout'] < count($ACTIVE_SERVERS))
   {
     $ACTIVE_SERVERS = array($ACTIVE_SERVERS[$_GET['singleout']]);
   }

   // display images
   if (isset($_GET['IMG'])){
       $memcacheStats = getMemcacheStats();
       $memcacheStatsSingle = getMemcacheStats(false);

       //print_r($memcacheStatsSingle);
       //exit;

       if (!graphics_avail()) {
		exit(0);
       }

	$size = GRAPH_SIZE; // image size
	$image = imagecreate($size+50, $size+10);

	//$col_red   = imagecolorallocate($image, 0xD0, 0x60,  0x30);
	//$col_green = imagecolorallocate($image, 0x60, 0xF0, 0x60);

	$col_white = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
	$col_red   = imagecolorallocate($image, 0xFF, 0x00,  0x00);
	$col_green = imagecolorallocate($image, 0x00, 0xFF, 0x00);
	$col_blue = imagecolorallocate($image, 0x00, 0x00, 0xFF);
	$col_yellow = imagecolorallocate($image, 0xFF, 0xFF, 0x00);
	$col_cyan = imagecolorallocate($image, 0x00, 0xFF, 0xFF);
	$col_skyblue = imagecolorallocate($image, 0x87, 0xCE, 0xEB);
	$col_silver = imagecolorallocate($image, 192, 192, 192);
	$col_black = imagecolorallocate($image,   0,   0,   0);
	$col_tan = imagecolorallocate($image, 0xF7, 0xEF, 0xC6);

	imagecolortransparent($image,$col_white);

        switch ($_GET['IMG']){
	case 1: // pie chart
                $tsize = $memcacheStats['limit_maxbytes'];
    		$avail = $tsize - $memcacheStats['bytes'];
    		$x = $y = $size / 2;
    		$angle_from = 0;
    		$fuzz = 0.000001;
                $perc = 0;

		foreach($memcacheStatsSingle as $serv=>$mcs) {
    			$free = $mcs['STAT']['limit_maxbytes']-$mcs['STAT']['bytes'];
	    		$used = $mcs['STAT']['bytes'];

        	        if ($free>0){
    			// draw free
    			    $angle_to = ($free*360)/$tsize;
			    if (count($memcacheStatsSingle) <= 1)
  	                       $perc = sprintf("%.2f%%", ($free *100) / $tsize) ;

			    fill_arc($image,$x,$y,$size,$angle_from,$angle_from + $angle_to ,
                                        $col_black,$col_tan,$perc);
        		    $angle_from = $angle_from + $angle_to ;
	                }
    			if ($used>0){
    			// draw used
        			$angle_to = ($used*360)/$tsize;
			        if (count($memcacheStatsSingle) <= 1) {
	        		   $perc = sprintf("%.2f%%", ($used *100) / $tsize) ;
                                   $perc = '('.$perc.')';
                                }

        			fill_arc($image,$x,$y,$size,$angle_from,$angle_from + $angle_to,
                                         $col_black,$col_skyblue,$perc);
				$angle_from = $angle_from+ $angle_to ;
	    		}
		}
	        break;

        case 2: // hit miss
		$hits = ($memcacheStats['get_hits']==0) ? 1:$memcacheStats['get_hits'];
		$misses = ($memcacheStats['get_misses']==0) ? 1:$memcacheStats['get_misses'];
		$total = $hits + $misses ;

		fill_box($image, 30,$size,50,-$hits*($size-21)/$total,$col_black,$col_green,
			//$hits ? sprintf("%.1f%%",$hits*100/$total) : sprintf("%.1f%%", 0)
			sprintf("%.1f%%",$hits*100/$total)
			);

		fill_box($image,130,$size,50,-max(4,($total-$hits)*($size-21)/$total),$col_black,$col_red,
			//$misses ? sprintf("%.1f%%",$misses*100/$total) : sprintf("%.1f%%", 0)
			sprintf("%.1f%%",$misses*100/$total)
			);
		break;
		
      }
      header("Content-type: image/png");
      imagepng($image);
      exit;
   }

   ob_start();
   echo getHeader();
   echo getMenu();

   if (isset($_SESSION['errmsg'])) {
	   print '<div style="text-align:left; margin-left: 5%; font-size:13pt; font-weight:bold;">';
           foreach ($_SESSION['errmsg'] as $msg) {
		echo $msg.'<br/>';
	   }
	   print "</div>";
   }
   unset($_SESSION['errmsg']);

   switch ($_GET['op']) {
      case 6: // flush server
        $theserver = $ACTIVE_SERVERS[(int)$_GET['server']];
        $r = flushServer($theserver);
        echo '<div class="graph">';
        echo '<h3>Flushed '.str_replace(',', ':', $theserver)."&nbsp;".$r."</h3>";
        echo '</div>';

     case 1: // host stats
        $phpversion = phpversion();
        $memcacheStats = getMemcacheStats();
        $memcacheStatsSingle = getMemcacheStats(false);
         
	if (!$memcacheStats || !$memcacheStatsSingle)
		break;
	
        $mem_size = $memcacheStats['limit_maxbytes'];
    	$mem_used = $memcacheStats['bytes'];
	$mem_avail= $mem_size-$mem_used;
	$startTime = time() - array_sum($memcacheStats['uptime']);

        $curr_items = ($memcacheStats['curr_items'] == 0) ? 0 : $memcacheStats['curr_items'];
        $total_items = ($memcacheStats['total_items'] == 0) ? 0 : $memcacheStats['total_items'];
        $hits = ($memcacheStats['get_hits'] == 0) ? 0 : $memcacheStats['get_hits'];
        $misses = ($memcacheStats['get_misses'] == 0) ? 0 : $memcacheStats['get_misses'];
        $sets = ($memcacheStats['cmd_set'] == 0) ? 0 : $memcacheStats['cmd_set'];

       	$req_rate = $hit_rate = $miss_rate = $set_rate = 0;
        if ($time - $startTime) {
       	   $req_rate = sprintf("%.2f",($hits+$misses)/($time-$startTime));
           $hit_rate = sprintf("%.2f",($hits)/($time-$startTime));
	   $miss_rate = sprintf("%.2f",($misses)/($time-$startTime));
	   $set_rate = sprintf("%.2f",($sets)/($time-$startTime));
        }

        echo '<div class="parent">';
        echo '<div class="child">';
        //echo '<div class="flex-container">';
        //echo '<div class="flex-child">';

	echo <<< EOB
		<div class="info div1"><h2 style="font-weight:bold;font-size:14pt;text-shadow:none;color:black;">General Cache Information</h2>
		<table cellspacing=0><tbody>
		<tr class=tr-1><td class=td-0>PHP Version</td><td>$phpversion</td></tr>
EOB;
		echo "<tr class=tr-0><td class=td-0>Memcached Host".((count($ACTIVE_SERVERS)>1) ? 's':'')."</td><td>";
		$i=0;
		if (!isset($_GET['singleout']) && count($ACTIVE_SERVERS) > 1){
    		   foreach($ACTIVE_SERVERS as $server)
                   {
		      $strs = get_host_port_from_server($server);
                      $rchars = array("[", "]");
                      $strs[0] = str_replace($rchars, '', $strs[0]);
    		      echo ($i+1).'. <a href="'.$PHP_SELF.'&singleout='.$i++.'">'.
                           ((filter_var($strs[0],  FILTER_VALIDATE_IP) !== false) 
                           ? gethostbyaddr($strs[0]) : $strs[0])
                           .'</a>&nbsp;<br/>';
    		   }
		}
		else
                {
		    $strs = get_host_port_from_server($ACTIVE_SERVERS[0]);
                    $rchars = array("[", "]");
                    $strs[0] = str_replace($rchars, '', $strs[0]);
		    echo ((filter_var($strs[0],  FILTER_VALIDATE_IP) !== false) 
                          ? gethostbyaddr($strs[0]) : $strs[0]).'&nbsp;';
		}

		if (isset($_GET['singleout'])){
		      echo '<a href="'.$PHP_SELF.'">(all servers)</a><br/>';
		}
		echo "</td></tr>\n";
		echo "<tr class=tr-1><td class=td-0>Total Memcache Cache</td><td>".bsize($memcacheStats['limit_maxbytes'])."</td></tr>\n";

	echo <<<EOB
		</tbody></table>
		</div>

		<div class="info div1"><h2 style="font-weight:bold;font-size:14pt;text-shadow:none;color:black;">Memcache Server Information</h2>
EOB;
        foreach($ACTIVE_SERVERS as $server){
	    $strs = get_host_port_from_server($server);
            $rchars = array("[", "]");
            $strs[0] = str_replace($rchars, '', $strs[0]);
            echo '<table cellspacing=0><tbody>';
            echo '<tr class=tr-1><td class=td-1>'.
                 ((filter_var($strs[0],  FILTER_VALIDATE_IP) !== false)
                  ? gethostbyaddr($strs[0]) : $strs[0]).':'.$strs[1].
                 '</td>'.
                 '<td><a href="'.$PHP_SELF.'&server=';

                 if (array_search($server,$SERVER_LOOKUP) !== false) {
                    $key = array_search($server,$SERVER_LOOKUP);
                    echo $key;
                 }
                 echo '&op=6">[<b>Flush this server</b>]</a></td></tr>';

    	    echo '<tr class=tr-0><td class=td-0>';
            $addrcaption = 'IP Address';
            $hostip = gethostbyname($strs[0]);
            if (filter_var($hostip,  FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false) {
               $addrcaption = 'IPv6 Address';
            }
            else if (filter_var($hostip,  FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false) {
               $addrcaption = 'IPv4 Address';
            }
            echo $addrcaption.'</td><td>', $hostip,':'.$strs[1].'</td></tr>';

    	    echo '<tr class=tr-1><td class=td-0>Start Time</td><td>',
                     $memcacheStatsSingle[$server]['STAT']['time'] 
                     ? date(DATE_FORMAT,
                       $memcacheStatsSingle[$server]['STAT']['time'] -
                       $memcacheStatsSingle[$server]['STAT']['uptime'])
                     : '',
                    '</td></tr>';
    	    echo '<tr class=tr-0><td class=td-0>Uptime</td><td>',
                  duration($memcacheStatsSingle[$server]['STAT']['time']-
                           $memcacheStatsSingle[$server]['STAT']['uptime']),'</td></tr>';
    	    echo '<tr class=tr-1><td class=td-0>Memcached Server Version</td><td>'.
                 $memcacheStatsSingle[$server]['STAT']['version'].'</td></tr>';
    	    echo '<tr class=tr-0><td class=td-0>Used Cache Size</td><td>',
                 bsize($memcacheStatsSingle[$server]['STAT']['bytes']),'</td></tr>';
    	    echo '<tr class=tr-1><td class=td-0>Total Cache Size</td><td>',
                 bsize($memcacheStatsSingle[$server]['STAT']['limit_maxbytes']),'</td></tr>';

	    if (isset($_GET['singleout'])){
/*
	        $memcache = init_memcache();
	        if ($memcache)  {
	           $stats = $memcache->getExtendedStats();
                   foreach ($stats as $key => $v) {
                     //print_r($key);
                     //echo '<br/>';
                  }
               }
*/
           }
    	   echo '</tbody></table>';
     }
     echo <<<EOB
	        </div>
                </div>
                <div class="child">
		<div class="graph div3"><h2 style="font-weight:bold;font-size:14pt;text-shadow:none;color:black;">Host Status Diagrams</h2>
		<table cellspacing=0><tbody>
EOB;

	$size='width='.(GRAPH_SIZE+50).' height='.(GRAPH_SIZE+10);
	echo <<<EOB
		<tr>
		<td class=td-0>Cache Usage</td>
		<td class=td-1>Hits &amp; Misses</td>
		</tr>
EOB;

	echo
		graphics_avail() ?
			  '<tr>'.
			  "<td class=td-0><img alt=\"\" $size src=\"$PHP_SELF&IMG=1&".(isset($_GET['singleout'])? 'singleout='.$_GET['singleout'].'&':'')."$time\"></td>".
			  "<td class=td-1><img alt=\"\" $size src=\"$PHP_SELF&IMG=2&".(isset($_GET['singleout'])? 'singleout='.$_GET['singleout'].'&':'')."$time\"></td></tr>\n"
			: "",
		'<tr>',
		'<td class=td-0><span class="tan box">&nbsp;</span>Free: ',
                    $mem_avail ? bsize($mem_avail).sprintf(" (%.1f%%)",$mem_avail*100/$mem_size)
                               : bsize($mem_avail).sprintf(" (%.1f%%)", 0),
                "</td>\n",
		'<td class=td-1><span class="green box">&nbsp;</span>Hits: ',
                    $hits ? $hits.sprintf(" (%.1f%%)",$hits*100/($hits+$misses))
                          : $hits.sprintf(" (%.1f%%)", 0),
                "</td>\n",
		'</tr>',
		'<tr>',
		'<td class=td-0><span class="skyblue box">&nbsp;</span>Used: ',
                    $mem_used ? bsize($mem_used ).sprintf(" (%.1f%%)",$mem_used *100/$mem_size)
                              : bsize($mem_used ).sprintf(" (%.1f%%)",0),
                "</td>\n",
		'<td class=td-1><span class="red box">&nbsp;</span>Misses: ',
                    $misses ? $misses.sprintf(" (%.1f%%)",$misses*100/($hits+$misses))
                            : $misses.sprintf(" (%.1f%%)",0),
                "</td>\n";
		echo <<< EOB
	</tr>
	</tbody></table>
	</div>
	<div class="info div3"><h2 style="font-weight:bold;font-size:14pt;text-shadow:none;color:black;">Cache Information</h2>
		<table cellspacing=0><tbody>
		<tr class=tr-0><td class=td-0>Current Items(total)</td><td>$curr_items ($total_items)</td></tr>
		<tr class=tr-1><td class=td-0>Hits</td><td>{$hits}</td></tr>
		<tr class=tr-0><td class=td-0>Misses</td><td>{$misses}</td></tr>
		<tr class=tr-1><td class=td-0>Request Rate (hits, misses)</td>
                                                           <td>$req_rate cache requests/second</td></tr>
		<tr class=tr-0><td class=td-0>Hit Rate</td><td>$hit_rate cache requests/second</td></tr>
		<tr class=tr-1><td class=td-0>Miss Rate</td><td>$miss_rate cache requests/second</td></tr>
		<tr class=tr-0><td class=td-0>Set Rate</td><td>$set_rate cache requests/second</td></tr>
		</tbody></table>
	</div>
	</div>
	</div>

EOB;

    break;

    case 5: // item delete
    	if (!isset($_GET['key']) || !isset($_GET['server'])){
        	echo '<div class="graph">';
	        echo '<h3>No Key Set!</h3>';
	        echo '</div>';
		break;
        }
        $theKey = htmlentities(base64_decode($_GET['key']));
	$theserver = $ACTIVE_SERVERS[(int)$_GET['server']];
	list($h,$p) = get_host_port_from_server($theserver);
        $r = sendMemcacheCommand($h,$p,'delete '.$theKey);
        echo '<div class="graph">';
        echo '<h3>Deleting '.$theKey.':&nbsp;'.$r.'</h3>';
        echo '</div>';
    
    case 2: // variables
	$m=0;
	$cacheItems = getCacheItems();
	$items = $cacheItems['items'];
	$totals = $cacheItems['counts'];
	$maxDump = MAX_ITEM_DUMP;

	foreach ($items as $server => $entries) {
	    	echo <<< EOB
		<div class="slab"><table cellspacing=0><tbody>
		<tr><th colspan="2" style="color:black;">$server</th></tr>
		<tr><th style="color:black;">Slab Id</th><th style="color:black;">Info</th></tr>
EOB;
		foreach($entries as $slabId => $slab) {
		    $dumpUrl = $PHP_SELF.
                    '&op=2&server='.(array_search($server,$ACTIVE_SERVERS)).
                    '&dumpslab='.$slabId;
		    echo "<tr class=tr-$m>",
			"<td class=td-0 style=\"width:10%;\"><center>",'<a href="',$dumpUrl,'">',$slabId,'</a>',"</center></td>",
			"<td class=td-last><b>Item count:</b> ",$slab['number'],'<br/><b>Age:</b>',duration($time-$slab['age']),'<br/> <b>Evicted:</b>',((isset($slab['evicted']) && $slab['evicted']==1)? 'Yes':'No');
		   if ((isset($_GET['dumpslab']) && $_GET['dumpslab']==$slabId) &&  (isset($_GET['server']) && $_GET['server']==array_search($server,$ACTIVE_SERVERS))){
			    echo "<br/><b>Items: item</b><br/>";
			    $items = dumpCacheSlab($server,$slabId,$slab['number']);

                        // maybe someone likes to do a pagination here :)
		        $i=1;

                        foreach($items['ITEM'] as $itemKey=>$itemInfo){
                            $itemInfo = trim($itemInfo,'[ ]');
                            echo '<a href="',$PHP_SELF,'&op=4&server=',(array_search($server,$ACTIVE_SERVERS)),'&key=',base64_encode($itemKey).'">',$itemKey,'</a>';
                            //if (($i++ % 4) == 0) {
                            //   echo '<br/>';
                            //}
                            //elseif ($i!=$slab['number']+1){
                            if ($i!=$slab['number']+1){
                                echo ', ';
                            }
                        }
		}

		echo "</td></tr>";
		$m=1-$m;
		}
		echo <<<EOB
			</tbody></table>
			</div><hr/>
EOB;
         }
	break;

        break;

    case 4: //item dump
        if (!isset($_GET['key']) || !isset($_GET['server'])){
       	    echo '<div class="graph">';
            echo '<h3>No Key Set!</h3>';
            echo '</div>';
            break;
        }
        // I'm not doing anything to check the validity of the key string.
        // probably an exploit can be written to delete all the files in key=base64_encode("\n\r delete all").
        // somebody has to do a fix to this.
        $theKey = htmlentities(base64_decode($_GET['key']));

        $theserver = $ACTIVE_SERVERS[(int)$_GET['server']];
        list($h,$p) = get_host_port_from_server($theserver);
        $r = sendMemcacheCommand($h,$p,'get '.$theKey);

        echo <<<EOB
        <div class="slab" style="background:rgb(238,238,238);"><table cellspacing=0><tbody>
	<tr><th style="color:black;">Server<th style="color:black;">Key</th><th style="color:black;">Value</th><th style="color:black;">Delete</th></tr>
EOB;
        if (!isset($r['VALUE'])) {
            echo "<tr><td class=td-0>",$theserver,"</td><td class=td-0>",$theKey,
                 "</td><td>[The requested item was not found or has expired]</td>",
                 "<td></td>","</tr>";
        }
        else {
            if ($r['VALUE'][$theKey]['stat']['flag'] != '1') {
               $rdata = bin2hex($r['VALUE'][$theKey]['value']);
               $chunk_size = 2;
            } else {
               $rdata = htmlentities($r['VALUE'][$theKey]['value']);
               $chunk_size = 40;
            }

            echo "<tr><td class=td-0>",$theserver,"</td><td class=td-0>",$theKey," <br/>flag:",
                  $r['VALUE'][$theKey]['stat']['flag'], 
                  ($r['VALUE'][$theKey]['stat']['flag'] == 3) ? " (Compressed)" : "", 
                  " <br/>Size:",
                  bsize($r['VALUE'][$theKey]['stat']['size']),'</td><td>',
                  chunk_split($rdata,$chunk_size),
                 "</td>",'<td><a href="',$PHP_SELF,'&op=5&server=',(int)$_GET['server'],
                 '&key=',base64_encode($theKey),"\">Delete</a></td>","</tr>";
        }
        echo <<<EOB
  	   </tbody></table>
	   </div><hr/>
EOB;
        break;

   }
   echo getFooter();

   $info = ob_get_contents();
   ob_end_clean();
   //preg_match("/<body[^>]*>(.*?)<\/body>/is", $info, $sections);
   //preg_match("/<style[^>]*>(.*?)<\/style/is", $info, $styles);
   top($sitename." | Cluster");
   //echo '<style type="text/css">'.$styles[1].'</style>';
   //echo '<div class=content>'.$sections[1].'</div>';
   echo $style_sheet;
   echo $info;
   echo '<br style="clear:both;"/>';
   bottom();
}

function redis_get($servers)
{
	global $REDIS_AUTH;
        global $use_redisauth;

	if (isset($_GET['s']) && intval($_GET['s']) < count($servers)) {
		$server = intval($_GET['s']);

		$fp = fsockopen($servers[$server][1], $servers[$server][2], $errno, $errstr, 1);
		$data = array();
		if (!$fp){
			$_SESSION['errmsg'][] = "Cannot connect to redis server ".$servers[$server][1].
                	                        ':'.$servers[$server][2].' => '.$errstr;
			return NULL;
		}

		fwrite($fp, "INFO\r\nQUIT\r\n");
		while (!feof($fp)) {
	        	$info = explode(':', trim(fgets($fp)), 2);
		        if (isset($info[1])) $data[$info[0]] = $info[1];
		}
		fclose($fp);
		$result[] = $data;
		return $result;
	}
	else {
		$result = array();
		foreach ($servers as $key => $v) {
			$fp = fsockopen($servers[$key][1], $servers[$key][2], $errno, $errstr, 1);
			if (!$fp){
				$_SESSION['errmsg'][] = "Cannot connect to redis server ".
                                                        $servers[$key][1].':'.$servers[$key][2].
                                                        ' => '.$errstr;
			}
			else {
				$data = array();
        			if ($use_redisauth) {
					fwrite($fp, "AUTH $REDIS_AUTH\r\nINFO\r\nQUIT\r\n");
					while (!feof($fp)) {
			        	   $info = explode(':', trim(fgets($fp)), 2);
				           if (isset($info[1])) $data[$info[0]] = $info[1];
					}
				}
                                else {
					fwrite($fp, "INFO\r\nQUIT\r\n");
					while (!feof($fp)) {
				        	$info = explode(':', trim(fgets($fp)), 2);
					        if (isset($info[1])) $data[$info[0]] = $info[1];
					}
                                }
				fclose($fp);
				$result[] = $data;
			}
		}
		return $result;
	}
	return NULL;
}


function time_elapsed($secs){
    $bit = array(
        ' year'      => $secs / 31556926 % 12,
        ' week'      => $secs / 604800 % 52,
        ' day'       => $secs / 86400 % 7,
        ' hour'      => $secs / 3600 % 24,
        ' minute'    => $secs / 60 % 60,
        ' second'    => $secs % 60,
    );
       
    foreach ($bit as $k => $v){
        if($v > 1) $ret[] = $v . $k . 's';
        if($v == 1) $ret[] = $v . $k;
    }
    array_splice($ret, count($ret) - 1, 0, 'and');
   
    return implode(' ', $ret);
}

?>
