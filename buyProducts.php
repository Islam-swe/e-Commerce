
<?php 
require_once 'inc/header.php';
require_once 'classes/Product.php';
require_once 'classes/Category.php';
require_once 'classes/helpers/Str.php';

use helpers\Str;


?>

<!-- show the buy list items -->
<div class="container my-4 overflow-auto">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Desc</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Category</th>
                    </tr>
                </thead>

                <?php if(isset($_SESSION['cart'])) 
                {
                    foreach($_SESSION['cart'] as $cartId)
                    {
                        $prod=new Product;
                        $product=$prod->getOneProduct($cartId);
                        
                        $categ=new Category;
                        $category=$categ->getOneCategory($product['category_id']);
        
                ?>
                <tbody>
        
                    <tr>
                        <td scope="row"><?php echo $product['name'] ?></td>
                        <td><?php echo Str::limit($product['desc'])?></td>
                        <td class="overflow-auto"><?php echo $product['price']?></td>
                        <td> <img width="100px" src=" images/<?php echo $product['img'] ?>" alt=""></td>
                        <td><?php echo $category['type'] ?></td>
                    </tr>
                
                </tbody>
                <?php   } ?>
                <?php  } ?>


            </table>
        </div>
    </div>
</div>

<!-- /show the buy list items -->



<!-- the customer buy form   -->
<div class="container py-4 overflow-auto">

<?php if(isset($_SESSION['errors'])){
    foreach($_SESSION['errors'] as $error){?>

    <div class="alert alert-danger w-50 m-auto" role="alert">
        <strong><?php echo $error?></strong>
    </div>
<?php }?>
<?php } unset($_SESSION['errors']) ?>


    <form class="w-50 m-auto overflow-auto" action="handlers/handleOrder.php" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
      
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input name="phone" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Address</label>
            <input name="address" type="text" class="form-control" id="exampleFormControlTextarea1"> 
        </div>

      
        <button type="submit" name="submit" class="btn btn-primary">Checkout</button>
    </form>
</div>



<?php require_once 'inc/footer.php';?>