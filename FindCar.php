<?php include 'header.php'; 
    if (!isset($_SESSION['email'])) { // if user is not logged in, redirect them to login page
        header("Location: login.php");
        exit();
    }
?>

    <link rel="stylesheet" href="Style/find_style.css">

        </header>
        <section>
            <div class="con">
                <div class="title">Find Me Car</div>
                <form action="#">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">What type of technology features do you want in your car, such as Apple CarPlay, Android Auto, or a touchscreen infotainment system?</span>
                            <input type="text" placeholder="Enter your preferred technology" required>
                        </div>
                        <div class="input-box">
                            <span class="details">How important is fuel efficiency to you?(rate 1 to 10)</span>
                            <input type="number" placeholder="Enter your 1 to 10 " required>
                        </div>
                        <div class="input-box">
                            <span class="details">How important is safety to you, and do you need any specific safety features such as lane departure warning or blind spot monitoring</span>
                            <input type="text" placeholder="Enter your safety features" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Do you prioritize cargo space or passenger seating?*</span>
                            <input type="text" placeholder="Enter your phone number" required>
                        </div>
                        <div class="input-box">
                            <span class="details">What is your preferred brand or make of car</span>
                            <input type="text" placeholder="Enter your brand name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Do you need a car with all-wheel drive or four-wheel drive?</span>
                            <input type="text" placeholder="Enter cargo space / passenger seating" required>
                        </div>
                    </div>
                    <div class="gend-details">
                        <input type="radio" name="gend" id="dot-1">
                        <input type="radio" name="gend" id="dot-2">
                        <input type="radio" name="gend" id="dot-3">
                        <span class="gend-title">Do you prefer a car with a manual or automatic transmission?*</span>
                        <div class="category">
                            <label for="dot-1">
                                <span class="dot one"></span>
                                <span class="gend">Manual</span>
                            </label>
                            <label for="dot-2">
                                <span class="dot one"></span>
                                <span class="gend">Automatic</span>
                            </label>
                            <label for="dot-3">
                                <span class="dot one"></span>
                                <span class="gend">Not Sure</span>
                            </label>
                        </div>
                    </div>
                    <div class="gend-details">
                        <input type="radio" name="gend" id="dot-1">
                        <input type="radio" name="gend" id="dot-2">
                        <input type="radio" name="gend" id="dot-3">
                        <span class="gend-title">Do you need a car with a specific body style, such as a sedan, SUV, or truck?*</span>
                        <div class="category">
                            <label for="dot-1">
                                <span class="dot one"></span>
                                <span class="gend">Sedan</span>
                            </label>
                            <label for="dot-2">
                                <span class="dot one"></span>
                                <span class="gend">SUV</span>
                            </label>
                            <label for="dot-3">
                                <span class="dot one"></span>
                                <span class="gend">Truck</span>
                            </label>
                        </div>
                    </div>
                    <div class="gend-details">
                        <input type="radio" name="gend" id="dot-1">
                        <input type="radio" name="gend" id="dot-2">
                        <input type="radio" name="gend" id="dot-3">
                        <span class="gend-title">Do you prefer a new or used car?</span>
                        <div class="category">
                            <label for="dot-1">
                                <span class="dot one"></span>
                                <span class="gend">New</span>
                            </label>
                            <label for="dot-2">
                                <span class="dot one"></span>
                                <span class="gend">Used</span>
                            </label>
                            <label for="dot-3">
                                <span class="dot one"></span>
                                <span class="gend">Both</span>
                            </label>
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" value="Find/Found">
                    </div>
                </form>
            </div>
        </section>
    </body>
</html>