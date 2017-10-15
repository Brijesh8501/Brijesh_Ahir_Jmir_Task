<?php
include 'jmirconnect.php';

$objconnect = new myconnect();
$fnlconnect = $objconnect->myconn();

class jmirmodel
{
	//==================== display users ===============================================//

  public function display_users($fnlconnect,$table)
	{
		$sel = "select * from $table";
		$res = $fnlconnect->query($sel);
		while($row = $res->fetch_object())
		{
			$rw[] = $row;
		}
		return $rw;		
	}
	//++++++++++++++ insert users ++++++++++++++++++//
	public function insert_users($fnlconnect,$table,$data)
	{
		 $aboutme_key = array_keys($data);
		 $aboutme_field = implode(",",$aboutme_key);
		$aboutme_value = array_values($data);
		$aboutme_valueext = implode("','",$aboutme_value);
		$select_jmir = "select * from $table where $aboutme_key[0] = '$aboutme_value[0]'";
		$select_jmir_exe = $fnlconnect->query($select_jmir);
		$countrow_jmir = $select_jmir_exe->num_rows;
		if($countrow_jmir==0)
		{
		$insert_jmir = "insert into $table($aboutme_field) values('$aboutme_valueext')";
		 $fnlconnect->query($insert_jmir);
			
			header('refresh:5; url:jmir_list.php');
		}
		else
		{
			echo '<script>alert("This name or telephone is already exists!");</script>';
			
		}
		}
		
