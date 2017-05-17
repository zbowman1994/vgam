<?php 
session_start();
if (!isset($_SESSION['count'])){
	$_SESSION['count'] = 0;
}else {
	$_SESSION['count']++;
} ?>

<?php require 'view/header.html'; ?>
<link rel="stylesheet" type ="text/css" href="css/style.css" >
<?php echo $_SESSION['count'];?>
<form action="productSelection.php" method="post">
<button type="button" name="enter" id="products"><a href = "productSelection.php">Experience greatness!</a></button>
</form>
<?php require 'view/footer.php'; ?>
