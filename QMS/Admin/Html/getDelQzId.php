<?php
  include "session.php";
?>

<?php
if (isset($_GET['id'])) {
    try {
        // Establish database connection
        $connection = mysqli_connect("localhost", "root", "");
        if (!$connection) {
            throw new Exception("Connection failed: " . mysqli_connect_error());
        }
        
        // Select the database
        $db = mysqli_select_db($connection, "tallyqms");
        if (!$db) {
            throw new Exception("Database selection failed: " . mysqli_error($connection));
        }
        
        $id = mysqli_real_escape_string($connection, $_GET['id']);
        
        $query = "SELECT * FROM questions WHERE id = $id";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            throw new Exception("Error retrieving category record: " . mysqli_error($connection));
        }
        
        $row = mysqli_fetch_assoc($result);
        $quizName = $row['quizName'];
        $quizStartTime = $row['quizStartTime'];
        $adminEmail = $row['adminEmail'];
        
        $cq = "SELECT * FROM category WHERE quizName = '$quizName' AND quizStartTime = '$quizStartTime' AND adminEmail = '$adminEmail'";
        $r = mysqli_query($connection, $cq);
        $r1 = mysqli_fetch_assoc($r);
        $rid = $r1['id'];
        

        
        echo $rid;
        
        // Redirect to a specific page after successful deletion
        echo "
        <script>
            window.location.href = 'updateQues.php?id=" . urlencode($rid) . "';
        </script>
        ";
        
        // Close the database connection
        mysqli_close($connection);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>