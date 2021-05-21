<!DOCTYPE html>
<html>

<head>
    <title>Upload Form</title>


    <script src="https://cdn.tiny.cloud/1/h0eyqfi236byw3c9d1qhtktoermf6bzixitvp4963bg3p1nm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#descripciollargaInfografia'
        });

        type = "text/javascript" >
            tinymce.init({
                selector: '#descripciocurtaInfografia'
            });
    </script>
</head>

<body>

    <?php echo $error;
    ?>
    <form class="user" action="<?php echo base_url('uploadVideo/do_upload_video') ?>" method="post" enctype="multipart/form-data" style="width: 50%; margin-left: 25%">

        <div class="form-group">
            <p>Titol:</p>
            <input type="text" class="form-control" id="titolInfografia" name="titolInfografia">
        </div>
        <div class="form-group">
            <p>Descripció Curata:</p>
            <textarea class="form-control" id="descripciocurtaInfografia" name="descripciocurtaInfografia"></textarea>
        </div>
        <!------------------------------------------------------------------------------------------------------->
        <script>
            tinymce.init({
                selector: 'descripciocurtaInfografia',
                plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
                toolbar_mode: 'floating',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
            });
        </script>
        <!------------------------------------------------------------------------------------------------------->
        <div class="form-group">
            <p>Descripció Llarga:</p>
            <textarea id="descripciollargaInfografia" name="descripciollargaInfografia" class="form-control"></textarea>
        </div>
        <!------------------------------------------------------------------------------------------------------->
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
        <!------------------------------------------------------------------------------------------------------->

        <div class="form-group">
            <p>Categoria:</p>
            <?php
                echo "<select>";
                echo "<hr>";
                $controller->mostrar_tree2($cat);
                echo "</select>"; 
            ?>
        </div>
        <div>
            <p>Video:</p>
            <input type="file" name="videofile" id="videofile" size="20" />
        </div><br />
        <div>
            <p>Ficher Extra:</p>
            <input type="file" name="videofileExtra" id="videofileExtra" size="20" />
        </div>
        <br /><br />

        <?php $query = $this->db->get('tags');

        foreach ($query->result() as $row) { ?>
            <input type="checkbox" id="tag" name="tag" value="<?php $row->nom; ?>"> <label for="tag"> <?php echo $row->nom; ?></label><br>
        <?php } ?>

        <button type="submit" class="btn btn-primary btn-lg" value="upload" style="margin-left: 40%;">Crear</button>

    </form>
</body>

</html>