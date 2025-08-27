<head>
<style> 
#input1
 {
  width: 50%;
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
#bg {
  background: url(pic11.jpg);
  background-repeat: no-repeat;
  background-size: 1400px 700px;
}
</style>
</head>
<?php
include 'connect.php';
class manufacturer extends connect
{
	public $p=0;
	public $mid="M00";
        public $nm="";
        public $cn="";

	public function __construct()
	{
		parent::__construct();
	}
	public function save()
	{
		if($this->db_handle)
		{
			
			$sql="insert into manufacturer values('$_POST[t1]','$_POST[t2]','$_POST[t3]')";
			mysqli_query($this->db_handle,$sql);
			echo"<script language=javascript> alert('Record save')</script>";
		}

	}
   
 public function new()
        {
         if($this->db_handle)
		{
			$result=mysqli_query($this->db_handle,"select manuid from idgen");

		        while($db_field=mysqli_fetch_assoc($result))
			{
				
				$this->p=$db_field['manuid'];
				$this->mid=($this->mid).($this->p);
				$this->p++;
				
			}	
				

	 		$sql="update idgen set manuid=".$this->p;
			mysqli_query($this->db_handle,$sql);
			
		}
           }
public function delete()
 	{
         if($this->db_handle)
		{
			$sql="delete from manufacturer where id='$_POST[t1]'";
			mysqli_query($this->db_handle,$sql);
			echo"<script> alert('Record deleted')</script>";
		}
	}
public function update()
 	{
         if($this->db_handle)
		{
			$sql="update manufacturer set name='$_POST[t2]',contactNumber='$_POST[t3]'";
			mysqli_query($this->db_handle,$sql);
			echo"<script> alert('Record updated')</script>";
		}
	}
public function upsearch()
	{
         if($this->db_handle)
		{
			$result=mysqli_query($this->db_handle,"select*from manufacturer where id='$_POST[t1]' ");
			$this->mid=$_POST["t1"];
			while($db_field=mysqli_fetch_assoc($result))
			{
			    $this->nm=$db_field['name'];
			    $this->cn=$db_field['contactNumber'];
                           
			
			}
			
     
			$sql="update manufacturer set name='$_POST[t2]',contactNumber='$_POST[t3]' where id=$this->mid";
			mysqli_query($this->db_handle,$sql);
			
		}
	}
public function allsearch()
	{
		$result=mysqli_query($this->db_handle,"select*from manufacturer");
		print"<table border=1>;
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Contact Number</th>
			
			
			
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
			print"<tr>";
			print"<td>".$db_field['id']."</td>";
			print"<td>".$db_field['name']."</td>";
			print"<td>".$db_field['contactNumber']."</td>";
			
			
			print"<tr>";
		}
	}
public function psearch()
	{
		$result=mysqli_query($this->db_handle,"select*from manufacturer where id='$_POST[t1]'");
		print"<table border=1>;
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Contact Number</th>
			
			
			
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
			print"<tr>";
			print"<td>".$db_field['id']."</td>";
			print"<td>".$db_field['name']."</td>";
			print"<td>".$db_field['contactNumber']."</td>";
			
			print"<tr>";
		}
	}
	
}
$ob=new manufacturer();
if(isset($_REQUEST["bsave"]))
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
 
 echo"<center><form name=f method=post action=manufacturer.php>
 <body id=bg>
      <table>
      <tr>
        <th colspan=3><font size=50 color= darkblue style='Mongolian Baiti'><u><b> Manufacturer </th>
      </tr>
      <tr>
      <th><p align=left><font size=5> ID </th><br>
      <th><input type=text name=t1 id=input1 value=$ob->mid></th>
      </tr>
      <th> <p align=left><font size=5>Name</th>
      <th><input type=text name=t2 id=input1 value=$ob->nm ></th>
      </tr>
      <tr>
      <th><p align=left><font size=5> Contact Number </th>
      <th><input type=number name=t3 id=input1 value=$ob->cn></th>
      </tr>

      <tr>
      <th colspan=3>
<input type=submit value='New' name=b6 id=btn>
<input type=submit value='Save' name=bsave id=btn>
<input type=submit value='Delete' name=b2 id=btn>
<input type=submit value='Update' name=b3 id=btn>
<input type=submit value='All Search' name=b4 id=btn>
<input type=submit value='P Search' name=b5 id=btn>
<input type=submit value='Update Search' name=b7 id=btn></th>
      </tr>
      </form>
      </table>
	
";
?>