<?php include_once "menu/menu_links.php";?>	
<div class="sidebar-nav">
		<ul class="nav nav-list">
			<li class="nav-header">Main Menu</li>    
			
			<?php for ($i = 0; $i < (count($url)); $i++):?>
			<li <?php if ((isset($pagelink)) && ($pagelink == $page[$i])) { echo "class='active'"; } ?>>
				<?php echo "<a href=$url[$i]><i class=$icon[$i]></i>$title[$i]</a>"; ?></li>
			<?php endfor;?>
		</ul>
</div>