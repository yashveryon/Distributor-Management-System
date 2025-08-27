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
  background: url(pic12.jpg);
  background-repeat: no-repeat;
  background-size: 1400px 700px;
}
</style>
</head>
<?php
include 'connect.php';
class purchase extends connect
{
	public $p=0;
	public $pid="P00";
	public $pr="";
	public $dp="";

	public function __construct()
	{
		parent::__construct();
	}
	public function save()
	{
		if($this->db_handle)
		{
			
			$sql="insert into purchase values('$_POST[t1]','$_POST[t2]','$_POST[t3]')";
			mysqli_query($this->db_handle,$sql);
			echo"<script language=javascript> alert('Record save')</script>";
		}

	}
public function new()
        {
         if($this->db_handle)
		{
			$result=mysqli_query($this->db_handle,"select purid from idgen");

		        while($db_field=mysqli_fetch_assoc($result))
			{
				
				$this->p=$db_field['purid'];
				$this->pid=($this->pid).($this->p);
				$this->p++;
				
			}	
				

	 		$sql="update idgen set purid=".$this->p;
			mysqli_query($this->db_handle,$sql);
			
		}
           }
	public function delete()
 	{
         if($this->db_handle)
		{
			$sql="delete from purchase where id='$_POST[t1]'";
			mysqli_query($this->db_handle,$sql);
			echo"<script> alert('Record deleted')</script>";
		}
	}
public function update()
 	{
         if($this->db_handle)
		{
			$sql="update purchase set dateOfPurchase='$_POST[t2]',price='$_POST[t2]'where id='$_POST[t1]'";
			mysqli_query($this->db_handle,$sql);
			echo"<script> alert('Record updated')</script>";
		}
	}
public function upsearch()
	{
         if($this->db_handle)
		{
			$result=mysqli_query($this->db_handle,"select*from purchase where id='$_POST[t1]' ");
			$this->pid=$_POST["t1"];
			while($db_field=mysqli_fetch_assoc($result))
			{
			    $this->pr=$db_field['price'];
			    $this->dp=$db_field['dateOfPurchase'];
			   
			
			}
			
     
			$sql="update purchase set price='$_POST[t3]',dateOfPurchase ='$_POST[t2]' where id=$this->pid";
			mysqli_query($this->db_handle,$sql);
			
		}
	}
public function allsearch()
	{
		$result=mysqli_query($this->db_handle,"select*from purchase");
		print"<table border=1>;
		<tr>
			<th>ID</th>
			<th>Date Of Purchase</th>
			<th>Price</th>
			
			
			
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
			print"<tr>";
			print"<td>".$db_field['id']."</td>";
			print"<td>".$db_field['dateOfPurchase']."</td>";
			print"<td>".$db_field['price']."</td>";
			
			
			print"<tr>";
		}
	}
public function psearch()
	{
		$result=mysqli_query($this->db_handle,"select*from purchase where id='$_POST[t1]'");
		print"<table border=1>;
		<tr>
			<th>ID</th>
			<th>Date Of Purchase</th>
			<th>Price</th>
			
			
			
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
			print"<tr>";
			print"<td>".$db_field['id']."</td>";
			print"<td>".$db_field['dateOfPurchase']."</td>";
			print"<td>".$db_field['price']."</td>";
			
			print"<tr>";
		}
	}
}
$ob=new purchase();
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
 
 echo"<center><form name=f method=post action=purchase.php>
 <body  id=bg>
      <table>
      <tr>
        <th colspan=3><font size=50 color=red><u> PURCHASE</th><br><p>
      </tr>
      <tr>
      <th><h3><p align=left> ID </h3></th><br><p>
      <th><input type=text name=t1 id=input1 value=$ob->pid></th><p>
      </tr>
      <th><h3><p align=left> Date Of Purchase</h3></th>
      <th><input type=date name=t2 id=input1 value=$ob->dp ></th>
      </tr>
      <tr>
      <th><h3><p align=left> Price </h3></th>
      <th><input type=number name=t3 id=input1 value=$ob->pr ></th>
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