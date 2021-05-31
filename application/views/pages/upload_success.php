<html>

<head>
    <title>Upload Form</title>
</head>

<body>

    <h3>La pràctica s'ha creat exitosament!</h3>

    <ul>
        <?php foreach ($upload_data as $item => $value) : ?>
            <li><?php echo $item; ?>: <?php echo $value; ?></li>
        <?php endforeach; ?>
    </ul>

    <p><?php echo anchor('crearpractica', 'Upload Another File!'); ?></p>

</body>

</html>