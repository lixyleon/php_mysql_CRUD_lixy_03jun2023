<?php
include('database/db.php');
$id = $_GET['id'];
$query = "SELECT image FROM task WHERE id = $id";
$result = mysqli_query($conn, $query);
$imgData = mysqli_fetch_assoc($result);
header("Content-type: image/jpg");
echo $imgData['image'];

?>