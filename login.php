<?php 
require_once("./DB.php") 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <?php
      $login_wrong=false;
      if ($_POST){
        $result=$db->loginCheck($_POST['user-email'],$_POST['user-pwd']);
        // var_dump($result);
        if($result){
          $newURL="/StarMusic/";
          // 
          session_start();
          $_SESSION['id']=$result['id'];
          $_SESSION['email']=$result['email'];
          header('Location:'.$newURL);

        }else{
        $login_wrong=true;
        }
      }
    ?>
    <div class="container mx-auto p-5">
    <div class="jumbotron m-5 p-5">
      <h1 class="display-4">Login</h1>
      <form action="" method="POST">
        <div class="form-group">
          <label for="exampleInputEmail1">username</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="username" name="user-email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="user-pwd">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
            <?php 
           if($login_wrong){
           ?>
              <div class="alert alert-warning" role="alert">
              Login Error! Password is wrong!
            </div>
          <?php
            }
          ?>
      </form>
    </div>      
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>