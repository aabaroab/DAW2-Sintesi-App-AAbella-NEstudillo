<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <script src="https://cdn.tiny.cloud/1/h0eyqfi236byw3c9d1qhtktoermf6bzixitvp4963bg3p1nm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#descripciollargaInfografia'
        });

        type="text/javascript">
        tinymce.init({
            selector: '#descripciocurtaInfografia'
        });
    </script>

</head>

<body>

    <form action="<?php echo base_url('practicaPissarra') ?>" method="post" style="width: 50%; margin-left: 25%" id="formCanva" ENCTYPE='multipart/form-data'>
        <div class="form-group">
            <p>Titol:</p>
            <input type="text" class="form-control" id="titolInfografia" name="titolInfografia">
        </div>
        <div class="form-group">
            <p>Descripció Curata:</p>
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

        <!------------------------------------------------------------------------------------->

        <div class="form-group">
            <div>
                <canvas id="myCanva" width="500" height="500" style='border: 1px solid #CCC;'>
                    <p>Tu navegador no soporta canvas</p>
                </canvas>
            </div>
            <p class="btn btn-primary" type="button" onclick="changeTypeLine()">Linea</p>
            <p class="btn btn-primary" type="button" onclick="changeTypeFullCircle()">R.Circle </p>
            <p class="btn btn-primary" type="button" onclick="changeTypeBorderCircle()">B.Circle</p>
            <p class="btn btn-primary" type="button" onclick="changeTypeFullRect()">R.Rectangle</p>
            <p class="btn btn-primary" type="button" onclick="changeTypeBorderRect()">B.Rectangle</p>
            <p class="btn btn-primary" type="button" onclick="changeTypeText()">Text</p>
            <p class="btn btn-primary" type="button" onclick="changeTypeClearRect()">Borrar area</p>
            <p class="btn btn-primary" type="button" onclick="cleanCanva()">Borrar tot</p>
            <p class="btn btn-primary" type="button" onclick="saveImage()">Guardar</p>
            <input type="hidden" name="imagenFinal" id="imagenFinal"/>            
            <script src="<?php echo base_url('/assets/js/scriptPissarra.js');?>"></script>
            <?php 
            //echo $_SERVER["DOCUMENT_ROOT"];
            if (isset($_POST["imagenFinal"])) { 
            
                echo '<img src="'.$_POST["imagenFinal"].'" border="1">';
            
                function uploadImgBase64 ($base64, $name){
                    $datosBase64 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64));
                    mkdir(base_url('/uploads/') .$name, 0777);
                    $path= base_url('/uploads/').$name.'/'.$name;
                    if(!file_put_contents($path, $datosBase64)){
                        echo "Error";
                        return false;
                    }
                    else{
                        echo "Guardado con exito";
                        return true;
                    }
                }
                uploadImgBase64($_POST["imagenFinal"], 'imgPissarra_'.date('d_m_Y_H_i_s').'.png' );
            }
            ?>
        </div>

        <div class="form-group">
            <p>Categoria:</p>
            <input type="text" class="form-control" id="categoriaPractica" name="categoriaPractica">
        </div>
        <?php $query = $this->db->get('tags');

        foreach ($query->result() as $row) { ?>
            <input type="checkbox" id="tag" name="tag" value="<?php $row->nom; ?>"> <label for="tag" id="tag" neme="tag"> <?php echo $row->nom; ?></label><br>
        <?php } ?>

        <button type="submit" class="btn btn-primary btn-lg" style="width: 30%; margin-left: 30%">Crear</button>

    </form>

</body>

</html>
