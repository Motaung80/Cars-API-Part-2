Task 2: check.js

ReadMe for form validation code
This code is used to validate a form and ensure that it is filled out correctly before it is submitted.

Form Elements
The code starts by retrieving the form elements using the getElementById method of the document object. The variables nameInput, surnameInput, emailInput, passwordInput, and password2Input represent the input elements for the user's name, surname, email address, password, and password confirmation, respectively.

Form Submit Event Listener
An event listener is added to the form using the addEventListener method, which listens for the submit event. The submit event is triggered when the user submits the form by clicking the submit button or pressing the enter key.

Form Validation
The form validation is performed within the event listener function. Each form field is checked for valid input, and an alert message is displayed if the input is not valid. The event.preventDefault() method is called to prevent the form from being submitted if there are any validation errors.

Name and Surname fields
The name and surname fields are checked to ensure that they are not empty. If either of these fields is empty, an alert message is displayed asking the user to enter their name or surname.

Email field
The email field is checked using a regular expression to ensure that it is a valid email address. The regular expression used is ^[^\s@]+@[^\s@]+\.[^\s@]+$. If the email address is not valid, an alert message is displayed asking the user to enter a valid email address.

Password fields
The password field is checked to ensure that it meets certain criteria. The regular expression used is ^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$. This regular expression checks that the password is at least 8 characters long, contains at least one upper and lower case letter, at least one digit, and at least one special character. If the password does not meet these criteria, an alert message is displayed asking the user to enter a valid password.

The code also checks that the two password fields match. If they do not match, an alert message is displayed asking the user to enter the same password in both fields.

Task 2: validate-signup.php

The code first includes the config.php file, which contains the database connection details, and starts a session.

The variables $name, $surname, $email, $id are initialized to empty strings or zero.

An empty array $errors is created to store any validation errors that occur during registration.

The $_SESSION['success'] variable is set to an empty string.

If the form with the name "reg_user" is submitted, the code executes the registration process.

The user inputs are escaped using mysqli_real_escape_string to prevent SQL injection attacks.

Several validation checks are performed. If any of the fields are empty, an error message is added to the $errors array. If the password is less than 8 characters long or the two password fields do not match, an error message is added to the $errors array.

The PHP built-in filter_var function is used to validate the email address. If the email address is invalid, an error message is added to the $errors array.

A SELECT query is executed to check if the user already exists in the database. If the user already exists, an error message is added to the $errors array.

If there are no validation errors, a random salt is generated and concatenated with the password. The result is then hashed using the SHA-256 algorithm. A random string is generated, which is concatenated with the email address to create a unique string. The unique string is hashed using SHA-256 to create an API key. The user's details, along with the hashed password, salt, and API key, are inserted into the database.

The user's email address and API key are stored in the session variables $_SESSION['username'] and $_SESSION['apikey'].

If there are any errors during registration, a JavaScript alert is displayed on the client side.

Finally, the database connection is closed using mysqli_close.

This code is used to validate user input and store the user's details in a database. It also generates a secure API key for the user, which can be used to authenticate API requests.

Task 3: post.php and api.php

Description:
This code implements a simple REST API using PHP that retrieves data from a database and returns it in JSON format. The API is designed to retrieve car data including id_trim, make, model, max_speed_km_per_h, body_type, and engine_type. The data is stored in the 'cars' table in a MySQL database. The API also generates a URL for the image of the car using the make and model and sends it along with the car data.

The code consists of two PHP files, post.php and api.php. The post.php file contains the class definition for Post, which has methods for retrieving car data from the database. The api.php file is the endpoint that is called by the client to retrieve the data.

Usage:
To use the API, simply make a GET request to the api.php file. The API will return a JSON object containing an array of car data. If no cars are found, the API will return a JSON object with a message stating that no posts were found.

Installation:
To run this code, you will need a web server running PHP, and a MySQL database. Follow the steps below to install and configure the code:

1.Create a MySQL database and import the cars.sql file.
2.Open the config.php file and update the database connection details.
3.Upload both post.php and api.php files to your web server.
4.That's it! Your API is now ready to use.

Class Definition:
The Post class contains the following properties and methods:

Properties:
$conn: A private property that holds the database connection object.

$table: A private property that holds the name of the database table that stores car data.

id_trim: A public property that holds the id_trim of the car.

make: A public property that holds the make of the car.

model: A public property that holds the model of the car.

max_speed_km_per_h: A public property that holds the maximum speed of the car in kilometers per hour.

body_type: A public property that holds the body type of the car.

engine_type: A public property that holds the engine type of the car.

Methods:
__construct($db): A constructor method that sets the database connection object.

read(): A method that retrieves car data from the database and returns it as a MySQL result object.

Endpoint Definition:
The api.php file contains the endpoint definition for the API. The endpoint contains the following functionality:

It sets the appropriate headers to allow CORS and specify the content type.

It includes the config.php and post.php files.

It instantiates the Post class and retrieves the car data using the read() method.

It generates a URL for the image of each car using the make and model.

It formats the car data and image URL into an array and pushes it to the data array.

It returns the data array as a JSON object.