<html>
<head>
    <title>Home</title>
</head>
<body>
    <div class="container">
    <h3>UserList<?php //echo $username ?></h3>
        <table>
            <tr>
                <th>Account</th>
                <th>Password</th>
                <th>Mail</th>
                <th>Edit-Delete</th>
            </tr>
            <tr>
                <?php foreach($list as $row){?>
                <td><?php echo $row->account?></td>
                <td><?php echo $row->password?></td>
                <td><?php echo $row->mail?></td>
                <td>
                    <a href="<?php echo base_url('index.php/user/edit/'.$row->id);?>">Edit</a>
                    <a href="<?php echo base_url('index.php/user/delete/'.$row->id);?>">Delete</a>
                </td>
            </tr>
                <?php } ?>
        </table>
    </div>
</body>