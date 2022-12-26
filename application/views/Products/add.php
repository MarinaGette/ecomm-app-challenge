<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#alert_success').delay(1000).slideUp(100);
        });
    </script>
</head>

<body>

    <?php if ($this->session->flashdata('nuevoerror')) { ?>

        <h5 id="alert_success" class="alert alert-info" role="alert"><?php echo $this->session->flashdata('nuevoerror'); ?></h5>

    <?php } ?>

    <form action="" method="post">
        <div class="container">
           
            <h1> New product</h1>            
            <label for="title">title:</label>
            <input type="text" name="title" id="title" size="15" class="form-control"> 
            <label>price:</label>
            <input type="text" name="price" size="15" class="form-control"> 
            <label>created_at:</label>
            <input type="text" name="created_at" size="15" class="form-control"> 

            <input type="submit" name="submit" value="Add"  class="btn btn-primary" />

    </form>
    <a href="<?= base_url() ?>">Back</a>
</body>

</html>