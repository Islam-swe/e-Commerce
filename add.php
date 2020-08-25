<?php 
require_once 'inc/header.php';
require_once 'classes/Category.php';

//check if not logged in
if(!isset($_SESSION['id']))
{
    header('location:login.php');
}


//get all the categories in database to show them in the select menu down
$category=new Category;
$categories=$category->getAllCategories();
//var_dump($categ) ;
?>


<?php if(isset($_SESSION['errors'])){
    foreach($_SESSION['errors'] as $error){?>

    <div class="alert alert-danger w-50 m-auto" role="alert">
        <strong><?php echo $error?></strong>
    </div>
<?php }?>
<?php } unset($_SESSION['errors']) ?>


<div class="container py-4 ">
    <form class="w-50 m-auto" action="handlers/handleAdd.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Product Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input name="price" type="text" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea name="desc" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea> 
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">quantity</label>
            <input name="quantity" type="number" class="form-control" id="exampleFormControlTextarea1"> 
        </div>

        
        <div class="form-group">
        <label for="inputState">Category</label>
            <select name="category_id"  class="form-control">
                <!-- <?php foreach($categories as $category) {?> -->
                <option value="<?php echo $category['category_id'] ?>"><?php echo $category['type'] ?></option>
                <!-- <?php  }?> -->
            </select>
        </div>
        
        <div class="form-group">
            <input type="file" value="Upload img" name="img" >
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>




<?php require_once 'inc/footer.php';?>