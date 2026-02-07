
<!DOCTYPE html>
<html>
  <head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login page</title>

   <!--link to the css styleSheet-->
   <link rel="stylesheet" href="loginStyle.css">
  </head>

  <body>
  <?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ItProject";
$port = 3307;

// Create MySQLi connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form inputs
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Query to check user credentials
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $user); // 's' indicates the parameter type (string)
    $stmt->execute();
    $result = $stmt->get_result();
    $user_data = $result->fetch_assoc();

    if ($user_data && password_verify($pass, $user_data['password'])) {
        // Successful login
        session_start();
        $_SESSION['username'] = $user;
        $_SESSION['id'] = $user_data['id'];
        header("Location: index.php"); // Redirect to home page
        exit;
    } else {
        // Invalid login
        echo "<script>alert('Invalid username or password!');</script>";
    }
}
?>
   <div class="content-box">
     <form action="login_page.php" method="POST">

       <!-- Input for username -->
       <div class="Fform">
         <label for="username"><b>Username:</b></label>
         <input type="text" name="username" id="name" required>
         <br>

         <!-- Input for password -->
         <label for="password"><b>Password:</b></label>
         <input type="password" name="password" id="password" required>
         <br>

         <!-- Submit button -->
         <button type="submit"><b>Login</b></button>
        </div>
      </form>

     <!--go to the register page--> 
     <p>Don't have an account? <a href="#" id="register-link">Register</a></p>
     <!--go to the home page-->
     <a href="#" id="home-link">home page</a>
    </div>
    <!--JavaScript to handle navigation -->
   <script>
     // to the register page
     document.getElementById('register-link').addEventListener('click', function (event) {
     event.preventDefault(); // Prevent default link behavior
     window.location.href = 'Register_page.php'; // Redirect to the register page
     });

     // to the home page
     document.getElementById('home-link').addEventListener('click', function (event) {
     event.preventDefault(); // Prevent default link behavior
     window.location.href = 'index.html'; // Redirect to the home page
     });
   </script>
 </body>
</html>