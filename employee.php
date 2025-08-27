<head>
<style> 


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
  background: url(pic4.jpg);
  background-repeat: no-repeat;
  background-size: 1400px 700px;
}
</style>
</head>
<?php
include 'connect.php';
class employee extends connect
{
        public $p=0;
	public $eid="E00";
	public $nm="";
        public $dg="";
        public $em="" ;
        public $dj="" ;

	public function __construct()
	{
		parent::__construct();
	}
	public function save()
	{
		if($this->db_handle)
		{
			
			$sql="insert into employee values('$_POST[t1]','$_POST[t2]','$_POST[t3]','$_POST[t4]','$_POST[t5]')";
			mysqli_query($this->db_handle,$sql);
			echo"<script language=javascript> alert('Record save')</script>";
		}

	}
public function delete()
 	{
         if($this->db_handle)
		{
			$sql="delete from employee where id='$_POST[t1]'";
			mysqli_query($this->db_handle,$sql);
			echo"<script> alert('Record deleted')</script>";
		}
	}
public function update()
 	{
         if($this->db_handle)
		{
			$sql="update employee set name='$_POST[t2]',designation='$_POST[t3]',
                                                 date_of_joining='$_POST[t4]',email='$_POST[t5]'  where id='$_POST[t1]'";
			mysqli_query($this->db_handle,$sql);
			echo"<script> alert('Record updated')</script>";
		}
	}
public function upsearch()
	{
         if($this->db_handle)
		{
			$result=mysqli_query($this->db_handle,"select*from employee where id='$_POST[t1]' ");
			$this->eid=$_POST["t1"];
			while($db_field=mysqli_fetch_assoc($result))
			{
			    $this->nm=$db_field['name'];
			    $this->dg=$db_field['designation'];
                            $this->em=$db_field['email'];
                            $this->dj=$db_field['date_of_joining'];
			
			}
			
     
			$sql="update employee set name='$_POST[t2]',designation='$_POST[t3]',email='$_POST[t5]' where id=$this->eid";
			mysqli_query($this->db_handle,$sql);
			
		}
	}
			
public function allsearch()
	{
		$result=mysqli_query($this->db_handle,"select*from employee");
		print"<table border=1>;
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Designation</th>
			<th>Date Of Joining</th>
			<th>Email</th>
			
			
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
			print"<tr>";
			print"<td>".$db_field['id']."</td>";
			print"<td>".$db_field['name']."</td>";
			print"<td>".$db_field['designation']."</td>";
			print"<td>".$db_field['date_of_joining']."</td>";
			print"<td>".$db_field['email']."</td>";
			
			print"<tr>";
		}
	}
public function new()
        {
         if($this->db_handle)
		{
			$result=mysqli_query($this->db_handle,"select empid from idgen");

		        while($db_field=mysqli_fetch_assoc($result))
			{
				
				$this->p=$db_field['empid'];
				$this->eid=($this->eid).($this->p);
				$this->p++;
				
			}	
				

	 		$sql="update idgen set empid=".$this->p;
			mysqli_query($this->db_handle,$sql);
			
		}
           }

public function psearch()
	{
		$result=mysqli_query($this->db_handle,"select*from employee where id='$_POST[t1]'");
		print"<table border=1>;
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Designation</th>
			<th>Date Of Joining</th>
			<th>Email</th>
			
			
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
			print"<tr>";
			print"<td>".$db_field['id']."</td>";
			print"<td>".$db_field['name']."</td>";
			print"<td>".$db_field['designation']."</td>";
			print"<td>".$db_field['date_of_joining']."</td>";
			print"<td>".$db_field['email']."</td>";
			
			print"<tr>";
		}
	}
	
}
$ob=new employee();
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

     

 echo"<center><form name=f method=post action=employee.php>
       <body id=bg>
      <table>

      <tr>
        <th colspan=5><h1><u><b><font color=red size=50> Employee </h1></th>
      </tr>
      <tr>
      <th><p align=left><font size=5> ID</th>
      <th><input type=text name=t1 id=input1 value=$ob->eid ></th>
      </tr>
      <th><p align=left> <font size=5>Name</th>
      <th><input type=text name=t2 id=input1 value=$ob->nm ></th>
      </tr>
      <tr>
      <th><p align=left><font size=5> Designation </th>
      <th><input type=text name=t3 id=input1 value=$ob->dg></th>
      </tr>
<tr>
      <th><p align=left><font size=5>Date Of Joining </th>
      <th><input type=date name=t4 id=input1 value=$ob->dj>></th>
      </tr>
<tr>
      <th><p align=left><font size=5>Email </th>
      <th><input type=text name=t5 id=input1 value=$ob->em></th>
      </tr>

      <tr>
      <th colspan=5>
<input type=submit value='New' name=b6 id=btn>
<input type=submit value='Save' name=b1 id=btn>
<input type=submit value='Delete' name=b2 id=btn>
<input type=submit value='Update' name=b3 id=btn>
<input type=submit value='All Search' name=b4 id=btn>
<input type=submit value='P Search' name=b5 id=btn>
<input type=submit value='Update Search' name=b7 id=btn>
</th>
      </tr>
      </form>
      </table>
	
";
 		
?>