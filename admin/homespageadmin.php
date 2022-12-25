<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
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
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <h1>Hello admin</h1>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav list-group" id="list-tab" role="tablist">
                <a class="nav-item nav-link" id="list-user-list" data-toggle="list" href="#list-user" role="tab"
                    aria-controls="user">User</a>
                <a class="nav-item nav-link" id="list-role-list" data-toggle="list" href="#list-role" role="tab"
                    aria-controls="role">Role</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-user" role="tabpanel" aria-labelledby="list-user-list">
                <H2>USER</H2>
                <a class="btn btn-success" href="adduser.php" role="button" style="margin-bottom: 10px;">Thêm user</a>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Email</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Mật khẩu</th>
                            <th scope="col">chức năng</th>
                            <th scope="col">Sửa/ xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "connect.php";
                        $sqluser = "SELECT * FROM `user`";
                        $queryuser = mysqli_query($conn, $sqluser);
                        while ($row = mysqli_fetch_array($queryuser)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row['ID']; ?></th>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['phonenumber']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><?php if ($row['ID_Role'] == 1) {
                                echo 'admin';
                            } else {
                                echo 'user';
                            } ?></td>
                            <td>
                                <a class="btn btn-warning" href="edituser.php?sid=<?php echo $row['ID']; ?>"
                                    role="button">Sửa</a>
                                <a onclick="return confirm('Bạn có muốn xóa không?')" class="btn btn-danger"
                                    href="deleteusser.php?sid=<?php echo $row['ID']; ?>" role="button">Xóa</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="list-role" role="tabpanel" aria-labelledby="list-Role-list">
                <h2>ROLD</h2>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">tên</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sqlrole = "SELECT * FROM `role`";
                        $queryrole = mysqli_query($conn, $sqlrole);
                        while ($row = mysqli_fetch_array($queryrole)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row['ID']; ?></th>
                            <td><?php echo $row['name']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>