
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
                                <th>Tipus Recurs</th>
                                <th></th>
                            </tr>
                            <?php foreach ($practiques as $practiques) : ?>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <div class="col-md-1 col-md-offset-2 text-center"></div>
                                        <?php echo $practiques['titul']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <div class="col-md-1 col-md-offset-2 text-center"></div>
                                        <?php echo $practiques['descripcio']; ?>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group">
                                        <div class="col-md-1 col-md-offset-2 text-center"></div>
                                        <?php echo $practiques['tipus_recurs']; ?>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group">
                                        <div class="col-md-1 col-md-offset-2 text-center"></div>
                                        <!-- <?php echo $practiques['explicacio']; ?> -->
                                        <a class="btn btn-primary btn-lg center" type="submit" name="submit" style="margin-left: 50%;" href="<?php echo base_url('plantillamodificar/'.$practiques['id']); ?>">modificar</a>
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