<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Company Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="stylesheet" href="<?php echo base_url('Assets\css\style.css');?>">
</head>
<body>
	<div class="container">
		<div id="Add_New_Comp">
			<h1 id="formTitle">Create New Role</h1>
			<?= validation_list_errors() ?>
			<div id="LoginFrom" >
				<form action="<?php echo base_url('Store-Role');?>"method="Post">
                <div class="center">
                
                      <select class="form-select" id="inputGroupSelect01" name="Ctype" >
                        <option selected>Select Company Type</option>
                        <?php foreach ($listcomp as $row) :?>
                         <option value="<?php echo $row['Id'];?>"> <?php echo $row['Description'];?></option>
                         <?php endforeach; ?>
                         </select>
                        
                    </div>
					<div class="center mt-20">
						<input id="rname"  name="rname" class="input-text" type="text" placeholder="Role"> 
						
					</div>
					
					<div class="center mt-20">
						<input onclick="return ValidateCompreg();"  class="Submit-Btn" type="submit" value="Save" id="LoginBtn">
					</div>
				</form>
				
			</div>
			
			
		
	</div>

	<script src="main.js" type="text/javascript"></script>
	<script src="validation.js" type="text/javascript"></script>
</body>
</html>