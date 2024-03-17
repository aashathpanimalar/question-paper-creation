<!DOCTYPE html>
<html lang="en">

<head>
    <title>Faculty Login</title>
    <link rel="shortcut icon" type="x-icon"
        href="https://pbs.twimg.com/profile_images/1274710787911647233/m7ezkR-7_400x400.jpg">
    <style>
        body {
            background-image: url('https://panimalar.ac.in/assets/images/AboutUs/about-us-banner-img.jpg');
            background-size: cover;

        }

        h1 {
            font-size: 30px;
        }

        form {
            margin: 20px;

        }




        input[type="text"] {
            width: 250px;
            padding: 5px;
            font-size: 15px;
            cursor: pointer;
            border-radius: 5px;
            border-width: 2px;
            border-style: solid;
        }

        input[type="password"] {
            padding: 5px;
            font-size: 15px;
            cursor: pointer;
            border-radius: 5px;
            border-width: 2px;
            border-style: solid;
            width: 250px;
        }

        .sign {
            background-color: green;
            color: white;
            border: solid;
            padding: 10px 20px;
            font-size: 20px;
            margin-top: 15px;
            cursor: pointer;
            margin-right: 13px;
            margin-left: 0px;
            margin-top: 0%;
            width: 67%;
            font-family: Arial;
            font-weight: bold;
            opacity: 0.2s;
            border-radius: 9px;

        }

        fieldset {
            background-color: white;
            width: 420px;
            padding: 0px;
            margin-top: 2%;
            margin-left: 6%;
            border-color: orangered;
            border-radius: 30px;
            border-width: 3px;
        }

        h3 {
            margin-left: 9%;
            color: aqua;
            display: inline;

        }
    </style>
</head>

<body>
    <fieldset>
        <center>
            <h1 style="color:#2565AE; font-size: 150%;">WELCOME TO <br>PANIMALAR ENGINEERING COLLEGE</h1>
            <a><img src="https://www.targetadmission.com/img/logos/43265-3048.jpg" width="150px" height="150px"></a>
            <h1 style="color:#DC143C; font-size: 150%;">FACULTY LOGIN</h1>
        </center>
        <form method="post">
            <center>
                <table>
                    <tr>
                        <td><input type="text" placeholder="FACULTY USERNAME" name="username" id="username" required
                                style="width:250px; ">
                        </td>
                    </tr>
                    <tr>
                        <td><input type="password" name="password" required style="margin-top: 7%;"
                                placeholder="PASSWORD" id="password"></td>
                    </tr>
                </table>
            </center><br>

            <center>
                <button type="submit" class="sign">Sign In</button>
            </center>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $servername = "localhost:3307";
            $username = "root";
            $password = "";
            $dbname = "test";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $username = $_POST["username"];
            $pass = $_POST["password"];

            // Fetch user's credentials from the database
            $sql = "SELECT * FROM username WHERE userid = '$username'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $validUsername = $row["userid"];
                $validPassword = $row["pass"];

                // Verify the password
                if ($pass === $validPassword) {
                    // Redirect to faculty.html
                    echo "<script>window.location.href = 'faculty.html';</script>";
                    exit();
                } else {
                    echo "<script>alert('Invalid username or password. Please try again.');</script>";
                }
            } else {
                echo "<script>alert('User not found.');</script>";
            }

            $conn->close();
        }
        ?>

    </fieldset>
</body>

</html>