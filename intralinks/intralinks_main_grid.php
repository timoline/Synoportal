<?php include_once "intralinks/intralinks_links.php";
?>	
<div id="ConfigContent" style="display: block;">
	<div class="config-header clearfix">
		<div id="ConfigTitle" class="pull-left config-title"><?php echo strtoupper($pagelink);?>
		</div>
	</div>
</div>


<table class="content" width="100%" border="1">
	<?php
	$k=0;
	for ($i = 0; $i < (count($url)); $i++)
	{
	?>
<tr>
<?php
		echo "<td>";
		echo "<a target=\"_blank\" href=$url[$i]>$title[$i]</a>";
		echo "</br></br>";
		echo $description[$i];
		echo "</br>";
		echo $url[$i];
		echo "</td>";
		$i++;
		echo "<td>";
		echo "<a target=\"_blank\" href=$url[$i]>$title[$i]</a>";
		echo "</br></br>";
		echo $description[$i];
		echo "</br>";
		echo $url[$i];		
		echo "</td>";
		$i++;
		echo "<td>";
		echo "<a target=\"_blank\" href=$url[$i]>$title[$i]</a>";
		echo "</br></br>";
		echo $description[$i];
		echo "</br>";
		echo $url[$i];		
		echo "</td>";		
		$i++;
		echo "<td>";
		echo "<a target=\"_blank\" href=$url[$i]>$title[$i]</a>";
		echo "</br></br>";
		echo $description[$i];
		echo "</br>";
		echo $url[$i];		
		echo "</td>";			
?>
</tr>
<?php
	}
?>

</table>
		