<?= validation_list_errors() ?>
<form action="<?php echo base_url('Store-RolePrev');?>" method="post">
<select class="form-select" id="inputGroupSelect01" name="Role" >
                        <option selected disabled>Select Role</option>
                        <?php foreach ($ListRole as $row) :?>
                         <option value="<?php echo $row['Id'];?>"> <?php echo $row['Role'];?></option>
                         <?php endforeach; ?>
            </select>
<table>
<thead>
</thead>
<tbody>
<?php if($Listprev):?>
<?php  foreach($Listprev as $row):?> 
    <tr>
<td><input type="checkbox" name="Prev[]" value="<?php echo $row['Id'];?>"></td><td><?php echo $row['Description'];?></td>
</tr>
<?php endforeach; 
endif; ?>
</tbody>
</table>

<div class="center mt-20">
						<input onclick="return ValidateCompreg();"  class="Submit-Btn" type="submit" value="Save" id="LoginBtn">
	</div>
</form>