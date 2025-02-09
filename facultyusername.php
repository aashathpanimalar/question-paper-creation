<html>

<head>
    <title>Upload username </title>
</head>
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

    input[type='text'] {
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

    button[type='submit']:hover {

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

<body>
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        @$username = $_POST["username"];
        @$password = $_POST["password"];

        // Use single quotes around the value in the SQL query
        $sql = "INSERT INTO username (userid,pass) VALUES ('$username','$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<h4 class='text'>New UserName and Password Created Successfully!!<h4>";
        } else {
            die("Something is wrong or Error: " . $conn->error);
        }
    }
    mysqli_close($conn);
    ?>

    <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Enter New UserName:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Enter New password:</label>
        <input type="text" id="password" name="password" required><br>

        <label for="password1">Re-Enter password:</label>
        <input type="text" id="password1" name="password1" required><br>

        <button type="submit" name="storeData" onclick="return check();">Store</button>

    </form>
    <script>
        function check() {
            var a = document.getElementById("password").value;
            var b = document.getElementById("password1").value;
            if (a !== b) {
                alert("Password Does Not Match");
                return false;

            }

        }
    </script>
</body>

</html>