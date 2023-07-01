<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="<?php echo base_url('Assets\css\style.css');?>">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">  
    <script src="<?php echo base_url('Assets\js\js\popper.min.js'); ?>"></script>
    <script src=" https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
             <div id="LoginAndRegistrationForm">
				<form action="<?php echo base_url('SignupController/store');?>">
                  <p> <?= validation_list_errors() ?> </p>
					<div class="center">
                    <select class="form-select" id="ctype" name="ctype" >
                        <option selected>Select Company Type</option>
                        <?php foreach ($listcomp as $row) :?>-
                         <option value="<?php echo $row['Id'];?>"> <?php echo $row['Description'];?></option>
                         <?php endforeach; ?>
                         </select>
                         <select name="Role" id="Role" class="form-control input-lg">
                            <option value="">Select Role</option>
                            </select>
						<input id="RegiName" name="Fname"class="input-text" type="text" placeholder="Full Name" value ="<?= set_value('Fname');?>">
						<input id="Username" name="Username"class="input-text mt-10" type="text" placeholder="User Name" value="<?= set_value('Username'); ?>">
                        <input id="RegiPassword" name="pass"class="input-text mt-10" type="password" placeholder="Password" value="<?= set_value('Username'); ?>">
					
						<input id="RegiConfirmPassword" name="cpassword" class="mt-10 input-text" type="password" placeholder="Confirm Password">
					</div>
					<div class="center mt-20">
						<input onclick="return ValidateRegistrationForm();" class="Submit-Btn" type="submit" value="Save" id="RegistrationitBtn">
					</div>
				</form>
				
			</div>
		</div>
		
	</div>
<script>
   

$(document).ready(function()
{

$('#ctype').change(function(){

    var ctype = $('#ctype').val();
     //var ctype=3;

    if(ctype != '')
    {
        $.ajax({
            url:"<?php echo base_url('Selectrole'); ?>",
            method:"Get",
            data:{ctype:ctype},
            dataType:"JSON",
            success:function(data)
            {
                var html = '';

                for(var count = 0; count < data.length; count++)
                {
                    html += '<option value="'+data[count].Id+'">'+data[count].Role+'</option>';
                }

                $('#Role').html(html);
            }
        });
    }
    else
    {
        $('#Role').val('');
    }

});

});

</script>
</script>
	
</body>
</html>