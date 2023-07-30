<!-- index.html -->

<!DOCTYPE html>
<html lang="en">

<?php
  include "session.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Css/navBar.css">
    <link rel="stylesheet" href="../Css/home.css">
</head>

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
            <div class="info">
                <a href="createQz.php"><div class="letsQuiz">Let's Quiz</div></a>
                <div class="testSkills">Test Your skills and become master.</div>
                <div class="organize">Engage in a fun and educational experience by <br> participating in our quizzes
                    that
                    cover various subjects, allowing you to expand <br> your knowledge and learn something new every
                    day.
                </div>
                <a href="createQz.php"><button class="joinQuizBtn"><i class="fas fa-plus-circle"></i> Create Quiz </button></a>
            </div>
        </div>
    </div>

    <script src="../Js/navBar.js"></script>
</body>

</html>