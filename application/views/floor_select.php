<option value="">Select Floor</option>
<?php foreach($floors as $floor):?>
	<option value="<?php echo $floor['floor_id']?>"><?php echo $floor['name']?></option>
<?php endforeach; ?>