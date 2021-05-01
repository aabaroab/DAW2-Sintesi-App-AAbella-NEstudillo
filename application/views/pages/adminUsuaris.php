<?php foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>"/>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
<div class="w3-container">
<div style="padding: 10px">

        <?php echo $output; ?>
    </div>
</div>
<?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>