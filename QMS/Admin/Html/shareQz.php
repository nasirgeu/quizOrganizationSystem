<?php
  include "session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Css/navBar.css">
    <!-- <link rel="stylesheet" href="../Css/home.css"> -->
    <link rel="stylesheet" href="../Css/editQuiz.css">
    <!-- <link rel="stylesheet" href="../Css/showQuiz.css"> -->
    <script src=" https://smtpjs.com/v3/smtp.js"></script>
    <style>
        #email{
            width: 100%;
            border: none;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 10px;
            box-sizing: border-box;
            resize: vertical;
        }
    </style>
</head>

<?php
    $connection = mysqli_connect("localhost", "root", "", "tallyqms");
    $query = "SELECT * FROM category WHERE adminEmail = '" . $_SESSION['adminEmail'] . "'";
    $result = mysqli_query($connection, $query);
?>

<body>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <div class="wrapper">
        <button class="toggle-btn"><i class="fas fa-bars"></i></button>
        <div class="sidebar">
            <h2>Sidebar</h2>
            <ul>
                <li><a href="home.php"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="createQz.php"><i class="fas fa-plus-circle"></i>Create New Quiz</a></li>
                <li><a href="qzUpdate.php"><i class="fas fa-edit"></i>Show/Edit Quizes</a></li>
                <li><a href="updateQz.php"><i class="fas fas fa-pencil-alt"></i>Add/Edit Questions</a></li>
                <li><a href="shareQz.php"><i class="fas fas fa-share-alt"></i>Share Quiz</a></li>
                <li><a href="statistics.php"><i class="fas fas fa-chart-bar"></i>Statistics</a></li>
                <li><a href="scoreCard.php"><i class="fas fa-file-alt"></i>Score Card</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
            </ul>
            <div class="social_media">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <div class="main_content">
            <div class="header">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Welcome!! Have a nice day.</div>

            <div class="container">
                    <div class="row">
                        <label>Please Select Quiz...</label>
                        <select class="answer" name="selectQuizId" id="selectQuizId" required>
                            <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            $date = $row['quizStartTime'];
                            $dateTime = new DateTime($date);
                            $formattedDate = $dateTime->format('d-M-Y');
                            echo '<option id="abc11" value="' . $row['id'] . '">' . $row['quizName'] . " (" . $formattedDate . ") " . '</option>';
                        }
                        ?>
                        </select>
                    </div>


                <form action="#" class="form-contact">
                    <input  type="email"  id="email">
                    <!-- <input type="number"  id="cat"> -->
                    <input style="margin-top:20px"; type="submit">
                </form>

                <form action="saveUniNumber.php" method="post"  hidden>
                    <input  type="text"  name="quizId" id="quizId">
                    <input  type="text" name="randNumber"  id="randNumber">
                    <input  type="text" name="studentEmailId"  id="studentEmailId">
                    <input style="margin-top:20px"; id="shareBtnSubmit" type="submit">
                </form>

            </div>
            
        </div>
    </div>

    <script src="../Js/emailSend1.js"></script>


</body>

</html>