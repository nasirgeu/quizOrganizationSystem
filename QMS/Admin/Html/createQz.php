<?php
  include "session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Css/addQuestions.css">
    <link rel="stylesheet" href="../Css/navBar.css">
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
            <div class="container">
                <form action="saveQzDb.php" Method="post" id="quizForm">
                    <div class="rowFlex">
                        <div class="row">
                            <label for="quizTitle">Quiz Title</label>
                            <input type="text" id="quizTitle"   name="quizTitle"
                                placeholder="Enter quiz title" required autocomplete="off">
                        </div>
                        <div class="row">
                            <label for="startTime">Start Time</label>
                            <input type="datetime-local" id="startTime" name="startTime" autocomplete="off" required>
                        </div>
                        <div class="row">
                            <label for="endTime">End Time</label>
                            <input type="datetime-local" id="endTime" name="endTime" autocomplete="off" required>
                        </div>
                        <div class="row">
                            <label for="duration">Duration</label>
                            <input type="number" min="1" id="duration"   name="duration"
                                placeholder="Enter duration" required autocomplete="off">
                        </div>
                    </div>

                    <div id="questionsContainer">
                        <!-- Default question -->
                        <div class="question-row">
                            <div class="row">
                                <label>Question</label>
                                <input type="text" class="quiz" name="question[]"  
                                    placeholder="Enter the question" required autocomplete="off">
                            </div>
                            <div class="rowFlex">
                                <div class="row">
                                    <label>Option A</label>
                                    <input type="text" class="questions"   name="option1[]"
                                        placeholder="Enter option A" required autocomplete="off">
                                </div>
                                <div class="row">
                                    <label>Option B</label>
                                    <input type="text" class="option"   name="option2[]"
                                        placeholder="Enter option B" required autocomplete="off">
                                </div>
                                <div class="row">
                                    <label>Option C</label>
                                    <input type="text" class="option"   name="option3[]"
                                        placeholder="Enter option C" required autocomplete="off">
                                </div>
                                <div class="row">
                                    <label>Option D</label>
                                    <input type="text" class="option select"   name="option4[]"
                                        placeholder="Enter option D" required autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <label>Correct Answer</label>
                                <select class="answer" name="correctOption[]" required>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="button" class="add-question-btn" onclick="addQuestion()">Add Question</button>
                    </div>
                    <div class="row">
                        <input type="submit" value="Submit">
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="../Js/navBar.js"></script>
    <script src="../Js/addQuestions.js"></script>
</body>

</html>