<?php
// echo "index.html";
// echo '<pre>';
// print_r($_POST);



$studentEmail = $_POST['studentEmail'];
$studentName = $_POST['studentName'];
$quizName = $_POST['quizName'];
$startTime = $_POST['startTime'];
$endTime = $_POST['endTime'];
$totalQues = $_POST['totalQues'];
$correctQues = $_POST['correctQues'];
$wrongQues = $_POST['wrongQues'];
$examTime = '2023-07-17 09:46:51';
$adminEmail = $_POST['adminEmail'];

$urlEmail = $_POST['urlEmail'];
$randomNumber = $_POST['randomNumber'];
$qzId = $_POST['qzId'];

// resId	studentEmail	quizName	quizStartTime	quizEndTime	totalQues	correctQues	wrongQues	examTime	studentName	adminEmail	

$connection = mysqli_connect("localhost", "root", "", "tallyqms");


$query = "INSERT INTO `result` (`resId`, `studentEmail`, `quizName`, `quizStartTime`, `quizEndTime`, `totalQues`, `correctQues`, `wrongQues`, `examTime`, `studentName`, `adminEmail`) VALUES (NULL, '$studentEmail', '$quizName ', '$startTime', '$endTime', '$totalQues', '$correctQues', '$wrongQues', '$examTime', '$studentName', '$adminEmail')";

$query1 = "INSERT INTO `isquizdone` (`quizId`, `uniqueId`, `studentEmailId`) VALUES ('$qzId', '$randomNumber', '$urlEmail')";
$result = mysqli_query($connection, $query1);

$result = mysqli_query($connection, $query);

// if($result)
//     echo "success";
// else    
//     echo "fails";


echo '
<script>
    var urlEmail = "' . $urlEmail . '";
    var randomNumber = "' . $randomNumber . '";
    var qzId = "' . $qzId . '";
    var score = "' . $correctQues . '";

    alert("Your Score is -> " + score);

    window.location.href = "studentLoginPage.php?" + 
    "id=" + encodeURIComponent(qzId) +
    "&uniqueId=" + encodeURIComponent(randomNumber) + 
    "&emailId=" + encodeURIComponent(urlEmail);
</script>';
    

?>

