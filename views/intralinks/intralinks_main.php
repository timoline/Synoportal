<?php $title = "Intralinks" ;?>
<div id="ConfigContent" style="display: block;">
	<h2 class="page-header">
		<?php echo $title;?>
	</h2>
</div>

<?php
$tablename = "intralinks";
$rows = $db->getTableData($tablename);
?>

<div class="table-responsive">
<!-- table-bordered table-striped table-condensed  -->
<table class="table table-hover" id="dt_intralinks">
<thead>
	<tr>
		<th class="hidden-xs">Link</th>
		<th class="hidden-xs">Description</th>	
		<th class="hidden-xs">URL</th>
	</tr>
</thead>
<tbody>
<?php foreach ($rows as $row) :?>  
            <tr>  
				<td class="nowrap"><?php echo "<a target=\"_blank\" href=".$row->url.">".$row->title."</a>"; ?></td>  
				<td class=""><?php echo $row->description; ?></td>  
				<td class=""><?php echo $row->url; ?></td>  
            </tr>  
<?php endforeach;?>  
</tbody>
</table>
</div>