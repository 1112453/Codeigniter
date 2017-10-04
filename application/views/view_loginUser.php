<html>
<head>
    <title>Login</title>
</head>
<body>
    <div class="container">
    <h3>Login Account</h3>
    <?php echo validation_errors();?>
    <form method="post">
        <div class="row">
                <label>Account:</label>
                <input type="text" name="account" value="" size="50">
        </div>
        <div class="row">
            <label>Password:</label>
            <input type="text" name="password" value="" size="50">
        </div>
        <div>
            <input type="submit" value="Login" />
        </div>
        <div class="row">
         <a href="<?php echo base_url('index.php/user/register/');?>">Register</a>
         </div>
    </form>
    </div>
</body>