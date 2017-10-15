<?php
include 'jmircontroll.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="jmir_css/bootstrap.min.css">
  <style type="text/css">
  .brijesh-table
  {
	  margin:50px;
  }
  .brijesh-table td
  {
	  padding:20px;
  }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
$(document).ready(function() {
    $("#Name").blur(function(){
    var inputName = $("#Name").val();
		if(inputName=="")
		{
			$("#Name_error").html("Name is required");
			 $('#Name_error').css('color', 'red');
			 $("#Name_error").show();
			 $('#chkname').val(""); 
		}
	else if(inputName.length<2) {
        $("#Name_error").html("Enter atleast 2 character");
		 $('#Name_error').css('color', 'red');
		$("#Name_error").show();
		$('#chkname').val(""); 
	}
    else if(inputName.length>=2)
     {  
	 $("#Name_error").hide();
	 $('#chkname').val("valid");  
	 }
	});
	
	 $("#Province").blur(function(){
		 var inputProvince = $("#Province").val();
	 if(inputProvince=="")
	 {
		 $("#Province_error").html("Province is required");
		 $('#Province_error').css('color', 'red');
		$("#Province_error").show(); 
		$('#chkpro').val(""); 
	 }
	 else if(inputProvince!="")
	 {
		$("#Province_error").hide(); 
		$('#chkpro').val("valid");
	 }
	 });
	 
	 $("#Telephone").blur(function(){
	var inputTelephone = $("#Telephone").val();
	 if(inputTelephone=="")
	 {
		 $("#Telephone_error").html("Telephone is required");
		    $('#Telephone_error').css('color', 'red');
			$('#chktel').val("");
	 }
	 else if(inputTelephone!="")
	 {
		if (validatePhone('Telephone')) {
            $('#Telephone_error').html('Valid telephone format!');
            $('#Telephone_error').css('color', 'green');
			$('#chktel').val("valid");
        }
        else {
            $('#Telephone_error').html('Invalid telephone format!');
            $('#Telephone_error').css('color', 'red');
			$('#chktel').val("");
        }
	 }
	 });
	 
	 $("#Postalcode").blur(function(){
		var inputPostal = $("#Postalcode").val();
	  if(inputPostal=="")
	 {
		 $("#Postal_error").html("Postal code is required");
		    $('#Postal_error').css('color', 'red');
			$('#chkpostal').val("");
	 }
	 else if(inputPostal!="")
	 {
		if (validatePostal('Postalcode')) {
            $('#Postal_error').html('Valid postal code format!');
            $('#Postal_error').css('color', 'green');
			$('#chkpostal').val("valid");
        }
        else {
            $('#Postal_error').html('Invalid postal code format!');
            $('#Postal_error').css('color', 'red');
			$('#chkpostal').val("");
        }
	 }
	 });
	 
	 $("#Salary").blur(function(){
		var inputSalary = $("#Salary").val();
		var inputProvince = $("#Province").val();
	  if(inputSalary=="")
	 {
		 $("#Salary_error").html("Salary is required");
		    $('#Salary_error').css('color', 'red');
			$('#chksal').val("");
	 }
	 else if(inputSalary!="")
	 {
		 if(inputProvince=="")
		 {
			 $('#Salary_error').html('Please select Province');
			 $('#chksal').val("");
		 }
		 else if(inputProvince!="")
		 {
			 
			 if(inputProvince!="Québec")
			 {
		if (validateCanada('Salary')) {
            $('#Salary_error').html('Valid cad currency format!');
            $('#Salary_error').css('color', 'green');
			$('#chksal').val("valid");
        }
			 
        else {
			
            $('#Salary_error').html('Invalid cad currency format!');
            $('#Salary_error').css('color', 'red');
			$('#chksal').val("");
			
		}
			 }
		  else if(inputProvince=="Québec")
		  {
			if (validateCanada('Salary')) {
				
            $('#Salary_error').html('Valid cad currency format!');
            $('#Salary_error').css('color', 'green');
			$('#chksal').val("valid");
        }
		else if (validateQuebec('Salary')) {
            $('#Salary_error').html('Valid québec cad currency format!');
            $('#Salary_error').css('color', 'green');
			$('#chksal').val("valid");
        }
	    else {
			
            $('#Salary_error').html('Invalid cad currency format!');
            $('#Salary_error').css('color', 'red');
			$('#chksal').val("");
			
		}  
			  
		  }
		 
		  
		////////////////////////////////////
		 }
	 }
	 });
	 <?php if(isset($_REQUEST['act']))
	 { }
	 else
	 {
	   ?>
	  $("#Name").blur(function(){
    var t1 = $("#Name").val().split(" ");
	if(t1!="")
	{
			sql="?Name="+t1+"&chkuser=chkuser";
		$("#Name_chk").load("jmircontroll.php"+sql);
	}
	else
	{
	}
	  });
	  
	   $("#Telephone").blur(function(){
    var t1 = $("#Telephone").val().split(" ");
	if(t1!="")
	{
	sql="?Telephone="+t1+"&chktelephone=chktelephone";
		$("#Telephone_chk").load("jmircontroll.php"+sql);
	}
	else
	{
	}
	  }); 
	  <?php } ?>
	 
	 $("#Save").click(function(){
    var inputName = $("#Name").val();
		var inchkname = $("#chkname").val();
		var inchkpro = $("#chkpro").val();
		var inchktel = $("#chktel").val();
		var inchkpostal = $("#chkpostal").val();
		var inchksal = $("#chksal").val();
		var inchkvalname = $('#Name_chk').html();
		var inchkvaltel = $('#Telephone_chk').html();
		
	 if(inchkname=="valid" && inchkpro=="valid" && inchktel=="valid" && inchkpostal=="valid" && inchksal=="valid" && inchkvalname=="Valid to submit!" && inchkvaltel=="Valid to submit!")
	 {
		 
		 t1 = $("#Name").val().split(" ");
		t2 = $("#Province").val().split(" ");
		t3 = $("#Telephone").val().split(" ");
		t4 = $("#Postalcode").val().split(" ");
		t5 = $("#Salary").val();
		
		 sql="?Name="+t1+"&Province="+t2+"&Telephone="+t3+"&Postalcode="+t4+"&Salary="+t5+"&adddata=adddata";
		$("#loadconfirm").load("jmir_confirm.php"+sql);
	 }
	 else
	 {
		 alert("Page is not ready to submit please enter data or enter data properly!");
	 }
	 });
	 
});
function validatePhone(Telephone) {
    var a = document.getElementById('Telephone').value;
    var filter = /^\(?(\d{3})\)?[-\. ]?(\d{3})[-\. ]?(\d{4})$/;
    if (filter.test(a)) {
        return true;
    }
    else {
        return false;
    }
}
function validatePostal(Postalcode) {
    var a = document.getElementById('Postalcode').value;
    var filter = /^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ]( )?\d[ABCEGHJKLMNPRSTVWXYZ]\d$/i;
    if (filter.test(a)) {
        return true;
    }
    else {
        return false;
    }
}
function validateCanada(Salary) {
    var a = document.getElementById('Salary').value;
    var filter = /^(\d{1,3}(\,\d{3})*|(\d+))(\.\d{2})?$/;
    if (filter.test(a)) {
        return true;
    }
    else {
        return false;
    }
}
function validateQuebec(Salary) {
    var a = document.getElementById('Salary').value;
    var filter = /^(\d{1,3}(\\d{3})*|(\d+))(\,\d{2})?$/;
    if (filter.test(a)) {
        return true;
    }
    else {
        return false;
    }
}

