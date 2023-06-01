<?php

require_once './utils/dal.php';

function getCategories(){
    $db = new NorthwindDB();
    $sql = "SELECT CategoryID as id, CategoryName as name FROM categories";
    return $db->select( $sql );
}