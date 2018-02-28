<?php
/*
    1.Create connection with host name, username, password, db name)
    2.Create a query with the connection and string query
        #query syntax "SELECT column_name from TABLE"
        #the result of the query is stored in an object
    3.use getch function to get the data into an array using a loop
    4.close connection
    */
   $dbServer = "localhost";
   $dbUser = "ndisho";
   $dbPassword = "ndiSho16";
   $dbName = "trial";
   
   $dbTrialConnection =  mysqli_connect($dbServer, $dbUser, $dbPassword, $dbName);

    if(!$dbTrialConnection){
        echo "Connection failed :".mysqli_connect_error();
    }

    else{
        echo "success";
    }
    $query = "SELECT * FROM firsttable";
    $result = mysqli_query($dbTrialConnection, $query);
    echo "Ordered List<br/>";
   if (mysqli_num_rows($result) > 0) {
       $rows = [];
       for ($i=0; $i < mysqli_num_rows($result) ; $i++) { 
            $rows[$i] = mysqli_fetch_assoc($result);
       }
       
       foreach ($rows as $recordId => $record) {
           echo "<h3>Record ".$recordId."</h3><ul>";
           
            foreach ($record as $property => $value) {
                echo "<li>".$property." : ".$value."</li>";
            }

            echo "</ul>";
       }
       
       echo "<hr/><hr/><hr/>";
       echo "<table border='2'>";
       echo "<thead>";
      
            
           foreach ($rows[0] as $property => $value) {
               echo "<th>$property</th>";
           }
       
       echo "</thead>";
        foreach ($rows as $recordId => $record) {
           echo "<tr>";
                foreach ($record as $property => $value) {
                    echo "<td>$value</td>";
                }
           echo "</tr>";
        }
       echo "</table>";

   }

   else{
       echo "failed";
   }
?>