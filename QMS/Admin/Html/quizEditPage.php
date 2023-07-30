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
    <style>
        *{
            box-sizing:border-box;
        }
        .rowFlex{
            margin-top : 20px;
            margin-bottom:20px;
        }
        .readOnly{
            background-color:rgb(218, 208, 208);
        }
        
    </style>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "tallyqms";

        $connection = mysqli_connect($servername, $username, $password);
        $db = mysqli_select_db($connection, $database);

        $id = $_GET['id'];

        $query1 = "SELECT * FROM `category` WHERE id = '$id'";

        $result1 = mysqli_query($connection, $query1);
        $row1 = mysqli_fetch_array($result1);
    
        ?>


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
                <form action="quizEditQuery.php" method="post" id="quizForm">
                   <input type="text" name="id" value = "<?php echo $row1['id']?>" hidden>
                    <div class="row">
                        <label>Quiz Admin Name.</label>
                        <input type="text"  class="quiz readOnly" name="adminName" value="<?php echo $row1['adminEmail']?>"
                            placeholder="Enter the question" required autocomplete="off" readonly>   
                    </div>
                    <div class="rowFlex">
                        <div class="row">
                            <label for="quizTitle">Pervious Details</label>
                            <input type="text" id="quizTitle" name="pquizeTitle" class="readOnly" value="<?php echo $row1['quizName']?>" 
                                placeholder="Enter quiz title" required autocomplete="off" readonly>
                        </div>
                        <div class="row">
                            <label for="startTime">Start Time</label>
                            <input type="datetime-local" class="readOnly" id="startTime1" value="<?php echo $row1['quizStartTime']?>" readonly name="pstartTime" autocomplete="off" readonly>
                        </div>
                        <div class="row">
                            <label for="endTime">End Time</label>
                            <input type="datetime-local" class="readOnly" id="endTime1" value="<?php echo $row1['quizEndTime']?>" readOnly name="pendTime" autocomplete="off" required>
                        </div>
                        <div class="row">
                            <label for="duration">Duration</label>
                            <input type="number" class="readOnly" min="1" id="duration" value="<?php echo $row1['duration']?>" name="pduration"
                                placeholder="Enter duration" required autocomplete="off" readOnly>
                        </div>
                    </div>

                    <div class="rowFlex">
                        <div class="row">
                            <label for="quizTitle">New Details</label>
                            <input type="text" id="quizTitle" value="<?php echo $row1['quizName']?>" name="quizeTitle"
                                placeholder="Enter quiz title" required autocomplete="off" >
                        </div>
                        <div class="row">
                            <label for="startTime">Start Time</label>
                            <input type="datetime-local"  id="startTime" value="<?php echo $row1['quizStartTime']?>" name="startTime" >
                        </div>
                        <div class="row">
                            <label for="endTime">End Time</label>
                            <input type="datetime-local" id="endTime" value="<?php echo $row1['quizEndTime']?>" name="endTime" autocomplete="off"  require>
                        </div>
                        
                        <div class="row">
                            <label for="duration">Duration</label>
                            <input type="number"  min="1" id="duration" value="<?php echo $row1['duration']?>" name="duration"
                                placeholder="Enter duration" required autocomplete="off" >
                        </div>
                    </div>

                    <div class="row">
                        <input type="submit" value="Update Quiz">
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