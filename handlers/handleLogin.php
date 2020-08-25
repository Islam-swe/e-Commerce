<?php 
session_start();

require_once '../classes/validation/Validator.php';
require_once '../classes/Admin.php';
use validation\Validator;



//if form is not submitted
if(!isset($_POST['submit']))
{
    header('location:../login.php');
}


//getting data
$email=$_POST['email'];
$password=$_POST['password'];



//validation
$v=new Validator;
$v->rules('email',$email,['required','string','Max:100']);
$v->rules('password',$password,['required','string']);

$errors=$v->errors;




//if data is valid
if($errors==[])
{   
    $admin=new Admin;
    $result=$admin->attempt($email,$password);
    //checked db successfully
    if($result!=null)
    {
        $_SESSION['id']=$result['id'];
        $_SESSION['username']=$result['username'];
        header('location:../index.php');

    }
    else
    {
        //redirect with errors
        $_SESSION['errors']=['not correct credentials'];
        header('location:../login.php');


    }
}
else 
{
    //redirect with errors
    $_SESSION['errors']=$errors;
    header('location:../login.php');
}

?>