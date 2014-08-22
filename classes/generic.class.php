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
	
	public function getPageurl ($pagelink) 
	{
		$pageurl = "views/".$pagelink."/".$pagelink."_main.php";
		return $pageurl;
	}
*/
	public function redirect ($page) 
	{
		header ("Location: ".$page);
		exit();
	}	

    /**
     * Create selector
     */
	public function selector($name, $selected, $options)
	{
		$html = "<select class=\"form-control\" name='".$name."'>\n";
		
		foreach($options as $k => $v) 
		{
			$html .= "<option value='" . $k . "'" . ($k==$selected?" selected":"") . ">$v</option>\n";
		}
		
		$html .= "</select>\n";
		
		return $html;
	}

   /**
     * get views from vieuws folder
     */		
	public function getViews($dir) 
	{
		$subfolders = scandir($dir);
			foreach($subfolders as $folder)
			{
				if($folder != '.' && $folder != '..')
				{
					$folders[$folder] = $folder;   
				}
			}
		return $folders;
	}
	
   /**
     * Edit config file
     */		 
	public function changeConfig($key, $value)
	{
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