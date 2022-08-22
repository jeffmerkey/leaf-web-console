<?php
/***************************************************************************
*
*   Copyright(c) Leaf Linux and Jeff V. Merkey 1997-2022.
*   All rights reserved.
*
*   Leaf PHP Web Console
*
**************************************************************************/

class LanguageDetector
{
    private $subsets = [];
    private $datadir;
    private $scores = [];
    private $text = '';
    private static $detector;

    /**
     * Loads all subsets
     * 
     * @param  string $dir A directory where subsets are.
     */
    public function __construct($dir = null)
    {
        $this->datadir = null === $dir
            ? __DIR__ . '/subsets' : rtrim($dir, '/');

        foreach (glob($this->datadir . '/*') as $file) {
            $this->subsets[basename($file)] = json_decode(
                file_get_contents($file), true
            );
        }
    }

    /**
     * Evaluates that a string matches a language
     * 
     * @param  string $text
     * @return \LanguageDetector\LanguageDetector
     * @throws \InvalidArgumentException if $text is not a string
     * @api
     */
    public function evaluate($text)
    {
        if (empty($text)) {
            return $this;
        }

        $this->text = $text;

        array_walk($this->subsets, $this->calculate($this->chunk()));

        arsort($this->scores);

        return $this;
    }

    /**
     * Static call for oneliners
     * 
     * @param  string $text
     * @return \LanguageDetector\LanguageDetector
     * @api
     */
    public static function detect($text)
    {
        if (is_null(self::$detector)) {
            self::$detector = new self();
        }

        return self::$detector->evaluate($text);
    }

    /**
     * Gets the best scored language
     * 
     * @return string ISO code or an empty string
     *                if nothing has been evaluated
     * @api
     */
    public function getLanguage()
    {
        if (!count($this->scores)) {
            return '';
        }

        return key($this->scores);
    }

    /**
     * Get all scored subsets
     * 
     * @return array An array of ISO codes => scores
     * @throws \Exception if nothing has been evaluated
     * @api
     */
    public function getScores()
    {
        if (!count($this->scores)) {
            throw new Exception('No string has been evaluated');
        }

        return $this->scores;
    }

    /**
     * Get all supported languages
     * 
     * @return array An array of ISO codes
     * @api
     */
    public function getSupportedLanguages()
    {
        return array_keys($this->subsets);
    }

    /**
     * Get evaluated text
     * 
     * @return string
     * @api
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Get best result when detector is used as a string
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->getLanguage();
    }

    /**
     * Evaluate probabilities for one language
     * 
     * @param  array $chunks
     * @return \Closure An evaluator
     */
    private function calculate(array $chunks)
    {
        return function($data, $lang) use ($chunks) {
            $this->scores[$lang] = 
                array_sum(
                    array_intersect_key(
                        $data['freq'],
                        array_flip($chunks)
                    )
                )
                / array_sum($data['n_words']);
        };
    }

    /**
     * Chunk a text
     * 
     * @return array
     */
    private function chunk()
    {
        $chunks = [];
        $len = mb_strlen($this->text);

        // Chunk sizes 
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < $len; $j++) {
                if ($len > $j + $i) {
                    $chunks[] = mb_substr($this->text, $j, $i + 1);
                }
            }
        }

        return $chunks;
    }
}

class DB
{
	var $host;
	var $db;
	var $usr;
	var $pass;
	var $dbh;
	var $res;
	var $link;
	var $select_rows;
	var $fieldlist=array();
	var $verbose;

	function connect($name="") {
                global $db_user, $db_host, $db_pass, $db_name;

                $this->host = $db_host;
                $this->user = $db_user;
                $this->pass = $db_pass;
                $this->db = $db_name;
		if ($name)
                	$this->db = $name;
		
		$this->link = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
		if(!$this->link)
                { 
                    $_SESSION['mysql_error'] = 'Site is currently undergoing system maintenance'; 
                    return FALSE;
                }
		mysqli_query($this->link, "SET NAMES 'utf8'");
                return TRUE;
	}
	
	function query($query) {
		$result = mysqli_query($this->link, $query);
		if (!$result){
                    if (isset($this->verbose) and $this->verbose) 
                       echo "query result: EMPTY [".substr($query,0,33)."] (".strlen($query).") bytes\n";
                    return NULL;
		}
                if (isset($this->verbose) and $this->verbose) 
                   echo "query result: FOUND [".substr($query,0,33)."] (".strlen($query).") bytes\n";
		return $result;
	}
	
	function rowCount($result) {
                if (!isset($result) or !$result)
                   return '';
		return mysqli_num_rows($result);
	}
	
	function fetch_array($result) {
                if (!isset($result) or !$result)
                   return '';
		return mysqli_fetch_row($result);
	}
	
	function fetch_row($result) {
                if (!isset($result) or !$result)
                   return '';
		return mysqli_fetch_assoc($result);
	}
	
	function fetch_object($result) {
                if (!isset($result) or !$result)
                   return '';
		return mysqli_fetch_object($result);
	}
	
	function build_fieldlist($table) {
		$sql = "DESC $table";
		$res = $this->query($sql);
		$this->fieldlist=array();
		while($row = $this->fetch_array($res)){
			array_push($this->fieldlist,$row[0]);
		}
		return $this->fieldlist;
	}
	
	function insert($table, $fieldarray) {
		$this->build_fieldlist($table);
		foreach($fieldarray as $field => $value){
			if(!in_array($field, $this->fieldlist) or empty($value)){
				unset($fieldarray[$field]);
			}
		}
		$set='';
		$values='';
		foreach($fieldarray as $field => $value){
			$set .= "`$field`,";
			$values .= $this->esc($value).',';
		}
		$insert = 'INSERT INTO '.$table.' ('.rtrim($set,",").') VALUES ('.
                          rtrim($values,",").')';

		$res = $this->query($insert);
		return mysqli_insert_id($this->link);
	}
	
