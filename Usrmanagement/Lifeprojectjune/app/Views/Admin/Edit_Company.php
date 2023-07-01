<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Company Registration</title>
	<link rel="stylesheet" href="<?php echo base_url('Assets\css\style.css');?>">
</head>
<body>
	<div class="container">
		<div id="Add_New_Comp">
			<h1 id="formTitle">Edit Company</h1>
			<?= validation_list_errors() ?>
           
			<div id="LoginFrom" >
				<form action="<?php echo base_url('Update-company');?>">
                <?php foreach ($listdata as $row) :?>
					<div class="center">
						<input id="cname"  name="cname" class="input-text" type="text" placeholder="Company Name" value="<?php echo $row['Description'];?>"> 
                        <input type="hidden" id="Id" name="Id" value="<?php echo $row['Id'];?>"> 
					</div>
					
					<div class="center mt-20">
						<input onclick="return ValidateCompreg();"  class="Submit-Btn" type="submit" value="Save" id="LoginBtn">
					</div>
                    <?php endforeach;
                   ?>
				 </form>
				
			</div>
			
			
		
	</div>

	<script src="main.js" type="text/javascript"></script>
	<script src="validation.js" type="text/javascript"></script>
</body>
</html>