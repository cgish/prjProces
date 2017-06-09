<?PHP
/* libPHP.php - library of common PHP functions for prjProcess
   used with prjCRUD Website
   Chris Gish           gishc@csp.edu
   Written: 06/02/2017
*/

/* = = = = = = = = = = = = = = = = = = =
Functions are in alphabetical order
= = = = = = = = = = = = = = = = = = = = */

//  _____________________________________________createConnection()
function createConnection( ) {
    global $conn;
    // Create connection object
    $conn = new mysqli(DBF_SERVER, DBF_USER,
        DBF_PASSWORD);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Select the database
    $conn->select_db(DBF_NAME);
} // end of createConnection( )



//______________________________________displayResult($result, $sql)
function displayResult($result, $sql)
{
    if ($result->num_rows > 0) {
        echo "<table border='1'>\n";
        // print headings (field names)
        $heading = $result->fetch_assoc();
        echo "<tr>\n";
        // print field names
        foreach ($heading as $key => $value) {
            echo "<th>" . $key . "</th>\n";
        }
        echo "</tr>\n";

        // Print values for the first row
        echo "<tr>\n";
        foreach ($heading as $key => $value) {
            echo "<td>" . $value . "</td>\n";
        }

        // output rest of the records
        while ($row = $result->fetch_assoc()) {
            //print_r($row);
            //echo "<br />";
            echo "<tr>\n";
            // print data
            foreach ($row as $key => $value) {
                echo "<td>" . $value . "</td>\n";
            }
            echo "</tr>\n";
        }
        echo "</table>\n";
    } else {
        echo "<strong>zero results using SQL: </strong>" . $sql;
    }
}  //end of displayResult ($result, $sql)

//______________________________runQuery($sql, $msg, $echoSuccess)
function runQuery($sql, $msg, $echoSuccess)
{
    global $conn;

    // run the query
    if ($conn->query($sql) === TRUE) {
        if ($echoSuccess) {
            echo $msg . " successful.<br />";
        }
    } else {
        echo "<strong>Error when: " . $msg . "</strong> using SQL: " . $sql
            . "<br />" . $conn->error;
    }
} // end of runQuery( )

?>