<?php

require_once __DIR__ . '/db.php';

$sql = "SELECT * FROM cart_items";

$result = $conn->query($sql);

$cart = [];

while($row = $result->fetch_assoc()){

    $cart[] = $row;
}

header('Content-Type: application/json');

echo json_encode($cart);

?>