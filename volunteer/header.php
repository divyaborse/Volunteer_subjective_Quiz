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
    <title><?= $title ?></title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/6e11af4402.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@100;300;500;700&display=swap" rel="stylesheet">

  </head>
  <style>
      body{
          font-family: 'roboto',sans-serif;
      }
      nav{
          width:100%;
      }
  </style>
  <body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>"><b>Intellify</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url('volunteer/Dashboard') ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav float-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            User Id: <b><?= $this->session->userdata('quiz_volunteer')['user_id'] ?></b>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php if($this->session->userdata('quiz_volunteer')['type'] === '2')
                                    echo '<a class="dropdown-item" href="'.base_url('volunteer/Dashboard/reportedQuestions').'">Reported Question</a>';
                                ?>
                            <!-- <a class="dropdown-item" href="">Action</a> -->
                            <!-- <a class="dropdown-item" href="">Another action</a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url('volunteer/login/logout') ?>">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>