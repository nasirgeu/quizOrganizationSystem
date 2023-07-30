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
    <link rel="stylesheet" href="../Css/home.css">
    <link rel="stylesheet" href="../Css/editQuiz.css">
    <link rel="stylesheet" href="../Css/showQuiz.css">
</head>
<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "tallyqms";

        $connection = mysqli_connect($servername, $username, $password);
        $db = mysqli_select_db($connection, $database);

        $id = $_GET['id'];

        $query1 = "SELECT * FROM `questions` WHERE id = '$id'";

        $result1 = mysqli_query($connection, $query1);
        $row = mysqli_fetch_array($result1);

        $quizName = $row['quizName'];
        $quizStartTime = $row['quizStartTime'];
        $adminEmail = $row['adminEmail'];

        $query2 = "SELECT * FROM category WHERE quizName = '$quizName' AND quizStartTime = '$quizStartTime' AND adminEmail = '$adminEmail'";

        $result2 = mysqli_query($connection, $query2);
        $row1 = mysqli_fetch_array($result2);

    
?>

<body>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <div class="wrapper">
        <button class="toggle-btn"><i class="fas fa-bars"></i></button>
        <div class="sidebar">
            <h2>Sidebar</h2>
            <ul>
                <li><a href="../home.php"><i class="fas fa-home"></i>Home</a></li>
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
              
                <form action="editQuesQuery.php" method = "post" id="quizForm"> 
                    <input type="text" name="quizId" value="<?php echo $row1['id']?>" hidden>
                    <!-- <div class="rowFlex">
                        <div class="row">
                            <label for="quizTitle">Quiz Title</label>
                            <input type="text" id="quizTitle" name="quizTitle" placeholder="Enter quiz title" required
                                autocomplete="off">
                        </div>
                        <div class="row">
                            <label for="startTime">Start Time</label>
                            <input type="datetime-local" id="startTime" name="startTime" required autocomplete="off">
                        </div>
                        <div class="row">
                            <label for="endTime">End Time</label>
                            <input type="datetime-local" id="endTime" name="endTime" required autocomplete="off">
                        </div>
                        <div class="row">
                            <label for="duration">Duration</label>
                            <input type="number" min="1" id="duration" name="duration" placeholder="Enter duration"
                                required autocomplete="off">
                        </div>
                    </div> -->

                    <div id="questionsContainer">
                    <input type="text" name="quesId" value="<?php echo $row['id']?>" hidden>
                        <!-- Default question -->
                        <div class="question-row">
                            <div class="row">
                                <label>Question</label>
                                <input type="text" class="quiz" name="ques" value="<?php echo $row['ques']?>" placeholder="Enter the question"
                                    required autocomplete="off">
                            </div>
                            <div class="rowFlex">
                                <div class="row">
                                    <label>Option A</label>
                                    <input type="text" class="questions" value="<?php echo $row['option1']?>" name="option1" placeholder="Enter option A"
                                        required autocomplete="off">
                                </div>
                                <div class="row">
                                    <label>Option B</label>
                                    <input type="text" class="option" value="<?php echo $row['option2']?>"  name="option2" placeholder="Enter option B"
                                        required autocomplete="off">
                                </div>
                                <div class="row">
                                    <label>Option C</label>
                                    <input type="text" class="option" value="<?php echo $row['option3']?>"  name="option3" placeholder="Enter option C"
                                        required autocomplete="off">
                                </div>
                                <div class="row">
                                    <label>Option D</label>
                                    <input type="text" class="option select" value="<?php echo $row['option4']?>"  name="option4" placeholder="Enter option D"
                                        required autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <label>Correct Answer</label>
                                <select class="answer" name="correctAnswer" required>
                                    <option value="A" <?php if ($row['correctOption'] === 'A') echo 'selected'; ?>>A</option>
                                    <option value="B" <?php if ($row['correctOption'] === 'B') echo 'selected'; ?>>B</option>
                                    <option value="C" <?php if ($row['correctOption'] === 'C') echo 'selected'; ?>>C</option>
                                    <option value="D" <?php if ($row['correctOption'] === 'D') echo 'selected'; ?>>D</option>
                            </select>

                            </div>
                        </div>
                    </div>
                  
                    <div class="row">
                        <input type="submit" style="margin-top:30px"; value="Update Question">
                    </div>
                </form>
                
            </div>
            </div>
        </div>

        <script src="../Js/addQuestions.js"></script>
        <script src="../Js/navBar.js"></script>
        <script src="../Js/showQuiz.js"></script>
</body>

</html>