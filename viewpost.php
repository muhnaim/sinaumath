<?php require('component/config.php'); 

$stmt = $db->prepare('SELECT * FROM blog_posts WHERE postID = :postID');
$stmt->execute(array(':postID' => $_GET['materi']));
$row = $stmt->fetch();


if(empty($_GET['materi']) || $_GET['materi'] !== $row['postID']){
	header('Location: ./');
	exit;
}

$query = $db->prepare('SELECT * FROM kategori WHERE id_kategori = '.$row["category"]);
$query->execute();
$r = $query->fetch();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog - <?php echo $row['postTitle'];?></title>
    <link rel="stylesheet" href="<?= asset('css', 'normalize', 'css') ?>">
    <link rel="stylesheet" href="<?= asset('css', 'main', 'css') ?>">
</head>
<body>
<div class="postTitle">

<h1 style="text-align:center;"><?= $row['postTitle'] ?></h1>
<p style="text-align:center;">untuk <span class="uppercase"><?= $r['nama_kategori'] ?></span> Posted on <?= date('jS M Y', strtotime($row['postDate'])) ?></p>
</div>
<div id="wrapper">
<article> <?= $row['postCont'] ?> </article>		
</div>
	

<?php require('views/footer_page.php');?>