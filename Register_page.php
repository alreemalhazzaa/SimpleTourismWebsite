<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ItProject";
$port = 3307;

$conn = new mysqli($servername, $username, $password, $dbname , $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?> 


<!DOCTYPE html>
<html>
    <head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Register page</title>

      <!--link to the css styleSheet-->
      <link rel="stylesheet" href="loginStyle.css">
    </head>
    <body>
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // validate input
    $username = htmlspecialchars(trim($_POST["username"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = htmlspecialchars(trim($_POST["password"]));

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashedPassword);
    if ($stmt->execute()) {
        // Close the statement
        $stmt->close();

        // Close the database connection
        $conn->close();

        // Redirect to the login page
        header("Location: login_page.php");
        exit(); // Ensure no further code is executed after the redirection
    } else {
        // Handle errors (e.g., duplicate entry, database errors)
        echo "Error: " . $stmt->error;
    }

    
}
?>
        <div class="content-box">
            <form action="Register_page.php" method="POST">
    
              <!-- Input for username -->
               <div class="Fform">
                 <label for="username"><b>Username:</b></label>
                 <input type="text" name="username" id="name" required>
                 <br>

                 <!--input for email-->
                 <label for="email"><b>Email:</b></label>
                 <input type="email" name="email" id="email" required>
                 <br>


                 <!-- Input for password -->
                 <label for="password"><b>Password:</b></label>
                 <input type="password" name="password" id="password" required>
                 <br>

                 <!-- Submit button -->
                 <button type="submit"><b>Register</b></button>
                </div>
            </form>

            <!--go to the login page--> 
            <p>Already have an account? <a href="#" id="login-link">login</a></p>
            <!--go to the home page-->
            <a href="#" id="home-link">home page</a>
        </div>
        <!-- JavaScript to handle navigation -->
     <script>
         //to the login page     
         document.getElementById('login-link').addEventListener('click', function (event) {
         event.preventDefault(); // Prevent default link behavior
         window.location.href = 'login_page.php'; // Redirect to the login page
         });

         //to the home page
         document.getElementById('home-link').addEventListener('click', function (event) {
         event.preventDefault(); // Prevent default link behavior
         window.location.href = 'index.html'; // Redirect to the home page
         });
     </script>
 </body>
</html>