<html>
<head>
    <title>REGISTER ACCOUNT</title>
</head>
<body>
    <div class="container">
    <h3>Register Account</h3>
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
        <div class="row">
            <label>Confirm Password:</label>
            <input type="text" name="confirmPassword" value="" size="50">
        </div>
        <div class="row">
            <label>Mail:</label>
            <input type="text" name="mail" value="" size="50">
        </div>
        <div>
            <input type="submit" value="Register" />
        </div>
    
    </form>
    </div>
</body>