<div id="ConfigContent" style="display: block;">
	<h2 class="page-header">General</h2>
</div>
<fieldset class="fieldset">
	<div class="form-group">
		<label for="sitename" class="col-md-3 control-label">Sitename</label>
		<div class="col-md-9">
			<input type="text" class="form-control" name="sitename" value="<?php echo $settings['sitename'];?>" placeholder="SynoPortal"/>
		</div>					
	</div>	
	<div class="form-group" >
		<label for="footer" class="col-md-3 control-label">Footer</label>
		<div class="col-md-9">
			<input type="text" class="form-control" name="footer" value="<?php echo $settings['footer'];?>" placeholder="&copy; 1995-2013 SynoPortal"/>
		</div>					
	</div>		
	<div class="form-group" >
		<label for="ipp" class="col-md-3 control-label">Items per page</label>
		<div class="col-md-9">
			<?php echo $ippSelect; ?>
		</div>					
	</div>									
</fieldset>		