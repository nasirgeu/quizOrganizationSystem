<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/questionPageDesign.css">
</head>
<style>
    .buttonContainer {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        padding: 10px;
    }

    .but1 {
        position: relative;
        margin: 3px;
        padding: 14px;
        min-width: 50px;
        border: none;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        cursor: pointer;
        border: 1px solid black;
        background-color: white;
        border-radius: 3px;
        min-height: 60px;
        outline: none;
        overflow: hidden;
    }


    .but1:hover {
        background-color: rgb(209, 224, 209);
    }

    @media screen and (max-width: 600px) {
        .buttonContainer {
            justify-content: flex-start;
        }
    }

    .clear-choice {
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .clear-choice:hover {
        text-decoration: underline;
        color: rgb(151, 10, 10);
    }
</style>
<?php
$connection = mysqli_connect("localhost", "root", "", "tallyqms");
$qiz = $_POST['id'];
$randomNumber = $_POST['randNumber'];
$studentEmail = $_POST['studentEmail'];
$studentName = $_POST['studentName'];

$query="SELECT * FROM category where id = $qiz";
$result = mysqli_query($connection, $query); 
$row = mysqli_fetch_assoc($result);
$quizName =  $row['quizName'];  
$startTime =  $row['quizStartTime'];
$endTime =  $row['quizEndTime'];
$adminEMail =  $row['adminEmail'];
?>



<body>
    <div class="container">
        <div class="content-left">
            <p class="question-number"><span id="question-number"></span> </p>

            <hr>
            <p class="question" id="ques">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum architecto
                cumque
                voluptatem autem veniam explicabo veritatis reprehenderit at dignissimos officia hic excepturi aut
                consequatur eaque nostrum, inventore eos dicta animi.</p>
            <div class="all-options">
                <div class="option">
                    <li><input type="radio" name="answer" class="se" id="1">
                        <label for="1" id="option1">ans1</label>
                    </li>
                    <li><input type="radio" name="answer" class="se" id="2">
                        <label for="2" id="option2">ans2</label>
                    </li>
                    <li><input type="radio" name="answer" class="se" id="3">
                        <label for="3" id="option3">ans3</label>
                    </li>
                    <li><input type="radio" name="answer" class="se" id="4">
                        <label for="4" id="option4">ans4</label>
                    </li>
                </div>
                <p class="clear-choice" onclick="clearclick()">Clear My choice</p>
            </div>
            <div class="button-section">
                <button class="btn" id="prev-btn" onclick="goToPreviousQuestion()">Previous</button>
                <button class="btn" id="next-btn" onclick="saveAndGoToNextQuestion()">Save & Next</button>
                <button class="btn" id="save-btn" onclick="saveAndMarkAsReview()">Flag</button>
                <button class="btn" id="submit-btn" onclick="submitQuiz()">Submit</button>

                <form action="saveResDb.php" method="post" hidden>
                    <input type="text" name="studentEmail" value="<?php echo $studentEmail ?>" id="qzScore">
                    <input type="text" name="quizName" value="<?php echo $quizName ?>" id="qzScore">
                    <input type="text" name="startTime" value="<?php echo $startTime ?>" id="qzScore">
                    <input type="text" name="urlEmail" value="<?php echo $_POST['urlEmail']; ?>" id="qzScore">
                    <input type="text" name="endTime" value="<?php echo $endTime ?>" id="qzScore">
                    <input type="text" name="randomNumber" value="<?php echo $randomNumber ?>" >
                    <input type="text" name="qzId" value="<?php echo $qiz ?>" >
                    <input type="text" name="totalQues" id="totalQues">
                    <input type="text" name="correctQues" id="correctQues">
                    <input type="text" name="wrongQues" id="wrongQues">
                    <input type="text" name="examTime" id="qzScore">
                    <input type="text" name="studentName" value="<?php echo $studentName ?>" id="qzScore">
                    <input type="text" name="adminEmail" value="<?php echo $adminEMail ?>" id="qzScore">
                    <input type="submit" id="abc" value="Submit">
                </form>

            </div>
        </div>
        <div class="content-right">
            <div id="buttonContainer" class="buttonContainer">
            </div>
        </div>
    </div>
    <script src="../Js/quesJson.js"></script>
    <script src="../Js/index.js"></script>

    <script>
        var inputField = questions.length;
        var number = inputField;
        var buttonContainer = document.getElementById("buttonContainer");
        buttonContainer.innerHTML = "";
        for (var j = 1; j <= number; j++) {
            var button = document.createElement("button");
            button.innerText = j;
            button.classList.add("but1");
            button.setAttribute("id", "button-" + (j - 1));
            // console.log(colorArray[j-1]);
            button.addEventListener("click", function () {
                const radioButtons = document.querySelectorAll(".se");
                let selectedOption = '';
                radioButtons.forEach(radioButton => {
                    if (radioButton.checked) {
                        selectedOption = radioButton.id;
                    }
                });
                let index = parseInt(selectedOption);
                let correctIndex = 0;
                if (questions[i].correctOption == 'A')
                    correctIndex = 1;
                else if (questions[i].correctOption == 'B')
                    correctIndex = 2;
                else if (questions[i].correctOption == 'C')
                    correctIndex = 3;
                else if (questions[i].correctOption == 'D')
                    correctIndex = 4;

                // Update score array based on the selected option
                if (index === correctIndex) {
                    scoreArray[i] = 1;
                } else {
                    scoreArray[i] = 0;
                }

                if (!isNaN(index)) {
                    let btnId = document.getElementById("button-" + i);
                    if (reviewArrayColor[i]) {
                        btnId.style.backgroundImage = `linear-gradient(to top right, gray 85%,#ffc107 15%)`;
                    } else {
                        btnId.style.backgroundImage = `linear-gradient(to top ,gray,gray)`;
                    }
                    nextArrayColor[i] = 1;
                    newArray[i] = index - 1;
                }
                saveAnswers();
                i = parseInt(this.innerText) - 1;
                loadQuestion();
                console.log(i);
            });
            buttonContainer.appendChild(button);
        }
    </script>
</body>

</html>