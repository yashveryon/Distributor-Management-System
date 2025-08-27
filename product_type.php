<head>
<style> 
      #box {
        width: 220px;
        height: 30px;
        border: 1px solid #999;
        font-size: 18px;
        color: #;
        background-color: #eee;
        border-radius: 5px;
        box-shadow: 3px 3px #FF0C00;
      }
   
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
 		
class product_type extends connect
{
        public $p=0;
        public $pid="PT00";
	public $nm="";
	public function __construct()
	{
		parent::__construct();
	}
	public function save()
	{
		if($this->db_handle)
		{
			
			$sql="insert into product_type values('$_POST[t1]','$_POST[t2]','$_POST[s1]')";
			mysqli_query($this->db_handle,$sql);
			echo"<script language=javascript> alert('Record save')</script>";
		}

	}

  public function new()
        {
         if($this->db_handle)
		{
			$result=mysqli_query($this->db_handle,"select protypid from idgen");

		        while($db_field=mysqli_fetch_assoc($result))
			{
				
				$this->p=$db_field['protypid'];
				$this->pid=($this->pid).($this->p);
				$this->p++;
				
			}	
				

	 		$sql="update idgen set protypid=".$this->p;
			mysqli_query($this->db_handle,$sql);
			
		}
           }
public function delete()
 	{
         if($this->db_handle)
		{
			$sql="delete from product_type where id='$_POST[t1]'";
			mysqli_query($this->db_handle,$sql);
			echo"<script> alert('Record deleted')</script>";
		}
	}
public function update()
 	{
         if($this->db_handle)
		{
			$sql="update product_type set name='$_POST[t2]',category_id='$_POST[s1]'  where id='$_POST[t1]'";
			mysqli_query($this->db_handle,$sql);
			echo"<script> alert('Record updated')</script>";
		}
	}
public function upsearch()
	{
         if($this->db_handle)
		{
			$result=mysqli_query($this->db_handle,"select*from product_type where id='$_POST[t1]' ");
			$this->pid=$_POST["t1"];
			while($db_field=mysqli_fetch_assoc($result))
			{
			    $this->nm=$db_field['name'];
			    
			}
			
     
			$sql="update product_type set name='$_POST[t2]' where id=$this->pid";
			mysqli_query($this->db_handle,$sql);
			
		}
	}
public function allsearch()
	{
		$result=mysqli_query($this->db_handle,"select*from product_type");
		print"<table border=1>;
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Category ID</th>
			
			
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
			print"<tr>";
			print"<td>".$db_field['id']."</td>";
			print"<td>".$db_field['name']."</td>";
			print"<td>".$db_field['category_id']."</td>";
			
			print"<tr>";
		}
	}
public function psearch()
	{
		$result=mysqli_query($this->db_handle,"select*from product_type where id='$_POST[t1]'");
		print"<table border=1>;
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Category ID</th>
			
			
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
			print"<tr>";
			print"<td>".$db_field['id']."</td>";
			print"<td>".$db_field['name']."</td>";
			print"<td>".$db_field['category_id']."</td>";
			
			print"<tr>";
		}
	}
	
}
$ob=new product_type();
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


 
 echo"<center><form name=f method=post action=product_type.php>
<body background='pic3.jpg'>
      <table>
      <tr>
        <th colspan=3><b><u><font size=50 color=red> Product Type </th>
      </tr>
      <tr>
      <th> <h3><p align=left >ID </h3></th>
      <th><input type=text name=t1 id=input1 value=$ob->pid ></th>
      </tr>
      <th><h3><p align=left> Name </h3></th>
      <th><input type=text  name=t2 id=input1 value=$ob->nm></th>
      </tr>
      <tr>
      <th><h3><p align=left> Category ID </h3></th>
     <th>";           $db_handle=mysqli_connect("localhost","root","","distributor");
			$result=mysqli_query($db_handle,"select*from category");
			echo "<body>
					<form name=frm method=post action=product_type.php >
					<select name=s1 id=box>
					<option>Select the Category ID</option>";
					while($db_field=mysqli_fetch_assoc($result))
					{
						$b=$db_field['id'];
						echo "<option>$b</option>";
					}
					echo "</select></body> </th> ";			
     echo "</tr>
      <tr>
      <th colspan=3>
<input type=submit name=b6 value= 'New' id=btn>
<input type=submit value='Save' id=btn name=b1>
      <input type=submit value='Delete' name=b2 id=btn>
<input type=submit value='Update' name=b3 id=btn>
<input type=submit value='AllSearch' name=b4 id=btn>
<input type=submit value='PSearch' name=b5 id=btn>
<input type=submit value='Update Search' name=b7 id=btn></th>
      </tr>
      </form>
      </table>
	
";
  			
?>