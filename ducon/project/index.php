<!doctype html>

<html>
<body>
<?php include 'function.php'?>
<h1>Enter Card Values here</h1>
<form method="POST">
<table border="0">
<tr><td>Card 1</td></tr>
<tr>
	<td>Location:<input type="text" name="loc1" value="Stockholm,NewYork"></td>
	<td>means of transportation <input type="text" name="transport1" value="train"></td>
	<td>seat assignment <input type="text" name="seat1" value="33A"></td>
</tr>


<tr><td>Card 2</td></tr>
<tr>
	<td>Location:<input type="text" name="loc2" value="Barcelona,Gerona">
	<td>means of transportation <input type="text" name="transport2" value="train"></td>
	<td>seat assignment <input type="text" name="seat2" value="43B"></td>
</tr>


<tr><td>Card 3</td></tr>
<tr>
	<td>Location:<input type="text" name="loc3" value="Gerona,Stockholm"></td>
	<td>means of transportation <input type="text" name="transport3" value="bus"></td>
	<td>seat assignment <input type="text" name="seat3" value="11004R"></td>
</tr>


<tr><td>Card 4</td></tr>
<tr>
	<td>Location:<input type="text" name="loc4" value="Madrid,Barcelona"></td>
	<td>means of transportation <input type="text" name="transport4" value="airport bus"></td>
	<td>seat assignment <input type="text" name="seat4" value="34C"></td>
</tr>
<tr>
<td>

<input type="submit" name="submit">
</td>
</tr>

</table>


</form>
</body>
</html>

<?php 
error_reporting(E_ERROR | E_PARSE);
if($_POST){
$code = new Task();
$boarding_cards=$code->getPost();


}
?>