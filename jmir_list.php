<?php
include 'jmircontroll.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="jmir_css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="jmir_css/bootstrap.mintable.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
 
 <script>
$(document).ready(function() {
    $('#example').DataTable();
	
	$('.btn-danger').click(function(){
		var del_id = $(this).attr('rel');
		//alert(del_id);
       $.post('jmircontroll.php', {delete_id:del_id}, function(data) {
         	 $('#'+del_id+' a').removeAttr('href'); 
			 $('#Update'+del_id).prop('disabled', true);
			 $('#Delete'+del_id).prop('disabled', true);
			 $('#'+del_id).css("color","red");
		//	alert("Deleted successfully!");
		 
       });
	   
    });	
	
} );
</script>
</head>
<body>
 <div class="jumbotron text-center">
  <b><a href="jmir_editadd.php">ADD INFORMATION</a> | <a href="jmir_list.php">LIST PAGE</a></b>
 </div>
  
<div class="container">
<span style="color:#090;"><center><b><?php if(isset($_REQUEST['um'])) { echo $msg; }?></b></center></span>
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Province</th>
                <th>Telephone</th>
                <th>Postal Code</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($object_usersdisplay as $resultuser) {?>
            <tr id="<?php echo $resultuser->User_Id;?>">
                <td><?php echo $resultuser->Name;?></td>
                <td><?php echo $resultuser->Province;?></td>
                <td><?php echo $resultuser->Telephone;?></td>
                <td><?php echo $resultuser->Postalcode;?></td>
                <td><?php echo $resultuser->Salary;?></td>
                <td><a href="jmir_editadd.php?id=<?php echo $resultuser->User_Id;?>&act=u"><input type="button" name="Update<?php echo $resultuser->User_Id;?>" id="Update<?php echo $resultuser->User_Id;?>" value="Update" class=".btn-dangerupdate"/></a> || <button class="btn-danger" name="Delete<?php echo $resultuser->User_Id;?>" id="Delete<?php echo $resultuser->User_Id;?>" rel="<?php echo $resultuser->User_Id;?>">DELETE</button></td>
            </tr>
            <?php } ?>
          
        </tbody>
    </table>
  
</body>
</html>
 </div>
