<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

$conn = mysqli_connect("localhost", "root", "", "photo_upload");
if(!$conn){
    	echo "fail";
    }else{
    	echo "success";
    }
    

$target_path = "uploads/";
 
$target_path = $target_path . basename( $_FILES['file']['name']);
 
if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
    echo "Upload and move success";
    $sql = "INSERT INTO item(name, date, images) VALUES('satish', '2017-08-09', '".$target_path."')";
    
    if($result = mysqli_query($conn, $sql)){
        if($result){
            echo "Data Inserted.";
        }else{
            echo mysqli_error();
        }
    }
} else {
echo $target_path;
    echo "There was an error uploading the file, please try again!";
}



?>