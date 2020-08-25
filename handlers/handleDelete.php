<?php 
//session_start();
require_once '../classes/Product.php';

if(!isset($_SESSION['id']))
{
    header('location:../login.php');
  
}

$id=$_GET['id'];

//get product date so we can delete its image from the directory
$prod=new Product;
$product=$prod->getOneProduct($id);
$img=$product['img'];
unlink('../images/'.$img);

//delete the product data from the database
$result=$prod->deleteProduct($id);




if($result==true)
{
    header("location: ../index.php");

}
else
{


    echo 'error';

}





?>