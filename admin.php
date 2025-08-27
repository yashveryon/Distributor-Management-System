<head>
<style> 
#input1
 {
  width: 80%;
  padding: 8px 20px;
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
  background: url(pic15.jpg);
  background-repeat: no-repeat;
  background-size: 1400px 800px;
}
</style>
</head>
<?php
include 'connect.php';
class admin extends connect
{
public function __construct()
	{
		parent::__construct();
	}

 public function admin()
 {
   if($this->db_handle)
    {
   	$userid=$_POST['t1'];
   	$pass= $_POST['t2'];
	$f=0;
   	$store=mysqli_query($this->db_handle,"select * from admin");			
   	while($db_field=mysqli_fetch_assoc($store))
	{
	    if($db_field['id']==$userid)
            {
		if($db_field['pwd']==$pass)
                {
			$f=1;
                        break;
	
		}
            }
            
       } 
              if($f==1)
              {
                echo "<script> window.open('newlogin.php','_self')</script>";
              }
   }
 }
}

$ob=new admin();
if(isset($_REQUEST["b1"]))
	$ob->admin();



echo "<form name=f method=post action=admin.php> 
<center>
<body id=bg>

  <table >
      <tr>
        <th colspan=2> <font size= 50 color = 'dark blue' face='Elianto'><u>ADMIN</th>
      </tr>
      <tr>
      <th> <font size=5 color=white><p align=left>Admin ID </th>
      <th><input type=text name=t1 id=input1></th>
      </tr>
      <th> <font size=5 color=white><p align=left>Admin Password</th>
      <th><input type=text name=t2 id=input1></th>
      </tr>
      <tr>
      <th colspan=2>
<input type=submit name=b1 value= 'Login' id=btn ></th>
</tr>
</table>
";
?>