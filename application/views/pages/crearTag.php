<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


</head>

<body>

    <form action="<?php echo base_url('crearTag') ?>" method="post" style="width: 50%; margin-left: 25%">
    
        <div class="form-group">
            <p>Nom Tag:</p>
            <input type="text" class="form-control" id="nomtag" name="nomtag">
        </div>


        <button type="submit" class="btn btn-primary btn-lg" style="width: 30%; margin-left: 30%">Crear</button>

    </form>
</body>

</html>