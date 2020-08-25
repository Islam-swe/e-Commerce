<?php 
require_once "MySql.php";


class Order extends MySql
{

//get all
public function getAllOrders()
{
    $query="SELECT * FROM orders";
    $result= $this->connect()->query($query);
    $orders=[];
    if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
            array_push($orders,$row);
        }
    }

    return $orders;
}


//get one
public function getOneOrder($customerEmail)
{
    $order=null;
    $query="SELECT * FROM orders
            WHERE customerEmail='$customerEmail'";
    $result=$this->connect()->query($query);
    if($result->num_rows==1)
    {
        $order=$result->fetch_assoc();
    }

    return $order;
}

//create new
public function addOrder(array $data)
{
    $data['name']=mysqli_real_escape_string($this->connect(),$data['name']);
    $data['address']=mysqli_real_escape_string($this->connect(),$data['address']);
    $data['email']=mysqli_real_escape_string($this->connect(),$data['email']);


    $query="INSERT INTO orders (`customerName`,`customerEmail`,customerPhone, `customerAddress`)
            VALUES
            (
                '{$data['name']}',
                '{$data['email']}' ,
                '{$data['phone']}',
                '{$data['address']}'
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