	function esc($value) {
		$value = trim($value);
		//if (get_magic_quotes_gpc()) {
  	        //   $value = stripslashes($value);
		//}		
		$value = "'" . mysqli_real_escape_string($this->link, $value) . "'";
		return $value;
	}
	
        function update($table,$id) {
	        $this->build_fieldlist($table);
	        $set='';
                $result='';
	        foreach($this->fieldlist as $field){
		   if(isset($_POST[$field])){
                        $val = $_POST[$field];
			$val = $this->esc($val);
			$set .= " $field=$val,";
		   }
	        }
	        if(strlen($set) > 0){
		   $update = 'UPDATE '.$table.' SET '.rtrim($set,',').' WHERE id='.$id;
		   $result = $this->query($update);
	        }
                if ($result)
   	           return $id;
                else
	          return $result;
        }

	function close() {
		mysqli_close($this->link);
	}

}

class PG
{
    var $index;
    var $max;
    var $window;
    var $current;
    var $frame;
    var $url;
    var $idcount;

    function implode_get($get = array())
    {
       $j = 0;
       $out = "";

       foreach ($get as $f => $v)
       {
          if ($f)
          {
             if ($j++) $out .= '&amp;';
             else      $out .= '?';
             $out .= $f;
             if (isset($v) and $v)
             {
                $out .= '=';
                $out .= $v;
             }
          }
       }
       return filter_var(strip_tags($out), FILTER_SANITIZE_STRING);
    }

    function explode_get($exclude = "", $include = "")
    {
       $get = array();

       $e = explode(',', $exclude);   
       foreach ($_GET as $f => $v)
       {
          if (!in_array($f, $e))
             $get[$f] = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);
       }

       $i = explode(',', $include);   
       foreach ($i as $inc)
       {
          $j = explode('=', $inc);   
          if (isset($j[0]))
             $get[$j[0]] = ((isset($j[1]) and $j[1]) ? $j[1] : "");
       }   

