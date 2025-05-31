<?php
include('conf.php');
include('funcs.php');

$ID = $_GET['id'];
$check = checkItem('id', 'Products', $ID); 

if ($check > 0) {
    $stmt = $con->prepare("DELETE FROM Products WHERE id = ?");
    $stmt->bind_param("i", $ID); 
    $stmt->execute();

    $successMsg = $stmt->affected_rows . ' Record Deleted';
    redirectsuc($successMsg, 0, "Products page", "products.php"); 
} else {
    $errMsg = "This ID Does Not Exist";
    redirect($errMsg, 0, "Home page", "upload.php"); 
}
?>