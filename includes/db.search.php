<?php

include_once 'db.conn.php';

$stmt = mysqli_stmt_init($conn);
$sql = "SELECT * FROM image WHERE tag1 LIKE ? OR tag2 LIKE ? OR tag3 LIKE ?;";
mysqli_stmt_prepare($stmt, $sql);
$var = '%'.$_GET['searchfield'].'%';
mysqli_stmt_bind_param($stmt, "sss", $var, $var, $var);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$arr = array();

while($row = mysqli_fetch_assoc($result)) {
    array_push($arr, $row);
}

session_start();

$_SESSION['searchRes'] = $arr;
header("Location: ../search.php");