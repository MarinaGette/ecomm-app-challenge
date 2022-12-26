<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="librerias\genera.js" type="text/javascript"></script>

    <script>
        $(document).ready(function() {
            $('#alert_success1').delay(1000).slideUp(100);
            load_data();
        });
    </script>
</head>

<body>
    <center>
        <h1>Products</h1>
    </center>
    <hr>

    <?php if ($this->session->flashdata('listado')) { ?>

        <h5 id="alert_success1" class="alert alert-info" role="alert"><?php echo $this->session->flashdata('listado'); ?></h5>

    <?php } ?>
    <a href="<?= base_url("Product/nuevo") ?>">New</a>

    <div id="d_result_producto">
    </div>
   
</body>

</html>