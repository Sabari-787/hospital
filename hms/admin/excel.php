<?php 

$host = "localhost";
$userName = "root";
$password = "";
$dbName = "auth";

// Create database connection
$conn = new mysqli($host, $userName, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch details for the specific user
$sql = "SELECT * FROM food";
$query = mysqli_query($conn, $sql);

if ($query->num_rows > 0) {
    // Set headers to indicate a file download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename=food_details_export.csv');

    // Open output stream
    $output = fopen('php://output', 'w');

    // Output column headings
    $columns = array('ID', 'Item', 'Type');
    fputcsv($output, $columns);

    // Output rows
    while ($row = mysqli_fetch_assoc($query)) {
        $data = array(
            $row['id'], // Replace with your actual column name
            $row['item'],
            $row['type']
        );
        fputcsv($output, $data);
    }

    // Close output stream
    fclose($output);
} else {
    echo "No records found.";
}

$conn->close();
?>
 