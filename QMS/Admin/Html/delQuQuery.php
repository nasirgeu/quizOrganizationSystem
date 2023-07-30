<?php
  include "session.php";
?>

<?php
if (isset($_GET['id'])) {
    // Establish database connection
    $connection = mysqli_connect("localhost", "root", "");
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Select the database
    $db = mysqli_select_db($connection, "tallyqms");
    if (!$db) {
        die("Database selection failed: " . mysqli_error($connection));
    }

    // Sanitize and retrieve the ID parameter
    $id = mysqli_real_escape_string($connection, $_GET['id']);

    // Retrieve the category record
    $query = "SELECT * FROM category WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Error retrieving category record: " . mysqli_error($connection));
    }

    $row = mysqli_fetch_assoc($result);
    $quizName = $row['quizName'];
    $quizStartTime = $row['quizStartTime'];
    $adminEmail = $row['adminEmail'];

    // Delete related questions
    $deleteQuestionsQuery = "DELETE FROM questions WHERE quizName = '$quizName' AND quizStartTime = '$quizStartTime' AND adminEmail = '$adminEmail'";
    $deleteQuestionsResult = mysqli_query($connection, $deleteQuestionsQuery);
    if (!$deleteQuestionsResult) {
        die("Error deleting related questions: " . mysqli_error($connection));
    }

    // Delete the category record
    $deleteCategoryQuery = "DELETE FROM category WHERE id = '$id'";
    $deleteCategoryResult = mysqli_query($connection, $deleteCategoryQuery);
    if (!$deleteCategoryResult) {
        die("Error deleting category record: " . mysqli_error($connection));
    }

    // Redirect to a specific page after successful deletion
    echo "
    <script>
        window.location.href = 'qzUpdate.php';
    </script>
    ";

    // Close the database connection
    mysqli_close($connection);
}
?>
