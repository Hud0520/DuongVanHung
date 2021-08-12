<?php
include 'class/user.php';
include 'class/uclass.php';
?>
<?php
$class = new user();
$cl = new uclass();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
    $adminUser = $_POST['txtName'];
    $adminPass = $_POST['txtPass'];

    $login_check = $class->login($adminUser, $adminPass);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng Ký học phần</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>
    <div class="container-md">
        <div class="row mt-4">
            <div class="col-lg-4 col-md-12">
                <div class="col-md-12 border border-primary rounded bg-light">
                    <form name="frmLogin" action="" method="POST">
                        <div class="loginview">
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="title text-center font-weight-bold">Login</div>
                                </div>
                            </div>
                            <div class="row p-3">
                                <label class="col-md-4 text-left control-label">Username</label>
                                <div class="col-md-8"><input type="text" id="txtName" class="form-control" name="txtName" /></div>
                            </div>

                            <div class="row p-3">
                                <label class="col-md-4 text-left control-label">Password</label>
                                <div class="col-md-8"><input type="password" id="txtPass" class="form-control" name="txtPass" /></div>
                            </div>

                            <div class="row p-3">
                                <div class="col-md-12 text-center">
                                    <button type="submit" name="login" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="border border-primary rounded bg-light">
                <form class="mx-5" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title font-weight-bold">Đăng ký tài khoản</div>
                        </div>
                    </div>
                    <div class="form-row pt-2">

                        <div class="form-group col-md-12 ">
                            <label for="inputEmail4">Username</label>
                            <input type="text" class="form-control" name="name" id="inputEmail4">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Password</label>
                            <input type="password" class="form-control" name="password" id="inputPassword4">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputAddress">Lớp</label>
                            <select name="uclass" id="">
                                <?php
                                $rs = $cl->show();
                                $i = 0;
                                while ($result = $rs->fetch_assoc()) {
                                    $i++;
                                ?>
                                    <option value="<?php echo $result['class_id']; ?>"><?php echo $result['class_name']; ?></option>
                                <?php }
                                ?>

                            </select>
                        </div>

                    </div>
                    <div class="mb-2">
                        <button type="submit" name="submit" class="btn btn-primary">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>