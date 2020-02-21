<?php 
$username= $_POST['username'];
$password= $_POST['password'];
$gender= $_POST['gender'];
$email= $_POST['email'];

if(!empty($username)||!empty($password)||!empty($gender)||!empty($email))
{

$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbname="register";
$conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);
if(mysqli_connect_error())
{


	 die("Connection error: " . mysqli_connect_error());

}
else
{
$SELECT = "SELECT email From registeer Where email=? Limit 1";
$INSERT = "INSERT Into registeer (username,password,gender,email) Values(?,?,?,?)";

$stmt=$conn->prepare($SELECT);
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
$rnum=$stmt->num_rows;
if($rnum==0){$stmt->close();
	
$stmt=$conn->prepare($INSERT);
$stmt->bind_param("ssss",$username,$password,$gender,$email);
$stmt->execute();
        header("location: index.html");

//echo "Registration complete";


}




else {

	echo "This email is already registered";

$stmt->close();
$conn->close();


 } 
}}
else {echo "All fields are required";
die();}

 ?>