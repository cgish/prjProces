<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Presentation Page for Chris Gish'd prjProcess.">
    <meta name="robots" content="noindex, nofollow">

    <title>Chris Gish's database Create Page</title>

    <!-- dbfCreate.php - Week 4 Individual Project Database Create page
    Written by: Chris Gish 06/06/2017       gishc@csp.edu
    Revised:

    -->
    <?php

    /* Server Sniffer Snippet -
               Is this page running on the localhost or the remote server?
      http://stackoverflow.com/questions/2053245/
               how-can-i-detect-if-the-user-is-on-localhost-in-php
     */
    $whitelist = array('127.0.0.1','::1');
    //echo "DEBUG \$_SERVER['REMOTE_ADDR'] is: "
    //   . $_SERVER['REMOTE_ADDR'] . '<br>';
    //echo  print_r($_POST);//DEBUG

    if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
        // Credentials for localhost (Using AMPPS)
        define('DBF_SERVER', 'localhost');
        define('DBF_NAME', 'employeeScheduleApp');
        define('DBF_USER', 'root');
        define('DBF_PASSWORD', 'mysql');
    }
    else
    {
        // credentials for BYET server
        // Fill in your server information
        define('DBF_SERVER', 'sql105.byethost7.com');
        define('DBF_NAME', 'b7_19791672_employeeScheduleApp');
        define('DBF_USER', 'b7_19791672');
        define('DBF_PASSWORD', 'Leerockwell81610!');
    }

    //Links external PHP library file
    require_once("libPHP.php");

    ?>
</head>
<body>
<!--_________________________________________NavBar________-->
<div class='navbar navbar-default navbar-fixed-top '>
    <div class='container'>
        <span class='sr-only'><a href="#skip">Skip Navigation</a></span>
        <div class='navbar-header'>
            <img src="graphic/myPortait.jpg" alt="A portrait of Christopher Gish" id="CGPic" class="img-responsive"/>
            <a href="/" class='navbar-brand'>Employee Scheduling Application<br></a>
            <!-- create button for hamburger icon -->
            <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
                <!-- Add the hamburger icon -->
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
            </button>
        </div>            <!-- .navbar-header -->
        <ul class='nav navbar-nav navbar-right collapse navbar-collapse'>
            <?PHP include 'nav.php' ?>
        </ul>
    </div>      <!-- /container -->
</div><!-- ________________________________________/NavBar__ -->


