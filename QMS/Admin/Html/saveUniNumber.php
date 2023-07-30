<?php

$connection = mysqli_connect("localhost","root","","tallyqms");
$query1 = "SELECT * FROM category where id = '$_POST[quizId]'";
$result1 = mysqli_query($connection, $query1);
$row = mysqli_fetch_assoc($result1);



$sql = "SELECT * FROM questions where quizName = '$row[quizName]'";
$result = $connection->query($sql);
echo mysqli_num_rows($result)."<br>";

echo '<pre>';
print_r($result);

if ($result->num_rows > 0) {
    $data = array();

    // Fetch each row and add it to the data array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Convert the data array to a JavaScript object
    $jsObject = 'var questions = ' . json_encode($data, JSON_PRETTY_PRINT) . ';';
    // Write the JavaScript object to the quesJson.js file
    $jsFile = fopen('D:\Application\xampp\htdocs\QMS-Tally\Student\Js\quesJson.js', 'w');
    fwrite($jsFile, $jsObject);
    fclose($jsFile);

    echo "quesJson.js created successfully";
} else {
    echo "No data found";
}



$query = "INSERT INTO `quizuniquenumber` (`quizId`, `uniqueId`, `studentEmailId`) VALUES ('$_POST[quizId]', '$_POST[randNumber]', '$_POST[studentEmailId]')";  
$result = mysqli_query($connection, $query);

if($result)
    echo "Success";
else
    echo "Fails";

$connection->close();

?>

<script>
    alert("email has send successfully..");
    window.location.href = "shareQz.php";
</script>