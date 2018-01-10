<?php
ob_start();

$site_address = 'localhost/yoruba';

//database credentials
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','y');


$db = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//set timezone
date_default_timezone_set('Europe/London');

//load classes as needed
function __autoload($class) {
   
   $class = strtolower($class);

	//if call from within assets adjust the path
   $classpath = 'classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
	} 	
	
	//if call from within admin adjust the path
   $classpath = '../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
	}
	
	//if call from within admin adjust the path
   $classpath = '../../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
	} 		
	 
}

//To reduce the number of words in a string
			 function shorten_words($string, $wordsreturned)
			{
				$retval = $string;  //  Just in case of a problem
				$array = explode(" ", $string);
				if (count($array)<=$wordsreturned)
				{
					$retval = $string;
				}
				else
				{
					array_splice($array, $wordsreturned);
					$retval = implode(" ", $array);
				}
				return $retval;
			}
			
		 Function code($in,$mth)
		 {
			if ($mth == 'up')
			{
				$in = preg_replace('/[^a-z0-9_]/i','-',$in);
				
				while (preg_match('/--/',$in) == 1)
				{
				$in = str_replace('--','-',$in);
				}				
				
				
				$in = preg_replace('/-$/','',$in);
				
				$in = preg_replace('/^-/','',$in);
			}
			 if ($mth == 'down'){ $in = str_replace('-',' ',$in);}
			 return $in;
		 }
		 
	
	
	
	class blog {
			 
			 
			 Public function __construct(){
	
Global $db,$site_address;
$this->db = $db;
$this->site_address = $site_address;


			 }
		 
		 Public function bloglist()
		 {
			 
			 try {

				$stmt = $this->db->query('SELECT postID, postTitle, postDesc, postDate, postTags FROM blog_posts ORDER BY postID DESC');
				$k = 1;
				while($row = $stmt->fetch()){
					
					$urlwords = shorten_words($row['postTitle'],10);
					$urlwords = code($urlwords,'up');
					
					$post_url = 'http://'.$this->site_address.'/'.$row['postID'].'/'.$urlwords;
					
					$post_time = date('jS M Y H:i:s', strtotime($row['postDate']));
					
					$tagsArray = explode( ",", $row['postTags']);
					
					@$bloglist[$k] =  array(id=>$row['postID'],title=>$row['postTitle'],desc=>$row['postDesc'],pdate=>$row['postDate'],tagsArray=>$tagsArray,pTags=>$row['postTags'],url=>$post_url,date=>$post_time);
					
					$k++;
				}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
			 
			 return $bloglist;
			 
		 }
		 
		 
		 }
		 

$user = new User($db); 
$blog = new blog;
?>