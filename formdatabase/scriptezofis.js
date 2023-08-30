// Define the correct email and password
const correctEmail = "abc@gmail.com";
const correctPassword = "123";

document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    // Get the input values
    const emailInput = document.getElementById("email").value;
    const passwordInput = document.getElementById("password").value;

    // Check if the input matches the predefined values
    if (emailInput === correctEmail && passwordInput === correctPassword) {
        // Redirect to another page (replace 'other_page.html' with your desired page URL)
        window.location.href = "./templates/button.html";
    } else {
        // Show an error message (you can customize this part as needed)
        alert("Invalid email or password. Please try again.");
    }
});