</script>
</head>
<body>
<div class="jumbotron text-center">
  <b><a href="jmir_editadd.php">ADD INFORMATION</a> | <a href="jmir_list.php">LIST PAGE</a></b>
 </div>
  <div id="loadconfirm">
<div class="container">
 <form id="form1" method="post">
 <div class="col-sm-12">
    <label for="email">Name <span style="color:#F00">*</span></label>
    <input type="text" class="form-control" id="Name" name="Name" value="<?php if(isset($_REQUEST['act'])) { echo $object_usersselect[0]->Name;  }?>"><input type="hidden" id="chkname" value=""/><input type="hidden" id="User_Id" name="User_Id" value="<?php if(isset($_REQUEST['act'])) { echo $object_usersselect[0]->User_Id;  }?>"/>
    <span id="Name_error"></span>
    <span id="Name_chk"></span>
  </div>
   <div class="col-sm-12">
    <label for="pwd">Province <span style="color:#F00">*</span></label>
   <select class="form-control" id="Province" name="Province">
   <option value="">Select</option>
  <option value="Ontario" <?php if(isset($_REQUEST['act'])) { if($object_usersselect[0]->Province=='Ontario') { echo 'selected'; }  }?>>Ontario</option>
  <option value="Québec" <?php if(isset($_REQUEST['act'])) { if($object_usersselect[0]->Province=='Québec') { echo 'selected'; }  }?>>Québec</option>
  <option value="Nova Scotia" <?php if(isset($_REQUEST['act'])) { if($object_usersselect[0]->Province=='Nova Scotia') { echo 'selected'; }  }?>>Nova Scotia</option>
  <option value="British Columbia" <?php if(isset($_REQUEST['act'])) { if($object_usersselect[0]->Province=='British Columbia') { echo 'selected'; }  }?>>British Columbia</option>
  <option value="Prince Edward Island" <?php if(isset($_REQUEST['act'])) { if($object_usersselect[0]->Province=='Prince Edward Island') { echo 'selected'; }  }?>>Prince Edward Island</option>
  <option value="Saskatchewan" <?php if(isset($_REQUEST['act'])) { if($object_usersselect[0]->Province=='Saskatchewan') { echo 'selected'; }  }?>>Saskatchewan</option>
  <option value="Alberta" <?php if(isset($_REQUEST['act'])) { if($object_usersselect[0]->Province=='Alberta') { echo 'selected'; }  }?>>Alberta</option>
  <option value="Newfoundland and Labrador" <?php if(isset($_REQUEST['act'])) { if($object_usersselect[0]->Province=='Newfoundland and Labrador') { echo 'selected'; }  }?>>Newfoundland and Labrador</option>
  <option value="Northwest Territories" <?php if(isset($_REQUEST['act'])) { if($object_usersselect[0]->Province=='Northwest Territories') { echo 'selected'; }  }?>>Northwest Territories</option>
  <option value="Yukon" <?php if(isset($_REQUEST['act'])) { if($object_usersselect[0]->Province=='Yukon') { echo 'selected'; }  }?>>Yukon</option>
  <option value="Nunavut" <?php if(isset($_REQUEST['act'])) { if($object_usersselect[0]->Province=='Nunavut') { echo 'selected'; }  }?>>Nunavut</option>
