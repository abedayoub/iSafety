<html>
    <head>
        <meta http-equiv="refresh" content="5">
        <script src="https://kit.fontawesome.com/yourcode.js"></script>
        <link rel="stylesheet" href="styleP.css">
         <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </head>
    <body>
    <div  class="header">
        <img src="EMT.png" alt="logo" />
        <h1>EMS Management System</h1>
    </div>
<?php
    include('session.php');
    
    require('connection.php');
    $getVolunteers = mysqli_query($connection, "SELECT * from attendance order by TimeStamp asc");
    $Row = mysqli_fetch_array($getVolunteers);
    $TeamLeader=null;
    $Driver;
    $EMT=null;
    $Trainee=null;
    $flag=true;
    
    //get Driver
    $getDriver = mysqli_query($connection, "SELECT * from attendance where position=2 order by TimeStamp asc");
    $Driver = mysqli_fetch_array($getDriver);
    $Drivercount = mysqli_num_rows($getDriver);

    //get EMT
    $getEMT = mysqli_query($connection, "SELECT * from attendance where position=3 order by TimeStamp asc");
    $countE = mysqli_num_rows($getEMT);

    
    //get Team Leader
    $getTeamLeader = mysqli_query($connection, "SELECT * from attendance where position=1 order by TimeStamp asc");
    $countTL = mysqli_num_rows($getTeamLeader);


    //get Trainee
    $getTrainee = mysqli_query($connection, "SELECT * from attendance where position=4 order by TimeStamp asc");
    $countT = mysqli_num_rows($getTrainee);
    $countEMT = mysqli_num_rows($getEMT);
    
    if($countTL>0 && $countT>0 && $countE>0){
        $TeamLeader = mysqli_fetch_array($getTeamLeader);
        $EMT = mysqli_fetch_array($getEMT);
        $Trainee = mysqli_fetch_array($getTrainee);
    }elseif($countTL>0 && $countE>1 && $countT==0){
        $TeamLeader = mysqli_fetch_array($getTeamLeader);
        $EMT = mysqli_fetch_array($getEMT);
        $getTempEMT = mysqli_query($connection, "SELECT * from attendance where position=3 and ID!='$EMT[0]' order by TimeStamp asc");
        $Trainee = mysqli_fetch_array($getTempEMT);
    }elseif($countTL>1 && $countE==0 && $countT>2){
        $flag=false;
    }elseif($countTL==0 && $countE>1 && $countT>0){
        $EMT = mysqli_fetch_array($getEMT);
        $getTempTL = mysqli_query($connection, "SELECT * from attendance where position=3 and ID!='$EMT[0]' order by TimeStamp asc");
        $TeamLeader = mysqli_fetch_array($getTempTL);
        $Trainee = mysqli_fetch_array($getTrainee);
    }elseif($countTL==0 && $countE>2 && $countT==0){
        $EMT = mysqli_fetch_array($getEMT);
        $getTempTL = mysqli_query($connection, "SELECT * from attendance where position=3 and ID!='$EMT[0]' order by TimeStamp asc");
        $TeamLeader = mysqli_fetch_array($getTempTL);
        $getTempT = mysqli_query($connection, "SELECT * from attendance where position=3 and ID!='$TeamLeader[0]' and ID!='$EMT[0]' order by TimeStamp asc");
        $Trainee = mysqli_fetch_array($getTempT);
    }elseif($countTL==0 && $countE==0 && $countT==0 ){
        $flag = false;
    }elseif($countTL>1 && $countE==0 && $countT>0){
        $TeamLeader = mysqli_fetch_array($getTeamLeader);
        $getTempEMT = mysqli_query($connection, "SELECT * from attendance where position=1 and ID!='$TeamLeader[0]' order by TimeStamp asc");
        $EMT = mysqli_fetch_array($getTempEMT);
        $Trainee = mysqli_fetch_array($getTrainee);
    }elseif($countTL==0 && $countE>=1 && $countT>=2){
        $flag = false;
    }else{
        $flag = false;
    }

    echo "<table class='container' width='90%' border='1'>";
    echo "<thread>";
    echo '<form action="Process.php" method="post">';
    if ($Driver != null){
        echo "<tr><th><i class='fas fa-ambulance'></i> Driver</th><td>{$Driver['Name']}</td><td><button id='inButton' type='submit' value='remove' name='removeD'>Remove</button></td></tr>";
    }else{
        echo "<tr><th><i class='fas fa-ambulance'></i> Driver</th><td>No Driver</td></tr>";
    }

    if ($TeamLeader!=null){
        if($TeamLeader[3]!=1){
            echo "<tr><th><i class='fas fa-user-nurse'></i>	EMT</th><td>{$TeamLeader['Name']}</td><td><button id='inButton' type='submit' value='remove' name='removeTL'>Remove</button></td></tr>";
        }
        elseif($TeamLeader[3]=1){
            echo "<tr><th><i class='fas fa-user-md'></i> Team Leader</th><td>{$TeamLeader['Name']}</td><td><button id='inButton' type='submit' value='remove' name='removeTL'>Remove</button></td></tr>";
        }
    }else{
        echo "<tr><th><i class='fas fa-user-md'></i> EMT or Team Leader</th><td>No Team Leader</td></tr>";
        $flag=false;
        }
    

    if ($EMT != null){
        echo "<tr><th><i class='fas fa-user-nurse'> EMT</th><td>{$EMT['Name']}</td><td><button id='inButton' type='submit' value='remove' name='removeE'>Remove</button></td></tr>";
    }else{
        echo "<tr><th><i class='fas fa-user-nurse'> EMT</th><td>No EMT</td></tr>";
        $flag=false;
    }
    
    if ($Trainee != null){

        if($Trainee[3]==4){
            echo "<tr><th><i class='fas fa-user-alt'> Trainee</th><td>{$Trainee["Name"]}</td><td><button  id='inButton' type='submit' value='remove' name='removeT'>Remove</button></td></tr>";
        }elseif($Trainee[3]==3){
            echo "<tr><th><i class='fas fa-user-nurse'> EMT</th><td>{$Trainee["Name"]}</td><td><button  id='inButton' type='submit' value='remove' name='removeT'>Remove</button></td></tr>";
        }
    }else{
        echo "<tr><th><i class='fas fa-user-alt'> Trainee</th><td>No Trainee</td></tr>";
        $flag =false;
    }
    echo "</table>";
    echo "<br>";
    // echo '<form id="next-form" method="post" action="Process.php">';
    // echo '<button id="next" type="submit" form="next-form" value="next" name="next">Next Team</button>';
    
    if($flag==false){
        // echo '<script class="alert" language="javascript">';
        // echo 'alert("No qualified Team")';
        // echo '</script>';
        echo '<div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-exclamation-triangle" style="font-size:48px;color:red"></i><h2>Attention!</h2>
            </div>
            <div class="modal-body">
                <p>No Qualified Team</p>
                <p> Nor Second EMT or Team Leader are available</p>
            </div>
            <div class="modal-footer">
            <h3>Beirut Regional Department | Lebanese Civil Defense</h3>
            </div>
            </div>';
    }

    
    if (isset($_POST['next'])) {
        if($flag!=false){    
            if($TeamLeader!=NULL){
                deleteAtt($TeamLeader[0]);
                updateAtt($TeamLeader[0]);
            }

            if($Driver!=NULL){
                deleteAtt($Driver[0]);
                updateAtt($Driver[0]);
            }
            
            if($EMT!=NULL){
                deleteAtt($EMT[0]);
                updateAtt($EMT[0]);
            }

            if($Trainee!=NULL){
                deleteAtt($Trainee[0]);
                updateAtt($Trainee[0]);    
            }
            mission($TeamLeader, $Driver, $EMT, $Trainee);
            echo '<meta http-equiv="refresh" content="0">';
        }      
    }

    if(isset($_POST['removeD'])){
        deleteAtt($Driver[0]);
        echo '<meta http-equiv="refresh" content="0">';      
    }elseif(isset($_POST['removeTL'])){
        deleteAtt($TeamLeader[0]);
        echo '<meta http-equiv="refresh" content="0">';
    }elseif(isset($_POST['removeE'])){
        deleteAtt($EMT[0]);
        echo '<meta http-equiv="refresh" content="0">';
    }elseif(isset($_POST['removeT'])){
        deleteAtt($Trainee[0]);
        echo '<meta http-equiv="refresh" content="0">';
    }

    function deleteAtt(int $attendie) {
        require('connection.php');
        $deleterecord = "DELETE FROM attendance WHERE ID=$attendie";
        if ($connection->query($deleterecord) === TRUE) {
        echo "";
        } else {
        echo "Error deleting record: " . $connection->error;
        }
    }
    
    function updateAtt(int $attendie){
        require('connection.php');
        $dbR = mysqli_query($connection, "SELECT * from volunteers where ID=$attendie");
        $Row = mysqli_fetch_array($dbR);
        $countIn = mysqli_num_rows($dbR);
        $userID = $attendie;
        $FullName = $Row["FName"]. " " .$Row["LName"];
        $Position = $Row["Position"];
    
        $AttendQuery = "INSERT INTO attendance (ID, Name,position) VALUES (?,?,?)";
        $stmt= $connection->prepare($AttendQuery);
        $stmt->bind_param('isi', $attendie, $FullName,$Position);
        $stmt->execute();  
    }

    function mission($tl, $d, $e, $t){
        require('connection.php');
        if($tl==null ){
            $tl[0]=0;
        }
        if($d==null){
            $d[0]=0;
        }
        if($e==null){
            $e[0]=0;
        }
        if($t==null){
            $t[0]=0;
        }
        $dbI = mysqli_query($connection, "INSERT INTO `missions`(`TeamLeader`, `Driver`, `EMT`, `Trainee`) VALUES ($tl[0], $d[0], $e[0], $t[0])");
    }
    ?>

<footer>
    <form id="next-form" method="post" action="Process.php">
    <button id="next" type="submit" value="next" name="next">Next Team</button>
</footer>