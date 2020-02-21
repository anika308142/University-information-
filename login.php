<?php 

$host="localhost";
$user="root";
$password="";
$db="register";
$conn=new mysqli($host,$user,$password,$db);

//mysql_connect($host,$user,$password);
//mysql_select_db($db);

if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
$sql = "SELECT * FROM registeer WHERE username='$uname' and password='$password'";    
    $result=mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)==1){
        echo " You Have Successfully Logged in";
        header("location: listofuni.html");
        exit();
    }
    else{
        echo " You Have Entered Incorrect Password";
        exit();
    }
        
}
?>