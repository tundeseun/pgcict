<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>

<body style="background-color: whitesmoke;">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="login.php">Data Correction Module</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <!-- <a class="nav-link active" aria-current="page" href="logout.php">Logout</a> -->
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <div class="container" style="margin-top: 80px;">

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4" style="background-color: white; padding:50px">
            <p>Login to continue</p>
                <form action="process_login.php" method="POST">
                    <div class="form-group">
                        <label for="email"><i class="fas fa-envelope"></i> Email</label>
                        <input type="text" class="form-control" name="Email">
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="fas fa-lock"></i> Password</label>

                        <input type="password" class="form-control" name="Password">
                    </div>

                    <div><button type="submit" name="Submit" class="btn btn-primary">Submit</button></div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>