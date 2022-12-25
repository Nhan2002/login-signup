<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng ký</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <form action="signup.php" method="post">
            <center><h2 class="justify-content-md-center">Đăng ký</h2></center>
            <div class="form-group row">
                <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="formGroupExampleInput" placeholder="email"
                        name="email">
                </div>
            </div>
            <div class="form-group row">
                <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Họ và tên</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="fullname"
                        name="fullname" />
                </div>
            </div>
            <div class="form-group row">
                <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Số điện thoại</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="phonenumber"
                        name="phonenumber" />
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Mật khẩu</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" placeholder="password"
                        name="password" />
                </div>
            </div>
            <?php
            include("connect.php");
            if (isset($_POST["signup"])) {
                session_start();
                $email = mysqli_real_escape_string($conn, $_POST["email"]);
                $fullname = mysqli_real_escape_string($conn, $_POST["fullname"]);
                $phonenumber = mysqli_real_escape_string($conn, $_POST["phonenumber"]);
                $password = mysqli_real_escape_string($conn, $_POST["password"]);
                $role = '2';
                $selectemail = "SELECT * FROM `user` WHERE email = '$email'";
                $selectemail = mysqli_query($conn, $selectemail);
                if (!empty($email) && !empty($fullname) && !empty($password)) {
                    if (mysqli_num_rows($selectemail) > 0) {
                        echo '
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Đăng ký thất bại:</strong> email hoặc số điện thoại bị trùng
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                    } else {
                        $sql = "INSERT INTO `user`(`fullname`, `email`, `phonenumber`, `password`, `ID_Role`)
                        VALUES ('$fullname','$email','$phonenumber','$password','$role')";
                        $query = mysqli_query($conn, $sql);
                        $_SESSION['email'] = $email;
                        header("Location:homepage.php");
                    }
                } else {
                    echo '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Đăng ký thất bại:</strong> Bạn cần nhập đầy đủ thông tin
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                }
            }
            ?>
            <button type="submit" class="btn btn-outline-success btn-lg btn-block" name="signup">Đăng ký</button>
            <a href="index.php" class="btn btn-outline-secondary btn-lg btn-block">Đăng nhập</a>
        </form>
    </div>
</body>

</html>