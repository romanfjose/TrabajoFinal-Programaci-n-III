<?php
//include database configuration file
include 'db.php';

//get records from database
$query = $conn->query("SELECT * FROM task ");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "Movies_" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('ID', 'title', 'description', 'Year', 'Budget', 'BoxOffice');
    fputcsv($f, $fields, $delimiter);
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
  
        $lineData = array($row['id'], $row['title'], $row['description'], $row['Año'], $row['Budget'], $row['BoxOffice']);
        fputcsv($f, $lineData, $delimiter);
    }
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;

?>