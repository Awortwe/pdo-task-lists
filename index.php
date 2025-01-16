<?php require_once('./includes/header.php'); ?>

<div class="container">
        <form class="py-4">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Username">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Email Address">
                </div>
                <div class="col">
                    <input type="submit" class="form-control btn btn-secondary" value="Add New User">
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
                while($user = $stmt->fetch(PDO::FETCH_ASSOC)){
                  $user_id = $user['user_id'];
                  $user_name = $user['user_name'];
                  $user_email = $user['user_email'];
              ?>
              <tr>
                <th><?php echo $user_id; ?></th>
                <td><?php echo $user_name; ?></td>
                <td><?php echo $user_email; ?></td>
                <td><a href="edit-user.php?id=<?php echo $user_id; ?>">Edit</a></td>
                <td><a href="index.php?id=<?php echo $user_id; ?>">Delete</a></td>
              </tr>
              <?php  } ?>
            </tbody>
        </table>

    </div>
<?php require_once('./includes/footer.php') ?>