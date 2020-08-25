<?php 
require_once 'inc/header.php';
if(isset($_SESSION['id']))
{
    header('location:index.php');
    
}
?>


<?php if(isset($_SESSION['errors'])){
    foreach($_SESSION['errors'] as $error){?>

    <div class="alert alert-danger w-50 m-auto" role="alert">
        <strong><?php echo $error?></strong>
    </div>
<?php }?>
<?php } unset($_SESSION['errors']) ?>


<div class="container py-4 ">
    <form class="w-50 m-auto" action="handlers/handleLogin.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
   
        <button type="submit" name="submit" class="btn btn-primary">Login</button>
    </form>
</div>




<?php require_once 'inc/footer.php';?>