       return $get;
    }

    function selfURL() { 
       $s = empty($_SERVER["HTTPS"]) ? '' : (($_SERVER["HTTPS"] == "on") ? "s" : ""); 
       $which = explode("/", $_SERVER["SERVER_PROTOCOL"]); 
       $protocol = strtolower($which[0]).$s; 
       $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]); 
       return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['PHP_SELF'];
    } 

    function paginate ($start, $ids, $window, $width, $query, $heading = 1, $ip='')
    {
       foreach ($_GET as $f => $v)
          $$f = filter_var(strip_tags(trim($v)), FILTER_SANITIZE_STRING);

       $out = "";
       $pglist = array();

       if ($heading and !count($ids))
       {
          $out .= '<div style="font-size:13pt;float:left;margin-left:20px;margin-right:auto;">';
          $out .= 'Enter a search query - wildcards (*) allowed i.e.  "network*"<br/>';
          $out .= 'Your query returned no search results.  '.'Would you like to see '.
                  '<a href="'.baseURL().'?page=all'.($ip ? '&ip='.$ip : '').
                  '"><span style="font-size:110%;"><b>all pages</b></span></a>?<br/>';
          $out .= '</div>';

          $pglist[] = $out;
          $out = "";

          return $pglist;
       }

       if (isset($query) and $query)
       {
             if ($heading)
             {
                $out .= '<div style="font-size:13pt;float:left;margin-left:20px;margin-right:auto;">';
                $out .= 'Enter a search query - wildcards (*) allowed i.e.  "network*"<br/>';
                if ($query)
                   $out .= 'Search results for query:  '.$query.'<br/>';
                $out .= '</div>';
             }
       }
       else 
       if ($heading)
       {
             $out .= '<div style="font-size:13pt;float:left;margin-left:20px;margin-right:auto;">';
             $out .= 'Enter a search query - wildcards (*) allowed i.e.  "network*"<br/>';
             $out .= '</div>';
       }

       $pglist[] = $out;
       $out = "";

       $currentstart = (isset($start) ? ($start ? $start : "0") : "0");
       $currententry = (isset($entry) ? ($entry ? $entry : "0") : "0");
       $currentpage = (isset($page) ? $page : "all");
       $search = (isset($search) ? $search : "");
       $get = $this->explode_get();
       foreach ($get as $f => $g)
       {
          switch ($f)
          {
             case 'start':
             case 'entry':
             case 'cache':
             case 'search':
                unset($get[$f]);
                break;

             // remove submit button from $_GET for PG urls
             case 'action':
                unset($get[$f]);
                break;

             default:
                break;
          }
       }

       $this->url = baseURL().$this->implode_get($get);
       $this->idcount = count($ids);
       $this->window = $window;
       $this->max = ceil($this->idcount / $this->window);
       $this->index = $currententry;
       $this->current = ceil($this->index / $this->window);

       $present = $currententry;
       $range = $present + $this->window;
       if ($range > count($ids))
          $range = count($ids);

       if (count($ids))
       {
          $out .= '<div style="float:right;font-size:13pt;text-align:right;'.
                  'margin-left:auto;margin-right:20px;">';
          $out .= (count($ids) ? number_format($present + 1): 0).' - '.number_format($range).
               ' of  '.number_format(count($ids)).'  Entries ';
          $out .= '</div>';
          $out .= '<br style="clear:both;"/>';
       }

       $pglist[] = $out;
       $out = "";

       if ($this->idcount > $this->window)
       {
          //$out .= '<fieldset>';  
          $out .= '<div style="float:center;font-size:13pt;text-align:center;margin-left:auto;margin-right:auto;">';

          $prevstart = $currentstart;
          $preventry = $currententry;     
          if ($currentstart)
          {
             if ($currentstart < $width)
                $prevstart = 0;
             else 
                $prevstart = $currentstart - $width;
             $preventry = $prevstart * $this->window;
          }

          $out .= '<a href="'.$this->url.'&amp;start='.$prevstart.
               '&amp;entry='.$preventry.'&amp;cache='.$ids[$preventry].'&amp;search='.$search.
               '"> &lt;&lt; </a>';

          $prevstart = $currentstart;
          $preventry = $currententry;     
          if ($currentstart)
          {
             $prevstart = $currentstart - 1;
             $preventry = $prevstart * $this->window;
          }

          $out .= '<a href="'.$this->url.'&amp;start='.$prevstart.
               '&amp;entry='.$preventry.'&amp;cache='.$ids[$preventry].'&amp;search='.$search.
               '"> Previous </a>';
          $out .= ' ';

          if ($currentstart + 1 > $width)
          {
             $where = 0;
             $x = 0;
             $out .= '<a href="'.$this->url.'&amp;start='.$where.'&amp;entry='.$x.'&amp;cache='.
                  $ids[$x].'&amp;search='.$search.'"> '.
                  //($currentstart == $where ? '<b>'.($where + 1).'</b>' : ($where + 1)).' </a>';
                  ($currentstart == $where ? '<span style="font-size:110%;"><b>'.($where + 1).'</b></span>' 
                                           : ($where + 1)).' </a>';
             $out .= '...';
          }

          $index = (floor($currentstart / $width) * $width);
          for ($i=0; $i < $width; $i++)
          {
             if (($index + $i) >= $this->max)  
                break;

             $where = $index + $i;
             $x = ($index + $i) * $this->window;

             $out .= '<a href="'.$this->url.'&amp;start='.$where.'&amp;entry='.$x.'&amp;cache='.
                  $ids[$x].'&amp;search='.$search.'"> '.
                  //($currentstart == $where ? '<b>'.($where + 1).'</b>' : ($where + 1)).' </a>';
                  ($currentstart == $where ? '<span style="font-size:110%;"><b>'.($where + 1).'</b></span>' 
                                           : ($where + 1)).' </a>';
          }

          if ($width and $this->max and $this->max > $width and ($index + $width < $this->max))
          {
             $where = $this->max - 1;
             $x = ($this->max - 1) * $this->window;
             $out .= '...';
             $out .= '<a href="'.$this->url.'&amp;start='.$where.'&amp;entry='.$x.'&amp;cache='.
                  $ids[$x].'&amp;search='.$search.'"> '.
                  //($currentstart == $where ? '<b>'.($where + 1).'</b>' : ($where + 1)).' </a>';
                  ($currentstart == $where ? '<span style="font-size:110%;"><b>'.($where + 1).'</b></span>' 
                                           : ($where + 1)).' </a>';
          }
          $out .= ' ';

          $nextstart = $currentstart;
          $nextentry = $currententry;     
          if (($currentstart + 1) < $this->max)
          {
             $nextstart = $currentstart + 1;
             $nextentry = $nextstart * $this->window;
          }

          $out .= '<a href="'.$this->url.'&amp;start='.$nextstart.
               '&amp;entry='.$nextentry.'&amp;cache='.$ids[$nextentry].'&amp;search='.$search.
               '"> Next </a>';

          $nextstart = $currentstart;
          $nextentry = $currententry;     
          if ($width and $this->max and $currentstart < $this->max)
          {
             $nextstart = (floor($currentstart + $width) / $width) * $width;
             if ($nextstart + 1 > $this->max)
                $nextstart = $this->max - 1;
             $nextentry = $nextstart * $this->window;
          }

          $out .= '<a href="'.$this->url.'&amp;start='.$nextstart.
               '&amp;entry='.$nextentry.'&amp;cache='.$ids[$nextentry].'&amp;search='.$search.
               '"> &gt;&gt; </a>';

          $out .= '</div>';
          //$out .= '</fieldset>';

          if ($heading){};
             //$out .= '<br style="clear:both;"/>';
             //$out .= '<hr/>';
          $pglist[] = $out;
          $out = "";
       }
       else
       {
          if ($heading){};
             //$out .= '<br style="clear:both;"/>';
             //$out .= '<hr/>';
          $pglist[] = $out;
          $out = "";
       }
       return $pglist; 
    }
}

class SPIDER 
{
	var $verbose;	
	var $response;
	var $tresponse;
        var $depth;
        var $currentdepth;
        var $site;
        var $urllist;
        var $href;
        var $img;
        var $title;
        var $dom;
        var $dump;
        var $search = array( 
           '/href="(.+?)"/i', 
           '/src="(.+?)"/i', 
           );
        var $replace = array( 
           '"href=\"".$this->adjust("\\1")."\""',
           '"src=\"".$this->adjust("\\1")."\""',
           );
        var $ignored = array();
        var $search_callback = array( 
           '/href="(.+?)"/i', 
           '/src="(.+?)"/i', 
           );

        function render_links($page)
        {
           return preg_replace_callback($this->search_callback, 
                  function ($matches)
                  {
                     if (!strncmp($matches[1], "#", 1)) {
                        $adjust_url = $matches[1];
                     }
                     else if (!strncmp($matches[1], "//", 2)) {
                        $adjust_url = $matches[1];
                     }
                     else {
                        $adjust_url = $this->adjust($matches[1]);
                     }

                     //echo $matches[1].' -> '.$adjust_url;
                     //echo '<br/>';

                     if (stristr($matches[0], "href=\""))
                        return 'href="'.$adjust_url.'"';
                     else
                     if (stristr($matches[0], "src=\""))
                        return 'src="'.$adjust_url.'"';
                     else {  
                        return $matches[0];
                     }
                  }, $page);
        }

