<?php
/*
 * PHP Pagination Class
 * @author admin@catchmyfame.com - http://www.catchmyfame.com
 * @version 2.0.0
 * @date October 18, 2011
 * @copyright (c) admin@catchmyfame.com (www.catchmyfame.com)
 * @license CC Attribution-ShareAlike 3.0 Unported (CC BY-SA 3.0) - http://creativecommons.org/licenses/by-sa/3.0/
 */
class Paginator{
	var $items_per_page;
	var $items_total;
	var $current_page;
	var $num_pages;
	var $mid_range;
	var $low;
	var $limit;
	var $return;
	var $default_ipp;
	var $querystring;
	var $ipp_array;
	var $showPrevAndNext;
	

	function Paginator()
	{
		$this->current_page = 1;
		$this->mid_range = 5;	// Number of pages to display. Must be odd and > 3
		$this->ipp_array = array(5,10,15,20,25,30,50,100,'All');
		$this->items_per_page = (!empty($_GET['ipp'])) ? $_GET['ipp']:$this->default_ipp;
		$this->showPrevAndNext = 1; //show next prev after x pages
		$this->showFirstAndLast = 0; //show first last, 0=disable , 1=enable
	}

	function paginate()
	{
		$first 	= "&laquo; First";
		$prev	= "&lsaquo; Prev";
		$next	= "Next &rsaquo;";
		$last	= "Last &raquo;";
		
		if(!isset($this->default_ipp)) $this->default_ipp=10;
		
		//if($_GET['ipp'] == 'All')
		if(isset($_GET['ipp']) && $_GET['ipp'] == 'All')
		{
			$this->num_pages = 1;
//			$this->items_per_page = $this->default_ipp;
		}
		else
		{
			if(!is_numeric($this->items_per_page) OR $this->items_per_page <= 0) $this->items_per_page = $this->default_ipp;
			$this->num_pages = ceil($this->items_total/$this->items_per_page);
		}
		
		$this->current_page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1 ; // must be numeric > 0
		
		$prev_page = $this->current_page-1;
		$next_page = $this->current_page+1;
		
		if($_GET)
		{
			$args = explode("&",$_SERVER['QUERY_STRING']);
			
			foreach($args as $arg)
			{
				$keyval = explode("=",$arg);
				if($keyval[0] != "page" AND $keyval[0] != "ipp") $this->querystring .= "&" . $arg;
			}
		}

		if($_POST)
		{
			foreach($_POST as $key=>$val)
			{
				if($key != "page" AND $key != "ipp") $this->querystring .= "&$key=$val";
			}
		}
		
		$this->return = "<ul class=\"pagination pull-right\">";
		if($this->num_pages > $this->showPrevAndNext)
		{
			//first
			if($this->showFirstAndLast==1)
			{
				$this->return .= (!$this->isFirstPage()) ? 
				"<li><a href=\"$_SERVER[PHP_SELF]?page=1&ipp=$this->items_per_page$this->querystring\">$first</a></li> ":
				"<li class=\"disabled\"><span href=\"#\">$first</span></li> ";		
			}
			//previous
			$this->return .= ($this->isPrevPage()) ? 
			"<li><a href=\"$_SERVER[PHP_SELF]?page=$prev_page&ipp=$this->items_per_page$this->querystring\">$prev</a></li> ":
			"<li class=\"disabled\"><span href=\"#\">$prev</span></li> ";

			//range ...
			$this->start_range = $this->current_page - floor($this->mid_range/2);
			$this->end_range = $this->current_page + floor($this->mid_range/2);

			if($this->start_range <= 0)
			{
				$this->end_range += abs($this->start_range)+1;
				$this->start_range = 1;
			}
			if($this->end_range > $this->num_pages)
			{
				$this->start_range -= $this->end_range-$this->num_pages;
				$this->end_range = $this->num_pages;
			}
			$this->range = range($this->start_range,$this->end_range);

			//pages
			for($i=1;$i<=$this->num_pages;$i++)
			{
				if($this->range[0] > 2 AND $i == $this->range[0]) $this->return .= "<li><a>...</a></li>";
				// loop through all pages. if first, last, or in range, display
				
				if($i==1 OR $i==$this->num_pages OR in_array($i,$this->range))
				{			
					//$this->return .= (($i == $this->current_page ) AND (isset($_GET['page'])) AND $_GET['page'] != 'All') ? 
					$this->return .= ($i == $this->current_page ) ? 
					"<li class=\"active\"><a title=\"Go to page $i of $this->num_pages\" class=\"a\" href=\"#\">$i</a></li>":
					"<li><a title=\"Go to page $i of $this->num_pages\" href=\"$_SERVER[PHP_SELF]?page=$i&ipp=$this->items_per_page$this->querystring\">$i</a></li>";
				}
				if($this->range[$this->mid_range-1] < $this->num_pages-1 AND $i == $this->range[$this->mid_range-1]) $this->return .= "<li><a>...</a></li>";
			}
			
			//next
			$this->return .= ($this->isNextPage()) ? 
			"<li><a href=\"$_SERVER[PHP_SELF]?page=$next_page&ipp=$this->items_per_page$this->querystring\">$next</a></li>":
			"<li class=\"disabled\"><span href=\"#\">$next</span></li>";
			
			//last
			if($this->showFirstAndLast==1)
			{
				$this->return .= (!$this->isLastPage()) ? 
				"<li><a href=\"$_SERVER[PHP_SELF]?page=$this->num_pages&ipp=$this->items_per_page$this->querystring\">$last</a></li> ":
				"<li class=\"disabled\"><span href=\"#\">$last</span></li> ";
			}
			/*all
			$this->return .= ($_GET['page'] == 'All') ? 
			"<li class=\"active\"><a href=\"#\">All</a></li>":
			"<li><a href=\"$_SERVER[PHP_SELF]?page=1&ipp=All$this->querystring\">All</a></li>";
			*/
	
		}
		else
		{
			//pages
			for($i=1;$i<=$this->num_pages;$i++)
			{
				$this->return .= ($i == $this->current_page) ? 
				"<li class=\"active\"><a href=\"#\">$i</a></li>":
				"<li><a href=\"$_SERVER[PHP_SELF]?page=$i&ipp=$this->items_per_page$this->querystring\">$i</a></li>";
			}
			/*all
			$this->return .= "<li class=\"disabled\"><a href=\"$_SERVER[PHP_SELF]?page=1&ipp=All$this->querystring\">All</a></li>";
			*/
		}
		$this->return .= "</ul>";
		
		$this->low = ($this->current_page <= 0) ? 0:($this->current_page-1) * $this->items_per_page;
		if($this->current_page <= 0) $this->items_per_page = 0;
		$this->limit =  (isset($_GET['ipp']) && $_GET['ipp'] == 'All') ? "":" LIMIT $this->low,$this->items_per_page";
		
	}
	
