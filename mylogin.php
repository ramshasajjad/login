<?php
include("dbconnection.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label >username</label>
        <input type="text"name="username" required><br></br>
        <label>password</label>
        <input type="password" name="password" required id="showpass"><br></br>
        <input type="checkbox" onclick="ShowPassword()">
        <label>showpassword</label>
        <input type="submit" value="login" name="loginBtn">
    </form>
<?php
if(isset($_POST['loginBtn'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $q="SELECT * FROM login WHERE username ='$username' and password ='$password'";
    $run = mysqli_query($conn,$q);
    $total_rows= mysqli_num_rows($run);
    echo $total_rows;
    if($total_rows==1){
        $_SESSION['username']=$username;
        $_SESSION['last_time']=time();
        header('location:dashboard.php');
    }else{
        "<script>alert('user or password is incorrect')</script>";
    }
}
?>
<script>
function ShowPassword(){
let a =document.getElementById("showpass");
if(a.type == "password"){
    a.type="text";
}else{
    a.type="password";
}
}
</script>

</body>
</html>