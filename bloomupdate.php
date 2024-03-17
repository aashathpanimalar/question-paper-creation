<html>

<head>
    <title>Upload</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type='text'],
        select {
            height: 40px;
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 16px;
            font-size: 1rem;
        }

        select {
            /* Additional styles for the select tag */
            background-color: #fff;
            color: #333;
            cursor: pointer;
        }

        option {
            /* Additional styles for the option tag */
            background-color: #fff;
            color: #333;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        .text {
            color: #333;
            margin-top: 20px;
            font-size: 18px;
            text-align: center;
            color: darkgreen;
            border: black
        }
        

        button[type='submit'] {
            background-color: #008CBA;
        }
        button[type='submit']:hover{
            
            color: black;
            background-color: lightblue;
           
        }
        a {
            color: #008CBA;
            text-decoration: none;
            font-weight: bold;
            margin-left: 10px;
        }

        a:hover {
            color: white;
            background-color: #008CBA;
            border-radius: 1px;/
        }
    </style>
</head>

<body>
    <?php
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "test";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        @$data = $_POST["updateValue"];
        @$column = $_POST["updateColumnName"];

        // Use single quotes around the value in the SQL query
        $sql = "INSERT INTO keywords1 ($column) VALUES ('$data')";

        if ($conn->query($sql) === TRUE) {
            echo "<h4 class='text'>Data Uploaded Successfully!!<h4>";
        } else {
            die("Something is wrong or Error: " . $conn->error);
        }
    }
    mysqli_close($conn);
    ?>

    <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="updateValue">Enter Value:</label>
        <input type="text" id="updateValue" name="updateValue" required><br>

        <label for="updateColumnName">Enter Column Name:</label>
        <select name="updateColumnName" id="updateColumnName" required>
            <option value="remember">Remember</option>
            <option value="understanding">Understanding</option>
            <option value="applying">Applying</option>
            <option value="analyzing">Analyzing</option>
            <option value="evaluate">Evaluate</option>
            <option value="creating">Creating</option>
        </select><br>
        <button type="submit" name="storeData">Store</button>
        <a href="faculty.html">Back</a>
    </form>
    <script>

    </script>
</body>

</html>