        function old_render_links($page)
        {
           return preg_replace($this->search, $this->replace, $page);
        }

        function adjust($url)
        {
            if (!isset($url) or !$url)
               return (isset($url) ? $url : "");

            $url = str_replace(" ", "%20", $url);

            $result  = parse_url($this->baseurl);
            $baseurl = ((isset($result['scheme']) and $result['scheme']) ? $result['scheme'].'://' : "").
                       $result['host'];

            if (isset($result['path']))
            {
               $components = explode('/', $result['path']);
               array_pop($components);
               $baseurl .= implode('/', $components);
            }

            // strip trailing '/' from base url
            $baseurl = str_replace(" ", "%20", $baseurl);
            if (substr($baseurl, -1) == '/' ) 
               $baseurl = substr($baseurl, 0, -1);

            if (substr($baseurl, 0, 4) != 'http')
               $baseurl = 'http://'.$baseurl;

            // process target url
            $target = "";
	    if (substr($url, 0, 7) == 'http://' || substr($url, 0, 8) == 'https://' ||
                substr($url, 0, 7) == 'mailto:' ) 
            {
                $target .= $url;
	    } 
            else
            if ( substr($url, 0, 11) == 'javascript:' ) 
            {
                $target = "";
            } 
            else 
            {
               $target .= $baseurl;
               if ($url and substr($url, 0, 1) != '/' and substr($target, -1) != '/') 
                  $target .= '/';
               $target .= $url;
            }
            return $target;
        }

        function BASE($url, $verbose = 0)
        {
            if (!isset($url) or !$url)
               return (isset($url) ? $url : "");

            $url = str_replace(" ", "%20", $url);

            $result  = parse_url($url);
            $baseurl = ((isset($result['scheme']) and $result['scheme']) ? $result['scheme'].'://' : "").
                        (isset($result['host']) ? $result['host'] : "");

            if ($baseurl)
            {
               // strip trailing '/' from base url
               $baseurl = str_replace(" ", "%20", $baseurl);
               if (substr($baseurl, -1) == '/' ) 
                  $baseurl = substr($baseurl, 0, -1);

               if (substr($baseurl, 0, 4) != 'http' and substr($baseurl, 0, 4) != 'ftp:' and 
                   substr($baseurl, 0, 4) != 'ftp.')
                  $baseurl = 'http://'.$baseurl;
            }
            else
            {
               if (substr($url, 0, 4) != 'http' and substr($url, 0, 4) != 'ftp:' and
                   substr($url, 0, 4) != 'ftp.')
                  $baseurl = 'http://'.$url;
               else
                  $baseurl = $url;
            }

            return $baseurl;
        }

        function URL($url, $base, $verbose = 0)
        {
            if (!isset($url) or !$url)
               return (isset($url) ? $url : "");

            $url = str_replace(" ", "%20", $url);

            $result  = parse_url($base);
            $baseurl = ((isset($result['scheme']) and $result['scheme']) ? $result['scheme'].'://' : "").
                        (isset($result['host']) ? $result['host'] : "");                        

            if (isset($result['path']))
            {
               $components = explode('/', $result['path']);
               array_pop($components);
               $baseurl .= implode('/', $components);
            }

            // strip trailing '/' from base url
            $baseurl = str_replace(" ", "%20", $baseurl);
            if (substr($baseurl, -1) == '/' ) 
               $baseurl = substr($baseurl, 0, -1);

            if (substr($baseurl, 0, 4) != 'http' and substr($baseurl, 0, 4) != 'ftp:' and 
                substr($baseurl, 0, 4) != 'ftp.')
               $baseurl = 'http://'.$baseurl;

            // process target url
            $target = "";
	    if (substr($url, 0, 7) == 'http://' ||  substr($url, 0, 8) == 'https://' || 
                substr($url, 0, 4) == 'ftp:' ||  substr($url, 0, 4) == 'ftp.')
            {
                $target .= $url;
	    } 
            else
            //if ( substr($url, 0, 11) == 'javascript:' || substr($url, 0, 7) == 'mailto:' ) 
            if ( substr($url, 0, 11) == 'javascript:') 
            {
                $target = "";
            } 
            else 
            {
               $target .= $baseurl;
               if ($url and substr($url, 0, 1) != '/' and substr($target, -1) != '/') 
                  $target .= '/';
               $target .= $url;
            }
            return $target;
        }

	function Absolute_URL($relativeUrl, $baseUrl)
	{
	    // if already absolute URL 
	    if (parse_url($relativeUrl, PHP_URL_SCHEME) !== null){
	        return $relativeUrl;
	    }

	    // queries and anchors
	    if ($relativeUrl[0] === '#' || $relativeUrl[0] === '?'){
	        return $baseUrl.$relativeUrl;
	    }

	    // parse base URL and convert to: $scheme, $host, $path, $query, $port, $user, $pass
	    extract(parse_url($baseUrl));

	    // if base URL contains a path remove non-directory elements from $path
	    if (isset($path) === true){
	        $path = preg_replace('#/[^/]*$#', '', $path);
	    }
	    else {
	        $path = '';
	    }

	    // if relative URL starts with //
	    if (substr($relativeUrl, 0, 2) === '//'){
	        return $scheme.':'.$relativeUrl;
	    }

	    // if relative URL starts with /
	    if ($relativeUrl[0] === '/'){
	        $path = null;
	    }
	    $abs = null;

	    // if relative URL contains a user
	    if (isset($user) === true){
	        $abs .= $user;

	        // if relative URL contains a password
	        if (isset($pass) === true){
	            $abs .= ':'.$pass;
	        }

	        $abs .= '@';
	    }
	    $abs .= $host;

	    // if relative URL contains a port
	    if (isset($port) === true){
	        $abs .= ':'.$port;
	    }

	    $abs .= $path.'/'.$relativeUrl.(isset($query) === true ? '?'.$query : null);

	    // replace // or /./ or /foo/../ with /
	    $re = ['#(/\.?/)#', '#/(?!\.\.)[^/]+/\.\./#'];
	    for ($n = 1; $n > 0; $abs = preg_replace($re, '/', $abs, -1, $n)) {
	    }

	    // return absolute URL
	    return $scheme.'://'.$abs;
	}

