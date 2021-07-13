<?php
include_once 'db.conn.php';

if(empty($_POST['username']) or empty($_POST['password'])or empty($_POST['rpassword'])or empty($_POST['nickname']) or $_POST['password'] != $_POST['rpassword']) {
header("Location: ../index.php?signup=fail");
exit();
}

$stmt = mysqli_stmt_init($conn);
$sql = "SELECT * FROM usr WHERE username=?;";
if(!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../signup.php?signup=fail");
    exit();
}
mysqli_stmt_bind_param($stmt, "s", $_POST['username']);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
if(mysqli_num_rows($result) != 0) {
    header("Location: ../signup.php?signup = fail&Username exists");
    exit();
}


$stmt = mysqli_stmt_init($conn);
$sql = "SELECT * FROM usr WHERE nickname=?;";
if(!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../signup.php?signup=fail");
    exit();
}
mysqli_stmt_bind_param($stmt, "s", $_POST['nickname']);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
if(mysqli_num_rows($result) != 0) {
    header("Location: ../signup.php?signup = fail&Nickname exists");
    exit();
}


$stmt = mysqli_stmt_init($conn);

$sql = 'INSERT INTO usr(username, password, nickname) VALUES(?, ?, ?);';

if(!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../signup.php?signup=fail");
    exit();
}

mysqli_stmt_bind_param($stmt, "sss", $_POST['username'], $_POST['password'], $_POST['nickname']);
mysqli_stmt_execute($stmt);

session_start();

$_SESSION['nickname'] = $_POST['nickname'];
$_SESSION['user'] = $_POST['username'];

header("Location: ../index.php?signup=success");