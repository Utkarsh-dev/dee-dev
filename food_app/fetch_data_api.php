<?php
include 'includes/connect.php';


$cid   = $_POST["search"];
$query = $con->query("SELECT id,name,price FROM items where name  LIKE '%".$cid."%'");

$Data = array();
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $data['value'] = $row['id'].'-'.$row['price'];
        $data['label'] = $row['name'];
        array_push($Data, $data);
    }
}

// Return results as json encoded array
echo json_encode($Data);

?>