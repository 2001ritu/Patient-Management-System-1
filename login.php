<?php include "dbConfig.php";
session_start();
$msg = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['password'];
    
     if ($name == '' || $password == '' ) {
        $msg = "You must enter all fields";
    } else {
        $sql = "SELECT username FROM  patient WHERE username = '$name' AND password = '$password'
        UNION SELECT username FROM  doctor WHERE username = '$name' AND password = '$password'";
        $query = mysqli_query($link, $sql);

        if ($query === false) {
            echo "Could not successfully run query ($sql) from DB: " . mysqli_error($link);
            exit;
        }
        if(mysqli_num_rows($query) == 1)
        	echo "success";
        else echo "Username and password do not match";
    }
}
?>

 <html>
    <head>
        <titile> </titile>
           <link rel="stylesheet" type="text/css" href="style.css">
        <body>
            <div class="loginbox" >
         
             <h1>Login </h1>
            <form method="POST">
                <p>Usename</p>
                <input type="text name" name="name" placeholder="Enter Username">
                <p>Password</p>
                <input type="password" name="password"placeholder="Enter Password">
                <input type="Submit" name="" value="Login">
                <br>
                <a href="#">Forgot your password?</a><br>
                <p>Don't have an account?</p> 
                <a href="registration.php"> <input type="register" name="" value="Register" ></a>
                
              
            </form>
            </div>
           
        </body>
    <style>
body{
    margin: 0;
    padding: 0;
    background-size: cover;
    background-position: center;
    font-family: sans-serif;
    background: linear-gradient(pink,lightblue);
  

}
.loginbox{
    width: 320px;
    height: 450px ;
    background:linear-gradient(lightblue,pink);
    color:#fff;
    top:50%;
    left:50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing:border-box;
    padding:70px,40px;
    color:black;
}



h1{
    margin: 0;
    padding: 0 0 10px;
    text-align: center;
    font: size 22px;
    color:brown;
}
loginbox p{
    margin:0;
    padding:0;
    font-weight:bold;


}
.loginbox input{
    width:100%;
    height:40px;
    margin-bottom: 15px;
    font-size: 16px;
    border: none;
    border-bottom: 1px solid#000;
    outline: none;

}
.loginbox input[type="text"],input[type="password"]
{
    border:none;
    border-bottom: 1px solid#000;
    outline: none;
    height: 40px;
    color:#000;
    font-size: 16px;
    
}
.loginbox input[type="submit"]
{
    border:none;
    outline:none;
    height: 40px;
    width: 250px;
    background:white;
    font-size: 18px;
    border-radius: 20px;
    margin-left: 30px;
    
}
.loginbox input[type="submit"]:hover
{
    cursor:pointer;
    background:tomato ;
    color:#000;
}
.loginbox input[type="register"]
{
    border:none;
    outline:none;
    height: 40px;
    width: 100px;
    background:white;
    font-size: 18px;
    border-radius: 20px;
    text-align: center;
    
    
}
.loginbox input[type="register"]:hover
{
    cursor:pointer;
    background:tomato ;
    color:#000;
}
.loginbox a{
    text-decoration:none;
    font-size: 15px;
    line-height: 20px;
    color:black;
}
.loginbox a:hover
{
    opacity: 0.8;
    color:tomato;
}
</style>
</head>
</html>
