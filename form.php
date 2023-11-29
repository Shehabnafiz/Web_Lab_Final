<?php

    echo "<h1>This is the form page</h1>";
    
    $nameErr = $emailErr = $phoneErr = "";
    $name = $email = $phone = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        if (empty($name)) {
            $nameErr = "Name is required";
        }

        if (empty($email)) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($email);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if (empty($phone)) {
            $phoneErr = "Phone is required";
        } else {
            $phone = test_input($phone);
            if (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
                $phoneErr = "Invalid phone format";
            }
        }

        if ($nameErr == "" && $emailErr == "" && $phoneErr == "") {
            // your server-side code to process the form data goes here

            // example mysql insert statement
            $servername = "localhost";
            $username = "admin";
            $password = "password";
            $dbname = "webLab";

            // create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO users (name, email, phone) VALUES ('$name', '$email', '$phone')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>