<html>
	<head>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
	<html>

<?php  
    include('../session.php');
?>
    <head>
         <style>
            #next{
            color: white;
            border: none;
            cursor: pointer;
            width: 100%;
            background-color: #f44336;
            align: center;
            font-size: 35px;
            padding: 12px;
            }

            button:hover {
            opacity: 0.8;
            }
            html,
body {
	height: 100%;
}

.log{
      margin: auto;
  display: block;
}
body {
	margin: 0;
	background: linear-gradient(45deg, #49a09d, #5f2c82);
	font-family: sans-serif;
	font-weight: 100;
    background-size: 100%;
}

.container {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
/*    background-image: url("EMT.png");
    background-position: center; 
    background-repeat: no-repeat;
    background-size: 30%;
    */
}

table {
	width: 50%;
	border-collapse: collapse;
	overflow: hidden;
  box-shadow: 0 0 20px rgba(0,0,0,0.1);
  vertical-align: middle;
  margin: auto;
  padding-top:20px;
  position: relative;
}

th,
td {
	padding: 40px;
	background-color: rgba(255,255,255,0.2);
	color: #fff;
    font-size: 15px;
}

th {
	text-align: left;
}

thead {
	th {
		background-color: #55608f;
	}
}

tbody {
	tr {
		&:hover {
			background-color: rgba(255,255,255,0.3);
		}
	}
	td {
		position: relative;
		&:hover {
			&:before {
				content: "";
				position: absolute;
				left: 0;
				right: 0;
				top: -9999px;
				bottom: -9999px;
				background-color: rgba(255,255,255,0.2);
				z-index: -1;
			}
		}
	}

}
.Titleh1{
    color:white;
    align: center;
    text-align: center;
    padding-top:40px;
    font-size: 50px;
    font-family: 'Signika', sans-serif;
}
.amb{
    width: 20%;
    height: 20%
}
footer{
    position: fixed;
  left: 0;
  bottom: 0;
}
.header img {
  float: left;
  width: 100px;
  height: 100px;
  align: center;
    text-align: center;
    margin-left: 10px;
}

.header h1 {
  position: relative;
  top: 18px;
    padding: 18px 25px;
    margin: 0px 50px;
  color: white;
}
.header{
    align-items: center;
    margin: 10px 30%;
}

.alert{
  padding: 20px;
  background-color: #f44336; /* Red */
  color: white;
  margin-bottom: 15px;
}

}


/* Modal Header */
.modal-header {
  padding: 2px 16px;
  background-color: #FF0000;
  color: white;
}
.modal-header h2{
    color: #ff0000;
}

/* Modal Body */
.modal-body {padding: 2px 16px;}
.modal-body p{
    align: center;
    
}

/* Modal Footer */
.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
  border: 2px solid;
    border-radius: 20px 20px;
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  border: 2px solid blue;
    border-radius: 50px 20px;
  padding: 0;
  border: 1px solid #888;
  width: 50%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  animation-name: animatetop;
  animation-duration: 0.4s;
    text-align: center;
    align-items: center;
    vertical-align: middle;
    margin: 0 auto;
}

/* Add Animation */
@keyframes animatetop {
  from {top: -300px; opacity: 0}
  to {top: 0; opacity: 1}
}

ul {

list-style-type: none;
padding: 0;
overflow: hidden;
background-color: #333;
text-align: center;
align-items: center;
vertical-align: middle;
margin: 0 auto;
text-align:center;
}

li {
display:inline-block;
}

li a {
display: block;
color: white;
text-align: center;
padding: 14px 16px;
text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
background-color: #111;
}

/* The sidebar menu */
.sidenav {
  height: 100%; /* Full-height: remove this if you want "auto" height */
  width: 160px; /* Set the width of the sidebar */
  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
  z-index: 1; /* Stay on top */
  bottom: 0; /* Stay at the top */
  left: 0;
  background-color: #333; /* Black */
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 20px;
}

/* The navigation menu links */
.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
  color: #f1f1f1;
}

/* Style page content */
.main {
  margin-left: 160px; /* Same as the width of the sidebar */
  padding: 0px 10px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.sidenav img{
  margin-top:10px;
  margin-bottom:50px;
  width:100px;
  height:100px;
}
      </style>
    </head>
    <body>
    <ul>
    

    <h1> Welcome<?php $_SESSION['username'] ?></h1>

    <div class="sidenav">
    <img id="logo" src="..\images\logo.png" alt=" Defense"><br>
    <a href="Client.php">Manage Clients</a>
    <a href="AddClient.php">Add Client</a>
    <a href="#"></a>
    <a href="Devices.php">Manage Devices</a>
    <a href="AddDevice.php">Add Device</a>
    <a href="../logout.php">Log Out</a>
    </div>
    </ul>

<?php
include('../session.php');
include('../connection.php');

 
$result = mysqli_query($connection,"SELECT * FROM devices order by ID asc");
echo '
<div>
<div>
    <div>
        <div>
        <br>
			<table class="styled-table">
				<thead>
          <tr>
						<th>ID</th>
						<th>Client ID</th>
						<th>Type</th>
						<th>Location</th>
					</tr>
					</thead>
					<tbody>
					';

while($row = mysqli_fetch_array($result))
{
  echo "<tr>";
  echo "<td> ". $row['ID'] . "</td>";
  echo "<td> ". $row['ClientID'] . "</td>";
  echo "<td> ". $row['Type'] . "</td>";
  echo "<td> " . $row['Location'] . "</td>";
  echo "</tr>";
}
echo "</tbody></table>";



mysqli_close($con);
?>
</body>