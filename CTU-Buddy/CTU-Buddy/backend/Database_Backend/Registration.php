<?php 
$Username = $_POST['Username']
$User_Email = $_POST['User_Email']
$User_Password = $_POST['User_Password']

// databse connection
$conn = new mysqli('localhost','root','','test');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into registration(Username,User_Email,User_Password)
    values(?,?,?)"):
    $stmt->bind_param("sss",$Username, $User_Email ,$User_Password,)
    $stmt->execute();
    echo "registration successful"
    $stmt->close();
    $conn->close();
}
?>