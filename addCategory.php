<?php 
require_once 'inc/header.php';

//check if not logged in
if(!isset($_SESSION['id']))
 {
    header('location:login.php');
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
    <form class="w-50 m-auto" action="handlers/handleAddCateg.php" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Category Name</label>
            <input name="category_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
       
        <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
    </form>
</div>




<?php require_once 'inc/footer.php';?>