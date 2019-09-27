<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Admin Page</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <style>
    #lob{
        background color: red ;
    }
    </style>
</head>

<body>
    <nav class="teal lighten-3" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="admin_page.php" class="brand-logo">Admin Page</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="#">ข้อมูลUser</a></li>
                <li><a href="#">ข้อมูลApprover</a></li>
                <li><a href="#">ข้อมูลรถและคนขับรถ</a></li>
                <li><a href="#">ตรวจสถานะคำร้อง</a></li>
                <li><a href="../login.php">ออกจากระบบ</a></li>
            </ul>
            <ul id="nav-mobile" class="sidenav"><br><br>
                <li><a href="#">ข้อมูลUser</a></li>
                <li><a href="#">ข้อมูลApprover</a></li>
                <li><a href="#">ข้อมูลรถและคนขับรถ</a></li>
                <li><a href="#">ตรวจสถานะคำร้อง</a></li>
                <li><a href="../login.php">ออกจากระบบ</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>


    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="../js/materialize.js"></script>
    <script src="../js/init.js"></script>

    <div class="container">
        <br>
        <h4>รายชื่อ User</h4><br>
        <table class="responsive-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>password</th>
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
                <tr>
                    <td>1</td>
                    <td>60122519000</td>
                    <td>Miss.Jane</td>
                    <td>Donovan</td>
                    <td>Student</td>
                    <td>s60122519000@ssru.ac.th</td>
                    <td>089-999-9999</td>
                    <td>user</td>
                    <td>Industrial Technology</td>
                    <td>
                        <a>
                            <button type="submit" form="ee" class="btn amber darken-4-effect amber darken-4-light">แก้ไข
                                <i class="material-icons right">border_color</i>
                            </button>
                        </a>
                    </td>
                    <td>
                        <a>
                            <button id="lob" type="submit" form="ee" class="btn red accent-4-effect red accent-4-light">ลบ
                                <i class="material-icons right">close</i>
                            </button>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>60122519000</td>
                    <td>Miss.Jane</td>
                    <td>Donovan</td>
                    <td>Student</td>
                    <td>s60122519000@ssru.ac.th</td>
                    <td>089-999-9999</td>
                    <td>user</td>
                    <td>Industrial Technology</td>
                    <td>
                        <a>
                            <button type="submit" form="ee" class="btn amber darken-4-effect amber darken-4-light">แก้ไข
                                <i class="material-icons right">border_color</i>
                            </button>
                        </a>
                    </td>
                    <td>
                        <a>
                            <button id="lob" type="submit" form="ee" class="btn red accent-4-effect red accent-4-light">ลบ
                                <i class="material-icons right">close</i>
                            </button>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>60122519000</td>
                    <td>Miss.Jane</td>
                    <td>Donovan</td>
                    <td>Student</td>
                    <td>s60122519000@ssru.ac.th</td>
                    <td>089-999-9999</td>
                    <td>user</td>
                    <td>Industrial Technology</td>
                    <td>
                        <a>
                            <button type="submit" form="ee" class="btn amber darken-4-effect amber darken-4-light">แก้ไข
                                <i class="material-icons right">border_color</i>
                            </button>
                        </a>
                    </td>
                    <td>
                        <a>
                            <button id="lob" type="submit" form="ee" class="btn red accent-4-effect red accent-4-light">ลบ
                                <i class="material-icons right">close</i>
                            </button>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>60122519000</td>
                    <td>Miss.Jane</td>
                    <td>Donovan</td>
                    <td>Student</td>
                    <td>s60122519000@ssru.ac.th</td>
                    <td>089-999-9999</td>
                    <td>user</td>
                    <td>Industrial Technology</td>
                    <td>
                        <a>
                            <button type="submit" form="ee" class="btn amber darken-4-effect amber darken-4-light">แก้ไข
                                <i class="material-icons right">border_color</i>
                            </button>
                        </a>
                    </td>
                    <td>
                        <a>
                            <button id="lob" type="submit" form="ee" class="btn red accent-4-effect red accent-4-light">ลบ
                                <i class="material-icons right">close</i>
                            </button>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>60122519000</td>
                    <td>Miss.Jane</td>
                    <td>Donovan</td>
                    <td>Student</td>
                    <td>s60122519000@ssru.ac.th</td>
                    <td>089-999-9999</td>
                    <td>user</td>
                    <td>Industrial Technology</td>
                    <td>
                        <a>
                            <button type="submit" form="ee" class="btn amber darken-4-effect amber darken-4-light">แก้ไข
                                <i class="material-icons right">border_color</i>
                            </button>
                        </a>
                    </td>
                    <td>
                        <a>
                            <button id="lob" type="submit" form="ee" class="btn red accent-4-effect red accent-4-light">ลบ
                                <i class="material-icons right">close</i>
                            </button>
                        </a>
                    </td>
                </tr>

            </tbody>
        </table>
    </div><br><br><br>

</body>

</html>