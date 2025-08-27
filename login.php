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
#header {
  padding: 05px;
  text-align: center;
  background: #1abc9c;
  color: white;
  font-size: 20px;
}
#bg {
  background: url(pic13.jpg);
  background-repeat: no-repeat;
  background-size: 1400px 800px;
}
#footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #1abc9c;
   color: black;
   text-align: center;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
#column {
  float: bottom;
  width: 70%;
  padding: 100px;
}

/* Clear floats after the columns */
#row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width:1200px) {
  #column {
    width: 100%;
}

</style>
</head>
<?php
include 'connect.php';
class login extends connect
{
public function __construct()
	{
		parent::__construct();
	}

 public function login()
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
   if($f==1 && $c>0)
   {
        $sql="update mylogin set counter=counter-1 where id='$userid' and pwd= '$pass'";
	mysqli_query($this->db_handle,$sql);
        
	echo"<script> window.open('menu.php','_self')</script>";
   }
    
   else if($f==0)
       echo "Invalid id or password";
   else if($c==0)
   {
	echo "Please re-register"; 
	echo"<script> window.close()</script>";
   }
  }
 }
 public function admin()
 {
   if($this->db_handle)
    {
      echo"<script> window.open('admin.php')</script>";
    }
 }




}
$ob=new login();
if(isset($_REQUEST["b1"]))
	$ob->login();
if(isset($_REQUEST["b2"]))
	$ob->admin();


echo "<form name=f method=post action=login.php> 
 <body id=bg >

    <ul>
  	<li><a id='active' href=#home>Home</a></li>
  	<li><a href=#news>News</a></li>
  	<li><a href=#contact>Contact</a></li>
  	<li><a href=#about>About</a></li>
  	<li><a href=#help>Help</a></li>
    </ul>
<div id=header>
  	<h1>WELCOME</h1>
  	<p>DISTRIBUTOR MANAGEMENT SYSTEM</p>
</div>
<div id=footer>
  	<p>Contact: 7979914038</p>
  	<p>Email: yashveryonv16@gmail.com</p>
</div>




 <center><br><br>
  <table  ><br>
      <tr>
        <th colspan=2> <font size= 50 color = 'red' face='Elianto'><u> LOGIN </th>
      </tr>
      <tr>
      <th> <font size=5 color=white><p align=left> ID  </th>
      <th><input type=text name=t1 id=input1></th>
      </tr>
      <th><font size=5 color=white><p align=left>   Password </th>
      <th><input type=password name=t2 id=input1></th>
      </tr>
      <tr>
      <th colspan=2>
<input type=submit name=b1 value= 'Login' id=btn >
<input type=submit name=b2 value= 'Admin Page' id=btn></th>
</tr>
<tr>
</tr>
</table>

";
?>