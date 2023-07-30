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
            <input type="text" id="searchInputTop" value="nasir" onkeyup="searchByName()" placeholder="Search by Quiz Name..."
                class="search-input">

            
            
            <div class="tableOverFlow">
                <table id="quizTable">
                    <tr>
                        <th>Sequence No.</th>
                        <th>Quiz Name</th>
                        <th>Quiz Start Date</th>
                        <th>Quiz End Date</th>
                        <th>Quiz Duration</th>
                        <th>Edit</th>
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
                            <!-- Duration -->
                            <input type="text" id="searchInput4" onkeyup="searchTable(4)"
                                placeholder="Search Duration..." class="search-input">
                        </th>
                        <th>Edit</th>
                        <!-- <th>Delete</th> -->
                    </tr>
                    <!-- <p class="home1"><a href="updateproject.php?s_no=<?php echo $row['s_no'];?>" class="btn" data-toggle="tooltip" data-placement="top" title="EDIT"></i></a> -->
                    <?php
                        $servername="localhost";
                        $username="root";
                        $password="";
                        $databse="tallyqms";
                        $connection = mysqli_connect($servername,$username,$password);
                        $db = mysqli_select_db($connection,$databse);
                        $query = "SELECT * FROM category WHERE adminEmail = '" . $_SESSION['adminEmail'] . "'";
                        $result=mysqli_query($connection,$query);
                        $row =mysqli_num_rows($result);
                        $i = 1;
                        while($row = mysqli_fetch_array($result)){
                        ?>
                    <tr>
                        <!-- <td><?php echo $row['id'] ?></td> -->
                        <td>
                            <?php echo $i++; ?>
                        </td>
                        <td>
                            <?php  $date = $row['quizStartTime'];
                            $dateTime = new DateTime($date);
                            $formattedDate = $dateTime->format('d-M-Y'); 
                            echo $row['quizName']." (".$formattedDate.")";?>
                        </td>
                        <td>
                            <?php echo $row['quizStartTime'] ?>
                        </td>
                        <td>
                            <?php echo $row['quizEndTime'] ?>
                        </td>
                        <td>
                            <?php echo $row['duration'] ?>
                        </td>
                        <td>
                            <button class="edit-btn">
                                <a href="qzScoreCard.php?id=<?php echo $row['id'];?>" style="color:white;"
                                    class="btn edit-link" data-toggle="tooltip" data-placement="top"
                                    title="EDIT">SHOW</a>
                            </button>
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