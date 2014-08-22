<?php $title = "Favorites" ;?>
<div id="ConfigContent" style="display: block;">
	<div class="config-header clearfix">
		<div id="ConfigTitle" class="pull-left config-title">
			<?php echo $title;?>
		</div>		
	</div>
</div>
</br>
<?php
$tablename = "favorites";
$rows = $db->getTableData($tablename);
?>

<!-- table-bordered table-striped table-condensed -->
<table class="table table-hover" id="dt_favorites">
<thead>
	<tr>
		<th>Link</th>
		<th>Description</th>	
		<th>URL</th>
	</tr>
</thead>
<tbody>
<?php foreach ($rows as $row) :?>  
            <tr>  
				<td><?php echo "<a target=\"_blank\" href=".$row->url.">".$row->title."</a>"; ?></td>  
				<td><?php echo $row->description; ?></td>  
				<td><?php echo $row->url; ?></td>  
            </tr>  
<?php endforeach;?> 
</tbody>
</table>