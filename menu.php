<head>
<style>
#bg {
  background: url(pic16.jpg);
  background-repeat: no-repeat;
  background-size: 1400px 700px;
}
#header {
  padding: 05px;
  text-align: center;
  background: #1abc9c;
  color: red;
  font-size: 25px;
}
</style>
</head>
<?php
include 'connect.php';
echo "<body id=bg>
<div id=header>
  <h1>MENU</h1>
  <p>Select the given Menu</p>
</div>
<center>

<table>

<tr>
 
<th>    </th><th> 
</tr>
<tr>
<ul>
	 <th><p align=left><font size=6><a href=category.php> Category </a></th><br>
</ul>
</tr>
<tr> 
	<th><p align=left><font size=6 color='white'><a href=product_type.php> Product Type </a></th>
</tr>
<tr> 
	<th><p align=left><font size=6><a href=employee.php> Employee </a></th>
</tr>
<tr> 
	<th><p align=left><font size=6><a href=vendor.php> Vendor </a></th>
</tr>
<tr> 
	<th><p align=left><font size=6><a href=product.php> Product </a></th>
</tr>
<tr> 
	<th><p align=left><font size=6><a href=transaction.php> Transaction </a></th>
</tr>
<tr> 
	<th><p align=left><font size=6><a href=warranty.php> Warranty </a></th>
</tr>
<tr> 
	<th><p align=left><font size=6><a href=manufacturer.php> Manufacturer </a></th>
</tr>
<tr> 
	<th><p align=left><font size=6><a href=purchase.php> Purchase </a></th>
</tr>
</table>
</body>
";
?>