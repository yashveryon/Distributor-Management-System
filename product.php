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
  width:100;
}
#bg {
  background: url(pic6.jpg);
  background-repeat: no-repeat;
  background-size: 1400px 1400px;
}

</style>
</head>
<?php
$t="";
include 'connect.php';
class product extends connect
{
	public $p=0;
	public $pid="P00";
	public $sn="";
        public $st="";

	public function __construct()
	{
		parent::__construct();
	}
	public function save()
	{
		if($this->db_handle)
		{
			
			
			$sql="insert into product values('$_POST[t1]','$_POST[t2]','$_POST[s1]','$_POST[s2]','$_POST[s3]','$_POST[s4]'
                                                         ,'$_POST[s5]','$_POST[t8]')";
			mysqli_query($this->db_handle,$sql);
			echo"<script language=javascript> alert('Record save')</script>";
		}

	}

         public function new()
        {
         if($this->db_handle)
		{
			$result=mysqli_query($this->db_handle,"select proid from idgen");

		        while($db_field=mysqli_fetch_assoc($result))
			{
				
				$this->p=$db_field['proid'];
				$this->pid=($this->pid).($this->p);
				$this->p++;
				
			}	
				

	 		$sql="update idgen set proid=".$this->p;
			mysqli_query($this->db_handle,$sql);
			
		}
           }
public function delete()
 	{
         if($this->db_handle)
		{
			$sql="delete from product where id='$_POST[t1]'";
			mysqli_query($this->db_handle,$sql);
			echo"<script> alert('Record deleted')</script>";
		}
	}
public function update()
 	{
         if($this->db_handle)
		{
			$sql="update product set serial_number='$_POST[t2]',product_type_id='$_POST[s1]',category_id='$_POST[s2]'
                                                       ,manufacturer_id='$_POST[s3]',vendor_id='$_POST[s4]',purchase_id='$_POST[s5]',status_type='$_POST[t8]'  where id='$_POST[t1]'";
			mysqli_query($this->db_handle,$sql);
			echo"<script> alert('Record updated')</script>";
		}
	}
public function upsearch()
	{
         if($this->db_handle)
		{
			$result=mysqli_query($this->db_handle,"select*from product where id='$_POST[t1]' ");
			$this->pid=$_POST["t1"];


			while($db_field=mysqli_fetch_assoc($result))
			{
			    $this->sn=$db_field['serial_number'];
			    $this->st=$db_field['status_type'];
                            
			
			}
			

			$sql="update product set serial_number=$this->sn,status_type=$this->st where id=$this->pid";
			mysqli_query($this->db_handle,$sql);
			
		}
	}
public function allsearch()
	{
		$result=mysqli_query($this->db_handle,"select*from product");
		print"<table border=1>;
		<tr>
			<th>ID</th>
			<th>Serial Number</th>
			<th>Product Type ID</th>
			<th>Category ID</th>
			<th>Manufacturer ID</th>
			<th>Vendor ID</th>
			<th>Purchase ID</th>
			<th>Status Type</th>
			
			
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
			print"<tr>";
			print"<td>".$db_field['id']."</td>";
			print"<td>".$db_field['serial_number']."</td>";
			print"<td>".$db_field['product_type_id']."</td>";
			print"<td>".$db_field['category_id']."</td>";
			print"<td>".$db_field['manufacturer_id']."</td>";
			print"<td>".$db_field['vendor_id']."</td>";
			print"<td>".$db_field['purchase_id']."</td>";
			print"<td>".$db_field['status_type']."</td>";
			
			print"<tr>";
		}
	}
