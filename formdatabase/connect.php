<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$POST['name'];
    $email=$POST['email'];
    $gender=$POST['gender'];
    $mobile=$POST['mobile'];
    $password=$POST['password'];

$con=new mysqli('localhost:3308','root','','forms');
if($con){
    //echo "Connection Successful";
    $sql="insert into datas(name,email,gender,mobile,password)value('$name','$email','$gender','$mobile','$password')";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "Data Inserted Successfully";
    }else{
        die(mysqli_error($con));
    }
}else{
    die(mysqli_error($con));
}
}
?>