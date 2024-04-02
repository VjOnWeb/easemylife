<?php
// Fetch data from your database or any other source





// Read the JSON data from the file
$jsonData = file_get_contents('datatables.json'); // Update with the path to your JSON file

// Decode the JSON data
$data = json_decode($jsonData, true);

// Output the data as JSON
header('Content-Type: application/json');
echo json_encode($data);



// // For demonstration purposes, I'll create a sample data array
// $data = array(
//     array('id' => 1, 'name' => 'John', 'position' => 'Manager', 'office' => 'New York', 'age' => 30, 'start_date' => '2022-01-01', 'salary' => 100000),
//     array('id' => 2, 'name' => 'Alice', 'position' => 'Developer', 'office' => 'Los Angeles', 'age' => 25, 'start_date' => '2022-02-15', 'salary' => 80000),
//     array('id' => 3, 'name' => 'Bob', 'position' => 'Designer', 'office' => 'Chicago', 'age' => 28, 'start_date' => '2022-03-20', 'salary' => 90000)
// );

// // Output the data as JSON
// header('Content-Type: application/json');
// echo json_encode($data);


?>
