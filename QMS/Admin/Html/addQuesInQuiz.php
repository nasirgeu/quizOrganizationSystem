<?php
  include "session.php";
?>

<?php
$selectQuizId = $_POST['selectQuizId']; 
$connection = mysqli_connect("localhost","root","", "tallyqms");
$query = "SELECT * FROM category WHERE id = '$selectQuizId'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);

echo ($selectQuizId);

$quizTitle = $row['quizName'];
$startTime = $row['quizStartTime'];
$endTime = $row['quizEndTime'];
$adminEmail = $row['adminEmail'];

$questions = $_POST['question'];
$options1 = $_POST['option1'];
$options2 = $_POST['option2'];
$options3 = $_POST['option3'];
$options4 = $_POST['option4'];
$answers = $_POST['answer'];

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
echo "data Added Succesfully";
// echo '<pre>';
// print_r($_POST);

?>

<script>
    alert("Question add successfully..");
    window.location.href = "updateQz.php";
</script>