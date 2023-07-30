const n = questions.length;
let newArray = new Array(n).fill(-1);
let scoreArray = new Array(n).fill(0);
let nextArrayColor = new Array(n).fill(0);
let reviewArrayColor = new Array(n).fill(0);
let i = 0;
let firstQues = true;

// Check if quiz answers are stored in localStorage
if (localStorage.getItem("quizAnswers")) {
    const storedAnswers = JSON.parse(localStorage.getItem("quizAnswers"));
    if (Array.isArray(storedAnswers) && storedAnswers.length === n) {
        newArray = storedAnswers;
    }
}

// Check if quiz scores are stored in localStorage
if (localStorage.getItem("quizScore")) {
    const storedScore = JSON.parse(localStorage.getItem("quizScore"));
    if (Array.isArray(storedScore) && storedScore.length === n) {
        scoreArray = storedScore;
    }
}

if (localStorage.getItem("quesColor")) {
    const storedScore = JSON.parse(localStorage.getItem("quesColor"));
    if (Array.isArray(storedScore) && storedScore.length === n) {
        nextArrayColor = storedScore;
    }
}

if (localStorage.getItem("reviewQuesColor")) {
    const storedScore = JSON.parse(localStorage.getItem("reviewQuesColor"));
    if (Array.isArray(storedScore) && storedScore.length === n) {
        reviewArrayColor = storedScore;
    }
}

// Function to load the current question
function loadQuestion() {
    let preBtn = document.getElementById("prev-btn");
    let nextBtn = document.getElementById("next-btn");
    let saveBtn = document.getElementById("save-btn");
    let submitBtn = document.getElementById("submit-btn");

    if (!firstQues) {
        for (let k = 0; k < n; k++) {
            let btnId = document.getElementById("button-" + k);
            if (i == k) {
                btnId.style.border = "3px solid black";

            }
            else
                btnId.style.border = "1px solid black";

        }
    }

    firstQues = false;


    if (i === 0) {
        preBtn.style.display = "none";
    } else {
        preBtn.style.display = "inline-block";
    }

    if (i === n - 1) {
        nextBtn.style.display = "none";
        saveBtn.style.display = "none";
        submitBtn.style.display = "inline-block";
    } else {
        submitBtn.style.display = "none";
        nextBtn.style.display = "inline-block";
        saveBtn.style.display = "inline-block";
    }

    const q = document.getElementById("ques");
    const op1 = document.getElementById("option1");
    const op2 = document.getElementById("option2");
    const op3 = document.getElementById("option3");
    const op4 = document.getElementById("option4");
    const qno = document.getElementById("question-number");

    qno.textContent = "Question " + (i + 1);
    q.textContent = questions[i].ques;
    op1.textContent = questions[i].option1;
    op2.textContent = questions[i].option2;
    op3.textContent = questions[i].option3;
    op4.textContent = questions[i].option4;

    const radioButtons = document.querySelectorAll(".se");

    if (radioButtons.length > 0) {
        if (i >= 0 && newArray[i] !== null && newArray[i] >= 0) {
            radioButtons[newArray[i]].checked = true;
        } else {
            radioButtons.forEach((radioButton) => (radioButton.checked = false));
        }
    }
}

loadQuestion();

// Function to save user's answers to localStorage
function saveAnswers() {
    localStorage.setItem("quizAnswers", JSON.stringify(newArray));
    localStorage.setItem("quizScore", JSON.stringify(scoreArray));
    localStorage.setItem("quesColor", JSON.stringify(nextArrayColor));
    localStorage.setItem("reviewQuesColor", JSON.stringify(reviewArrayColor));
}

// Function to save answers and move to the next question
function saveAndGoToNextQuestion() {
    const radioButtons = document.querySelectorAll(".se");
    let selectedOption = "";
    radioButtons.forEach((radioButton) => {
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
            btnId.style.backgroundImage = `linear-gradient(to top right, gray 85%, #ffc107 15%)`;
        } else {
            btnId.style.backgroundImage = `linear-gradient(to top, gray, gray)`;
        }
        nextArrayColor[i] = 1;
        newArray[i] = index - 1;
    }
    saveAnswers();

    if (i === n - 1) {
        loadQuestion();
    } else {
        i++;
        loadQuestion();
    }
}



