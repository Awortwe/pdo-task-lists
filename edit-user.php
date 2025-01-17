<?php require_once('./includes/header.php') ?>
    <div class="container">
        <?php 
            if($_SERVER['REQUEST_METHOD'] == 'GET')
            {
                header('Location: index.php');
            }
            else
            {
                $id = $_POST['val'];
                $sql = "SELECT * FROM users WHERE user_id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':id' => $id
                ]);
                if($user = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    $user_id = $user['user_id'];
                    $user_name = $user['user_name'];
                    $user_email = $user['user_email'];
                    $user_password = $user['user_password'];
                }
            }
        ?>
        <h2 class="pt-4">User Update</h2>

        <?php 
            if(isset($_POST['update_data']))
            {
                $user_id = $_POST['val'];
                $user_name = trim($_POST['user_name']);
                $user_email = trim($_POST['user_email']);
                $user_password = trim($_POST['user_password']);

                if(empty($user_name) || empty($user_email) || empty($user_password))
                {
                    echo "<div class='alert alert-danger'>Fields cannot be blank</div>";
                }
                else
                {
                    $sql = "UPDATE users SET user_name= :name, user_email= :email, user_password= :password WHERE user_id= :id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([
                        ':name' => $user_name,
                        ':email' => $user_email,
                        ':password' => $user_password,
                        ':id' => $user_id
                    ]);
                    header('Location:index.php');
                }
            }
        
        ?>

        <form class="py-2" action="edit-user.php" method="post" autocomplete="off">
            <input type="hidden" name="val" value="<?php echo $user_id ?>">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" value="<?php echo $user_name ?>" name="user_name" id="username" placeholder="Desired username">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" value="<?php echo $user_email ?>" name="user_email" id="email" placeholder="Desired email address">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" value="<?php echo $user_password ?>" name="user_password" id="password" placeholder="Enter new password">
            </div>
            <button type="submit" name="update_data" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php require_once('./includes/footer.php') ?>