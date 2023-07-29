<?php
include 'header.php';
?>
<link rel="stylesheet" href="Style/reg_style.css">

<div class="header">
    <h2>Login Here!</h2>
</div>

<form method="post" action="validate-login.php">

    <div class="input-group">
        <label>Email</label>
        <input type="text" name="email" >
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password">
    </div>
    <div class="input-group">
        <button type="submit" class="btn"
                    name="login_user">
            Login
        </button>
    </div>

</form>

<?php include 'footer.php'; ?>
