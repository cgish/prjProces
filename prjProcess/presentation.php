<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Presentation Page for Chris Gish'd prjProcess.">
    <meta name="robots" content="noindex, nofollow">

    <title>Chris Gish's Presentation Page</title>

    <!-- presentation.php - Week 4 Individual Project Presentation page
    Written by: Chris Gish 06/06/2017       gishc@csp.edu
    Revised:
    -->

        <!--Bootstrap Screen Resolutions:
    lg - Large width      retina    1200px+
    md - medium width     desktop    992px+
    sm - small width      tablets    768px+
    xs - xtra small       mobile       0px+  -->

    <script>
        new Date().toLocaleDateString()
            = "9/13/2015"
    </script>
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
        define('DBF_SERVER', 'sql105.byethost7.com');//TODO FixMe
        define('DBF_NAME', 'b7_19791672_awesomeStuff');//TODO FixMe
        define('DBF_USER', 'b7_19791672');//TODO FixMe
        define('DBF_PASSWORD', 'Leerockwell81610!');//TODO FixMe
    }

    //Links external PHP library file
    require_once("libPHP.php");

    ?>
</head>
<body>

<div class='navbar navbar-default navbar-fixed-top '>
    <div class='container'>
        <span class='sr-only'><a href="#skip">Skip Navigation</a></span>
        <div class='navbar-header'>
            <img src="graphic/myPortait.jpg" alt="A portrait of Christopher Gish" id="CGPic" class="img-responsive"/>
            <a href="/" class='navbar-brand'>Chris Gish's Presentation Page<br>Employee Scheduling Application<br></a>
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
    </div>      <!-- .container -->
</div>

<div class="container"><!--    Page Container    -->
    <div class="row"><!--    Start of Row 1    -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <br><br><br>
            <h3>Project started: 6/6/2017</h3>
            <h3>Today's Date: <script> document.write(new Date().toLocaleDateString()); </script></h3>

            <!--<h1>dbf Create Page</h1>
            <strong> Has not been written yet</strong>-->
            <!--<br>
            <hr>
<br>
<a href="dbfCreate.php">Create Database Page</a><br />
<a href="edit.php">Edit Tables Page</a><br />
<a href="presentation.php">Presentation Page</a><br />
<a href="proofOfConcept.php">Proof of concept page</a><br />
<a href="index.php">Index Page</a>
-->
            <hr>
            <!--
            <p>
                Step 1. Needs Assessment (10 points)
                Create a web page named presentation.php containing at least five questions you would ask a client in order to complete this project.
                Then, acting as the client, answer these questions. As a guide, you can start with the five Ws (Who, What, When, Where, and Why).
                Display an HTML table showing at least four records of data to use for testing the app.</p>
            <ul>
                <li>Design this page as a presentation for your client. (Your instructor is your client in this case.)</li>
                <li>Keep UX (User experience) and readability in mind using headings, bullet points, bold and regular, and other
                    HTML/CSS techniques. For example, display the questions using bold text and the answers as regular text.</li>
                <li>Include your name, the title you are giving your project, and the current date at the top of the page. This information should display.
                    (This information should also be included as part of the standard comment block at the top of your code.)</li>
            </ul>


            <hr />-->
            <h2>Questions I would ask a client in order to complete this project</h2>
            <ol>
                <li><strong>Who will use this employee scheduling program?</strong>This project is for the benefit of multiple
                    parties that need to access it.  Employees  will need an easy interface to see their work schedules.  Management will use the project to add employees,
                    and create work schedules.  HR will need to view previous schedules in the event of disciplinary actions.</li>
                <br />
                <li><strong>What will need to be saved for HR, and other long term storage?</strong>The data itself will need
                    to be kept for seven years.  We would need the employee's name, scheduled date and shift.  We would like
                    this to be able to be displayed separate from what the active employees see.</li>
                <br />
                <li><strong>Will anything need to be able to be printed off?</strong>Yes, we would need paper copies for the
                    employee file when necessary.</li>
                <br />
                <li><strong>Or will the data need to be saved in other formats?</strong>A screen that we could print or save as a
                    pdf with chrome's print dialogue would be fine.</li>
                <br />
                <li><strong>If so, what are those  formats?</strong>See above, PDF via screen print if necessary.</li>
                <br />
                <li><strong>When will this need to be fully completed?</strong>Sunday, June 11, 2017</li>
                <br />
                <li><strong>When can we review an initial sample of the program?</strong>Anytime.  Just email me.</li>
                <br />
                <li><strong>Where will the program be used?</strong>The program will be implemented on the companies intranet.</li>
                <br />
            </ol>
        </div>

    </div><!--    End of Row 1    -->
    <div class="row"><!--    Start of Row 2    -->
        <hr />
        <h2>Test Data</h2>
        <div class="table-responsive">
            <table class="table>"
                <tr><th>Name</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                </tr>
                <!--_______________Jimmy______________-->
                <tr>
                    <td rowspan="3">Jimmy</td>
                    <td>06/15/2017</td>
                    <td>08:00</td>
                    <td>16:00</td>
                </tr>
                <tr>
                    <td>06/16/2017</td>
                    <td>09:00</td>
                    <td>17:00</td>
                </tr>
                <tr>
                    <td>06/17/2017</td>
                    <td>12:00</td>
                    <td>20:00</td>
                </tr>
                <!--________________Jane_____________-->
                <tr>
                    <td rowspan="3">Jane</td>
                    <td>06/15/2017</td>
                    <td>10:00</td>
                    <td>16:00</td>
                </tr>
                <tr>
                    <td>06/16/2017</td>
                    <td>09:00</td>
                    <td>20:00</td>
                </tr>
                <tr>
                    <td>06/17/2017</td>
                    <td>12:00</td>
                    <td>20:00</td>
                </tr>
                <!--__________________Jorge_____________-->
                <tr>
                    <td rowspan="3">Jorge</td>
                    <td>06/15/2017</td>
                    <td>14:00</td>
                    <td>22:00</td>
                </tr>
                <tr>
                    <td>06/16/2017</td>
                    <td>14:00</td>
                    <td>22:00</td>
                </tr>
                <tr>
                    <td>06/17/2017</td>
                    <td>12:00</td>
                    <td>20:00</td>
                </tr>
                <!--___________________Melissa__________-->
                <tr>
                    <td rowspan="3">Melissa</td>
                    <td>06/15/2017</td>
                    <td>06:00</td>
                    <td>14:00</td>
                </tr>
                <tr>
                    <td>06/16/2017</td>
                    <td>07:00</td>
                    <td>15:00</td>
                </tr>
                <tr>
                    <td>06/17/2017</td>
                    <td>12:00</td>
                    <td>18:00</td>
                </tr>
            </table>
            <br />
            <hr />


        </div>
    </div><!--    End of Row 2    -->

    <div class="row"><!--    Start of row 3    -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <!--<p>Step 2. Problem Analysis (10 points)
