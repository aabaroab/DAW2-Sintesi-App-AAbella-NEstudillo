<?php if ('tipus_recurs' == 'imatge') {?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header">Contingut</legend>
                        <?php foreach ($news_item as $news_item2) : ?>

                            <table style="width:100%; margin-top:2%; border: 1px solid black">
                                <tr style="border: 1px solid black">
                                    <th>
                                        <h3 class="col-md-1  text-center">Titol:</h3>
                                    </th>
                                    <th class="col-md-1  text-center">
                                        <!-- <div class="col-md-1 col-md-offset-2 text-center"></div> -->
                                        <h3><?php echo $news_item2['titul']; ?></h3>
                                    </th>
                                </tr>

                                <tr style="border: 1px solid black">
                                    <th>
                                        <h3 class="col-md-1  text-center">Descripció Curta:</h3>
                                    </th>
                                    <th class="col-md-1  text-center">
                                        <!-- <div class="col-md-1 col-md-offset-2 text-center"></div> -->
                                        <h3><?php echo $news_item2['descripcio']; ?></h3>
                                    </th>
                                </tr>

                                <tr style="border: 1px solid black">
                                    <th>
                                        <h3 class="col-md-1  text-center">Descripció Llarga:</h3>
                                    </th>
                                    <th class="col-md-1 col-md-offset-2 text-center">
                                        <!-- <div class="col-md-1 col-md-offset-2 text-center"></div> -->
                                        <h3><?php echo $news_item2['explicacio']; ?></h3>
                                    </th>
                                </tr>

                                <tr style="border: 1px solid black">
                                    <th>
                                        <h3 class="col-md-1  text-center">imatge:</h3>
                                    </th>
                                    <th class="col-md-1 col-md-offset-2 text-center">
                                        <!-- <div class="col-md-1 col-md-offset-2 text-center"></div> -->
                                        <!-- <h3><?php echo $news_item2['explicacio']; ?></h3> -->
                                    </th>
                                </tr>

                            </table>
                        <?php endforeach; ?>
                        <!-- <a class="btn btn-primary btn-lg center" type="submit" name="submit" style="margin-left: 50%;" href="<?php //echo base_url('videos'); 
                                                                                                                                    ?>">Tornar</a> -->
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<?php }else if ('tipus_recurs' == 'videorecurs') {?>


    <?php } ?>