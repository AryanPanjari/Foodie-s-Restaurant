<?php

$data = json_decode(file_get_contents("php://input"), true);

require_once __DIR__ . '/db.php';

/* Create new order */

$conn->query("INSERT INTO orders() VALUES()");

$order_id = $conn->insert_id;

/* Insert items */

foreach($data as $item){
    $name = $item["name"];
    $price = $item["price"];
    $quantity = $item["quantity"];

    $stmt = $conn->prepare("INSERT INTO cart_items(order_id,item_name,price,quantity) VALUES(?,?,?,?)");
    $stmt->bind_param("isdi", $order_id, $name, $price, $quantity);
    $stmt->execute();
}

echo "Order Placed Successfully";

?>