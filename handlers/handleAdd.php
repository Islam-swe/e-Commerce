<?php 
session_start();
require_once '../classes/Product.php';
require_once '../classes/helpers/Image.php';
require_once '../classes/validation/Validator.php';

//check if not logged in
if(!isset($_SESSION['id']))
{
    header('location:../login.php');
    die();
}

use validation\Validator;
use helpers\Image;


//if form is not submitted
if(!isset($_POST['submit']))
{
    header('location:../add.php');
}


//getting data
$name=$_POST['name'];
$price=$_POST['price'];
$desc=$_POST['desc'];
$quantity=$_POST['quantity'];
$category_id=$_POST['category_id'];

//get imgage details
$img=$_FILES['img'];





//validation
$v=new Validator;
$v->rules('name',$name,['required','string','Max:100']);
$v->rules('price',$price,['required','numeric']);
$v->rules('desc',$desc,['required']);
$v->rules('img',$img,['requiredimage','image']);
$errors=$v->errors;




//if data is valid
if($errors==[])
{   
    $image= new Image($img);
    //store in db
    $data=
    [
    'name'=>$name,
    'desc'=>$desc,
    'price'=>$price,
    'quantity'=>$quantity,
    'category_id'=>$category_id,
    'img'=>$image->new_name
    ];
    $prod=new Product;
    $result=$prod->addProduct($data);


    //if stored successfully
    if($result==true)
    {
        //upload pic
        $image->uploadImage();
        // move_uploaded_file($tmp,'../images/'.$newName);
        header("location: ../index.php");

    }
    else
    {
    //redirect with errors
    $_SESSION['errors']=['error storing in database'];
    header('location:../add.php');


    }
}
else 
{
    //redirect with errors
    $_SESSION['errors']=$errors;
    header('location:../add.php');
}

?>