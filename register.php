<?php include 'validate-signup.php'; ?>
<?php include 'header.php'; ?>

<link rel="stylesheet" href="Style/reg_style.css">

    <div class="header">
        <h2>SignUp</h2>
    </div>
      
    <form method="post" action="register.php" id="form">
  
        <div class="input-group">
            <label>Name</label>
            <input id="name" type="text" name="name" value="<?php echo $name; ?>">
        </div>

        <div class="input-group">
            <label>Surname</label>
            <input id="surname" type="text" name="surname" value="<?php echo $surname; ?>">
        </div>

        <div class="input-group">
            <label>Email</label>
            <input id="email" type="email" name="email" value="<?php echo $email; ?>">
        </div>

        <div class="input-group">
            <label>Enter Password</label> 
            <input id="password" type="password" name="password_1">
        </div>

        <div class="input-group">
            <label>Confirm password</label>
            <input id="password2" type="password" name="password_2">
        </div>

        <div class="input-group">
            <button type="submit" class="btn" name="reg_user">Register</button>
        </div> 
    </form>
    <br>
    <br>
    <br>

    <script src="JavaScript/check.js"></script>
    <?php include 'footer.php'; ?>
</body>
</html>