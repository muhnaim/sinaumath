<?php 

require('views/header_page.php'); 

if(!isset($_SESSION['token'])) {
	$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
}


?>
<div class="search">
	<form action="" method="get">
	<input type="text" name="input_cari" placeholder="Masukkan Perintah yang dicari!!">
	<input type="hidden" name="token_cari" value="<?=$_SESSION['token'] ?>">
	<input type="submit" name="submit" value="cari">
</form>
</div>
<div class="selection">

<?php require('component/search.php'); ?> 

</div>


<br/>



<?php require('views/footer_page.php');?>

