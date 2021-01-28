<?php 

    include('session.php');
    ?>
<!DOCTYPE html >
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <style>
    body {font-family: Arial, Helvetica, serif;}
    form {
        border: 3px solid #f1f1f1;
        width: 40%;
        }

    input[type=text], input[type=password] {

        width: 100%;
        padding: 0px 0px;
        margin: 0 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        border: 0;
        outline: 0;
        border-bottom: 2px solid #d3d3d3;
        box-shadow: none;
        color: #111;
        align-items: center;

        position: relative;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
        
    input:invalid {
        outline: 0;
        color: #ff2300;
        border-color: #ff2300;
    }
    input:focus,
    input:valid {
    border-color: #00dd22;
    }
    input:focus~label,
    input:valid~label {
    font-size: 14px;
    top: 10px;
    color: #00dd22;
    }


    #inButton {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;;
    margin: 10px 0;
    cursor: pointer;
    width: 100%;
    border: 2px solid blue;
    border-radius: 20px 20px;
    }
    #outbtn{
        color: white;
        padding: 14px 20px;
        margin: 10px 0;
        cursor: pointer;
        width: 50%;
        background-color: #f44336;
        float: right;
        border: 2px solid blue;
        border-radius: 20px 20px;
    }

    button:hover {
    opacity: 0.8;
    }

    .cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
    border: 2px solid blue;
    border-radius: 50px 20px;
    }

    .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    }

    img.avatar {
    width: 40%;
    border-radius: 50%;
    }

    .container {
    padding: 0px;
    }

    span.psw {
    float: right;
    padding-top: 16px;
    }
    
    .btns{
        padding-top: 10px;
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
    span.psw {
        display: block;
        float: none;
    }
    .cancelbtn {
        width: 100%;
    }
    }
    .icon{
        size:150%;
        margin-right: 40%;
    }
    /* Start https://www.cursors-4u.com */ * {cursor: url(https://cur.cursors-4u.net/mechanics/mec-5/mec472.cur), auto !important;} /* End https://www.cursors-4u.com */
    #footer { 
            margin: 0px -10px;
            position: fixed; 
            padding: 10px 10px 10px 10px; 
            bottom: 0; 
            width: 100%; 
            /* Height of the footer*/  
            height: 40px; 
            background: grey; 
            text-align: center;
            color: white;
        }
.bodyh{
    margin:center;
    text-align: center;
    align-items: center;
    vertical-align: middle;
}
.bodyh #attend-form {
    margin:center;
    text-align: center;
    align-items: center;
    vertical-align: middle;
    margin-left: 30%;
}

.bodyh #attend-form table{
    margin:center;
    text-align: center;
    align-items: center;
    vertical-align: middle;
    margin: 0 auto;
    border: 10px;
}
    </style>
    </head>
    <body>
        <div class="bodyh" >
        <img src=".\images\logo.jfif" alt="Civil Defense">
        <h3>Attendance</h3>
            <form id="attend-form" class="" action="attend.php" method="post"  >
                <br>
                <p style:'font-family: Arial, Helvetica, serif'>Enter Your ID</p>
                
                <table>
                    <tr>

                        <td><label for="user_id"><i class='far fa-user-circle' style='font-size:24px;color:red;margin-left:auto'></i></label></td>
                        <td><input type="number" name="user_id" value="" required></input></td>
                    </tr>
                    <div class="btns">
                    <tr>
                        <td><button id="inButton" type="submit" form="attend-form" value="Attend" name="Attend">attend</button></td>

                        <td><button id="outbtn" type="submit" form="attend-form" name="Out" value="Out">Exit</button></td>
                    </tr>
                    </div>
                </table>
            </form>
        </div>
        <?php
    require "connection.php";       
    $name="";
    $userID=0;

    if (isset($_POST['Attend'])) {    
        $userID = strip_tags(addslashes($_POST['user_id']));
        if ((isset($userID)) && $userID!=0) {
            $dbR = mysqli_query($connection, "SELECT * from volunteers where ID='$userID'");
            $Row = mysqli_fetch_array($dbR);
            $countIn = mysqli_num_rows($dbR);
            if($countIn > 0){
                echo "<center>";
                echo "<table width='90%' border='1'>";
                echo "<tr><th>ID No</th><th>FName</th><th>LName</th><th>BType</th></tr>";
                
                echo "<tr><td>{$Row["ID"]}</td>";
                echo "<td>{$Row["FName"]}</td>";
                echo "<td>{$Row["LName"]}</td>";
                echo "<td>{$Row["BType"]}</td>";
                echo "</table>";
                echo "<br>";
                $FullName = $Row["FName"]. " " .$Row["LName"];
                $Position = $Row["Position"];
                //echo "id: " . $FullName."</br>";
        
                $AttendQuery = "INSERT INTO attendance (ID, Name,position) VALUES (?,?,?)";
                $stmt= $connection->prepare($AttendQuery);
                $stmt->bind_param('isi', $userID, $FullName,$Position);
                $stmt->execute();
                echo "<h1>Welcome ".$FullName."</h1>";
            }elseif($userID=0){
                
            }
            else{
                echo "<h1>Wrong Credentials</h1>";
            }
            mysqli_close($connection);
        }
    }
    elseif (isset($_POST['Out'])) {
        $userID = strip_tags(addslashes($_POST['user_id']));
        $userID = $_POST['user_id'];
        deleteAtt($userID);
        
    }

    function deleteAtt(int $attendie) {
        require('connection.php');
        // sql to delete a record
        $deleterecord = "DELETE FROM attendance WHERE ID=$attendie";
        if ($connection->query($deleterecord) === TRUE) {
        echo "Record deleted successfully";
        } else {
        echo "Error deleting record: " . $connection->error;
        }
    }
    
    
?>
        <div id="footer">
    <p> Developed and Designed by <a href="http://github.com/abedayoub">Abed Ayoub</a></p>
    </div>
    </body>
</html>
