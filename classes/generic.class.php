<?php

?>
<?php

class Generic {

    private $config;

    public function __construct($config)
    {
	    $this->config = $config;
    }

	/**
	* Method to get the page url
	*
	* @access	public
	* @return	string
	* @since	0.1
	*/
	public function getPageurl ($pagelink) {
		$pageurl = "views/".$pagelink."/".$pagelink."_main.php";
		return $pageurl;
		}

	public function redirect ($page) {
		header ("Location: ".$page);
		exit();
		}	
   /**
     * Edit config file
     */		 
	public function changeConfig($key, $value){
        $lines = file(BASE_PATH.'/inc/settings.inc.php', FILE_IGNORE_NEW_LINES);
        $count = count($lines);
        for($i=0; $i < $count; $i++)
        {
            $configline = '$config[\''.$key.'\']';
            if(strstr($lines[$i], $configline))
            {
                $lines[$i] = $configline.' = \''.$value.'\';';
                $file = implode(PHP_EOL, $lines);
                $handle = @fopen(BASE_PATH.'/inc/settings.inc.php', 'w');
                fwrite($handle, $file);
                fclose($handle);
                return true;
            }
        }	
	}	 
     
}

?>