<?php require_once('./includes/header.php') ?>
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
              <tr>
                <th>1</th>
                <td>Mark</td>
                <td>mark@gmail.com</td>
                <td><a href="#">Edit</a></td>
                <td><a href="#">Delete</a></td>
              </tr>
              <tr>
                <th>2</th>
                <td>John</td>
                <td>john@gmail.com</td>
                <td><a href="#">Edit</a></td>
                <td><a href="#">Delete</a></td>
              </tr>
            </tbody>
        </table>

    </div>
<?php require_once('./includes/footer.php') ?>