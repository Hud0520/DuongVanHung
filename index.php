  <?php
    include 'lib/session.php';
    Session::checkSession();
    ?>
  <?php

    include 'lib/database.php';

    spl_autoload_register(function ($class) {
        include_once "class/" . $class . ".php";
    });
    $db = new Database();

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

          <div>
              <h5>Đăng ký học phần</h5>
          </div>
          <div class="row">
              <div class="col-md-4 border">ThÔng tin sinh viên
              
              <br>
              <table>
                  <tr><th>Tên sinh viên:</th>
                  <td><?php echo Session::get('user_name')?></td>
                  </tr>
                      <?php
                        
                        ?>
                  </table>
              <button class="btn btn-primary">Đăng ký</button>
              </div>
              <div class="col-md-6 border">Thông tin học phần
                  
              </div>
          </div>
          
      </div>
  </body>

  </html>