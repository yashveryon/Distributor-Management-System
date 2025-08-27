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
  padding: 15px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 2px 8px;
  cursor: pointer;
  font-weight: 400;
  height:50;
  width:150;
}
#bg {
  background: url(pic14.jpg);
  background-repeat: no-repeat;
  background-size: 1400px 700px;
}
</style>
</head>
<?php
include 'connect.php';
class newlogin extends connect
{
public function __construct()
	{
		parent::__construct();
	}
 
 public function newuser()
 {
   if($this->db_handle)
   {
	$f=0;
    $newid=$_POST['t1'];
    $newpass=$_POST['t2'];
    $store=mysqli_query($this->db_handle,"select * from mylogin");			
    while($db_field=mysqli_fetch_assoc($store))
    {
       	    if($db_field['id']==$newid)
            {
             
              $f=1;
            }
    }
    if($f==1)
	echo"<script language=javascript> alert('User Already Exist')</script>";
    else
    {
                        $sql="insert into mylogin values('$newid','$newpass',20)";
			mysqli_query($this->db_handle,$sql);
			echo"<script language=javascript> alert('New User Created')</script>";
                       
    }
     
   }
}

                 
   

 public function newlogin()
 {
   if($this->db_handle)
    {
   	$userid=$_POST['t1'];
   	$pass= $_POST['t2'];
	$f=0;
   	$store=mysqli_query($this->db_handle,"select * from mylogin");			
   	while($db_field=mysqli_fetch_assoc($store))
	{
	    if($db_field['id']==$userid)
            {
		if($db_field['pwd']==$pass)
                {
			$f=1;
			$c=$db_field['counter'];
			break;
		}
            }
            
       } 
 if($f==1)
   {
        $sql="update mylogin set counter=counter+50 where id='$userid'";
	mysqli_query($this->db_handle,$sql);
	echo"<script> window.open('menu.php','_self')</script>";
   }
 }
}
}


$ob=new newlogin();
if(isset($_REQUEST["b1"]))
	$ob->newlogin();
if(isset($_REQUEST["b2"]))
	$ob->newuser();

echo "<form name=f method=post action=newlogin.php> 
 <body id=bg>
 <center><br><br>
  <table >
      <tr>
        <th colspan=2><font size= 50 color = 'red' face='Elianto'><u>  New Login</th>
      </tr>
      <tr>
      <th><font size=5 color=white> ID </th>
      <th><input type=text name=t1 id=input1></th>
      </tr>
      <th><font size=5 color=white>Password </th>
      <th><input type=text name=t2 id=input1 ></th>
      </tr>
      <tr>
      <th colspan=2>
<input type=submit name=b1 value= 'Login' id=btn >
<th><input type=submit name=b2 value='Create New User' id=btn ></th>

</tr>
</table>
";
?>