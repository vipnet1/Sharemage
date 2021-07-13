
<?php
include "header.php";
include_once "includes/db.conn.php";

$result = $_SESSION['searchRes'];
if(empty($result)) {
    echo "<p class='searchMsg'>"."No Results Found</p>";
}

$arr = $_SESSION['searchRes'];

$v = count($arr);
if($v !== 0) {
    echo '<p class = "searchMsg">'.$v.' Results Found</p>';
}

?>

<div id="mainImgPrev">

<?php

foreach($arr as $row) {

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