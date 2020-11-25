<?php
$connection = new PDO('mysql:host=localhost;port=3306;dbname=eden', 'root', '');
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eden</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>PASSWORD</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "SELECT * FROM data";
                    $query = $connection->query($sql);
                    while ($result = $query->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr>
                            <td><?= $result['id']; ?></td>
                            <td><?= $result['name']; ?></td>
                            <td><?= $result['email']; ?></td>
                            <td><?= $result['password']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <form action="" method="POST" role="form" class="col-md-6 col-md-offset-3">
        <legend>Form title</legend>

        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="youremail@example.com">
        </div>
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="e.g Amos Eden">
        </div>
        <div class="form-group">
            <label for="">password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Your password">
        </div>



        <button onclick="addUser()" class="btn btn-primary">Submit</button>
    </form>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        function addUser() {
            var email = $('#email').val()
            var name = $('#name').val()
            var password = $('#password').val()
            var data = {
                "email": email,
                "name": name,
                "password": password,
            };
            $.ajax({
                url: "data.php",
                method: 'post',
                data: data,
                success: function(data) {
                    if (data == 'success') {
                        alert("Success! Eden")
                        location.reload();
                    }
                },
                error: function() {
                    alert("Something went horribly wrong");
                }
            });
        }
    </script>
</body>

</html