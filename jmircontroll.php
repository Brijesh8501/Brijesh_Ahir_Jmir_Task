<?php
include 'jmirmodel.php';
$objectjmirmodel = new jmirmodel();

//====================== display users ========================//
    $object_usersdisplay = $objectjmirmodel->display_users($fnlconnect,'users');
	
//======================= insert users =============================//
if(isset($_REQUEST['adddata']))
{
	$Namereplace = $_REQUEST['Name'];
	$Namefirstword = str_replace(","," ",$Namereplace);
	$Name = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($Namefirstword))));
	$Provincereplace = $_REQUEST['Province'];
	$Provincefrenchsupport = str_replace(","," ",$Provincereplace);
	$Province = $fnlconnect->real_escape_string($Provincefrenchsupport);
	$Telephonereplace = $_REQUEST['Telephone'];
	$Telephone = str_replace(","," ",$Telephonereplace);
	$Postalcodereplace = $_REQUEST['Postalcode'];
	$Postalcode = str_replace(","," ",$Postalcodereplace);
	$Salary = $_REQUEST['Salary'];
	
	$data = array("Name"=>$Name,"Province"=>$Province,"Telephone"=>$Telephone,"Postalcode"=>$Postalcode,"Salary"=>$Salary);
	 $objectjmirmodel->insert_users($fnlconnect,'users',$data);

}

// ++++++++++++++++++++++++++++ check entry of users to database for duplication ++++++++++++
if(isset($_REQUEST['chkuser']))
{
	$Namereplace = $_REQUEST['Name'];
	$Name = str_replace(","," ",$Namereplace);
	$where = array("Name"=>$Name);
	$objectjmirmodel->check_users($fnlconnect,'users',$where);
}
// ++++++++++++++++++++++++++++ check entry of users to database for duplication ++++++++++++
if(isset($_REQUEST['chktelephone']))
{
	$Telephonereplace = $_REQUEST['Telephone'];
	$Telephone = str_replace(","," ",$Telephonereplace);
	
	$where = array("Telephone"=>$Telephone);
	$objectjmirmodel->check_users($fnlconnect,'users',$where);
}
// +++++++++++++++++++++++++++++++ Delete user +++++++++++++++++++++++++++++++++++++++
if(isset($_REQUEST['delete_id'])) {
      $Delete_Id = $_REQUEST['delete_id'];
	  
	   $where = array("User_Id"=>$Delete_Id);
	$objectjmirmodel->delete_users($fnlconnect,'users',$where);
	
}
//====================== users select from list to update ========================//
if(isset($_REQUEST['act']))
{
	$User_Id = $_REQUEST['id'];
	
	$data = array("User_Id"=>$User_Id);
		
    $object_usersselect = $objectjmirmodel->select_users($fnlconnect,'users',$data);
}
//========================= user update =========================================//
if(isset($_REQUEST['user_update']))
{
	$User_Id = $_REQUEST['User_Id'];
	$Name = $_REQUEST['Name'];
	$Province = $_REQUEST['Province'];
	$Telephone = $_REQUEST['Telephone'];
	$Postalcode = $_REQUEST['Postalcode'];
	$Salary = $_REQUEST['Salary'];
	
$data = array("Name"=>$Name,"Province"=>$Province,"Telephone"=>$Telephone,"Postalcode"=>$Postalcode,"Salary"=>$Salary);
$where = array("User_Id"=>$User_Id);
		
$objectjmirmodel->update_users($fnlconnect,'users',$data,$where);
}
if(isset($_REQUEST['um']))
{
	$msg = "record successfully updated!";
}