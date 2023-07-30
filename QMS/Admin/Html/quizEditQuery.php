<?php
  include "session.php";
?>

<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "tallyqms");

$id = mysqli_real_escape_string($connection, $_POST['id']);
// echo $id;

$pquizName = mysqli_real_escape_string($connection, $_POST['pquizeTitle']);
$pstartTime = mysqli_real_escape_string($connection, $_POST['pstartTime']);
$pendTime = mysqli_real_escape_string($connection, $_POST['pendTime']);
$adminName = mysqli_real_escape_string($connection, $_POST['adminName']);

$quizName = mysqli_real_escape_string($connection, $_POST['quizeTitle']);
$startTime = mysqli_real_escape_string($connection, $_POST['startTime']);
$endTime = mysqli_real_escape_string($connection, $_POST['endTime']);
$duration = mysqli_real_escape_string($connection, $_POST['duration']);



// Begin the transaction
mysqli_begin_transaction($connection);

try {
    // Update the questions table
    $query1 = "UPDATE `questions` SET `quizName` = '$quizName', `quizStartTime` = '$startTime', `quizEndTime` = '$endTime' WHERE `quizName` = '$pquizName' AND `quizStartTime` = '$pstartTime' AND `quizEndTime` = '$pendTime' AND `adminEmail` = '$adminName'";
    $result1 = mysqli_query($connection, $query1);

    if (!$result1) {
        throw new Exception("Error updating questions table");
    }

    // Update the category table
    $query2 = "UPDATE `category` SET `quizName` = '$quizName', `quizStartTime` = '$startTime', `quizEndTime` = '$endTime', `duration` = '$duration' WHERE `id` = '$id';";
    $result2 = mysqli_query($connection, $query2);

    if (!$result2) {
        throw new Exception("Error updating category table");
    }

    // Commit the transaction if both queries are successful
    mysqli_commit($connection);
    echo "Update successful";
} catch (Exception $e) {
    // Rollback the transaction on exception
    mysqli_rollback($connection);
    echo "Error: " . $e->getMessage();
}

// Close the connection
mysqli_close($connection);
?>


<script>
    alert("Quiz has been Updated succesfully..");
    window.location.href = "qzUpdate.php";
</script>