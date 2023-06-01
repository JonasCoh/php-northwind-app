<?php
require_once '../models/product.class.php';
require_once '../logic/products-logic.php';

$type = $_REQUEST['type'];

switch ($type) {
    case 'add':
        $name = $_POST['name'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $product = new Product( null, $name, $price, $stock );
        $id = addProduct( $product );
        header('location: /products.php?update');
        break;
    case 'edit':
        $id = $_POST['product-id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $product = new Product( $id, $name, $price, $stock );
        editProduct( $product );
        header("location: /edit-product.php?id=$id&update");
        break;
    case 'del':
        $id = $_POST['id'];
        echo $id;
        deleteProduct( $id );
        break;
    default:
        # code...
        break;
}



// deleteProduct();


