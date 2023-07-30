document.addEventListener('DOMContentLoaded', () => {
    const emailInput = document.getElementById('email');
    const submit = document.getElementsByClassName('form-contact')[0];

    submit.addEventListener('submit', (e) => {
        const selectElement = document.getElementById("selectQuizId");

        // Get the selected option
        const selectedOption = selectElement.options[selectElement.selectedIndex];

        // Access the value and text of the selected option
        const selectedValue = selectedOption.value;
        // const selectedText = selectedOption.text;

        // Output the selected value and text
        console.log("Selected Value:", selectedValue);
        // console.log("Selected Text:", selectedText);
        e.preventDefault();
        console.log('click');

        const senderEmail = emailInput.value;
        const randomNumber = Math.floor(Math.random() * 10000);
        // const cat = document.getElementById("cat").value;

        // Create a new FormData object
        const formData = new FormData();
        formData.append('uid', randomNumber);
        // formData.append('cat', cat);

        // Make an AJAX request using the POST method
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'http://localhost/QMS-tally/student/Html/studentLoginPage.php?id=selectedValue', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                // Handle the response
                alert(xhr.responseText);
            }
        };
        xhr.send(formData);

        // Send the email
        Email.send({
            SecureToken: "c3e69569-a483-4199-b79d-bc3049763332",
            From: 'mohdnasirb9@gmail.com',
            To: senderEmail,
            Subject: "Quiz Link",
            Body: "This is your test link: " + "http://localhost/QMS-tally/student/Html/studentLoginPage.php?id=" + selectedValue + "&uniqueId=" + randomNumber + "&emailId=" + senderEmail + '\nLogin Email ID:' + senderEmail + '\n\nUniqueId/Password:' + randomNumber,

        }).then(
            message => alert(message)
        );
        
        const quizId = document.getElementById("quizId");
        const randNumber = document.getElementById("randNumber");
        const studentEmailId = document.getElementById("studentEmailId");

        quizId.value = selectedValue;
        randNumber.value = randomNumber;
        studentEmailId.value = senderEmail;

        console.log(quizId);

        document.getElementById("shareBtnSubmit").click();
    });



});


// Body: "Dear Participant, Thank you for your active participation in this compulsory test.Please follow the instructions below: For Registered Users: Use your existing email ID for login. Contact the administrator at mohdnasirb9@gmail.com if you face any issues. For New Users: Create a new account with a unique email ID. Ensure your email ID is accessible for future communication. For assistance, contact the administrator at mohdnasirb9 @gmail.com.Test Link: " + "QMS-tally/student/Html/studentLoginPage.php?id=" + selectedValue + "&uniqueId =" + randomNumber + "Thank you, Admin",