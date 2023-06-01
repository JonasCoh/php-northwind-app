<?php


function getProducts( $category = null ){
    require_once './utils/dal.php'; 
    $db = new NorthwindDB();
    $sql = "SELECT ProductID as id, ProductName as name, UnitPrice as price, UnitsInStock as stock FROM products";
    
    if( $category )
        $sql .= " WHERE CategoryID = $category";

    return $db->select( $sql );
}

function getProduct( $id ){
    require_once './utils/dal.php'; 
    $db = new NorthwindDB();
    $sql = "SELECT ProductID as id, ProductName as name, UnitPrice as price, UnitsInStock as stock FROM products 
            WHERE ProductID = $id";
    $res = $db->select( $sql );
    
    if( count($res) > 0 )
        return $res[0];

    return false;
}


function addProduct( $product ){
    require_once '../utils/dal.php';
    $db = new NorthwindDB();
    $sql = "INSERT INTO products (ProductName ,UnitPrice, UnitsInStock)
            VALUES ('$product->name', $product->price, $product->stock )";

    return $db->execute( $sql );
}

function editProduct( $product ){
    require_once '../utils/dal.php';
    $db = new NorthwindDB();
    $sql = "UPDATE products SET ProductName = ?, UnitPrice = ?, UnitsInStock = ?
        WHERE ProductID = ?";

    // Prepared statement
    $connetion = $db->connect();
    $stat = $connetion->prepare( $sql );
    $stat->bind_param('sdii', $product->name, $product->price, $product->stock, $product->id );
    $stat->execute();

    // close the connection to the DB
    $connetion->close();
}



function deleteProduct( $id ){
    require_once '../utils/dal.php';
    $db = new NorthwindDB();
    $sql = "DELETE FROM products WHERE ProductID = $id";
    return $db->execute( $sql );
}