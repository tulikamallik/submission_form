<?php
// submit.php
// Connect to MySQL
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['username'];
$language = $_POST['language'];
$stdin = $_POST['stdin'];
$sourceCode = $_POST['sourceCode'];

// Insert data into MySQL table
$sql = "INSERT INTO code_snippets (username, language, stdin, source_code)
        VALUES ('$username', '$language', '$stdin', '$sourceCode')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<?php
// get_entries.php
// Connect to MySQL
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve entries from MySQL table
$sql = "SELECT * FROM code_snippets";
$result = $conn->query($sql);

$entries = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $entries[] = $row;
    }
}

echo json_encode($entries);

$conn->close();
?>