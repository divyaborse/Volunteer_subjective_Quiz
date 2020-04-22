<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/add_data.js"></script>
    <link rel="shortcut icon" href="<?= base_url('images/favlogo.png') ?>" type="image/png" sizes="16x16">
    <title>Volunteer | Login</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url() ?>">Intellify</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url('volunteer/Dashboard') ?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>                   
                </div>
            </div>
        </nav>
    </header>
    <div class="container p-4">
        <div class="border shadow p-3 rounded col-md-8 offset-md-2">
            <h3>Volunteer Login</h3>
            <form action="<?= base_url('volunteer/Login/check_login') ?>" method="post">
                <div class="form-group">
                    <label for="exampleInputUser1">User Id</label>
                    <input type="text" name="user" required class="form-control" id="exampleInputUser1" aria-describedby="UserHelp" placeholder="Enter User">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" required class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-block btn-lg btn-primary">Login</button>
            </form>
        </div>
    </div>