function saveAndMarkAsReview() {
    const radioButtons = document.querySelectorAll(".se");
    let selectedOption = "";
    radioButtons.forEach((radioButton) => {
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
        var ch = 0;
        let btnId = document.getElementById("button-" + i);
        if (reviewArrayColor[i] === 0) {
            if (nextArrayColor[i]) {
                btnId.style.backgroundImage = `linear-gradient(to top right, gray 85%,#ffc107 15%)`;
            }
            else {
                ch = 1;
                btnId.style.backgroundImage = `linear-gradient(to top right, gray 85%,#ffc107 10%)`;
            }
            reviewArrayColor[i] = 1;
            nextArrayColor[i] = 1;
        } else {
            reviewArrayColor[i] = 0;
            btnId.style.backgroundImage = "none";
            btnId.style.backgroundColor = "white";
            if (nextArrayColor[i])
                btnId.style.backgroundImage = `linear-gradient(to top ,gray,gray)`;
        }
        newArray[i] = index - 1;
    }
    else
        alert("please select option..");

    saveAnswers();
    console.log(i);
    if (ch == 1) {
        i++;
        loadQuestion();
    }
}

// Function to go to the previous question
function goToPreviousQuestion() {
    const radioButtons = document.querySelectorAll(".se");
    let selectedOption = "";
    radioButtons.forEach((radioButton) => {
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
            btnId.style.backgroundImage = `linear-gradient(to top right, gray 85%, #ffc107 15%)`;
        } else {
            btnId.style.backgroundImage = `linear-gradient(to top, gray, gray)`;
        }
        nextArrayColor[i] = 1;
        newArray[i] = index - 1;
    }
    saveAnswers();

    if (i === 0) {
        loadQuestion();
    } else {
        i--;
        loadQuestion();
    }
}

function clearclick() {
    nextArrayColor[i] = 0;
    scoreArray[i] = 0;
    reviewArrayColor[i] = 0;
    newArray[i] = -1;
    const radioButtons = document.querySelectorAll(".se");
    radioButtons.forEach((radioButton) => (radioButton.checked = false));
    let btnId = document.getElementById("button-" + i);
    btnId.backgroundColor = "white";
    btnId.style.backgroundImage = `linear-gradient(to top , white ,white )`;
    saveAnswers();
}

window.onload = function () {
    for (let k = 0; k < n; k++) {
        if (nextArrayColor[k] == 1) {
            let btnId = document.getElementById("button-" + k);
            btnId.style.backgroundColor = "gray";
            if (reviewArrayColor[k]) {
                btnId.style.backgroundImage = `linear-gradient(to top right, gray 85%,#ffc107 15%)`;
            }
        } else if (reviewArrayColor[k] == 1) {
            let btnId = document.getElementById("button-" + k);
            btnId.style.backgroundImage = `linear-gradient(to top right, gray 85%,#ffc107 15%)`;
        }
    }
};


function submitQuiz() {
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

    newArray[i] = index - 1;
    saveAnswers();

    // Calculate the score
    let score = scoreArray.filter(score => score !== 0).length;

    // Display the score
    // alert("Your. score is: " + score);

    // Remove stored answers and scores from localStorage
    localStorage.removeItem("quizAnswers");
    localStorage.removeItem("quizScore");
    localStorage.removeItem("quesColor");
    localStorage.removeItem("reviewQuesColor");

    // Refresh the page

    // window.location.reload();



    // document.getElementById("abc").click();
    // <input type="text" name="totalQues" id="totalQues">
    // <input type="text" name="correctQues" id="correctQues">
    // <input type="text" name="wrongQues" id="wrongQues"></input>
    let totalQues = document.getElementById("totalQues");
    totalQues.value = n;

    console.log(totalQues);

    let correctQues = document.getElementById("correctQues");
    correctQues.value = score;

    let wrongQues = document.getElementById("wrongQues");
    wrongQues.value = n - score;

    document.getElementById("abc").click();
}
