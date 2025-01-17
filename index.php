<?php require_once('./includes/header.php'); ?>
<?php
if (isset($_POST['addNewUser'])) {
  $user_name = trim($_POST['username']);
  $user_email = trim($_POST['email']);
  $user_password = 'secret';

  if (empty($user_name) || empty($user_email)) {
    $error = true;
  } else {
    // add new user
    $sql = "INSERT INTO users(user_name, user_email, user_password) VALUES(:name, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      ':name' => $user_name,
      ':email' => $user_email,
      ':password' => $user_password
    ]);
    header("location:index.php");
  }
}
?>
<div class="container">
  <form class="py-4" action="index.php" method="post">
    <div class="row">
      <div class="col">
        <input type="text" name="username" class="form-control" placeholder="Username">
      </div>
      <div class="col">
        <input type="email" name="email" class="form-control" placeholder="Email Address">
      </div>
      <div class="col">
        <input type="submit" name="addNewUser" class="form-control btn btn-secondary" value="Add New User">
        <?php echo isset($error) ? "<p>Fields cannot be blank</p>" : "" ?>
      </div>
    </div>
  </form>


  <h2>All Users</h2>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT * FROM users";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $user_id = $user['user_id'];
        $user_name = $user['user_name'];
        $user_email = $user['user_email'];
      ?>
        <tr>
          <th><?php echo $user_id; ?></th>
          <td><?php echo $user_name; ?></td>
          <td><?php echo $user_email; ?></td>
          <td><a href="edit-user.php?id=<?php echo $user_id; ?>">Edit</a></td>
          <td>
            <form action="index.php" method="post">
              <input type="hidden" name="val" value="<?php echo $user_id ?>">
              <input type="submit" class="btn btn-danger sm" value="Delete" name="submit">
            </form>
          </td>
        </tr>
      <?php  } ?>
    </tbody>
  </table>

  <?php 
    if(isset($_POST['submit']))
    {
      $id = $_POST['val'];
      $sql = "DELETE FROM users WHERE user_id = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([
        ':id' => $id
      ]);
      header("Location:index.php");
    }
  ?>

</div>
<?php require_once('./includes/footer.php') ?>