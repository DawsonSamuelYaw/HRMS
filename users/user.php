<?php 

function getUserById($id, $db){
    $sql = "SELECT * FROM employee_info WHERE employee_id = ?";
	$stmt = $db->prepare($sql);
	$stmt->execute([$id]);
    
    if($stmt->rowCount() == 1){
        $user = $stmt->fetch();
        return $user;
    }else {
        return 0;
    }
}

 ?>