// Function to add a new question row
function addQuestion() {
    const questionsContainer = document.getElementById('questionsContainer');
    const questionTemplate = document.querySelector('.question-row');
    const newQuestionDiv = questionTemplate.cloneNode(true);
    questionsContainer.appendChild(newQuestionDiv);
}

// Function to validate the form before submission
function validateForm(event) {
    const selectedStartTime = new Date(document.getElementById("startTime").value);
    const selectedEndTime = new Date(document.getElementById("endTime").value);
    const currentDateTime = new Date();

    if (selectedStartTime < currentDateTime || selectedEndTime < currentDateTime) {
        event.preventDefault(); // Prevent form submission
        alert("Start date and End date must be equal to or greater than the current date and time.");
    } else if (selectedEndTime < selectedStartTime) {
        event.preventDefault(); // Prevent form submission
        alert("End date must be greater than the Start date.");
    }
}

window.onload = function () {
    const currentDate = new Date().toISOString().split("T")[0];
    const currentTime = new Date().toISOString().slice(11, 16);

    // Set minimum values for start and end time inputs
    document.getElementById("startTime").setAttribute("min", currentDate + "T" + currentTime);
    document.getElementById("endTime").setAttribute("min", currentDate + "T" + currentTime);

    // Add event listener to the form for form validation
    document.getElementById("quizForm").addEventListener("submit", validateForm);
};
