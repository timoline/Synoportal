<?php include_once "helpers/paginator.class.php";?>	
<?php $title = "Intralinks" ;?>
<div id="MessagesTab" class="tab-pane fade active in">
<div id="ConfigContent" style="display: block;">
	<div class="config-header clearfix">
		<div id="ConfigTitle" class="pull-left config-title">
			<?php echo $title;?>
		</div>
	</div>
</div>

<?php
$tablename = "intralinks";
$query = "SELECT COUNT(*) FROM $tablename";
$result = mysql_query($query) or die(mysql_error());
$num_rows = mysql_fetch_row($result);

$pages = new Paginator;
$pages->showPrevAndNext	= 1;//show next prev after x pages
$pages->default_ipp		= $config["items_per_page"];
$pages->ipp_array 		= array(5,10,15,20);
$pages->items_total 	= $num_rows[0];
$pages->paginate(); 
 
$query = "SELECT * FROM $tablename ORDER BY ordering ASC $pages->limit";
$result = mysql_query($query) or die(mysql_error());
?>
<div class="form-inline toolbox-top clearfix">
	<div class="pull-left toolbox-length"><?php echo $pages->display_items_per_page();?>
	<span class="records-label"> records per page</span></div>
	<div class="pagination pagination-right"><?php echo $pages->display_pages();?></div>	
</div>
<!-- table-bordered table-striped  -->
<table class="table table-condensed datatable table-hover" id="list">
<thead>
	<tr>
		<th>Link</th>
		<th>Description</th>	
		<th>URL</th>
	</tr>
</thead>
<tbody>
<?php while ($row = mysql_fetch_object($result)) :?>  
            <tr>  
				<td><?php echo "<a target=\"_blank\" href=".$row->url.">".$row->title."</a>"; ?></td>  
				<td><?php echo $row->description; ?></td>  
				<td><?php echo $row->url; ?></td>  
            </tr>  
<?php endwhile;?>  
</tbody>
</table>
<div class="toolbox-info clearfix">
	<div class="pull-left"><?php echo $pages->getPaginationSummary();?></div>  
</div> 
</div>