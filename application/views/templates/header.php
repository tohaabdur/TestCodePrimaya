<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <title>Primaya</title>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Bootstrap files-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- custom style -->
    <link href="<?PHP echo base_url();?>assets/css/custom.css" rel="stylesheet" type="text/css" />
    <!-- custom javascript -->
    <script src="<?PHP echo base_url();?>assets/js/jquery.printarea.js" type="text/javascript"></script>
    <script src="<?PHP echo base_url();?>assets/js/<?PHP echo $jsfile; ?>.js" type="text/javascript"></script>
</head>

<body class="text-center">
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-primaya">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <img src="<?PHP echo base_url('assets/images/primaya_logo.png');?>" alt="" width="120" height="60" class="d-inline-block align-text-top">
        </a>
        <div class="justify-content-end align-items-center">
        <a>Halo, <strong><?PHP echo $this->session->userdata('Name'); ?></strong></a> &nbsp;&nbsp;<a class="btn btn-outline btn-sm bg-fade" href="<?PHP echo base_url('index.php/logout');?>" onclick="return confirm('Keluar aplikasi?');">Logout</a>
        </div>
    </div>
    </nav>
    <main>