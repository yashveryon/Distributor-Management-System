<?php
include 'connect.php';
class category extends connect
{
	public $p=0;
	public function __construct()
	{
		parent::__construct();
	}
	public function save()
	{
		if($this->db_handle)
		{
			
			$sql="insert into category values('$_POST[t1]','$_POST[t2]')";
			mysqli_query($this->db_handle,$sql);
			echo"<script language=javascript> alert('Record save')</script>";
		}
     	
	
             }
        public function new()
        {
         if($this->db_handle)
		{
			$result=mysqli_query($this->db_handle,"select catid from idgen");

		        while($db_field=mysqli_fetch_assoc($result))
			{
				
				$this->p=$db_field['catid'];
				$this->p++;
				
			}	
				

	 		$sql="update idgen set catid=".$this->p;
			mysqli_query($this->db_handle,$sql);
			echo"<script> alert('Record updated')</script>";
		}
           }



  
public function delete()
 	{
         if($this->db_handle)
		{
			$sql="delete from category where id='$_POST[t1]'";
			mysqli_query($this->db_handle,$sql);
			echo"<script> alert('Record deleted')</script>";
		}
	}
public function update()
 	{
         if($this->db_handle)
		{
			$sql="update category set name='$_POST[t2]'  where id='$_POST[t1]'";
			mysqli_query($this->db_handle,$sql);
			echo"<script> alert('Record updated')</script>";
		}
	}
public function select()
 {
    if($this->db_handle)
		{
			$result=mysqli_query($this->db_handle,"select*from category");
			echo "<body><select name=s1>";
			while($db_field=mysqli_fetch_assoc($result))
			{
				$t=$db_field['id'];
				echo "<option>$t</option>";
			}
			echo "</body>";
		}
 }
public function allsearch()
	{
		if($this->db_handle)
		{
			$result=mysqli_query($this->db_handle,"select*from category");
			print"<table border=1>
			<tr>
				<th>ID</th>
				<th>Name</th>
			
			
			</tr>";
			while($db_field=mysqli_fetch_assoc($result))
			{
				print"<tr>";
				print"<td>".$db_field['id']."</td>";
				print"<td>".$db_field['name']."</td>";
			
				print"<tr>";
			}
		}
		
		
	}
public function psearch()
	{
		$result=mysqli_query($this->db_handle,"select*from category where id='$_POST[t1]'");
		print"<table border=1>
		<tr>
			<th>ID</th>
			<th>Name</th>
			
			
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
			print"<tr>";
			print"<td>".$db_field['id']."</td>";
			print"<td>".$db_field['name']."</td>";
			print"<tr>";
		}
	}
	
}
$ob=new category();
if(isset($_REQUEST["b1"]))
	$ob->save();
	
if(isset($_REQUEST["b2"]))
	$ob->delete();
if(isset($_REQUEST["b3"]))
	$ob->update();
if(isset($_REQUEST["b4"]))
	$ob->allsearch();
if(isset($_REQUEST["b5"]))
	$ob->psearch();
if(isset($_REQUEST["b6"]))
	$ob->new();
if(isset($_REQUEST["b7"]))
	$ob->select();


 
      echo "<center><form name=f method=post action=category.php>
      <table>
      <tr>
        <th colspan=2> Category</th>
      </tr>
      <tr>
      <th> ID </th>
      <th><input type=text name=t1 value=$ob->p></th>
      </tr>
      <th>Name </th>
      <th><input type=text name=t2 ></th>
      </tr>
      <tr>
      <th colspan=2><input type=submit value='Save' name=b1>
                    <input type=submit name=b2 value='Delete'>
		     <input type=submit name=b3 value='Update'>
                     <input type=submit name=b4 value='AllSearch'>
                     <input type=submit name=b5 value='PSearch'>
                     <input type=submit name=b6 value= 'New'>
			 <input type=submit name=b7 value= 'Select'>
			
      </th>
      </tr>
      </form>
      </table>
	
    ";
?>