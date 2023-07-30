<!DOCTYPE html>
<html>

<head>
  <title>Student Login</title>
  <link rel="stylesheet" href="../CSS/style.css">
</head>

<style>
  .error{
    color: red;
  }
  form{
    font-family:recursive;
  }
</style>

<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tallyqms";
$login = 0;
$qzId = $_GET['id'];
$urlEmail = $_GET['emailId'];
$randNumber = $_GET['uniqueId'];

$conn = mysqli_connect($servername, $username, $password, $dbname);
$query = "SELECT * FROM quizuniquenumber WHERE quizId = '$qzId' AND uniqueId = '$randNumber' AND studentEmailId = '$urlEmail'";
$result = mysqli_query($conn, $query);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$a = null;  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["loginSubmit"])) {
        if ($result->num_rows <= 0) {
            $a = "URL is wrong.";
        }

        $studentEmail = $_POST["studentEmail"];
        $password = $_POST["password"];
        $studentName = $_POST["studentName"];

        $sql = "SELECT * FROM `student` WHERE `studentEmail` = '$studentEmail'";
        $result = $conn->query($sql);

        if(!$a && $urlEmail != $studentEmail)
            $a = "Email Id is different from on which email send..";

        if ($result->num_rows > 0 && !$a) {
            $row = mysqli_fetch_assoc($result);
            if ($row['name'] != $studentName && !$a) {
                $a = "Email ID already registered, but the name doesn't match.";
            }

            $sql1 = "SELECT * FROM `isquizdone` WHERE `quizId` = '$qzId' AND `uniqueId` = '$randNumber' AND studentEmailId = '$urlEmail'";
            $result1 = $conn->query($sql1);

            if ($result1->num_rows <= 0 && !$a) {
                $login = 1;
            } else if (!$a) { 
                if($password != $randNumber)
                    $a = "Incorrect UniqueId/Password..";
                else
                    $a = "You have already attempted the quiz.";
            }
        } else if (!$a) {
                if($password != $randNumber)
                     $a = "Incorrect UniqueId/Password..";
                else{
                   $sql = "INSERT INTO `student` (`studentEmail`, `name`, `password`) VALUES ('$studentEmail',  '$studentName', '123')";
                    $result = $conn->query($sql);
                    $login = 1;
                }
        }
    }
}
?>


  <div class="container">
    <div class="form-container">
      <div id="login-form" class="form">
        <h2 style="color:red;">STUDENT LOGIN</h2>
        <form method="POST">
          <input type="text" name="studentEmail" placeholder="Student Email Id....." required autocomplete="off">
          <input type="text" name="studentName" placeholder="Student Name....." required autocomplete="off">
          <input type="password" name="password" placeholder="uniqueId/Password...." required autocomplete="off">
          <button type="submit" name="loginSubmit">Login</button>

          <?php  if (isset($a)) {
          echo "<p class='error'>$a</p>";
        } ?>
        </form>
      </div>
    </div>
  </div>

  <form id="myForm" method="post" action="quesShowPage.php" hidden>
      <input type="text" name="id" value="<?php echo $qzId ?>">
      <input type="text" name="urlEmail" value="<?php echo $urlEmail ?>">
      <input type="text" name="randNumber" value="<?php echo $randNumber ?>">
      <input type="text" name="studentEmail" value="<?php echo $studentEmail ?>" id="quizName">
      <input type="text" name="studentName" value="<?php echo $studentName ?>">
      <input type="submit" id="abc1">
  </form>

  <?php



if ($login) {
    echo $studentEmail;
    echo '<script> document.getElementById("abc1").click(); </script>';
}
?>

</body>

</html>