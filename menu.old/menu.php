
<?php include_once "menu/menu_links.php";?>	

<div class="list-group">
	<?php for ($i = 0; $i < (count($url)); $i++):?>
	<?php $class="";?>	
	<?php if ((isset($pagelink)) && ($pagelink == $page[$i])) { $class="active"; } ?>
		<?php echo "<a class=\"list-group-item $class\"  href=.$url[$i]><i class=\"glyphicon $icon[$i]\"></i> $title[$i]</a>"; ?>
	<?php endfor;?>	
</div>