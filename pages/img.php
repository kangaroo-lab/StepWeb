<?php

$img_name = $_FILES['upimg']['name'];

//画像を保存
move_uploaded_file($_FILES['upimg']['tmp_name'], '../img/test/' . $img_name);

echo '<img src="upimg.php?img_name=' . $img_name . '">';

?>
