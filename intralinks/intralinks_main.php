<?php include_once "intralinks/intralinks_links.php";
?>	
<div id="ConfigContent" style="display: block;">
	<div class="config-header clearfix">
		<div id="ConfigTitle" class="pull-left config-title"><?php echo strtoupper($pagelink);?>
		</div>
	</div>
</div>

<table class="table table-condensed table-hover" id="list">
<thead>
	<tr>
		<th width="10"></th>	
		<th>Link</th>
		<th>Description</th>	
		<th>URL</th>
	</tr>
</thead>
<tbody>
	<?php
	for ($i = 0; $i < (count($url)); $i++)
	{
		echo "<tr>\n";
		echo "<td>";
		echo $i+1;
		echo "</td>";		
		echo "<td>";
		echo "<a target=\"_blank\" href=$url[$i]>$title[$i]</a>";
		echo "</td>";
		echo "<td>";
		echo $description[$i];
		echo "</td>";
		echo "<td>";	
		echo $url[$i];
		echo "</td>";			
		echo "</tr>";

	}
	?>
</tbody>
</table>