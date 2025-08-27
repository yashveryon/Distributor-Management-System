<head>
<style> 

#input2[type="date"]::-webkit-clear-button {
    display: none;
}


#input2[type="date"]::-webkit-inner-spin-button { 
    display: none;
}

#input2[type="date"]::-webkit-calendar-picker-indicator {
    color: #2c3e50;
}


#input2[type="date"] {
    appearance: none;
    -webkit-appearance: none;
    color: #95a5a6;
    font-family: "Helvetica", arial, sans-serif;
    font-size: 18px;
    border:1px solid #ecf0f1;
    background:#ecf0f1;
    padding:5px;
    display: inline-block !important;
    visibility: visible !important;
}

#input2[type="date"], focus {
    color: #95a5a6;
    box-shadow: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
}
#input1
 {
  width: 60%;
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
  background: url(pic5.jpg);
  background-repeat: no-repeat;
  background-size: 1400px 700px;
}
</style>
</head>
<?php
include 'connect.php';
class vendor extends connect
{
	public $p=0;
	public $vid="V00";
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
			
			$sql="insert into vendor values('$_POST[t1]','$_POST[t2]','$_POST[t3]')";
			mysqli_query($this->db_handle,$sql);
			echo"<script language=javascript> alert('Record save')</script>";
		}

	}
public function delete()
 	{
         if($this->db_handle)
		{
			$sql="delete from vendor where id='$_POST[t1]'";
			mysqli_query($this->db_handle,$sql);
			echo"<script> alert('Record deleted')</script>";
		}
	}
public function update()
 	{
         if($this->db_handle)
		{
			$sql="update vendor set name='$_POST[t2]',contact_number='$_POST[t3]'  where id='$_POST[t1]'";
			mysqli_query($this->db_handle,$sql);
			echo"<script> alert('Record updated')</script>";
		}
	}
public function upsearch()
	{
         if($this->db_handle)
		{
			$result=mysqli_query($this->db_handle,"select*from vendor where id='$_POST[t1]' ");
			$this->vid=$_POST["t1"];
			while($db_field=mysqli_fetch_assoc($result))
			{
			    $this->nm=$db_field['name'];
			    $this->cn=$db_field['contact_number'];
                          
			
			}
			
     
			$sql="update vendor set name=$this->nm, contact_number=$this->cn where id=$this->vid";
			mysqli_query($this->db_handle,$sql);
			
		}
	}
		
public function allsearch()
	{
		$result=mysqli_query($this->db_handle,"select*from vendor");
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
			print"<td>".$db_field['contact_number']."</td>";
			
			
			print"<tr>";
		}
	}
       public function new()
        {
         if($this->db_handle)
		{
			$result=mysqli_query($this->db_handle,"select venid from idgen");

		        while($db_field=mysqli_fetch_assoc($result))
			{
				
				$this->p=$db_field['venid'];
				$this->vid=($this->vid).($this->p);
				$this->p++;
				
			}	
				

	 		$sql="update idgen set venid=".$this->p;
			mysqli_query($this->db_handle,$sql);
			
		}
           }
public function psearch()
	{
		$result=mysqli_query($this->db_handle,"select*from vendor where id='$_POST[t1]'");
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
			print"<td>".$db_field['contact_number']."</td>";
		
			print"<tr>";
		}
	}
	
}
$ob=new vendor();
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


 
 echo"<center><form name=f method=post action=vendor.php>
 <body id=bg>
      <table >
      <tr>
        <th colspan=3><u><b><font size=50 color=red> Vendor</th>
      </tr>
      <tr>
      <th> <p align=left> <font size=5> ID </th>
      <th><input type=text name=t1 id=input1 value=$ob->vid ></th>
      </tr>
      <th><p align=left><font size=5> Name </th>
      <th><input type=text name=t2 id=input1 value=$ob->nm ></th>
      </tr>
      <tr>
      <th><p align=left><font size=5>Contact Number </th>
      <th><input type=number name=t3  id=input1 value=$ob->cn></th>
      </tr>
      <tr>
      <th colspan=3>
<input type=submit value='New' name=b6 id=btn>
<input type=submit value='Save' name=b1 id=btn>
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