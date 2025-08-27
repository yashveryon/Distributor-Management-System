<head>
<style> 
#input1
 {
  width: 30%;
  padding: 8px 16px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid red;
  border-radius: 4px;
 }
#btn
 {
  background-color: green;
  border: none;
  color: white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 2px 8px;
  cursor: pointer;
  font-weight: 400;
  height:50;
  width:120;
}
</style>
</head>
<?php

$t="";
include 'connect.php';
class category extends connect
{
	public $p=0;
	public $cid="C00";
	public $nm="";
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
				$this->cid=($this->cid).($this->p);
				$this->p++;
				
				
			}	
			$sql="update idgen set catid=".$this->p;
			mysqli_query($this->db_handle,$sql);
			
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
public function upsearch()
	{
         if($this->db_handle)
		{
			$result=mysqli_query($this->db_handle,"select*from category where id='$_POST[t1]' ");
  			$this->cid=$_POST["t1"];			
			while($db_field=mysqli_fetch_assoc($result))
			{
			    $this->nm=$db_field['name'];
			
			
			}

			$sql="update employee set name='$_POST[t2]' where id=$this->cid";
			mysqli_query($this->db_handle,$sql);
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
		
		
	}public function psearch()
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
	$ob->upsearch();
  
     
      
      echo "<center><form name=f method=post action=category.php>
      <body background='pic2.jpg'>
      <table >
      <tr>
        <th colspan=2><u><font color=red size=50> Category</th><br>
      </tr>
      <tr>
      <th><p align=left><font size=5 > ID </th>
      <th><input type=text name=t1 id=input1 value=$ob->cid></th>
      </tr>
      <th><p align=left><font size=5>Name </th>
      <th><input type=text name=t2 id=input1 value=$ob->nm></th>
      </tr>
      <tr>
      <th colspan=2>
<input type=submit name=b6 value= 'New' id=btn>
<input type=submit value='Save' name=b1 id=btn>
                    <input type=submit name=b2 value='Delete' id=btn>
		     <input type=submit name=b3 value='Update' id=btn>
                     <input type=submit name=b4 value='AllSearch' id=btn>
                     <input type=submit name=b5 value='PSearch' id=btn>
                     <input type=submit name=b7 value='Update Search' id=btn>
                     
	             
			
      </th>
      </tr>
      </form>
      </table>
      </body>
			
    ";
			
    			
			  
			     
			
      
?>
