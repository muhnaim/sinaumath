<?php 
//requiure dependensi
require('component/config.php'); 



$stmt = $db->prepare('SELECT * FROM kategori WHERE nama_kategori  = :nama_kategori');
$stmt->execute(array(':nama_kategori' => $_GET['sub']));
$rows = $stmt->fetch();

$sql2 = $db->prepare("SELECT postTitle, category, postID FROM blog_posts WHERE category = :category");
$sql2->execute(array(':category' => $rows['id_kategori']));
        

if(empty($_GET['sub']) || $_GET['sub'] !== $rows['nama_kategori']){
	header('Location: ./');
	exit;
}  
$title = 'Kategori untuk ' .$rows['nama_kategori'];
require_once 'views/header_page.php';

?>
    <div class="result kategori"> Kategori : 
    <?php
         echo "<a class='uppercase' href='#'>". $rows['nama_kategori'] ."</a>  </div>";
         echo "<br/><ul class='kategori'>";

       
        while($w = $sql2->fetch()) {     

            echo "<li><a href='". $base ."/show/tentang/".$w['postID']."'>".$w['postTitle']."</a> - <span>Views On videos</span></li>";
        }
        echo "</ul>";
    ?>
  