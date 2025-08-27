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
  background: url(pic9.jpg);
  background-repeat: no-repeat;
  background-size: 1400px 700px;
}
</style>
</head>
<?php
$t="";
include 'connect.php';

			
class transaction extends connect
{
	public $p=0;
	public $tid="T00";
	public $isd="";
        public $rd="";

	public function __construct()
	{
		parent::__construct();
	}
	public function save()
	{
		if($this->db_handle)
		{
			
			$sql="insert into transaction values('$_POST[t1]','$_POST[s1]','$_POST[s2]','$_POST[t4]','$_POST[t5]')";
			mysqli_query($this->db_handle,$sql);
			echo"<script language=javascript> alert('Record save')</script>";
		}

	}
public function delete()
 	{
         if($this->db_handle)
		{
			$sql="delete from transaction where id='$_POST[t1]'";
			mysqli_query($this->db_handle,$sql);
			echo"<script> alert('Record deleted')</script>";
		}
	}
 public function new()
        {
         if($this->db_handle)
		{
			$result=mysqli_query($this->db_handle,"select transid from idgen");

		        while($db_field=mysqli_fetch_assoc($result))
			{
				
				$this->p=$db_field['transid'];
				$this->tid=($this->tid).($this->p);
				$this->p++;
				
			}	
				

	 		$sql="update idgen set transid=".$this->p;
			mysqli_query($this->db_handle,$sql);
			
		}
           }
public function update()
 	{
         if($this->db_handle)
		{
			$sql="update transaction set employee_id='$_POST[s1]',product_id='$_POST[s2]' ,product_issueDate='$_POST[t4]' 
							,product_returnDate='$_POST[t5]'where id='$_POST[t1]'";
			mysqli_query($this->db_handle,$sql);
			echo"<script> alert('Record updated')</script>";
		}
	}
public function upsearch()
	{
         if($this->db_handle)
		{
			$result=mysqli_query($this->db_handle,"select*from transaction where id='$_POST[t1]' ");
			$this->tid=$_POST["t1"];
			while($db_field=mysqli_fetch_assoc($result))
			{
			    $this->isd=$db_field['product_issueDate'];
			    $this->rd=$db_field['product_returnDate'];
                            
			
			}
			
     
			$sql="update transaction set product_issueDate=$this->isd, product_returnDate=$this->rd, where id=$this->tid";
			mysqli_query($this->db_handle,$sql);
			
		}
	}
public function allsearch()
	{
		$result=mysqli_query($this->db_handle,"select*from transaction");
		print"<table border=1>;
		<tr>
			<th>ID</th>
			<th>Employee ID</th>
			<th>Product ID</th>
			<th>Prouct Issue Date</th>
			<th>Product Return Date</th>
			
			
			
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
			print"<tr>";
			print"<td>".$db_field['id']."</td>";
			print"<td>".$db_field['employee_id']."</td>";
			print"<td>".$db_field['product_id']."</td>";
			print"<td>".$db_field['product_issueDate']."</td>";
			print"<td>".$db_field['product_returnDate']."</td>";
			
			
			print"<tr>";
		}
	}
public function psearch()
	{
		$result=mysqli_query($this->db_handle,"select*from transaction where id='$_POST[t1]'");
		print"<table border=1>;
		<tr>
			<th>ID</th>
			<th>Employee ID</th>
			<th>Product ID</th>
			<th>Prouct Issue Date</th>
			<th>Product Return Date</th>
			
			
			
		</tr>";
		while($db_field=mysqli_fetch_assoc($result))
		{
			print"<tr>";
			print"<td>".$db_field['id']."</td>";
			print"<td>".$db_field['employee_id']."</td>";
			print"<td>".$db_field['product_id']."</td>";
			print"<td>".$db_field['product_issueDate']."</td>";
			print"<td>".$db_field['product_returnDate']."</td>";
		
			print"<tr>";
		}
	}
	
}
$ob=new transaction();
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

 
 echo"<center><form name=f method=post action=transaction.php>
<body id=bg>
      <table>

      <tr>
        <th colspan=5><u><b><font size=50 color=red> Transaction </th>
      </tr>
      <tr>
      <th><font size=5> <p align=left> ID</th>
      <th><input type=text name=t1 id=input1 value=$ob->tid></th>
      </tr>
      <th><font size=5> <p align=left>Employee ID</th>
<th>";           $db_handle=mysqli_connect("localhost","root","","distributor");
			$result=mysqli_query($db_handle,"select*from employee");
			echo "<body>
					<form name=frm method=post action=transaction.php >
					<select name=s1 id=box>
					<option>Select the Employee ID</option>";
					while($db_field=mysqli_fetch_assoc($result))
					{
						$a=$db_field['id'];
						echo "<option>$a</option>";
					}
					echo "</select></body> </th> ";			
     echo "</tr>
      </tr>
      <tr>
      <th><font size=5> <p align=left>Product ID </th>
      <th>";           $db_handle=mysqli_connect("localhost","root","","distributor");
			$result1=mysqli_query($db_handle,"select*from product");
			echo "<body>
					<form name=frm method=post action=transaction.php >
					<select name=s2 id=box>
					<option>Select the Product ID</option>";
					while($db_field=mysqli_fetch_assoc($result1))
					{
						$b=$db_field['id'];
						echo "<option>$b</option>";
					}
					echo "</select></body> </th> ";			
     echo "</tr>
      </tr>
<tr>
      <th><font size=5> <p align=left>Product Issue Date </th>
      <th><input type=date id=input1 name=t4 value=$ob->isd></th>
      </tr>
<tr>
      <th><font size=5> <p align=left>Product Return Date </th>
      <th><input type=date id=input1 name=t5 value=$ob->rd></th>
      </tr>

      <tr>
      <th colspan=5>
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