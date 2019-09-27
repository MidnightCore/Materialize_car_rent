<?php 
session_start();
if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
}else{
    header("location:login.php");    
}
require './../server.php';
$sql = "SELECT * FROM user WHERE user.role = 'user'";
$result = mysqli_query($connect,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection" /><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <br><br>
            <a href="admin_add_user.php" type="button">เพิ่ม user</a>
            <a href="admin_page.php">กลับ</a>
        </div>
        <table class="highlight">
            <thead>
                <tr>
                    
                    <th>fname</th>
                    <th>lname</th>
                    <th>role</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>rank</th>
                    <th>department</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
            <?php while($row = mysqli_fetch_array($result)){  ?>

                <tr>
                    <td><?php echo$row['fname']?></td>
                    <td><?php echo$row['lname']?></td>
                    <td><?php echo$row['role']?></td>
                    <td><?php echo$row['email']?></td>
                    <td><?php echo$row['phone']?></td>
                    <td><?php echo$row['rank']?></td>
                    <td><?php echo$row['department']?></td>
                    <td>
                        <a>
                            <button type="submit" form="ee" class="btn pulse amber darken-4-effect amber darken-4-light">แก้ไข
                                <i class="material-icons right">border_color</i>
                            </button>
                        </a>
                    </td>
                    <td>
                        <a>
                            <button id="lob" type="submit" form="ee" class="btn pulse red accent-4-effect red accent-4-light">ลบ
                                <i class="material-icons right">close</i>
                            </button>
                        </a>
                    </td>
                </tr>
                <?php } ?>

                

            </tbody>
        </table>
    </div>
</div>
</body>
</html>