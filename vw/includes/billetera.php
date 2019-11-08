<?php
$uid=$_SESSION['uid'];
$sql = mysqli_query($con, "SELECT * FROM billetera where usuario = $uid");
while($row1 = mysqli_fetch_array($sql)){
$bid = $row1['id'];
}
$sql = mysqli_query($con, "SELECT * FROM billeteradetalle where billetera = $bid");
while($row1 = mysqli_fetch_array($sql)){
$din = $row1['dinero'];
}
?>