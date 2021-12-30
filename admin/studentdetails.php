<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['RollNo']) {
    ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LIBRARY MANAGEMENT SYSTEM</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
    <div class="navbar navbar-fixed-top">
            <div class="navbar-inner" style="background-color:tomato;">
                <div class="container">

                    <a class="brand" href="index.php" style="color: whitesmoke;">LIBRARY MANAGEMENT SYSTEM </a>

                </div>
            </div>

        </div>
        <!-- /navbar -->
        <div class="wrapper" style="background-color: #2E5A6F; border: 2px solid black;">
            <div class="container" style="background-color: #A7DCF5; border:1px solid black;">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="index.php"><i class="menu-icon icon-home"></i>Home
                                </a></li>
                                 <li><a href="message.php"><i class="menu-icon icon-inbox"></i>Messages</a>
                                </li>
                                <li><a href="student.php"><i class="menu-icon icon-user"></i>Manage Students </a>
                                </li>
                                <li><a href="book.php"><i class="menu-icon icon-book"></i>All Books </a></li>
                                <li><a href="addbook.php"><i class="menu-icon icon-edit"></i>Add Books </a></li>
                                <li><a href="requests.php"><i class="menu-icon icon-tasks"></i>Issue/Return Requests </a></li>
                                <li><a href="recommendations.php"><i class="menu-icon icon-list"></i>Book Recommendations </a></li>
                                <li><a href="current.php"><i class="menu-icon icon-list"></i>Currently Issued Books </a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    
                    <div class="span9">
                        <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <h3>Student Details</h3>
                            </div>
                            <div class="module-body">
                        <?php
                            $rno=$_GET['id'];
                            $sql="select * from LMS.user where RollNo='$rno'";
                            $result=$conn->query($sql);
                            $row=$result->fetch_assoc();    
                            
                                $name=$row['Name'];
                                $category=$row['Category'];
                                $email=$row['EmailId'];
                                $mobno=$row['MobNo'];


                                echo "<b><u>Name:</u></b> ".$name."<br><br>";
                                echo "<b><u>Category:</u></b> ".$category."<br><br>";
                                echo "<b><u>Roll No:</u></b> ".$rno."<br><br>";
                                echo "<b><u>Email Id:</u></b> ".$email."<br><br>";
                                echo "<b><u>Mobile No:</u></b> ".$mobno."<br><br>"; 
                            ?>
                            
                        <a href="student.php" class="btn btn-primary">Go Back</a>                             
                               </div>
                           </div>
                        </div>
                    </div>
                    <!--/.span9-->

                </div>
            </div>
            <!--/.container-->
        </div>
<div class="footer">
            <div class="container">
            <b class="copyright">&copy; 2021 Library Management System All rights reserved | Developed By Ramen Manna  </b>
            </div>
        </div>
        
      
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>