		//++++++++++++++ check users ++++++++++++++++++//
	public function check_users($fnlconnect,$table,$where)
	{
		 $aboutme_key = array_keys($where);
		 $aboutme_field = implode(",",$aboutme_key);
		$aboutme_value = array_values($where);
		$aboutme_valueext = implode("','",$aboutme_value);
		
		$select_jmir = "select * from $table where $aboutme_key[0] = '$aboutme_value[0]'";
		$select_jmir_exe = $fnlconnect->query($select_jmir);
		$countrow_jmir = $select_jmir_exe->num_rows;
		if($countrow_jmir==0)
		{
			if($aboutme_key[0]=='Name')
			{
	echo '<script>document.getElementById("Name_chk").innerHTML = "Valid to submit!";</script>';	
echo '<script>document.getElementById("Name_chk").style.color = "#690";</script>';	
echo '<script>document.getElementById("Name_error").style.display = "none";</script>';	
			}
			elseif($aboutme_key[0]=='Telephone')
			{
				
				
				echo '<script>document.getElementById("Telephone_chk").innerHTML = "Valid to submit!";</script>';	
echo '<script>document.getElementById("Telephone_chk").style.color = "#690";</script>';	
echo '<script>document.getElementById("Telephone_error").style.display = "none";</script>';	
			
		}
		}
		else
		{
			if($aboutme_key[0]=='Name')
			{
		 echo '<script>document.getElementById("Name_chk").innerHTML = "Already exists!";</script>';
			 echo '<script>document.getElementById("Name_chk").style.color = "#F00";</script>';
			 echo '<script>document.getElementById("Name_error").style.display = "none";</script>';	
			 }
			elseif($aboutme_key[0]=='Telephone')
			{
				
				 echo '<script>document.getElementById("Telephone_chk").innerHTML = "Already exists!";</script>';
			 echo '<script>document.getElementById("Telephone_chk").style.color = "#F00";</script>';
			 echo '<script>document.getElementById("Telephone_error").style.display = "none";</script>';	
			
			}
		}
		}
		//==================== delete users ===============================================//

public function delete_users($fnlconnect,$table,$where)
	{
		 $aboutme_key = array_keys($where);
		 $aboutme_field = implode(",",$aboutme_key);
		$aboutme_value = array_values($where);
		$aboutme_valueext = implode("','",$aboutme_value);
		
		$delete_jmir = "delete from $table where $aboutme_key[0] = '$aboutme_value[0]'";
		$result_connect = $fnlconnect->query($delete_jmir);
		
	}
	//================================= users select for update ================================//
  public function select_users($fnlconnect,$table,$data)
  {
	   $dkey = array_keys($data);
	  $dvalue = array_values($data);
	  $j = 0;
	  $select = "select * from $table where 1=1";
	  foreach($data as $res)
	  {
		  $select.= " and ".$dkey[$j]."='".$dvalue[$j]."'";
			$j++; 
	  }
	  $result = $fnlconnect->query($select);
	  while($res = $result->fetch_object())
	  {
		  $row[] = $res;
	  }
	  
	  return $row;
  }
	 //===================================== about me update ================================================//
  public function update_users($fnlconnect,$table,$data,$where)
  {
	  $dkey = array_keys($data);
	  $dvalue = array_values($data);
	  $whr_key = array_keys($where);
	  $whr_values = array_values($where);
	  $size = sizeof($data);
	  $i = 0;
	  $k = 0;
	  
	  $select_jmirname = "select * from $table where $whr_key[0] = '$whr_values[0]'";
		$select_jmirname_exe = $fnlconnect->query($select_jmirname);
		$result_jmirname = $select_jmirname_exe->fetch_object();
		
		if($result_jmirname->Name==$dvalue[0] && $result_jmirname->Telephone==$dvalue[2])
		{
			
	  $update = "update $table set";
	  foreach($data as $r)
	  {
		  if($size==$i+1)
		  {
		  $update.=" ".$dkey[$i]."="."'".$dvalue[$i]."'";
		  }
		  else
		  {
		 $update.=" ".$dkey[$i]."="."'".$dvalue[$i]."'".","."";
		  }
		  $i++;
	  }
	  $update.=" where 1=1";
	  foreach($where as $rw)
	  {
		 
		$update.=" and ".$whr_key[$k]."="."'".$whr_values[$k]."'";
		  
		  $k++;
	  }
	  $fnlconnect->query($update);
	 	 header("location:jmir_list.php?um=um");
		}
		
		elseif($result_jmirname->Name==$dvalue[0] && $result_jmirname->Telephone!=$dvalue[2])
		{
		$select_jmirname = "select * from $table where $dkey[2] = '$dvalue[2]'";
		$select_jmirname_exe = $fnlconnect->query($select_jmirname);
		$countrow_jmirname = $select_jmirname_exe->num_rows;
		if($countrow_jmirname==0)
		{
			
		$update = "update $table set";
	  foreach($data as $r)
	  {
		  if($size==$i+1)
		  {
		  $update.=" ".$dkey[$i]."="."'".$dvalue[$i]."'";
		  }
		  else
		  {
		 $update.=" ".$dkey[$i]."="."'".$dvalue[$i]."'".","."";
		  }
		  $i++;
	  }
	  $update.=" where 1=1";
	  foreach($where as $rw)
	  {
		 
		$update.=" and ".$whr_key[$k]."="."'".$whr_values[$k]."'";
		  
		  $k++;
	  }
	  $fnlconnect->query($update);
	 	header("location:jmir_list.php?um=um");
		 	
		}
		else
		{
			
			echo '<script>alert("This telephone number is already exists!");</script>';
		}
		
		
		}
		elseif($result_jmirname->Name!=$dvalue[0] && $result_jmirname->Telephone==$dvalue[2])
		{
		$select_jmirname = "select * from $table where $dkey[0] = '$dvalue[0]'";
		$select_jmirname_exe = $fnlconnect->query($select_jmirname);
		$countrow_jmirname = $select_jmirname_exe->num_rows;
		if($countrow_jmirname==0)
		{
			
		$update = "update $table set";
	  foreach($data as $r)
	  {
		  if($size==$i+1)
		  {
		  $update.=" ".$dkey[$i]."="."'".$dvalue[$i]."'";
		  }
		  else
		  {
		 $update.=" ".$dkey[$i]."="."'".$dvalue[$i]."'".","."";
		  }
		  $i++;
	  }
	  $update.=" where 1=1";
	  foreach($where as $rw)
	  {
		 
		$update.=" and ".$whr_key[$k]."="."'".$whr_values[$k]."'";
		  
		  $k++;
	  }
	  $fnlconnect->query($update);
	 	header("location:jmir_list.php?um=um");
		 	
		}
		else
		{
			
			echo '<script>alert("This name already exists!");</script>';
		}
		
		
		}
		elseif($result_jmirname->Name!=$dvalue[0] && $result_jmirname->Telephone!=$dvalue[2])
		{
		$select_jmirname = "select * from $table where $dkey[0] = '$dvalue[0]' and $dkey[2] = '$dvalue[2]'";
		$select_jmirname_exe = $fnlconnect->query($select_jmirname);
		$countrow_jmirname = $select_jmirname_exe->num_rows;
		if($countrow_jmirname==0)
		{
			
		$update = "update $table set";
	  foreach($data as $r)
	  {
		  if($size==$i+1)
		  {
		  $update.=" ".$dkey[$i]."="."'".$dvalue[$i]."'";
		  }
		  else
		  {
		 $update.=" ".$dkey[$i]."="."'".$dvalue[$i]."'".","."";
		  }
		  $i++;
	  }
	  $update.=" where 1=1";
	  foreach($where as $rw)
	  {
		 
		$update.=" and ".$whr_key[$k]."="."'".$whr_values[$k]."'";
		  
		  $k++;
	  }
	  $fnlconnect->query($update);
	 	header("location:jmir_list.php?um=um");
		 	
		}
		else
		{
			
			echo '<script>alert("This name-telephone already exists!");</script>';
		}
		
		
		}
		
	 
  }
}
?>
