<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" style="margin-bottom: 5%;">
                    <fieldset>
                        <legend class="text-center header">Contingut</legend>
                        <?php foreach ($news_item as $news_item2) : ?>


                            <table style="width:100%; margin-top:2%; border: 1px solid black">
                                <tr style="border: 1px solid black" class="col-md-12  text-center">
                                    <th>
                                        <h5 class="col-md-1  text-center">Titol:</h5>
                                    </th>
                                    <th class="col-md-10  text-center">
                                        <!-- <div class="col-md-1 col-md-offset-2 text-center"></div> -->
                                        <h5><?php echo $news_item2['titul']; ?></h5>
                                    </th>
                                </tr>

                                <tr style="border: 1px solid black">
                                    <th>
                                        <h5 class="col-md-1  text-center">Descripció Curta:</h5>
                                    </th>
                                    <th class="col-md-1  text-center">
                                        <!-- <div class="col-md-1 col-md-offset-2 text-center"></div> -->
                                        <h5><?php echo $news_item2['descripcio']; ?></h5>
                                    </th>
                                </tr>

                                <tr style="border: 1px solid black">
                                    <th>
                                        <h5 class="col-md-1  text-center">Descripció Llarga:</h5>
                                    </th>
                                    <th class="col-md-1 col-md-offset-2 text-center">
                                        <!-- <div class="col-md-1 col-md-offset-2 text-center"></div> -->
                                        <h5><?php echo $news_item2['explicacio']; ?></h5>
                                    </th>
                                </tr>
                                
                                <tr style="border: 1px solid black">
                                    <th>
                                        <h5 class="col-md-1 ">Tags:</h5>
                                    </th>
                                    <th class="col-md-1 col-md-offset-2 text-center">
                                    <?php foreach ($nomtags as $nomtagsfinal) : ?>
                                        <h5><?php echo $nomtagsfinal['nom']; ?></h5>
                                        <?php endforeach; ?>
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
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