        function IGNORE($url)
        {
             foreach ($this->ignored as $v)
             {
                if (strstr($url, $v))
                   return 1; 
             }
             return 0;             
        }

        function CRAWL($internal = 0, $proxy="")
        {
	     global $db_client;

             $crlf = $internal ? "<br/>" : "\n";
             $img = "";
             $text = "";
             $name = "";
             $count = 0;

             $idx = 0;
             $index = 0;
             $llist = array();
             $llist[$index++] = $this->urllist; 

             while (isset($llist[$idx]) and $linklist = $llist[$idx])
             {
                unset($llist[$idx++]);

                $targetlist = "";
                $targets = explode("\n", $linklist);

                $baseurl = $targets[0];
                if (!$baseurl)
                   break;

                foreach ($targets as $f => $url)
                {
                   if (!isset($url) or !trim($url))
                      continue;

                   $rawurl = $url;
                   $target = $this->URL($url, $baseurl);
                   if (!$target)
                      continue;

                   if (isset($this->site) and $this->site)
                   {
                      $sourcehost = $this->BASE($baseurl);
                      $targethost = $this->BASE($target);
                      $sitehost = $this->BASE($this->site);
/*
                      echo "URL: ";
                      print_r($url);
                      echo $crlf;
                      echo "BASEURL: ";
                      print_r($baseurl);
                      echo $crlf;
                      echo "SITE: ";
                      print_r($this->site);
                      echo $crlf;
                      echo "SOURCEHOST: ";
                      print_r($sourcehost);
                      echo $crlf;
                      echo "TARGETHOST: ";
                      print_r($targethost);
                      echo $crlf;
                      echo "SITEHOST: ";
                      print_r($sitehost);
                      echo $crlf;

                      echo "SITEHOST == SOURCEHOST: ";
                      echo strcasecmp($sitehost, $sourcehost);
                      echo $crlf;
                      echo "SITEHOST == TARGETHOST: ";
                      echo strcasecmp($sitehost, $targethost);
                      echo $crlf;

                      // this if case will probe 0+1 links from the base url
                      //if (strcasecmp($sitehost, $sourcehost) and strcasecmp($sitehost, $targethost)) {
*/
                      if (strcasecmp($sitehost, $targethost)) {
                         //echo "SITEHOST($sitehost) != TARGETHOST($targethost) -> SKIPPED".$crlf;
                         continue;
                      }
                   }

                   // convert any relative urls to absolute urls
   		   unset($path);
		   extract(parse_url($target));
		   if (isset($path))
		      $target = $this->Absolute_URL($path, $target);
 
                   // strip hash marks
                   $target = preg_replace('/#.*/', '', $target);

                   if ($this->IGNORE($target))
                   {
                      echo 'IGNORED => '.$target.$crlf;
                      continue;
                   }

                   $dbh = new DB;
                   $ret = $dbh->connect($db_client);
                   if (!$ret)
                   {
                      echo 'Could not connect to database'.$crlf;
                      return;   
                   }

                   $sql = "SELECT id from allurls where url='$target' and deleted='0' and userlist='0'";
                   $res = $dbh->query($sql);
                   $p = $dbh->fetch_object($res);
                   if ($p) 
                   {
                      echo 'SKIP URL => '.$target.$crlf;
                      continue;
                   }

                   $ins = array(
                      'create_date' => date('Y-m-d H:i:s'),
                      'last_modified_date' => date('Y-m-d H:i:s'),
                      'crawl_date' => date('Y-m-d H:i:s'),
                      'url' => $target,
                   );
                   $cid = $dbh->insert('allurls',$ins);
                   $dbh->close();

                   //if (in_array($target, $GLOBALS['allurl'])) 
                   //   continue;
                   //$GLOBALS['allurl'][] = $target;

                   //if (stristr(array_pop(explode('/',$target)), '.iso')) 
                   //{
                   //   echo 'IGNORED .ISO => '.$target.$crlf;
                   //   continue;
                   //}

                   echo '('.$count++.') TARGET => '.$target.$crlf;

                   $ch = curl_init();
                   curl_setopt($ch, CURLOPT_USERAGENT, 
                            "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
		   curl_setopt($ch, CURLOPT_URL, html_entity_decode($target, ENT_COMPAT, 'UTF-8'));
		   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		   curl_setopt($ch, CURLOPT_AUTOREFERER, true);
                   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
                   curl_setopt($ch, CURLOPT_ENCODING, "");
                   curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30 );
                   curl_setopt($ch, CURLOPT_TIMEOUT, 30 );
                   curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
                   curl_setopt($ch, CURLOPT_HEADER, true);
                   curl_setopt($ch, CURLOPT_NOBODY, true);
                   curl_setopt($ch, CURLOPT_FILETIME, true);

                   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

                   if (isset($proxy) and $proxy) {
                      curl_setopt($ch, CURLOPT_PROXY, $proxy);
                   }

		   $head = curl_exec($ch);
                   if (!$head) 
                   {
		      $curl_error = curl_errno($ch);
                      curl_close($ch);
	              $text .= "spider:  cURL HEAD error: $target $curl_error $crlf";
                      if ($this->verbose)
	                 echo "spider:  cURL HEAD error: $target $curl_error $crlf";
                      continue;
                   }   
                   $headers = explode("\n", $head);

                   if (isset($headers[3])) {
                      $lastmodified = explode('Last-Modified:', $headers[3]);
                      if (!$lastmodified)
                         $lastmodified = explode('Date:', $headers[3]);
                      //print_r($headers);
                      //print_r($lastmodified);
                   }

                   $mimetype = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
                   $filetime = curl_getinfo($ch, CURLINFO_FILETIME);
                   $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                   curl_close($ch);
                   if ($httpcode >= 400) 
                   {
                      echo 'SKIPPED HTTP CODE '.$httpcode.' => '.$target.' ('.$rawurl.') '.$crlf;
                      continue;
                   }
                   if ($filetime == -1) $filetime = "";
                   else $filetime = date('Y-m-d H:i:s', $filetime);

                   // only crawl and cache text based mime types
                   if (!stristr($mimetype, 'text/html') and !stristr($mimetype, 'text/plain') and
                       !stristr($mimetype, 'text/xml')) 
                   {
                      echo 'SKIPPED '.$mimetype.' => '.$target.$crlf;
                      continue;
                   }
                   echo 'MIMETYPE => '.$mimetype.' FILETIME => '.$filetime.$crlf;

		   $ch = curl_init();
                   curl_setopt($ch, CURLOPT_USERAGENT, 
                            "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
		   curl_setopt($ch, CURLOPT_URL, html_entity_decode($target, ENT_COMPAT, 'UTF-8'));
		   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		   curl_setopt($ch, CURLOPT_AUTOREFERER, true);
                   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
                   curl_setopt($ch, CURLOPT_ENCODING, "");
                   curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30 );
                   curl_setopt($ch, CURLOPT_TIMEOUT, 30 );
                   curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );

                   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

                   if (isset($proxy) and $proxy) {
                      curl_setopt($ch, CURLOPT_PROXY, $proxy);
                   }

		   $html = curl_exec($ch);
		   $this->tresponse = $html;
		   curl_close($ch);
                   if (!$html) 
                   {
	              $text .= "spider:  cURL error: $target$crlf";
                      if ($this->verbose)
	                 echo "spider:  cURL error: $target$crlf";
                      continue;
                   }   

                   $img = "";
                   $name = "";
                   $targetlist = "";

                   if (!$this->dom)
                   {
                      $targethost = $this->BASE($target);
                      if ($targethost)
                         $targetlist .= $targethost."\n";

                      //preg_match_all('/<a\s[^>]*href="(.+?)"/ie', $html, $match); 
                      preg_match_all('/<a\s[^>]*href="(.+?)"/i', $html, $match); 
                      foreach ($match[1] as $result)
                      {
                         $URL = $this->URL(trim($result), $target);
                         if ($URL)
                            $targetlist .= $URL."\n";  
                      }
                    
                      // crawl framesets.  does not crawl iframes. 
                      //preg_match_all('/<frame\s[^>]*src="(.+?)"/ie', $html, $match); 
                      preg_match_all('/<frame\s[^>]*src="(.+?)"/i', $html, $match); 
                      foreach ($match[1] as $result)
                      {
                         $URL = $this->URL(trim($result), $target);
                         if ($URL)
                            $targetlist .= $URL."\n";  
                      }

                      //preg_match_all('/<img\s[^>]*src="(.+?)"/ie', $html, $match); 
                      preg_match_all('/<img\s[^>]*src="(.+?)"/i', $html, $match); 
                      foreach ($match[1] as $result)
                         $img .= trim($result)."\n";  

                      //preg_match_all('/<title\b[^>]*>(.+?)<\/title>/ies',$html, $match); 
                      preg_match_all('/<title\b[^>]*>(.+?)<\/title>/is',$html, $match); 
                      foreach ($match[1] as $result)
                      {
                         $name = trim($result);  
                         if (strlen($result) > 1024)
                            echo 'spider:  large title field: '.strlen($result).$crlf;
                         break;
                      }
                   }
                   else
                   {
                      /*
                      xpath->evaluate() command strings
                   
                      Get the title of a page:
                        //title/text()
                      List all the images on a page:
                        //img
                      List the images that are inside a link:
                        //a//img
                      List the images that have alt tags:
                        //img[@alt]
                      List the images that don't have alt tags:
                        //img[not(@alt)]
                      Show all the alt tags:
                        //img/@alt
                      Show the href for every link:
                        //a/@href
                      Get an element with a particular CSS id:
                        //*[@id='mainContent']
                      */

                      $dom = new DOMDocument('1.0', 'UTF-8');
                      @$dom->loadHTML($html);
                      $xpath = new DOMXPath($dom);
                      $hrefs = $xpath->evaluate("//title/text()");
                      for ($name=$target,$i = 0; $i < $hrefs->length; $i++) 
                      {
                         $href = $hrefs->item($i);
                         $name = $href->nodeValue;
                         break;
                      }

                      $targethost = $this->BASE($target);
                      if ($targethost)
                         $targetlist .= $targethost."\n";

                      $dom = new DOMDocument('1.0', 'UTF-8');
                      @$dom->loadHTML($html);
                      $xpath = new DOMXPath($dom);
                      $hrefs = $xpath->evaluate("//a/@href");
                      for ($meta="",$i = 0; $i < $hrefs->length; $i++) 
                      { 
                         $href = $hrefs->item($i);
                         $URL = $this->URL($href->nodeValue, $target);
                         if ($URL)
                            $targetlist .= $URL."\n";

                      }

                      $dom = new DOMDocument('1.0', 'UTF-8');
                      @$dom->loadHTML($html);
                      $xpath = new DOMXPath($dom);
                      $hrefs = $xpath->evaluate("//frame/@src");
                      for ($meta="",$i = 0; $i < $hrefs->length; $i++) 
                      { 
                         $href = $hrefs->item($i);
                         $URL = $this->URL($href->nodeValue, $target);
                         if ($URL)
                            $targetlist .= $URL."\n";
                      }

                      // strip HTML from raw text field
                      $dom = new DOMDocument('1.0', 'UTF-8');
                      @$dom->loadHTML($html);
                      $xpath = new DOMXPath($dom);
                      $hrefs = $xpath->evaluate("//img/@src");
                      for ($img="",$i = 0; $i < $hrefs->length; $i++) 
                      {
                         $href = $hrefs->item($i);
                         $img .= $href->nodeValue."\n";
                      }
                   }

                   // strip HTML from raw text field
                   $pagetext = $this->html2txt($this->tresponse);

                   // strip text url's from condensed page extract
                   $condensed = preg_replace('|https?://www\.[a-z\.0-9]+|i', ' ', $pagetext);
                   $condensed = preg_replace('|www\.[a-z\.0-9]+|i', ' ', $condensed);

                   // strip all punctuation characters
                   //  $condensed = preg_replace('/\W+/', '', $condensed);
                   //  $condensed = preg_replace("/(?![.()-])\p{P}/u", '', $condensed);

                   // strip excess whitespace
                   $condensed = preg_replace('/\s+/', ' ', $condensed);

                   // strip underscores
                   $condensed = str_replace('_', ' ', $condensed);

                   // build word list
                   $cwords = array();
                   $summary = explode(" ", $condensed);
                   foreach ($summary as $f => $v) {
                      require_once("defs.php");
                      global $word_list_100;

                      $p = strtolower(trim($v));

                      // if its a common english word skip it
                      if (in_array($p, $word_list_100))
                         continue;

                      if ((strlen($p) < 2) and ctype_alpha($p))
                         continue;

                      if (!in_array($p, $cwords)) 
                         $cwords[] = $p;
                   }
                   $condensed = $name;  
                   $condensed .= ' '.implode(" ", $cwords);

                   echo 'HTML => '.strlen($this->tresponse)." bytes  ";
                   echo 'EXTRACT => '.strlen($pagetext)." bytes  ";
                   echo 'CONDENSED => '.strlen($condensed)." bytes $crlf";
/*
                   $ld = new LanguageDetector;
                   $language = $ld->evaluate($condensed)->getLanguage();
*/
		   $language = 'en';
                   echo 'LANGUAGE => '.$language."$crlf";
                   unset($_SESSION['mysql_error']);

                   $dbh = new DB;
                   $ret = $dbh->connect($db_client);
                   if (!$ret)
                   {
                      echo 'Could not connect to database'.$crlf;
                      return;   
                   }

                   $sql = "SELECT id from staging where page='$this->tresponse' and deleted='0'";
	           $res = $dbh->query($sql);
	           $o = $dbh->fetch_object($res);
                   if ($o)
                   {
                      echo 'DUPLICATE => '.$target.$crlf;
                      $llist[$index++] = $targetlist; 
                      if ($this->dump)
                      {
                         print_r($targetlist);
                         echo $crlf;
                      }
                   }
                   else
                   {
                      $sql = "SELECT id from staging where url='$target' and deleted='0'";
                      $res = $dbh->query($sql);
	              $o = $dbh->fetch_object($res);
                      if ($o)
                      {
                         $_POST['page'] = $this->tresponse;
                         $_POST['pagetext'] = $pagetext;
                         $_POST['condensed'] = $condensed;
                         $_POST['create_date'] = $filetime;
                         $_POST['last_modified_date'] = $filetime;
                         $_POST['crawl_date'] = date('Y-m-d H:i:s');
                         $_POST['title'] = $name;
                         $_POST['meta'] = $targetlist;
                         $_POST['img'] = $img;
                         $_POST['language'] = $language;      
                         $_POST['name'] = $name;
                         $_POST['rawurl'] = $rawurl;

                         $text .= 'spider:  updating page '.$target.' size '.strlen($this->tresponse).$crlf;

                         if ($this->verbose)
                            echo 'spider:  updating page '.$target.' size '.strlen($this->tresponse).
                                 ' target list size '.strlen($targetlist).$crlf;

                         $cid = $dbh->update('staging', $o->id);
                      }
                      else
                      {
                         $ins = array(
                            'create_date' => $filetime,
                            'last_modified_date' => $filetime,
                            'crawl_date' => date('Y-m-d H:i:s'),
                            'url' => $target,
                            'title' => $name,
                            'language' => $language,              
                            'name' => $name,
                            'meta' => $targetlist,
                            'img' => $img,
                            'page' => $this->tresponse,
                            'pagetext' => $pagetext,
                            'condensed' => $condensed,
                            'rawurl' => $rawurl,
                         );

                         $text .= 'spider:  creating page '.$target.' size '.strlen($this->tresponse).$crlf;

                         if ($this->verbose)
                            echo 'spider:  creating page '.$target.' size '.strlen($this->tresponse).
                                 ' targetlist size '.strlen($targetlist).$crlf;

                         $cid = $dbh->insert('staging',$ins);
                      }
                      if (isset($_SESSION['mysql_error']))
                         echo $_SESSION['mysql_error'];

                      $sql = "SELECT id from targets where url='$target' and deleted='0' and userlist='0'";
                      $res = $dbh->query($sql);
                      $p = $dbh->fetch_object($res);
                      if (!$p) 
                      {
                         $ins = array(
                            'create_date' => $filetime,
                            'last_modified_date' => $filetime,
                            'crawl_date' => date('Y-m-d H:i:s'),
                            'url' => $target,
                            'targets' => $targetlist,
                         );
                         $cid = $dbh->insert('targets',$ins);
                      }

                      if (isset($_SESSION['mysql_error']))
                         echo $_SESSION['mysql_error'];

                      $llist[$index++] = $targetlist; 

                      if ($this->dump)
                      {
                         print_r($targetlist);
                         echo $crlf;
                      }
                   }
                   $dbh->close();
                }
                if (!$this->depth)
                   break;
             }   
             return $text;
        }

       function ADD_URL($url, $internal=0)
       {
	  global $db_client;

          $crlf = $internal ? "<br/>" : "\n";

          $dbh = new DB;
          $ret = $dbh->connect($db_client);
          if (!$ret)
          {
             echo 'Could not connect to database'.$crlf;
             return;   
          }

          $sql = "SELECT id from spider where url='$url' and deleted='0'";
          $res = $dbh->query($sql);
          $o = $dbh->fetch_object($res);
          if ($o)
          {
             $dbh->close();
             return 0;
          }

          $ins = array(
	     'create_date' => date('Y-m-d H:i:s'),
	     'crawl_date' => date('Y-m-d H:i:s'),
	     'url' => $url,
          );
          $cid = $dbh->insert('spider',$ins);
          $dbh->close();

          return $cid;
       }


       function html2txt ( $document, $allowed_tags = '')
       {
          $search = 
             array ("'<script[^>]*?>.*?</script>'si",	     // strip out javascript
                    "'<style[^>]*?>.*?</style>'si",	     // strip out styles
  	            "'<[\/\!]*?[^<>]*?>'si",		     // strip out html tags
	            "'([\r\n])[\s]+'",			     // strip out white space
                    '/<!-- .* -->/',                         // Comments -- which strip_tags might have problem a with
	            "'@<![\s\S]*?â��[ \t\n\r]*>@'",

                    '/&(nbsp|#160);/i',                      // Non-breaking space
                    '/&(quot|rdquo|ldquo|#8220|#8221|#147|#148);/i',
		                                             // Double quotes
                    '/&(apos|rsquo|lsquo|#8216|#8217);/i',   // Single quotes
                    '/&gt;/i',                               // Greater-than
                    '/&lt;/i',                               // Less-than
                    '/&(amp|#38);/i',                        // Ampersand
                    '/&(copy|#169);/i',                      // Copyright
                    '/&(trade|#8482|#153);/i',               // Trademark
                    '/&(reg|#174);/i',                       // Registered
                    '/&(mdash|#151|#8212);/i',               // mdash
                    '/&(ndash|minus|#8211|#8722);/i',        // ndash
                    '/&(bull|#149|#8226);/i',                // Bullet
                    '/&(pound|#163);/i',                     // Pound sign
                    '/&(euro|#8364);/i',                     // Euro sign
                    '/&[^&;]+;/i',                           // Unknown/unhandled entities
                    '/[ ]{2,}/'                              // Runs of spaces, post-handling
             );

             $replace = array (	"",
			        "",
			        " ",
                                '',
                                '',                          // Comments -- which strip_tags might have problem a with
                                '',
                                ' ',                         // Non-breaking space
                                '"',                         // Double quotes
                                "'",                         // Single quotes
                                '>',
                                '<',
                                '&',
                                '(c)',
                                '(tm)',
                                '(R)',
                                '--',
                                '-',
                                '*',
                                '£',
                                'EUR',                       // Euro sign.  ?
                                '',                          // Unknown/unhandled entities
                                ' '                          // Runs of spaces, post-handling
              );


            $text = trim(stripslashes($document));
            $text = preg_replace($search,$replace,$text);
            $text = strip_tags($text, $allowed_tags);

            // strip off any blank lines
            $text = preg_replace("/\n\s+\n/", "\n\n", $text);
            $text = preg_replace("/[\n]{3,}/", "\n\n", $text);

            return trim ($text);
       }


}

