<?php 
require "config.php";

function dbConnect(){
    $mysqli= new mysqli(SERVER,USERNAME,PASSWORD,DATABASE);
    if($mysqli->connect_errno != 0){
        return FALSE;
    } else{
        return $mysqli;
    }
}


function getCategories(){
    $mysqli= dbConnect();

    $result=$mysqli->query("SELECT DISTINCT category FROM products");
    while($row=$result->fetch_assoc()){
        $categories[]=$row;   
    }
    return $categories;
}


function getHomePageProducts($int){

   $mysqli=dbConnect();
   $result=$mysqli->query("SELECT * FROM products ORDER BY rand() LIMT $int");
   while($row=result->fetch_assoc()){
    $data[]=$row;
   }

   return $data;
}


 function getProductByCategory($category){
    $mysqli=dbConnect();

     $smtp->bind_param("s",$category);
     $smtp->execute();
     $result=$smtp->get_result();
     $data=$result->fetch_all(MYSQLI_ASSOC);
     return $data;
 }



 function getProductByTitle($title){
    $mysqli=dbConnect();
    $stmt=$mysqli->prepqre("SELECT * FROM products WHERE title=?");
    $stmt->bind_param("s",$title);
    $stmt=execute();
    $result=$stmt->get_result();
    $data=$result->fetch_all(MYSQLI_ASSOC);
    return $data;    
 }
