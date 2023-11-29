<?php
    // database connection
    $servername = "localhost";
    $username = "admin";
    $password = "password";
    $dbname = "webLab";
    $conn = new mysqli($servername, $username, $password, $dbname);
    

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // PHP form handling

    // Check if form is submitted

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Get input data from form

        $email = $_POST["email"];

        $password = $_POST["password"];


        // Query database for matching user credentials

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

        $result = $conn->query($sql);


        if ($result->num_rows > 0) {

            // Valid user, show user information

            while($row = $result->fetch_assoc()) {

                echo "User ID: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. "<br><br>";

            }

        } else {

            echo "Invalid user credentials";

        }

    }

    // fetch applicants in descending order
    $sql = "SELECT * FROM applicants ORDER BY id DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. " - Phone: " . $row["phone"]. "<br><br>";
        }
    } else {
        echo "0 results";
    }


    // get applicant details by id

    $id = isset($_GET['id']) ? $_GET['id'] : '';

    $sql = "SELECT * FROM applicants WHERE id='$id'";

    $result = $conn->query($sql);


    if ($result->num_rows > 0) {

        // output data of each row

        while($row = $result->fetch_assoc()) {

            echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. " - Phone: " . $row["phone"]. "<br><br>";

        }

    } else {

        echo "0 results";

    }

    $conn->close();
