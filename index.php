<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng nhâp</title>
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
        <form action="index.php" method="post">
            <center>
                <h2 class="justify-content-md-center">Đăng nhâp</h2>
            </center>
            <div class="form-group row">
                <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="email"
                        name="email" />
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Mật khẩu</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password"
                        name="password" />
                </div>
            </div>
            <?php
            include("connect.php");
            session_start();
            if (isset($_SESSION['email'])) {
                header("Location:homepage.php");
            }
            if (isset($_POST['login'])) {
                $email = mysqli_real_escape_string($conn, $_POST["email"]);
                $password = mysqli_real_escape_string($conn, $_POST["password"]);
                if (!empty($email) && !empty($password)) {
                    $sql = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'";
                    $query = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($query) > 0) {
                        $_SESSION['email'] = $email;
                        header("Location:homepage.php");
                    } else {
                        echo '
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Đăng nhập thất bại:</strong> sai email hoặc mật khẩu
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                    }
                } else {
                    echo '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Đăng nhập thất bại:</strong> Bạn cần nhập đầy đủ thông tin
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                }
            }
            ?>
            <button type="submit" class="btn btn-outline-success btn-lg btn-block" name="login">Đăng nhập</button>
            <a href="signup.php" class="btn btn-outline-secondary btn-lg btn-block">Đăng ký</a>
        </form>
    </div>
</body>

</html>