class UUID
{
   var $uuid = array(
         'time_low'  => 0,
         'time_mid'  => 0,
         'time_hi'  => 0,
         'clock_seq_hi' => 0,
         'clock_seq_low' => 0,
         'node'   => array()
   );
   var $uuid_format;
   var $raw = array();

   function gen_uuid() 
   {
      $this->uuid['time_low'] = mt_rand(0, 0xffff) + (mt_rand(0, 0xffff) << 16);
      $this->uuid['time_mid'] = mt_rand(0, 0xffff);
      $this->uuid['time_hi'] = (4 << 12) | (mt_rand(0, 0x1000));
      $this->uuid['clock_seq_hi'] = (1 << 7) | (mt_rand(0, 128));
      $this->uuid['clock_seq_low'] = mt_rand(0, 255);

      for ($i = 0; $i < 6; $i++) 
         $this->uuid['node'][$i] = mt_rand(0, 255);

      $this->uuid_format = sprintf('%08x%04x%04x%02x%02x%02x%02x%02x%02x%02x%02x',
                                   $this->uuid['time_low'],
                                   $this->uuid['time_mid'],
                                   $this->uuid['time_hi'],
                                   $this->uuid['clock_seq_hi'],
                                   $this->uuid['clock_seq_low'],
                                   $this->uuid['node'][0],
                                   $this->uuid['node'][1],
                                   $this->uuid['node'][2],
                                   $this->uuid['node'][3],
                                   $this->uuid['node'][4],
                                   $this->uuid['node'][5]);

      $this->raw = explode('.', chunk_split($this->uuid_format, 2, '.'));
      
      return $this->uuid_format;
   }
}

?>
