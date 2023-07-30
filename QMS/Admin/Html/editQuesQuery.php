<?php
  include "session.php";
?>

<?php
// echo '<pre>';
// echo $_POST['quizId'];
// print_r($_POST);
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "tallyqms");

$quizId = $_POST['quizId'];


$quesId = $_POST['quesId'];
$ques = $_POST['ques'];
$option1 = $_POST['option1'];
$option2 = $_POST['option2'];
$option3 = $_POST['option3'];
$option4 = $_POST['option4'];
$asnwer = $_POST['correctAnswer'];

$query1 = "UPDATE `questions` SET `ques` = '$ques', `option1` = '$option1', `option2` = '$option2', `option3` = '$option3', `option4` = '$option4', `correctOption` = '$asnwer' WHERE `id` = '$quesId'";
$result1 = mysqli_query($connection, $query1);

if (!$result1) {
    throw new Exception("Error updating questions table");
}

echo "
<script>
    window.location.href = 'updateQues.php?id=" . urlencode($quizId) . "';
</script>
";
    
?>