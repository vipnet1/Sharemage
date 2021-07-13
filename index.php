
<?php
include "header.php";
include_once "includes/db.conn.php";
?>

<div id="mainImgPrev">

<?php

$sql = "SELECT * FROM image;";

$result = mysqli_query($conn, $sql);

if(!$result)
{
    echo 'Problem In Loading Images!';
}

while($row = mysqli_fetch_assoc($result)) {

    $var = 'includes/uploads/'.$row['name'];
    $author = $row['author'];

    echo '<div class="imgDiv">
    <a href='.$var.' download>
    <img class="img" width="200" height="200" src='.$var.' >
    </a>
    <p>'.$row["tag1"].", ".$row["tag2"].", ".$row["tag3"].'<br><br>Author:&nbsp&nbsp '.$author.'</p>
    
    </div>';
}


?>

</div>

</body>

</html>