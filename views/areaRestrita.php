<?php \Classes\ClassLayoutAreaRestrita::setHeadRestrito("user");   ?>
<?php \Classes\ClassLayoutAreaRestrita::setHead('Orthoface','Exclusivo para membros!'); ?>

<?php include DIRREQ.'controllers/config.php';?>
<?php 


$id = $_SESSION["login"];
 ?>
  

<?php \Classes\ClassLayout::setFooter(); ?>