<?php
session_start();
if (!isset($_SESSION['AdminLoginId'])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/dash.css">
    <script>
        // js to open and close Contact table using button 
        function toggleTable() {
            var table = document.getElementById("data-table");
            table.style.display = (table.style.display === "none") ? "table" : "none";
        }

        // js to open and close Admission table using button 

        function toggleTable1() {
            var table = document.getElementById("data-table1");
            table.style.display = (table.style.display === "none") ? "table" : "none";
        }

        // js to open and close Feedback table using button 

        function toggleTable2() {
            var table = document.getElementById("data-table2");
            table.style.display = (table.style.display === "none") ? "table" : "none";
        }
    </script>
</head>

<body>
    <!-- Header starts -->
    <div class="header">
        <h1>Admin Panel</h1>

        <form method="POST">
            <button name="logout">Logout</button>
        </form>
        <?php
        if (isset($_POST['logout'])) {
            session_destroy();
            header("location: login.php");
        }
        ?>
    </div><br><br><br>
    <!-- header ends -->

    <!-- first table starts  -->
    <div class="container">
        <button onclick="toggleTable()">View Contact Enquires</button>
        <div id="data-table" style="display: none;">
            <?php
            // Database configuration
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname1 = "asd";
            $dbname2 = "admission";

            // Create connections
            $conn1 = new mysqli($servername, $username, $password, $dbname1);



            // Check connections
            if ($conn1->connect_error) {
                die("Connection failed: " . $conn1->connect_error);
            }

            // Retrieve SQL information from the "asd" database
            $sql1 = "SELECT * FROM contacts";
            $result1 = $conn1->query($sql1);



            // Display the data from the "asd" database
            if ($result1 && $result1->num_rows > 0) {
                echo "<h2>Database: Contacts</h2>";
                echo "<table>";
                echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Subject</th><th>Message</th></tr>";

                while ($row = $result1->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["subject"] . "</td>";
                    echo "<td>" . $row["message"] . "</td>";

                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No Contacts enquires were found</p>";
            }
            // Close the connections
            $conn1->close();
            ?>
        </div>


    </div><br>
    <!-- first table ends -->

    <!-- second table starts -->

    <div class="container">
        <button onclick="toggleTable1()">Admission Enquires</button>
        <div id="data-table1" style="display: none;">
            <?php
            $conn2 = new mysqli($servername, $username, $password, $dbname2);

            if ($conn2->connect_error) {
                die("Connection failed :" . $conn2->connect_error);
            }
            $conn2 = new mysqli($servername, $username, $password, $dbname2);
            // Retrieve SQL information from the "admission" database
            $sql2 = "SELECT * FROM admissions";
            $result2 = $conn2->query($sql2);


            // Display the data from the "admission" database
            if ($result2 && $result2->num_rows > 0) {
                echo "<h2>Database: admission</h2>";
                echo "<table>";
                echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Batch</th><th>Branch</th><th>Phone no.</th><th>Time created</th></tr>";

                while ($row = $result2->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["batch"] . "</td>";
                    echo "<td>" . $row["branch"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["created_at"] . "</td>";


                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No admission enquires were found</p>";
            }
            $conn2->close();
            ?>
        </div>
    </div><br>
    <!-- second table ends -->
    <!-- third table starts -->

    <div class="container">
        <button onclick="toggleTable2()">View Alumni feedback</button>
        <div id="data-table2" style="display: none;">


            <?php

            // Create connections
            $conn1 = new mysqli($servername, $username, $password, $dbname1);
            // Retrieve SQL information from the "Alumni feedback" database
            $sql3 = "SELECT * FROM alumni_feedback";
            $result3 = $conn1->query($sql3);


            // Display the data from the "admission" database
            if ($result3 && $result3->num_rows > 0) {
                echo "<h2>Database: Alumni Feedback</h2>";
                echo "<table>";
                echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Batch</th><th>Feedback</th><th>Time created</th></tr>";

                while ($row = $result3->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["batch"] . "</td>";
                    echo "<td>" . $row["feedback"] . "</td>";
                    echo "<td>" . $row["created_at"] . "</td>";


                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<p>No Alumni Feedback were found</p>";
            }
            // Close the connections
            $conn1->close();
            ?>
        </div>
        <!-- third table ends -->

</body>

</html>