<?php

include('db.php');


if ($_POST['id']) {
    
    
    
    
    
    $id = $_POST['id'];
    
    
    
    if ($id == 0) {
        echo "<option>Select sector</option>";
    } else {
        $sql = mysqli_query($con, "SELECT * FROM `sector` WHERE city_id='$id'");
        
        while ($row = mysqli_fetch_array($sql)) {
            echo '<option value="' . $row['sector_id'] . '">' . $row['sector_name'] . '</option>';
        }
    }
    
    
}
?>