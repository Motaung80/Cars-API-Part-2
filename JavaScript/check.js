// Get form elements
const form = document.getElementById("form");
const nameInput = document.getElementById("name");
const surnameInput = document.getElementById("surname");
const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");
const password2Input = document.getElementById("password2");

// Add form submit event listener
form.addEventListener("submit", function (event) {
  // Check name field
  if (!nameInput.value.trim()) {
    alert("Please enter your name");
    event.preventDefault();
  }

  // Check surname field
  if (!surnameInput.value.trim()) {
    alert("Please enter your surname");
    event.preventDefault();
  }

  // Check email field
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(emailInput.value.trim())) {
    alert("Please enter a valid email address");
    event.preventDefault();
  }

  // Check password fields
  const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/;
  if (!passwordRegex.test(passwordInput.value.trim())) {
    alert(
      "Please enter a password that is at least 8 characters long, contains upper and lower case letters, at least one digit and one symbol"
    );
    event.preventDefault();
  } else if (passwordInput.value.trim() !== password2Input.value.trim()) {
    alert("The passwords do not match");
    event.preventDefault();
  }
});
