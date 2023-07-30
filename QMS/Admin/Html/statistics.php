<!-- index.html -->
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
            <input type="text" id="searchInputTop" onkeyup="searchByName()" placeholder="Search by Quiz Name..."
                class="search-input">
            <div class="tableOverFlow">
                <table id="quizTable">
                    <tr style="text-align:center";>
                        <th>Quiz Seq No.</th>
                        <th>Quiz Name</th>
                        <th>Quiz Date</th>
                        <th>Total Participants</th>
                        <th>Maximum Score</th>
                        <th>Minimum Score</th>
                        <th>Average Score</th>
                    </tr>
                    <tr>
                        <th>
                            <!-- Quiz ID -->
                            <input type="text" id="searchInput0" onkeyup="searchTable(0)"
                                placeholder="Search Quiz ID..." class="search-input">
                        </th>

                        <th>
                            <!-- Quiz Name -->
                            <input type="text" id="searchInput1" onkeyup="searchTable(1)"
                                placeholder="Search Quiz Name..." class="search-input">
                        </th>

                        <th>
                            <!-- Start Date -->
                            <input type="text" id="searchInput2" onkeyup="searchTable(2)"
                                placeholder="Search Start Date..." class="search-input">
                        </th>

                        <th>
                            <!-- End Date -->
                            <input type="text" id="searchInput3" onkeyup="searchTable(3)"
                                placeholder="Search End Date..." class="search-input">
                        </th>

                        <th>
                            <!-- End Date -->
                            <input type="text" id="searchInput3" onkeyup="searchTable(1)"
                                placeholder="Search End Date..." class="search-input">
                       
                        
                        <th>
                            <!-- Duration -->
                            <input type="text" id="searchInput4" onkeyup="searchTable(4)"
                                placeholder="Search Duration..." class="search-input">
                        </th>
                        
                        <th>
                            <!-- Duration -->
                            <input type="text" id="searchInput4" onkeyup="searchTable(4)"
                                placeholder="Search Duration..." class="search-input">
                        </th>
                    </tr>

                <tr>
                    <!-- <p class="home1"><a href="updateproject.php?s_no=<?php echo $row['s_no'];?>" class="btn" data-toggle="tooltip" data-placement="top" title="EDIT"></i></a> -->
                    <?php
                       $connection = mysqli_connect("localhost", "root", "", "tallyqms");
                       $query = "SELECT quizName, quizStartTime, adminEmail FROM result
                       GROUP BY quizName,quizStartTime, adminEmail Having adminEmail = '" . $_SESSION['adminEmail'] . "'";
                       $result = mysqli_query($connection, $query);

                        $i = 1;
                        while($row = mysqli_fetch_assoc($result)){
                            echo '<pre>';
                            // print_r($row);
                            $query1 = "SELECT max(correctQues) AS maxCorrectQues, min(correctQues) AS minCorrectQues, avg(correctQues) AS averageCorrectQues, count(correctQues) AS totalParticipants FROM result WHERE quizName = '$row[quizName]' AND quizStartTime = '$row[quizStartTime]' AND adminEmail ='$row[adminEmail]'";    

                            $result1 = mysqli_query($connection, $query1);
                            $row1 = mysqli_fetch_assoc($result1);
                            // print_r($    row1);
                        ?>
                    <tr>
                      
                        <td>
                            <?php echo $i++; ?>
                        </td>
                        <td>
                            <?php echo $row['quizName'] ?>
                        </td>
                        <td>
                            <?php echo $row['quizStartTime'] ?>
                        </td>
                        <td>
                            <?php echo $row1['totalParticipants'] ?>
                        </td>
                        <td>
                            <?php echo $row1['maxCorrectQues'] ?>
                        </td>
                        <td>
                            <?php echo $row1['minCorrectQues'] ?>
                        </td>
                        <td>
                            <?php echo $row1['averageCorrectQues'] ?>
                        </td>
                    </tr>
                    <?php
                        }
                        ?>
                </table>
            </div>
        </div>
    </div>

    <script src="../Js/navBar.js"></script>
    <script src="../Js/showQuiz.js"></script>

</body>

</html>