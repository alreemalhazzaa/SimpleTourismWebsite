<?php 
session_start(); // Start the session

// Database connection setup 
$servername = "localhost"; 
$username = "root";  
$password = "";  
$dbname = "ItProject";  
 
// Create connection 
$port = 3307;
$conn = new mysqli($servername, $username, $password, $dbname, $port); 
 
// Check connection 
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
} 
 
// Initialize variables 
$name = ""; 
$phone = ""; 
$restaurant = ""; 
$date = ""; 
$time = ""; 
$members = 0; 
 
if (isset($_SESSION['username'])) { 
    $name = $_SESSION['username']; 
} else { 
    die("Error: User is not logged in."); 
}
// Handle form submission 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['cancel'])) { 
        // Cancel reservation
        $stmt = $conn->prepare("DELETE FROM reservations WHERE name = ? AND phone = ? AND date = ? AND time = ?");
        $stmt->bind_param("ssss", $name, $phone, $date, $time);
        if ($stmt->execute()) { 
            echo "Reservation canceled successfully!"; 
        } else { 
            echo "Error: " . $stmt->error; 
        } 
        $stmt->close();
    } elseif (isset($_POST['home'])) {
        // Redirect to index
        header("Location: index.php");
        exit();
    } else { 
    // Get values from the form  
    $phone = htmlspecialchars(trim($_POST['phone'])); 
    $restaurant = htmlspecialchars(trim($_POST['restaurant'])); 
    $date = htmlspecialchars(trim($_POST['date'])); 
    $time = htmlspecialchars(trim($_POST['time'])); 
    $members = intval(trim($_POST['members'])); // Convert to integer 
 
    // Prepare SQL statement for reservation 
    $stmt = $conn->prepare("INSERT INTO reservations (name, phone, restaurant, date, time, members) VALUES (?, ?, ?, ?, ?, ?)"); 
    $stmt->bind_param("sssssi", $name, $phone, $restaurant, $date, $time, $members); 
 
    // Execute the statement 
    if ($stmt->execute()) { 
        echo "Reservation made successfully!"; 
    } else { 
        echo "Error: " . $stmt->error; 
    } 
 
    // Close the statement 
    $stmt->close(); 
} 
}
// Close the connection 
$conn->close(); 
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Reservation Confirmed</title> 
<style> 
body { 
font-family: Arial, sans-serif; 
background-color: #f4f4f4; 
margin: 0; 
padding: 20px; 
} 
h1 { 
text-align: center; 
color: #333; 
} 
.confirmation { 
background: #fff; 
padding: 20px; 
border-radius: 5px; 
box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
max-width: 400px; 
margin: auto; 
} 
p { 
color: #555; 
font-size: 16px; 
} 
.buttons { 
margin-top: 20px; 
text-align: center; 
} 
button { 
padding: 10px 20px; 
margin: 5px; 
font-size: 16px; 
border: none; 
border-radius: 5px; 
cursor: pointer; 
} 
.cancel { 
background-color: DarkRed; 
color: white; 
} 
.home { 
background-color: darkslategrey; 
color: white; 
} 
</style> 
</head> 
<body> 
<div class="confirmation"> 
<h1>Reservation Confirmed</h1> 
<p>Name: <?php echo $name; ?></p> 
<p>Phone: <?php echo $phone; ?></p> 
<p>Restaurant: <?php echo $restaurant; ?></p> 
<p>Date: <?php echo $date; ?></p> 
<p>Time: <?php echo $time; ?></p> 
<p>Number of Members: <?php echo $members; ?></p> 
<div class="buttons">
    <!-- Cancel Reservation Button -->
    <form method="post" style="display:inline;">
        <input type="hidden" name="phone" value="<?php echo $phone; ?>">
        <input type="hidden" name="date" value="<?php echo $date; ?>">
        <input type="hidden" name="time" value="<?php echo $time; ?>">
        <button type="submit" name="cancel" class="cancel">Cancel Reservation</button>
    </form>
    <!-- Home Button -->
    <form method="post" style="display:inline;">
        <button type="submit" name="home" class="home">return</button>
    </form>
</div>
</div> 
</body> 
</html> 
