<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to check if a table exists
function tableExists($conn, $table) {
    $query = "SHOW TABLES LIKE '$table'";
    $result = $conn->query($query);
    return $result->num_rows > 0;
}

// Create tables if they don't exist
$tables = [
    "questionpaperdetails",
    "parta",
    "partbandc",
    "keywords"
];

foreach ($tables as $table) {
    if (tableExists($conn, $table)) {
        echo "Table '$table' already exists.<br>";
    } else {
        $sql = "";

        if ($table === "questionpaperdetails") {
            $sql = "CREATE TABLE questionpaperdetails (
                id INT AUTO_INCREMENT PRIMARY KEY,
                subject_code VARCHAR(50) NOT NULL,
                subject_name VARCHAR(255) NOT NULL,
                semester VARCHAR(10) NOT NULL,
                year_of_student VARCHAR(10) NOT NULL,
                academic_year VARCHAR(20) NOT NULL,
                faculty_id VARCHAR(50) NOT NULL,
                questionpaperid VARCHAR(50) UNIQUE NOT NULL,
                examtype VARCHAR(50) NOT NULL,
                dep VARCHAR(100) NOT NULL,
                dateofexam DATE NOT NULL
            );";
        } elseif ($table === "parta") {
            $sql = "CREATE TABLE parta (
                id INT AUTO_INCREMENT PRIMARY KEY,
                questionpaperid VARCHAR(50) NOT NULL,
                question1 TEXT, mark1 INT, co1 VARCHAR(10), b1 VARCHAR(10),
                question2 TEXT, mark2 INT, co2 VARCHAR(10), b2 VARCHAR(10),
                question3 TEXT, mark3 INT, co3 VARCHAR(10), b3 VARCHAR(10),
                question4 TEXT, mark4 INT, co4 VARCHAR(10), b4 VARCHAR(10),
                question5 TEXT, mark5 INT, co5 VARCHAR(10), b5 VARCHAR(10),
                question6 TEXT, mark6 INT, co6 VARCHAR(10), b6 VARCHAR(10),
                question7 TEXT, mark7 INT, co7 VARCHAR(10), b7 VARCHAR(10),
                question8 TEXT, mark8 INT, co8 VARCHAR(10), b8 VARCHAR(10),
                question9 TEXT, mark9 INT, co9 VARCHAR(10), b9 VARCHAR(10),
                question10 TEXT, mark10 INT, co10 VARCHAR(10), b10 VARCHAR(10),
                u1 VARCHAR(10), u2 VARCHAR(10), u3 VARCHAR(10), u4 VARCHAR(10), u5 VARCHAR(10),
                u6 VARCHAR(10), u7 VARCHAR(10), u8 VARCHAR(10), u9 VARCHAR(10), u10 VARCHAR(10),
                FOREIGN KEY (questionpaperid) REFERENCES questionpaperdetails(questionpaperid) ON DELETE CASCADE
            );";
        } elseif ($table === "partbandc") {
            $sql = "CREATE TABLE partbandc (
                id INT AUTO_INCREMENT PRIMARY KEY,
                questionpaperid VARCHAR(50) NOT NULL,
                question11a TEXT, mark11a INT, co11a VARCHAR(10), b11a VARCHAR(10),
                question11b TEXT, mark11b INT, co11b VARCHAR(10), b11b VARCHAR(10),
                question12a TEXT, mark12a INT, co12a VARCHAR(10), b12a VARCHAR(10),
                question12b TEXT, mark12b INT, co12b VARCHAR(10), b12b VARCHAR(10),
                question13a TEXT, mark13a INT, co13a VARCHAR(10), b13a VARCHAR(10),
                question13b TEXT, mark13b INT, co13b VARCHAR(10), b13b VARCHAR(10),
                question14a TEXT, mark14a INT, co14a VARCHAR(10), b14a VARCHAR(10),
                question14b TEXT, mark14b INT, co14b VARCHAR(10), b14b VARCHAR(10),
                question15a TEXT, mark15a INT, co15a VARCHAR(10), b15a VARCHAR(10),
                question15b TEXT, mark15b INT, co15b VARCHAR(10), b15b VARCHAR(10),
                question16a TEXT, mark16a INT, co16a VARCHAR(10), b16a VARCHAR(10),
                question16b TEXT, mark16b INT, co16b VARCHAR(10), b16b VARCHAR(10),
                u11a VARCHAR(10), u11b VARCHAR(10), u12a VARCHAR(10), u12b VARCHAR(10),
                u13a VARCHAR(10), u13b VARCHAR(10), u14a VARCHAR(10), u14b VARCHAR(10),
                u15a VARCHAR(10), u15b VARCHAR(10), u16a VARCHAR(10), u16b VARCHAR(10),
                FOREIGN KEY (questionpaperid) REFERENCES questionpaperdetails(questionpaperid) ON DELETE CASCADE
            );";
        } elseif ($table === "keywords") {
            $sql = "CREATE TABLE keywords (
                id INT AUTO_INCREMENT PRIMARY KEY,
                Remembering VARCHAR(50),
                Understanding VARCHAR(50),
                Applying VARCHAR(50),
                Analyzing VARCHAR(50),
                Evaluating VARCHAR(50),
                Creating VARCHAR(50)
            );";
        }

        if ($conn->query($sql) === TRUE) {
            echo "Table '$table' created successfully.<br>";
        } else {
            echo "Error creating table '$table': " . $conn->error . "<br>";
        }
    }
}
// Close connection
$conn->close();
?>