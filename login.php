<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
</head>
<body>
<style>
    body{
    font-family: cursive; 
  }
    .btn{
        margin-top: 20px;
        margin-left: 80px;
    }
    nav{
        background-color: teal;
        color: white;
    }
</style>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5">PHP CRUD APP</nav> 
    <div class="container">

    <?php 
if(isset($_GET['msg'])){
    $msg=$_GET['msg'];
echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
'.$msg.'
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}
?>
    <div class="text-center mb-4">
        <h3>User's Login page</h3>
        <p class="text-muted">Complete the login form below</p>
    </div>
    
<div class="container d-flex justify-content-center">
<form action="" method="post" style="width:50vw; min-height:300px;" class="horizantal-form">
    <div class="form-group">
      <label class="control-label col-sm-2">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control"  placeholder="Eg: edwige6@gmail.com" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control"  placeholder="password" name="password">
      </div>
    </div>
<div>
    <button type="submit" class="btn btn-success" name="submit"> Login</button>
    <a href="index.php" class="btn btn-danger">Cancel</a>
</div>
</form>

</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
    crossorigin="anonymous"></script>
</body>
</html>

<?php
include 'connection.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password =sha1(($_POST['password']));
    $sql="SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result=$conn->query($sql);
    if($result->num_rows >0){
    $user_info=mysqli_fetch_assoc($result);

    // echo $user_info['password'];
    // echo"<br><br>";
    // echo $password;
    // echo"<br><br>";

    $input_password= $user_info['password'];

    // echo $input_password;
    // echo"<br><br>";

    $password= substr($password, 0, strlen($input_password));

    // echo $password;
    // echo"<br><br>";
    // echo"finished";

    if($user_info['email'] === $email && $user_info['password']===$password) {
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header('Location: index.php?msg=Login successfully');
    }else{
        header('Location: login.php?msg=invalid email or password');
    }
    }
}
?>