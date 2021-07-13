<?php

include "db.conn.php";

session_start();

if(empty($_POST['tag1']) or empty($_POST['tag2']) or empty($_POST['tag3'])) {
    header("Location: ../upload.php?warning=tagsEmpty");
    exit();
}

$file = $_FILES['file'];

print_r($file);

$allowed = array('png', 'jpg', 'jpeg');

$var = explode(".", $file['name']);
$type = end($var);

echo $type;

if(!in_array($type, $allowed)) {
    header("Location: ../upload.php?error=fileTypeNotSupported");
    exit();
} else if($file['size'] > 1000000) {
    header("Location: ../upload.php?error=fileTooBig");
    exit();
} else if($file['error'] != 0) {
    header("Location: ../upload.php?error=problemInUploadingFile");
    exit();
}


$fileFutureName = uniqid('', true).'.'.$type;
$fileDestination = 'uploads/'.$fileFutureName;

move_uploaded_file($file['tmp_name'], $fileDestination);

echo date("dmY");

$stmt = mysqli_stmt_init($conn);
$sql = "INSERT INTO image(name, author, tag1, tag2, tag3) VALUES(?, ?, ?, ?, ?)";

if(!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../upload.php?error=unknowsError");
    exit();
}

mysqli_stmt_bind_param($stmt, "sssss", $fileFutureName, $_SESSION['nickname'], $_POST['tag1'], $_POST['tag2'], $_POST['tag3']);
mysqli_stmt_execute($stmt);


header("Location: ../upload.php?success");


