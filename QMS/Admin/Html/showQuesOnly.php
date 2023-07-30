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
                <li><a href="#"><i class="fas fa-file-alt"></i>Score Card</a></li>
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

                <input type="text" id="searchInputTop" onkeyup="searchByName()" placeholder="Search by Question..."
                    class="search-input">
                <div class="tableOverFlow">
                    <table id="quizTable">
                        <tr>
                            <th>Ques No.</th>
                            <th>Question</th>
                            <th>Option1</th>
                            <th>Option2</th>
                            <th>Option3</th>
                            <th>Option4</th>
                            <th>corrOpt</th>   
                        </tr>

                        <tr>
                            <th>
                                <!-- Que No. -->
                                <input type="text" id="searchInput0" onkeyup="searchTable(0)"
                                    placeholder="Search Que No...." class="search-input">
                            </th>
                            <th>
                                <!-- Question -->
                                <input type="text" id="searchInput1" onkeyup="searchTable(1)"
                                    placeholder="Search Question..." class="search-input">
                            </th>
                            <th>
                                <!-- Choice 1 -->
                                <input type="text" id="searchInput2" onkeyup="searchTable(2)"
                                    placeholder="Search Choice 1..." class="search-input">
                            </th>
                            <th>
                                <!-- Choice 2 -->
                                <input type="text" id="searchInput3" onkeyup="searchTable(3)"
                                    placeholder="Search Choice 2..." class="search-input">
                            </th>
                            <th>
                                <!-- Choice 3 -->
                                <input type="text" id="searchInput4" onkeyup="searchTable(4)"
                                    placeholder="Search Choice 3..." class="search-input">
                            </th>
                            <th>
                                <!-- Choice 4 -->
                                <input type="text" id="searchInput5" onkeyup="searchTable(5)"
                                    placeholder="Search Choice 4..." class="search-input">
                            </th>
                            <th>
                                <!-- Correct -->
                                <input type="text" id="searchInput6" onkeyup="searchTable(6)"
                                    placeholder="Search Correct..." class="search-input">
                            </th>
                        </tr>
                        <?php
                            $servername="localhost";
                            $username="root";
                            $password="";
                            $databse="tallyqms";
                            $connection = mysqli_connect($servername,$username,$password,$databse);
                            $id = mysqli_real_escape_string($connection, $_GET['id']);
                            $query = "SELECT * FROM category WHERE id = $id";
                            $result = mysqli_query($connection, $query);
                            if (!$result) {
                                die("Error retrieving category record: " . mysqli_error($connection));
                            }      
                            $row = mysqli_fetch_assoc($result);
                            $quizName = $row['quizName'];
                            $quizStartTime = $row['quizStartTime'];
                            $adminEmail = $row['adminEmail'];

                            $query2 =  "SELECT * FROM questions WHERE quizName = '$quizName' AND quizStartTime = '$quizStartTime' AND adminEmail = '$adminEmail'";
                            $result2 = mysqli_query($connection, $query2);
                            

                            // $db = mysqli_select_db($connection,$databse);
                            // $query="SELECT * FROM `questions`";
                            // $result=mysqli_query($connection,$query);
                            $row =mysqli_num_rows($result2);
                            $i = 1;
                            while($row = mysqli_fetch_array($result2)){
                        ?>
                        <tr>
                            <td><?php echo $i++;?></td>
                            <td><?php echo $row['ques']?> </td>
                            <td><?php echo $row['option1']?></td>
                            <td><?php echo $row['option2']?></td>
                            <td><?php echo $row['option3']?></td>
                            <td><?php echo $row['option4']?></td>
                            <td><?php echo $row['correctOption']?></td>
                        
                        </tr>
                        <?php
                        }
                        ?>
                    </table>

                </div>
            </div>
        </div>

        <script src="../Js/addQuestions.js"></script>
        <script src="../Js/navBar.js"></script>
        <script src="../Js/showQuiz.js"></script>
</body>

</html>