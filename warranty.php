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
  width: 55%;
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
  background: url(pic10.jpg);
  background-repeat: no-repeat;
  background-size: 1400px 700px;
}
</style>
</head>
<?php
include 'connect.php';
 			
class warranty extends connect
{
	public $p=0;
	public $wid="W00";
	public $ps="";

	public function __construct()
	{
		parent::__construct();
	}
	public function save()
       
	{
		if($this->db_handle)
		{  
			
			$sql="insert into warranty values('$_POST[t1]','$_POST[s1]','$_POST[s2]','$_POST[s3]','$_POST[s4]',
                                                           '$_POST[t6]','$_POST[t7]')";
			mysqli_query($this->db_handle,$sql);
			echo"<script language=javascript> alert('Record save')</script>";

		}

	}
 public function new()
        {
         if($this->db_handle)
		{
			$result=mysqli_query($this->db_handle,"select warid from idgen");

		        while($db_field=mysqli_fetch_assoc($result))
			{
				
				$this->p=$db_field['warid'];
				$this->wid=($this->wid).($this->p);
				$this->p++;
				
			}	
				

	 		$sql="update idgen set warid=".$this->p;
			mysqli_query($this->db_handle,$sql);
			
		}
           }
public function delete()
 	{
         if($this->db_handle)
		{
			$sql="delete from warranty where id='$_POST[t1]'";
			mysqli_query($this->db_handle,$sql);
			echo"<script> alert('Record deleted')</script>";
		}
	}
public function update()
 	{
         if($this->db_handle)
		{
			$sql="update warranty set product_id='$_POST[s1]',vendor_id='$_POST[s2]',manufacturer_id='$_POST[s3]',purchase_id='$_POST[s4]'
                                                       ,product_SerialNumber='$_POST[t6]',validity='$_POST[t7]'  where id='$_POST[t1]'";
			mysqli_query($this->db_handle,$sql);
			echo"<script> alert('Record updated')</script>";
		}
	}
public function upsearch()
	{
         if($this->db_handle)
		{
			$result=mysqli_query($this->db_handle,"select*from warranty where id='$_POST[t1]' ");
			$this->wid=$_POST["t1"];
			while($db_field=mysqli_fetch_assoc($result))
			{
			    $this->ps=$db_field['product__SerialNumber'];

			
			}
			
     
			$sql="update warranty set product__SerialNumber='$_POST[t6]' where id=$this->wid";
			mysqli_query($this->db_handle,$sql);
			
		}
	}
	
public function allsearch()
	{
		$result=mysqli_query($this->db_handle,"select*from warranty");
		print"<table border=1>;
		<tr>
			<th>ID</th>
			<th>Product ID</th>
			<th>Vendor ID</th>
			
			<th>Manufacturer ID</th>
			<th>Purchase ID</th>
			<th>Product Serial Number</th>
			<th>Validity</th>
			
			
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
			print"<tr>";
			print"<td>".$db_field['id']."</td>";
			
			print"<td>".$db_field['product_type_id']."</td>";
			print"<td>".$db_field['vendor_id']."</td>";
			print"<td>".$db_field['manufacturer_id']."</td>";
			
			print"<td>".$db_field['purchase_id']."</td>";
			print"<td>".$db_field['product_SerialNumber']."</td>";
			print"<td>".$db_field['validity']."</td>";
			print"<tr>";
		}
	}
public function psearch()
	{
		$result=mysqli_query($this->db_handle,"select*from warranty where id='$_POST[t1]'");
		print"<table border=1>;
		<tr>
			<th>ID</th>
			<th>Product ID</th>
			<th>Vendor ID</th>
			
			<th>Manufacturer ID</th>
			<th>Purchase ID</th>
			<th>Product Serial Number</th>
			<th>Validity</th>
			
			
			
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
			
		
			print"<tr>";
			print"<td>".$db_field['product_type_id']."</td>";
			print"<td>".$db_field['vendor_id']."</td>";
			print"<td>".$db_field['manufacturer_id']."</td>";
			
			print"<td>".$db_field['purchase_id']."</td>";
			print"<td>".$db_field['product_serialNumber']."</td>";
			print"<td>".$db_field['validity']."</td>";
			print"<tr>";
			
		}
	}
	
}
$ob=new warranty();
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

 echo"<center><form name=f method=post action=warranty.php>
 <body id=bg>
      <table >
      <tr>
        <th colspan=7><font size=50 color=red><u> Warranty</th>
      </tr>
      <tr>
      <th><font size=4><p align =left> ID </th>
      <th><input type=text name=t1 id=input1 value=$ob->wid></th>
      </tr>
      <th><font size=4><p align =left>Product ID</th>
<th>";           $db_handle=mysqli_connect("localhost","root","","distributor");
			$result=mysqli_query($db_handle,"select*from product");
			echo "<body>
					<form name=frm method=post action=warranty.php >
					<select name=s1 id=box>
					<option>Select the Product ID</option>";
					while($db_field=mysqli_fetch_assoc($result))
					{
						$t=$db_field['id'];
						echo "<option>$t</option>";
					}
					echo "</select></body> </th> ";			
     echo "</tr>
      </tr>
      <tr>
      <th><font size=4><p align =left>Vendor ID </th>
<th>";           $db_handle=mysqli_connect("localhost","root","","distributor");
			$result1=mysqli_query($db_handle,"select*from vendor");
			echo "<body>
					<form name=frm method=post action=warranty.php >
					<select name=s2 id=box>
					<option>Select the Vendor ID</option>";
					while($db_field=mysqli_fetch_assoc($result1))
					{
						$a=$db_field['id'];
						echo "<option>$a</option>";
					}
					echo "</select></body> </th> ";			
     echo "</tr>
      </tr>
<tr>
      <th><font size=4><p align =left>Manufacturer ID </th>
<th>";           $db_handle=mysqli_connect("localhost","root","","distributor");
			$result2=mysqli_query($db_handle,"select*from manufacturer");
			echo "<body>
					<form name=frm method=post action=warranty.php >
					<select name=s3 id=box>
					<option>Select the Vendor ID</option>";
					while($db_field=mysqli_fetch_assoc($result2))
					{
						$b=$db_field['id'];
						echo "<option>$b</option>";
					}
					echo "</select></body> </th> ";			
     echo "</tr>
      </tr>
<tr>
      <th><font size=4><p align =left>Purchase ID</th>
<th>";           $db_handle=mysqli_connect("localhost","root","","distributor");
			$result3=mysqli_query($db_handle,"select*from purchase");
			echo "<body>
					<form name=frm method=post action=warranty.php >
					<select name=s4 id=box>
					<option>Select the Purchase ID</option>";
					while($db_field=mysqli_fetch_assoc($result3))
					{
						$c=$db_field['id'];
						echo "<option>$c</option>";
					}
					echo "</select></body> </th> ";			
     echo "</tr>
      </tr>
<tr>
      <th><font size=4><p align =left>Product Serial Number</th>
      <th><input type=text name=t6 id=input1 value=$ob->ps></th>
      </tr>
<tr>
      <th><font size=4><p align =left>Validity </th>
      <th><input type=date name=t7 id=input1 ></th>
      </tr>

      <tr>
      <th colspan=7>
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