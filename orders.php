
<?php 
require_once 'inc/header.php';
require_once 'classes/Product.php';
require_once 'classes/Category.php';
require_once 'classes/Order.php';
require_once 'classes/OrderDetails.php';
require_once 'classes/MySql.php';
require_once 'classes/OrderTable.php';

$table=new OrderTable;
$tables=$table->getAll();



?>

<!-- show the buy list items -->
<div class="container m-auto py-5  overflow-auto">
    <div class="row">
        <div class="col-md-12">
            <table class="table overflow-auto">
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Customer Phone</th>
                        <th>Customer Address</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                       
                    </tr>
                </thead>

                <?php 
                    foreach($tables as $table)
                    {

                    ?>
                <tbody>
        
                    <tr>
                        <td scope="row"><?php echo $table['customerName'] ?></td>
                        <td><?php echo $table['customerEmail'] ?></td>
                        <td><?php echo $table['customerPhone'] ?></td>
                        <td><?php echo $table['customerAddress'] ?></td>
                        <td><?php echo $table['name'] ?></td>
                        <td><?php echo $table['price'] ?></td>
                    
                    </tr>
                
                </tbody>
                <?php   } ?>
              

            </table>
        </div>
    </div>
</div>

<!-- /show the buy list items -->





<?php require_once 'inc/footer.php';?>

<!-- SELECT * FROM `orders` JOIN orderdetails JOIN products
WHERE orders.order_id=orderdetails.order_id and orderdetails.product_id=products.id -->