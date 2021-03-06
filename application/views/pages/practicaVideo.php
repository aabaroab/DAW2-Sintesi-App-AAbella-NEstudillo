<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear practica</title>


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

    <form action="<?php echo base_url('practicaVideo') ?>" method="post" style="width: 50%; margin-left: 25%">
        <div class="form-group">
            <p>Titol:</p>
            <input type="text" class="form-control" id="titolInfografia" name="titolInfografia">
        </div>
        <div class="form-group">
            <p>DescripciĆ³ curta:</p>
            <textarea class="form-control" id="descripciocurtaInfografia" name="descripciocurtaInfografia"></textarea>
        </div>
        <!------------------------------------------------------------------------------------->

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

        <!------------------------------------------------------------------------------------->

        <div class="form-group">
            <p>DescripciĆ³ llarga:</p>
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

        <!------------------------------------------------------------------------------------->

        <div class="form-group">
            <p>Link video:</p>
            <input type="text" class="form-control" id="linckVideo" name="linckVideo">
        </div>

        <div class="form-group">
            <p>Categoria:</p>
            <!--<input type="text" class="form-control" id="categoriaPractica" name="categoriaPractica">-->
            <?php
                echo "<select name='curs' id='curs'>";
                echo "<hr>";
                $controller->mostrar_tree2($cat);
                echo "</select>"; 
            ?>
        </div>
        <?php $query = $this->db->get('tags');

        foreach ($query->result() as $row) { ?>
            <input type="checkbox" id="tag" name="tagsphp[]" value="<?php echo $row->nom; ?>"> <label for="tag" id="taglabel"> <?php echo $row->nom; ?></label><br>
        <?php } ?>                                


        <div>
            <label for="acces">Tipus d'accĆ©s:</label>
            <select name="acces" id="acces">
                <option value="Grupusuaris">Grup usuaris</option>
                <option value="Perfilusuaris">Perfil usuaris</option>
                <option value="Codiinvitacio">Codi invitaciĆ³</option>
                <option value="Public">PĆŗblic</option>
            </select>
        </div>
        <br><br>
        <button type="submit" class="btn btn-primary btn-lg" style="width: 30%; margin-left: 30%">Crear</button>

    </form>


</body>

</html>