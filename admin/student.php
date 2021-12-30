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
            <div class="container" style="background-color: #A7DCF5; border: 2px solid black;">
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
                        <form class="form-horizontal row-fluid" action="student.php" method="post">
                                        <div class="control-group">
                                            <label class="control-label" for="Search"><b>Search:</b></label>
                                            <div class="controls">
                                                <input type="text" id="title" name="title" placeholder="Enter Name/Roll No of Student" class="span8" required>
                                                <button type="submit" name="submit"class="btn">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                    <br>
                                    <?php
                                    if(isset($_POST['submit']))
                                        {$s=$_POST['title'];
                                            $sql="select * from LMS.user where (RollNo='$s' or Name like '%$s%') and RollNo<>'ADMIN'";
                                        }
                                    else
                                        $sql="select * from LMS.user where RollNo<>'ADMIN'";

                                    $result=$conn->query($sql);
                                    $rowcount=mysqli_num_rows($result);

                                    if(!($rowcount))
                                        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                                    else
                                    {

                                    
                                    ?>
                        <table class="table" id = "tables">
                                  <thead>
                                    <tr>
                                      <th>Name</th>
                                      <th>Roll No.</th>
                                      <th>Email id</th>                                      
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                    <?php
                            
                            //$result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {

                                $email=$row['EmailId'];
                                $name=$row['Name'];
                                $rollno=$row['RollNo'];
                            ?>
                                    <tr>
                                      <td><?php echo $name ?></td>
                                      <td><?php echo $rollno ?></td>
                                      <td><?php echo $email ?></td>                                      
                                        <td>
                                        <center>
                                            <a href="studentdetails.php?id=<?php echo $rollno; ?>" class="btn btn-success">Details</a>
                                           <a href="remove_student.php?id=<?php echo $rollno; ?>" class="btn btn-danger">Remove</a>
                                           </center>
                                        </td>
                                    </tr>
                            <?php }} ?>
                                  </tbody>
                                </table>
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