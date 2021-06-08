<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" style="margin-bottom: 5%;">
                    <fieldset>
                        <legend class="text-center header">Contingut</legend>
                        <?php foreach ($news_item as $news_item2) : ?>


                            <table style="width:100%; margin-top:2%; border: 1px solid black" class="col-md-12  text-center">
                                <tr style="border: 1px solid black" class="col-md-12  ">
                                    <th>
                                        <h5 class="col-md-1 ">Titol:</h5>
                                    </th>
                                    <th class="col-md-10  ">
                                        <input type="text" id="modificartitul" name="modificartitul" value="<?php echo $news_item2['titul']; ?>">
                                    </th>
                                </tr>

                                <tr style="border: 1px solid black">
                                    <th>
                                        <h5 class="col-md-1 ">Descripció Curta:</h5>
                                    </th>
                                    <th class="col-md-1  text-center">
                                        <input type="text" id="modificardescripcio" name="modificardescripcio" value="<?php echo $news_item2['descripcio']; ?>">
                                    </th>
                                </tr>

                                <tr style="border: 1px solid black">
                                    <th>
                                        <h5 class="col-md-1 ">Descripció Llarga:</h5>
                                    </th>
                                    <th class="col-md-1 col-md-offset-2 text-center">
                                        <input type="text" id="modificarexplicacio" name="modificarexplicacio" value="<?php echo $news_item2['explicacio']; ?>">
                                    </th>
                                </tr>

                                <tr style="border: 1px solid black">
                                    <th>
                                        <h5 class="col-md-1 ">Tags:</h5>
                                    </th>
                                    <th class="col-md-1 col-md-offset-2 text-center">

                                        <?php foreach ($nomtags as $totselstags) : ?>
                                            <h5><?php  $totselstags['nom']; ?></h5>
                                        <?php endforeach; ?>

                                        <?php $query = $this->db->get('tags');

                                        foreach ($query->result() as $row) { ?>



                                            <?php if ($row->nom == $totselstags['nom']) { ?>
                                                <?php //print_r($row->nom);
                                                //die; 
                                                ?>
                                                <?php //foreach ($nomtags as $nomtagsfinal) :
                                                ?>
                                                    <input type="checkbox" id="tag" checked="checked" name="tagsphp[]"> <label for="tag" id="taglabel"> <?php echo $row->nom; ?></label><br>
                                                <?php //endforeach;
                                                ?>

                                            <?php } else { ?>
                                                <input type="checkbox" id="tag" name="tagsphp[]" value="<?php echo $row->nom; ?>"> <label for="tag" id="taglabel"> <?php echo $row->nom; ?></label><br>
                                            <?php } ?>


                                        <?php } ?>

                                    </th>
                                </tr>


                                <tr style="border: 1px solid black">
                                    <th>
                                        <h5 class="col-md-1  ">imatge Pissarra:</h5>
                                    </th>
                                    <th>
                                        <?php foreach ($nomfitxer as $nomfitxerfinal) : ?>
                                            <img class="col-md-12  " src="<?php echo base_url('download/' . $news_item2['id'] . '/' . $nomfitxerfinal['id']); ?>" />
                                            <?php //die($nomfitxerfinal['id_practique']); ?>
                                        <?php endforeach; ?>
                                    </th>
                                </tr>

                                <tr style="border: 1px solid black">
                                    <th>
                                        <h5 class="col-md-1  ">Fichers Extra:</h5>
                                    </th>
                                    <th>

                                    </th>
                                </tr>

                            </table>
                        <?php endforeach; ?>
                        <button type="submit" class="btn btn-primary btn-lg" style="margin-left: 50%; margin-top: 2%">Enviar</button>
                        <!-- <a class="btn btn-primary btn-lg center" type="submit" name="submit" style="margin-left: 50%;" href="<?php //echo base_url('videos'); 
                                                                                                                                    ?>">Tornar</a> -->
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>