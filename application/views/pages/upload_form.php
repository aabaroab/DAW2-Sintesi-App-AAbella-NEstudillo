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
    <script src="assets/js/fichersextra.js"></script>
</head>

<body>

    <?php echo $error;
    ?>
    <form class="user" action="<?php echo base_url('upload/do_upload') ?>" method="post" enctype="multipart/form-data" style="width: 50%; margin-left: 25%">

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
            <!--<input type="text" class="form-control" id="categoriaPractica" name="categoriaPractica">-->
            <?php
            echo "<select name='curs' id='curs'>";
            echo "<hr>";
            $controller->mostrar_tree2($cat);
            echo "</select>";
            ?>
        </div>

        <div>
            <p>Imatge:</p>
            <input type="file" name="userfile" size="20" multiple="multiple" />
        </div><br />
        <div>
            <p>Fitxers Extra:</p>
            <div id="id_div_on_posar_input_file" name="id_div_on_posar_input_file"></div>
            <script>
                var obj = new DawFileUploader("id_div_on_posar_input_file", "maxim_bytes", "nom_del_input");
            </script>
        </div>

        <br /><br />

        <?php $query = $this->db->get('tags');

        foreach ($query->result() as $row) { ?>
            <input type="checkbox" id="tag" name="tagsphp[]" value="<?php echo $row->nom; ?>"> <label for="tag" id="taglabel"> <?php echo $row->nom; ?></label><br>
        <?php } ?>
        <br /><br />

        <div>
            <label for="acces">Tipus d' accés:</label>
            <select name="acces" id="acces" onchange="acsesinv()">
                <option value="Grupusuaris">Grup usuaris</option>
                <option value="Perfilusuaris">Perfil usuaris</option>
                <option value="Codiinvitacio">Codi invitació</option>
                <option value="Public">Públic</option>
            </select>
        </div>
        <br><br>

        <input hidden type="text" class="form-control" id="acsescodi" name="acsescodi">

        <script>
            function acsesinv() {
                if (document.getElementById('acces').value != 'Codiinvitacio') {
                    document.getElementById('acsescodi').hidden = true;
                } else {
                    document.getElementById('acsescodi').hidden = false;
                }
            }
        </script>

        <button type="submit" class="btn btn-primary btn-lg" value="upload" style="margin-left: 40%;">Crear</button>

    </form>
</body>

</html>