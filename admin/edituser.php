<?php
$id = $_GET['sid'];
include "connect.php";
$sql = "SELECT * FROM `user` WHERE ID = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sữa user</title>
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
        <form action="updateuser.php" method="post">
            <center>
                <h2 class="justify-content-md-center">Sửa user</h2>
            </center>
            <input type="hidden" name="id" value="<?php echo $row['ID']?>" id="">
            <div class="form-group row">
                <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="formGroupExampleInput" placeholder="email" name="email"
                        value="<?php echo $row['email']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Họ và tên</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="fullname"
                        name="fullname" value="<?php echo $row['fullname']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label for="formGroupExampleInput" class="col-sm-2 col-form-label">Số điện thoại</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="phonenumber"
                        name="phonenumber" value="<?php echo $row['phonenumber']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Mật khẩu</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" placeholder="password"
                        name="password" value="<?php echo $row['password']; ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                    <select class="custom-select" id="role" name="role" value="<?php echo $row['ID_Role']; ?>">
                        <option selected>Chọn...</option>
                        <option value="1">admin</option>
                        <option value="2">user</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-warning btn-lg btn-block" name="edit">sữa</button>
            <a href="homespageadmin.php" class="btn btn-outline-secondary btn-lg btn-block">quây lại</a>
        </form>
    </div>
</body>

</html>