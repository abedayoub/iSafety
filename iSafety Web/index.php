
<?php
    session_start();
     require('connection.php');
if (isset($_POST['user_id']) and isset($_POST['user_pass'])){
    $username = $_POST['user_id'];
    $password = $_POST['user_pass'];
    $query = "SELECT * FROM `admin` WHERE username='$username' and password='$password'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);
    $res = mysqli_fetch_array($result);
    if ($count == 1){
        $_SESSION["username"] = $username;
        header("Location: /admin");
    }else{
        echo "<p color:red>invalid credentials</p>";
        // header('Location: index.php');
    }
}
?>
<!DOCTYPE html >
<html>
    <head><meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <?php 
            if(isset($_SESSION['username'])!=0){
                header('Location: ./admin');
                }
                  ?>
    </head>
    <body>
    

  <div class="vertical-center">
        <img src=".\images\logo.png" alt="Civil Defense">
        <h3>iSafety Administrative Panel</h3>
            <form id="login-form" method="post" action="index.php">
                <table border="0.5" >
                    <tr>
                        <td><label for="user_id">User Name</label></td>
                        <td><input type="text" name="user_id" required></input></td>
                    </tr>
                    <tr>
                        <td><label for="user_pass">Password</label></td>
                        <td><input type="password" name="user_pass" required></input></td>
                    </tr>
                    <tr>
                    <div class="message"><?php if($message!="") { echo $message; } ?></div>
                    </tr>
                    <tr>
                        <td>
                        <button type="submit" form="login-form" value="Login" name="Login">Login</button>
                    </tr>
                </table>
            </form>
        </div>
</div>
    </body>
    <div id="footer">
    <p> iSafety 2021 | Senior Project </p>
    </div>
</html>
