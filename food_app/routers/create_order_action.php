<?php
include '../includes/connect.php';


print_r($_POST);
try {
    
   	$sql = "INSERT INTO orders (table_id,waiter_id, total_bill,status) VALUES (?, ?, ?,?)";

  	if($stmt = mysqli_prepare($con, $sql)){
    // Bind variables to the prepared statement as parameters
    	mysqli_stmt_bind_param($stmt, "ssss",$tableId, $waiterId , $bill,$status);
    
    // Set parameters
    	$tableId  = $_POST['tableId'];
		$waiterId = $_POST['waiterId'];
		$bill     = $_POST['total_bill'];
		$status   = 'PREPARING';
   
    // Attempt to execute the prepared statement
    	if(mysqli_stmt_execute($stmt)){
        	echo "Records inserted successfully.";
    	} else{
        	die ("ERROR: Could not execute query: $sql. " . mysqli_error($con));
    	}
	} else{
    		die ("ERROR: Could not prepare query: $sql. " . mysqli_error($con));
	}
 
// Close statement
	mysqli_stmt_close($stmt);
 
    $result = mysqli_query($con,"SELECT LAST_INSERT_ID() as id");
	$row = $result->fetch_assoc();
	

    $sql = "INSERT INTO order_details (order_id,item,price,quantity) VALUES (?, ?, ?,?)";
    if($stmt = mysqli_prepare($con, $sql)){

    	mysqli_stmt_bind_param($stmt, "ssss",$order_id,  $itemId ,$price,$qty);
    	$order_id = $row['id'];
		foreach($_POST['item'] as $idx => $itemId) {
			$price = $_POST['price'][$idx];
            $qty = $_POST['qty'][$idx];
			mysqli_stmt_execute($stmt);
		}
	    
	} else{
    		die ("ERROR: Could not prepare query: $sql. " . mysqli_error($con));
	}
	mysqli_stmt_close($stmt);

} catch (Exception $e) {
   
   die($e->getMessage());
}

?>