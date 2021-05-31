
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
                                <th>Descripció Curta</th>
                                <th>Descripció Llarga</th>
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
                                        <?php echo $news_item2['explicacio']; ?>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <a class="btn btn-primary btn-lg center" type="submit" name="submit" style="margin-left: 50%;" href="<?php echo base_url('videos'); ?>">Tornar</a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div> 