At the bottom of presentation.php describe at least two ways you could approach this application as the developer. For example, you might suggest using a plain text
    file to store the data as one approach and a database as a second approach.  Decide which is the best approach for your client and write a short paragraph highlighting your recommendation and why it is the best option for your client.</p>

You may find it helpful to answer the following questions:<br />
<ul>
        <li>How will the data be handled? What are some alternative formats for the data?</li>
        <li>What will the Ul be like, from when the user clicks on a link to when information displays? Visualize this using a simple sketch or flowchart.
            (A sketch is worth a thousand words to every client!)</li>
        <li>What can you do to make the information appealing and readable for your client? (Imagine that you are submitting a competing bid to get the job.)
            Include a menu on presentation.php that will have links to the following pages:</li>
        <li>Presentation linking to this presentation.php file</li>
        <li>Home Displaying the information for the user (index.php)</li>
        <li>Edit The editing or management page (edit.php). Normally this would not be visible to the user, but this will make grading go smoother for the instructor.</li>
</ul>
<hr />-->
            <div class="well">
                        <h2>Problem Analysis</h2>
                        <p>The possibilities for approaching this project are interesting. The client is looking for an employee scheduling solution to use on their company's
                            intranet. The archival requirements necessitate some form of long term storage solution. Because of this, arrays saved within session data becomes
                            an invalid option. The requirements dictating that the archival data be separate from what the active employees see makes saving the information
                            with the Excel spreadsheet or plain text file difficult. JSON could be a viable option, but that is not been covered as of yet, and it is unknown if
                            that would meet the seven year archival requirements dictated by the client. A simple SQL database would be the direction to go within this project,
                            as it meets the archival needs dictated by the client. The UI would need to be simple and straightforward so employees of the widest possible
                            demographic could use it easily.  The UX would also need to be uncomplicated and easy for anyone to use.</p>
            </div>
        </div>
    </div><!--    End of row 3    -->

        <div class="row"><!--    Start of row 4    -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <p><i>Click image for full sized view of proposed solution</i></p>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
        <div id="mockHomePage">
            <a href="graphic/mockHomePage.png" target="_blank"><img class="img-thumbnail" width="400" height="300"
                                                                    src="graphic/mockHomePage.png"
                                                                    id="mockAppHomePage"></a><br /><br />
            <strong>User Home Page</strong><br />
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
        <div id="mockAdminHome">
            <a href="graphic/mockAdminHome.png" target="_blank"><img class="img-thumbnail" width="400" height="300"
                                                                     src="graphic/mockAdminHome.png"
                                                                     id="mockAdminHomePage"></a><br /><br />
            <strong>Admin Home Page</strong><br />
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
        <div id="mockAdminViewEdit">
            <a href="graphic/mockAdminViewEdit.png" target="_blank"><img class="img-thumbnail" width="400" height="300"
                                                                         src="graphic/mockAdminViewEdit.png"
                                                                         id="mockAdminViewEditPage"></a><br /><br />
            <strong>Admin View-Edit Page</strong></<br />
    </div>
</div>
    </div><!--    End of row 4    -->


<div class="row"><!--    Start of row 5    -->
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div id="dataLayout">
            <div id="tableData">
                <a href="graphic/dataBaseLayout.png" target="_blank"><img class="img-thumbnail" width="400" height="200"
                                                                          src="graphic/dataBaseLayout.png"
                                                                          id="datalayout"></a><br /><br />
                <strong>Database Layout with Sample Data Included</strong>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div id="dataTable">
            <a href="graphic/dataTablesLayout.png" target="_blank"><img class="img-thumbnail" width="400" height="200"
                                                                        src="graphic/dataTablesLayout.png"
                                                                        id="dataTablePng"></a><br /><br />
            <strong>Table Diagram</strong>
        </div>
    </div>

</div><!--    End of row 5    ->

        <div class="row"><!--    Start of row 6    -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
</div>
</div><!--    End of row 6    ->

</div><!--    End of Page Container    -->
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
<link rel="stylesheet" type="text/css" href="stylePresentation.css">

</body>
</html>