</select><input type="hidden" id="chkpro" value=""/>
<span id="Province_error"></span>
  </div>
  <div class="col-sm-6">
    <label for="pwd">Telephone <span style="color:#F00">*</span></label>
    <input type="text" class="form-control" id="Telephone" name="Telephone" value="<?php if(isset($_REQUEST['act'])) { echo $object_usersselect[0]->Telephone;  }?>"><input type="hidden" id="chktel" />
    <span id="Telephone_error"></span><br/>
    <span id="Telephone_chk"></span>
    </div>
     <div class="col-sm-6">
    <label for="pwd">Postal Code <span style="color:#F00">*</span></label>
    <input type="text" class="form-control" id="Postalcode" name="Postalcode" value="<?php if(isset($_REQUEST['act'])) { echo $object_usersselect[0]->Postalcode;  }?>"><input type="hidden" id="chkpostal" />
    <span id="Postal_error"></span>
    </div>
     <div class="col-sm-12"><br/>
    <label for="pwd">Salary <span style="color:#F00">*</span></label>
    <input type="Salary" class="form-control" id="Salary" name="Salary" value="<?php if(isset($_REQUEST['act'])) { echo $object_usersselect[0]->Salary;  }?>"><input type="hidden" id="chksal" />
     <span id="Salary_error"></span>
    </div>
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
    </div>
  <div class="col-sm-4" style="text-align:right;">
  <?php if(isset($_REQUEST['act'])) { ?>
	  <button type="submit" class="btn btn-default" id="Update" name="user_update">Update</button>
  <?php }
  else
  { ?>
   <button type="button" class="btn btn-default" id="Save">Save</button>
   <?php } ?>
    </div>
  
</form>
</div>
</div>

</body>
</html>
