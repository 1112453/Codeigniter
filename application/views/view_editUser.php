<html>
<head>
    <title>Edit</title>
</head>
<body>
    <div class="container">
    <h3><?php echo "Edit: ".$account ?></h3>
    <?php echo validation_errors();?>
    <form method="post">
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
            <input type="submit" value="Submit" />
        </div>
    </form>
    
    </div>
</body>