	function display_items_per_page()
	{
		$items = '';
		if(!isset($_GET['ipp'])) $this->items_per_page = $this->default_ipp;
		foreach($this->ipp_array as $ipp_opt) $items .= ($ipp_opt == $this->items_per_page) ? 
		"<option selected value=\"$ipp_opt\">$ipp_opt</option>":
		"<option value=\"$ipp_opt\">$ipp_opt</option>";
		return "<select class=\"form-control\" onchange=\"window.location='$_SERVER[PHP_SELF]?page=1&ipp='+this[this.selectedIndex].value+'$this->querystring';return false\">$items </select>";
	}
	
	function display_jump_menu()
	{
		$option = '';
		for($i=1;$i<=$this->num_pages;$i++)
		{
			$option .= ($i==$this->current_page) ? "<option value=\"$i\" selected>$i</option>":"<option value=\"$i\">$i</option>";
		}
		return "<span Page:</span><select class=\"form-control\" onchange=\"window.location='$_SERVER[PHP_SELF]?page='+this[this.selectedIndex].value+'&ipp=$this->items_per_page$this->querystring';return false\">$option</select>";
	}
	
	function display_pages()
	{
		return $this->return;
	}
	
    public function isFirstPage()
    {
        return $this->current_page == 1;
    }

    public function isLastPage()
    {
        return $this->num_pages == $this->current_page;
    }	

    public function isPrevPage()
    {
        return $this->current_page > 1 AND $this->items_total >= $this->items_per_page;
    }	
	
    public function isNextPage()
    {
        return ($this->current_page < $this->num_pages AND $this->items_total >= $this->items_per_page) AND ($_GET['page'] != 'All') AND $this->current_page > 0;
    }	
	
    public function getPaginationSummary()
    {
        $low = (($this->current_page - 1) * $this->items_per_page) + 1;
        $high = ($this->items_total <= $this->items_per_page) ? ($this->items_total) : ($low + $this->items_per_page) - 1;
        $html = sprintf('Showing records %d - %d from %d', $low, $high, $this->items_total);

        return $html;
    }	
	
    public function getPaginationPagesSummary()
    {
        $low  = $this->current_page;
        $high = $this->num_pages;
        $html = sprintf('Page: %d of %d', $low, $high);

        return $html;
    }	

    public function getStartpage()
    {
        $startpage  = ($this->items_per_page * $this->current_page ) - $this->items_per_page;
		
        return $startpage;
    }	
	
}