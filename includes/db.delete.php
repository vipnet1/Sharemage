<?php

include_once 'db.conn.php';

if(!isset($_POST['checkDelete'])) {
    header("Location: ../manager.php?checkbox not selected");
    exit();
}

$fileName = $_POST['imgName'];
$imgFullPath = 'uploads/'.$fileName;

$sql = "DELETE FROM image WHERE name='".$fileName."';";
$result = mysqli_query($conn, $sql);
unlink($imgFullPath);

header("Location: ../manager.php?delete=success");