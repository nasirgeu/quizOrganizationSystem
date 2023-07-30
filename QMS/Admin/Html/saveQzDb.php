<?php
  include "session.php";
?>

<?php
// Database connection
$connection = mysqli_connect("localhost", "root", "", "tallyqms");

// Check if the connection was successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Process the quiz details
$quizTitle = $_POST['quizTitle'];
$startTime = $_POST['startTime'];
$endTime = $_POST['endTime'];
$duration = $_POST['duration'];
$adminEmail = $_SESSION['adminEmail']; // Replace with the actual admin email

// Insert quiz details into the category table
$query = "INSERT INTO category (quizName, quizStartTime, quizEndTime, duration, adminEmail) VALUES ('$quizTitle', '$startTime', '$endTime', '$duration', '$adminEmail')";
$result = mysqli_query($connection, $query);

// Check if the quiz details insertion was successful
if (!$result) {
    die("Error inserting quiz details: " . mysqli_error($connection));
}

// Insert questions into the questions table
$questions = $_POST['question'];
$options1 = $_POST['option1'];
$options2 = $_POST['option2'];
$options3 = $_POST['option3'];
$options4 = $_POST['option4'];
$answers = $_POST['correctOption'];

$count = count($questions);

// Prepare and execute the insert query for each question
for ($i = 0; $i < $count; $i++) {
    $question = $questions[$i];
    $option1 = $options1[$i];
    $option2 = $options2[$i];
    $option3 = $options3[$i];
    $option4 = $options4[$i];
    $answer = $answers[$i];

    $query = "INSERT INTO questions (ques, option1, option2, option3, option4, correctOption, quizName, quizStartTime, quizEndTime, adminEmail) VALUES ('$question', '$option1', '$option2', '$option3', '$option4', '$answer', '$quizTitle', '$startTime', '$endTime', '$adminEmail')";
    $result = mysqli_query($connection, $query);

    // Check if the question insertion was successful
    if (!$result) {
        die("Error inserting question: " . mysqli_error($connection));
    }
}




// Close the database connection
mysqli_close($connection);
?>

<script>
    alert("Quiz has been created succesfully..");
    window.location.href = "createQz.php";
</script>