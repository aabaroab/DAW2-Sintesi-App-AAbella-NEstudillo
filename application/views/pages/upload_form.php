<!DOCTYPE html>
<html>

<head>
    <title>Upload Form</title>


    <script src="https://cdn.tiny.cloud/1/h0eyqfi236byw3c9d1qhtktoermf6bzixitvp4963bg3p1nm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#descripciollargaInfografia'
        });
    </script>
</head>

<body>

    <?php echo $error;
    ?>

    <?php //echo form_open_multipart('upload/do_upload');
    ?>

    <!--<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />-->
<form class="user" action="<?php echo base_url('crearInfografia') ?>" method="post">

    <div class="form-group" style="width: 50%; margin-left: 25%">
        <p>Titol:</p>
        <input type="text" class="form-control" id="titolInfografia" name="titolInfografia">
    </div>
    <div class="form-group" style="width: 50%; margin-left: 25%">
        <p>Descripció Curata:</p>
        <textarea class="form-control" id="descripciocurtaInfografia" name="descripciocurtaInfografia"></textarea>
    </div>
    <div class="form-group" style="width: 50%; margin-left: 25%">
            <p>Descripció Llarga:</p>
            <textarea id="descripciollargaInfografia" name="descripciollargaInfografia" class="form-control"></textarea>
        </div>
        <!------------------------------------------------------------------------------------->

        <script>
    tinymce.init({
      selector: 'descripciollargaInfografia',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
  </script>
  <!--
    <div class="form-group" style="width: 50%; margin-left: 25%">
        <p>Categoria:</p>
        <input type="text" class="form-control" id="EmailUsuari" name="EmailUsuari">
    </div>
    <div class="form-group" style="width: 50%; margin-left: 25%">
        <p>Tags:</p>
        <input type="checkbox" id="tag" name="tag" value="Bike"><label for="tag">Mates</label><br>
    </div>-->


    <!--<?php //echo form_open_multipart('upload/do_upload'); ?>

    <input type="file" name="userfile" size="20" style="width: 50%; margin-left: 25%" />

    <br /><br />

    <input type="submit" value="upload" style="margin-left: 25%" />-->

    <button type="submit" class="btn btn-primary btn-lg" style="margin-left: 40%;">Crear</button>

</form>
</body>

</html>