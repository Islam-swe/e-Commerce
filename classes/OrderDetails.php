<?php 
require_once "MySql.php";


class OrderDetails extends MySql
{

//get all
public function getAllOrdersDetails()
{
    $query="SELECT * FROM ordersdetails";
    $result= $this->connect()->query($query);
    $ordersdetails=[];
    if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
            array_push($ordersdetails,$row);
        }
    }

    return $ordersdetails;
}


//get one
public function getOneOrderDetail($id)
{
    $orderDetail=null;
    $query="SELECT * FROM orderdetails
            WHERE order_id='$id'";
    $result=$this->connect()->query($query);
    if($result->num_rows==1)
    {
        $orderDetail=$result->fetch_assoc();
    }

    return $orderDetail;
}

//create new
public function addOrderDetail(array $data)
{
     
   

    $query="INSERT INTO `orderdetails`(`order_id`, `product_id`, `priceEach`)
            VALUES
            (
                '{$data['order_id']}',
                '{$data['product_id']}' ,
                '{$data['priceEach']}'
            )";

    $result=$this->connect()->query($query);
    if($result==true)
    {
        return true;
    }
    return false;
}



//delete
// public function deleteProduct($id)
// {
//     $query="DELETE FROM  products 
//     WHERE id='$id'";

//     $result=$this->connect()->query($query);
//     if($result==true)
//     {
//         return true;
//     }
//     return false;

// }
    
}


?>