public function psearch()
	{
		$result=mysqli_query($this->db_handle,"select*from product where id='$_POST[t1]'");
		print"<table border=1>;
		<tr>
			<th>ID</th>
			<th>Serial Number</th>
			<th>Product Type ID</th>
			<th>Category ID</th>
			<th>Manufacturer ID</th>
			<th>Vendor ID</th>
			<th>Purchase ID</th>
			<th>Status Type</th>
			
			
			
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
			
		print"<tr>";
			print"<td>".$db_field['serial_number']."</td>";
			print"<td>".$db_field['product_type_id']."</td>";
			print"<td>".$db_field['category_id']."</td>";
			print"<td>".$db_field['manufacturer_id']."</td>";
			print"<td>".$db_field['vendor_id']."</td>";
			print"<td>".$db_field['purchase_id']."</td>";
			print"<td>".$db_field['status_type']."</td>";
			print"<tr>";
		}
	}
	
}
$ob=new product();
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


 
 echo"<center><form name=f method=post action=product.php>
 <body id=bg>
      <table >
      <tr>
        <th colspan=8><u><b> <font size=50 color=red >Product </th>
      </tr>
      <tr>
      <th><h3><p align=left> ID </h3></th>
      <th><input type=text name=t1 value=$ob->pid id=input1></th>
      </tr>
      <th><h3><p align=left> Serial Number</h3></th>
      <th><input type=text name=t2 id=input1 value=$ob->sn></th>
      </tr>
      <tr>
      <th><h3><p align=left>Product Type ID </h3></th>
       <th>";           $db_handle=mysqli_connect("localhost","root","","distributor");
			$result=mysqli_query($db_handle,"select*from product_type");
			echo "<body>
					<form name=frm method=post action=product.php >
					<select name=s1 id=box>
					<option>Select the Product Type</option>";
					while($db_field=mysqli_fetch_assoc($result))
					{
						$t=$db_field['id'];
						echo "<option>$t</option>";
					}
					echo "</select></body> </th> ";			
     echo "</tr>
      <tr>
      <th><h3><p align=left>Category ID </h3></th>
             <th>";           $db_handle=mysqli_connect("localhost","root","","distributor");
			$result1=mysqli_query($db_handle,"select*from category");
			echo "<body>
					<form name=frm method=post action=product.php >
					<select name=s2 id=box>
					<option>Select the Category ID</option>";
					while($db_field=mysqli_fetch_assoc($result1))
					{
						$a=$db_field['id'];
						echo "<option>$a</option>";
					}
					echo "</select></body> </th> ";			
     echo "</tr>
      
<tr>
      <th><h3><p align=left>Manufacturer ID </h3></th>
                  <th>";           $db_handle=mysqli_connect("localhost","root","","distributor");
			$result2=mysqli_query($db_handle,"select*from manufacturer");
			echo "<body>
					<form name=frm method=post action=product.php >
					<select name=s3 id=box>
					<option>Select the Manufacturer ID</option>";
					while($db_field=mysqli_fetch_assoc($result2))
					{
						$b=$db_field['id'];
						echo "<option>$b</option>";
					}
					echo "</select></body> </th> ";			
     echo "</tr>
     
<tr>
      <th><h3><p align=left>Vendor ID</h3> </th>
                  <th>";           $db_handle=mysqli_connect("localhost","root","","distributor");
			$result3=mysqli_query($db_handle,"select*from vendor");
			echo "<body>
					<form name=frm method=post action=product.php >
					<select name=s4 id=box>
					<option>Select the Vendor ID</option>";
					while($db_field=mysqli_fetch_assoc($result3))
					{
						$c=$db_field['id'];
						echo "<option>$c</option>";
					}
					echo "</select></body> </th> ";			
     echo "</tr>
      
      </tr>
<tr>
      <th><h3><p align=left>Purchase ID</h3> </th>
                  <th>";           $db_handle=mysqli_connect("localhost","root","","distributor");
			$result4=mysqli_query($db_handle,"select*from Purchase");
			echo "<body>
					<form name=frm method=post action=product.php >
					<select name=s5 id=box>
					<option>Select the Purchase ID</option>";
					while($db_field=mysqli_fetch_assoc($result4))
					{
						$d=$db_field['id'];
						echo "<option>$d</option>";
					}
					echo "</select></body> </th> ";			
     echo "</tr>
    
      </tr>
<tr>
      <th><h3><p align=left>Status Type </h3></th>
      <th><input type=text name=t8 id=input1 value=$ob->st></th>
      </tr>
      <tr>
      <th colspan=8>
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