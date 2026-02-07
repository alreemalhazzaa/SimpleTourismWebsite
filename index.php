<!DOCTYPE html>
<html>
    <head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>home page</title>

     <!--link to the css styleSheet-->
     <link rel="stylesheet" href="HomeStyle.css">
   </head>
   <body>
   <div class="message">
    <?php
    // Start the session
    session_start();
    
    // Database connection (replace with your actual database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ItProject";
    
    $port = 3307;
    $conn = new mysqli($servername, $username, $password, $dbname, $port);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Check if user is logged in
    if (isset($_SESSION['id'])) {
        // Fetch the user's name from the database
        $userId = $_SESSION['id'];
        $query = "SELECT username FROM users WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->bind_result($name);
        $stmt->fetch();
        $stmt->close();
    
        // Display the welcome message
        echo "Welcome, " . htmlspecialchars($name) . "!";
    }
    
    // Close the database connection
    $conn->close(); ?> </div>
     <header>
          <h1>Welcome to AlRass Entertainment Guide</h1>
          <p>Where we recommend the best spots for fun and relaxation!</p>
         </header>

      <!--go to the login page--> 
      <nav>
          <a href="#" id="AllLIsts-link">click here to see the lists </a>
      </nav> 
     <!--go to the lists page-->
     <section class="Fsection">
         <h1>We have collected the Top rated popular places</h1>
      </section>

       <!--The section element is used to arrange the page  -->
      <section class="places-container" id="Ssection">
          
         <div class="place-card">
             <img src="https://lh3.googleusercontent.com/p/AF1QipPD2Z9Lnl2nWbW5QVorJP2tNJje1YdomRqw4qo0=s1360-w1360-h1020" alt="restaurants Image">
             <h3>Restaurants</h3>
             <p>Different types of Restaurants</p>
         </div>

         <div class="place-card" id="cafes">
             <img src="https://lh3.googleusercontent.com/p/AF1QipMty4JAX2wn5N28pyCgzrPjPoK7cK5gCX4J5sIR=s1360-w1360-h1020" alt="Cafe Image">
             <h3>Cafes</h3>
             <p>Top rated popular Cafes!</p>
          </div>

         <div class="place-card" id="events">
             <img src="https://lh3.googleusercontent.com/p/AF1QipPrFDcNulslPvNlJvtZV9bUU9iHVNe_91hdnefI=s1360-w1360-h1020" alt="event Image">
             <h3>Events</h3>
             <p>Event places where you can entertain yourself in one place</p>
         </div>
         
      </section>

      <footer>
          <p>Made by:Leena Alturaifi & Alreem Alhazza</p>
      </footer>

      <!-- JavaScript to handle navigation -->
     <script>
         //to the lists page  
         document.getElementById('AllLIsts-link').addEventListener('click', function (event) {
         event.preventDefault(); // Prevent default link behavior
         window.location.href = 'AllListsPage.html'; // Redirect to the lists page
         });
     </script>                  
                
    </body>
</html>