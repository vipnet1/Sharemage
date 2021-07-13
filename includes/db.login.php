<?php
include_once 'db.conn.php';

if(empty($_POST['username']) or empty($_POST['password'])) {
header("Location: ../login.php?login=fail");
exit();
}

$stmt = mysqli_stmt_init($conn);

$sql = 'SELECT * FROM usr WHERE username=? AND password=?;';

if(!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../login.php?login=fail");
    exit();
}

mysqli_stmt_bind_param($stmt, "ss", $_POST['username'], $_POST['password']);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result) == 1) {
    session_start();
    $row = mysqli_fetch_assoc($result);
    $_SESSION['nickname'] = $row['nickname'];
    $_SESSION['user'] = $_POST['username'];
    header("Location: ../index.php?login=success");
} else {
    header("Location: ../login.php?login=fail");
}