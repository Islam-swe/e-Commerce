<?php 
require_once "MySql.php";


class OrderTable extends MySql
{


    public function getAll()
    {
        $query="SELECT * FROM `orders` JOIN orderdetails JOIN products
        WHERE orders.order_id=orderdetails.order_id and orderdetails.product_id=products.id";

        $result=$this->connect()->query($query);
        $data=[];
        if($result->num_rows>0)
        {
            while($row=$result->fetch_assoc())
            {
                array_push($data,$row);
            }
        }

    return $data;
    }
}


?>