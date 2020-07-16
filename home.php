<?php
include('db-connect.php');


 
//write query for all pizzas
$sql = 'SELECT * FROM user ';

// make query & get result
$result = mysqli_query($conn, $sql);

//fetch the result row as an array
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result from memory
mysqli_free_result($result);

//close connections
mysqli_close($conn);

//print_r($pizzas);
 ?>

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php include('templates/header.php'); ?>
  </div>
  <h4 class="center grey-text"> **All Users** </h4>
  <div class="container">
    <div class="row">

      <?php foreach ($users as $user){ ?>
        <div class="col s4 md3 black">
          <div class="center card z-depth-0">
<!--             <img src="img/fations.png" alt="shope img" class="shope">
 -->            <div class="center card-content center">
              <h4 class="brand-text"><?php echo htmlspecialchars($user['userName']); ?></h4>
              <h6 ><?php echo htmlspecialchars($user['email']); ?></h6>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>  <?php include('templates/footer.php'); ?>
</html>
