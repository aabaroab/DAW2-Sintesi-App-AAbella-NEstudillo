
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header">Contingut</legend>

                        <table style="width:100%">
                            <tr>
                                <th>Titol</th>
                                <th>DescripciĆ³ Curta</th>
                                <th>Tipus Recurs</th>
                                <th></th>
                            </tr>
                            <?php foreach ($news_item as $news_item2) : ?>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <div class="col-md-1 col-md-offset-2 text-center"></div>
                                        <?php echo $news_item2['titul']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <div class="col-md-1 col-md-offset-2 text-center"></div>
                                        <?php echo $news_item2['descripcio']; ?>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group">
                                        <div class="col-md-1 col-md-offset-2 text-center"></div>
                                        <?php echo $news_item2['tipus_recurs']; ?>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group">
                                        <div class="col-md-1 col-md-offset-2 text-center"></div>
                                        <!-- <?php echo $news_item2['explicacio']; ?> -->
                                        <a class="btn btn-primary btn-lg center" type="submit" name="submit" style="margin-left: 50%;" href="<?php echo base_url('plantillaimatge/'.$news_item2['id']); ?>">Detalls</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div> 

