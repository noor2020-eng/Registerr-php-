 <?php
include('db-connect.php');

 $userName = $email = $password = $passwordConf = '';
  $errors = array('userName' => '', 'email'=>'', 'password'=>'', 'passwordConf'=>'' );
  if(isset($_POST['submit'])){
    if(empty($_POST['userName'])){
      $errors['userName'] = "An userName is required! <br/>";
    }else {
      $userName = $_POST['userName'];  
    }
    if(empty($_POST['email'])){
      $errors['email'] = "An email is required! <br/>";
    }else {
      $email = $_POST['email'];
       if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Email must be valid <br/>";
      }
    }
    if(empty($_POST['password'])){
      $errors['password'] = "A password is required! <br/>";
    }else if(empty($_POST['passwordConf'])) {
      $errors['passwordConf'] = "An passwordConf is required! <br/>";
    }else if($_POST['passwordConf'] == $_POST['password']){
      $password = $_POST['password'];
    }else{
      $errors['passwordConf'] = "A password not match! <br/>";

    }
    
      
    
    if(array_filter($errors)){
    }else {
      $userName = mysqli_real_escape_string($conn, $_POST['userName']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);

      $sql = "INSERT INTO user(userName,email,password) VALUES('$userName', '$email', '$password' ) ";

      if(mysqli_query($conn, $sql)){
         header('location:home.php');
      }else{
        echo 'query error:' . mysqli_error($conn);
      }
    }

  } 

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php include('templates/header.php'); ?>
  <section class="container gray-text">
    <form class="black" action="" method="POST">
      <label for="">User Name:</label>
      <input type="text" name="userName" class="brand-text" >
      <div class="red-text">
        <?php echo $errors['userName']; ?>
      </div>
      <label for="">Email:</label>
      <input type="text" name="email" class="brand-text" >
      <div class="red-text">
        <?php echo $errors['email']; ?>
      </div>
      <label for="">password:</label>    
      <input type="text" name="password" class="brand-text">
      <div class="red-text">
        <?php echo $errors['password']; ?>
      </div>
       <label for="">password Conf:</label>    
      <input type="text" name="passwordConf" class="brand-text" >
      <div class="red-text">
        <?php echo $errors['passwordConf']; ?>
      </div>
      <div class="center">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0 ">
      </div>
    </form>
  </section
  <?php include('templates/footer.php'); ?>
</html>