<!--  __________________________________  ContentContainer  __  -->
<div class="container">

    <!--____________________________________Start of Row1____-->
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <br /><br /><br/>
            <h1>Create Database</h1>
        </div>
    </div><!--_______________________________/Row1____________-->



    <!--  ______________________________  Start of Row2_______    -->
    <div class="row">
        <!--___________________________________Start Col1______-->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="well">
                <?php

                // Create connection object
                createConnection( );

                //Check connection
                if ($conn->connect_error)  {
                    die("Connection Failed: " . $conn->connect_error);
                }

                //start with a new database to start primary key at 1
                $sql = "DROP DATABASE " . DATABASE_NAME;
                runQuery($sql, "DROP" . DATABASE_NAME, FALSE);

                //Create database if it dosn't exist
                $sql = "CREATE DATABASE IF NOT EXISTS " . DATABASE_NAME;
                //if ($conn->query($sql) === TRUE) {
                //    echo "The database " . DATABASE_NAME . "exists or was created successfully!<br />";
                //} else {
                //   echo "Error creating database " . DATABASE_NAME . ":" . $conn->error;
                //    echo "<br />";
                //}
                runQuery($sql, "Creating " . DATABASE_NAME, true);

                //Select the database
                $conn->select_db(DATABASE_NAME);

                /******************************************************************
                 *              create the tables
                 *****************************************************************/
                //create Table:employees
                $sql = "CREATE TABLE IF NOT EXISTS employees (
                id_ee                        INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                fName                      VARCHAR(20) NOT NULL,
                lName                      VARCHAR(20) NOT NULL,
                eeNumber                 SMALLINT  NOT NULL,
                scheduledDate          DATE NOT NULL,
                scheduledStart         TIME NOT NULL,
                scheduledEnd           TIME NOT NULL,
                eeStatus                  INT(6) NOT NULL

)";

                runQuery($sql, "Creating employees", TRUE);

                //create Table:eeStatus
                $sql = "CREATE TABLE IF NOT EXISTS eeStatus (
                id_status         int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                eeStatus         VARCHAR(10) NOT NULL
)";
                runQuery($sql, "Creating Employee Status Table", TRUE);


                /******************************************************************
                 *          Populate tables using sample data
                 * ****************************************************************/
                //populate Table:runner

                $eeArray = array(
                    array(' ', 'Jimmy', 'Vaughn', 55, 2017-06-15, 08-00-00, 16-00-00, '1'),
                    array(' ', 'Jimmy', 'Vaughn', 55, 2017-06-16, 09-00-00, 17-00-00, '1'),
                    array(' ', 'Jimmy', 'Vaughn', 55, 2017-06-17, 12-00-00, 20-00-00, '1'),
                    array(' ', 'Jane', 'Doe', 183, 2017-06-15, 10-00-00, 16-00-00, '2'),
                    array(' ', 'Jane', 'Doe', '183', '2017-06-16', '09-00-00', '20-00-00', '2'),
                    array(' ', 'Jane', 'Doe', '183', '2017-06-17', '12-00-00', '20-00-00', '2'),
                    array(' ', 'Jorge', 'Lopez', '81610', '2017-06-15', '14-00-00', '22-00-00', '1'),
                    array(' ', 'Jorge', 'Lopez', '81610', '2017-06-16', '14-00-00', '22-00-00', '1'),
                    array(' ', 'Jorge', 'Lopez', '81610', '2017-06-17', '12-00-00', '20-00-00', '1'),
                    array(' ', 'Melissa', 'Rivers', '11372', '2017-06-15', '06-00-00', '14-00-00', '6'),
                    array(' ', 'Melissa', 'Rivers', '11372', '2017-06-16', '07-00-00', '15-00-00', '6'),
                    array(' ', 'Melissa', 'Rivers', '11372', '2017-06-17', '12-00-00', '18-00-00', '6'),

                );
                print_r($eeArray);

                foreach ($eeArray as $ee) {
                    echo $ee[0] . " " . $ee[1] . "<br />";
                    $sql = "INSERT INTO employees (id_ee, fName, Lname, eeNumber, 'scheduleDate', 'scheduleStart', 'scheduleEnd', 'eeStatus') "
                        . "VALUES ('" . $ee[0] . "','"
                        . $ee[1] . "', '"
                        . $ee[2] . "', '"
                        . $ee[3] . "', '"
                        . $ee[4] . "', '"
                        . $ee[5] . "', '"
                        . $ee[6] . "', '"
                        . $ee[7] . "')";

                    runQuery($sql, "Record Inserted for: $ee[1]", true);
                }


                //populate Table:color

                $statusArray = array(
                    array(' ', 'Active'),
                    array(' ', 'LOA-Paid'),
                    array(' ', 'LOA-Unpaid'),
                    array(' ', 'Layoff'),
                    array(' ', 'Term'),
                    array(' ', 'FMLA'),
                );
                print_r($statusArray);

                foreach ($statusArray as $statusEE) {
                    echo $statusEE[0] . " " . $statusEE[1] . "<br />";
                    $sql = "INSERT INTO eestatus (id_status, eeStatus) "
                        . "VALUES ('" . $statusEE[0] . "','" . $statusEE[1] . "')";

                    runQuery($sql, "Record Inserted for: $statusEE[1]", true);
                }



                $conn->close();


                ?>
            </div>
        </div><!--____________________________/Col1____________-->

        <!--___________________________________Start Co#2______-->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="well">Row2Col2</div>
        </div><!--________________________________/Col2_________-->

    </div><!--________________________________/Row2_________-->



</div><!--______________________________/ContentContainer____-->
<!--_____________________________________________________________________________PAGE-FOOTER_____________________________________-->
<div class="container">
    <footer class="footer">
        <div class="container text-left navbar-bottom">
            <cite>Created by Chris Gish,  gishc@csp.edu</cite>
        </div>
    </footer>
</div>


<!--____________________________________________________________________________________________Load-CDN-Libraries________________________________-->
<!-- (1) jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<!-- (2) Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- (3) Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<!-- (4) Bring in local JavaScript functions -->
<!--<script src="script.js"></script>-->
<!-- (5) Connect to local CSS for this site -->
<link rel="stylesheet" type="text/css" href="style.css">

</body>
</html></body>
</html>
