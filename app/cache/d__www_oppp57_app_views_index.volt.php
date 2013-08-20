<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <?php echo Phalcon\Tag::getTitle(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="OP-PP Individual">
    <meta name="author" content="Mr.Utit Sairat">

    <!-- Favicons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="ico/favicon.png">

    <?php echo Phalcon\Tag::stylesheetLink(array('href' => $this->url->get('css/bootstrap.min.css'))); ?>
    <?php echo Phalcon\Tag::stylesheetLink(array('href' => $this->url->get('css/docs.css'))); ?>
    <?php echo Phalcon\Tag::stylesheetLink(array('href' => $this->url->get('css/font-awesome.css'))); ?>
    <?php echo Phalcon\Tag::stylesheetLink(array('href' => $this->url->get('css/bwizard.min.css'))); ?>
    <?php echo Phalcon\Tag::stylesheetLink(array('href' => $this->url->get('css/daterangepicker-bs3.css'))); ?>

    <!--[if IE 7]>
    <?php echo Phalcon\Tag::stylesheetLink(array('href' => $this->url->get('css/font-awesome-ie7.css'))); ?>
    <![endif]-->

    <?php echo Phalcon\Tag::javascriptInclude(array('src' => $this->url->get('js/jquery.min.js'))); ?>
    <?php echo Phalcon\Tag::javascriptInclude(array('src' => $this->url->get('js/bootstrap.min.js'))); ?>
    <?php echo Phalcon\Tag::javascriptInclude(array('src' => $this->url->get('js/underscore-min.js'))); ?>
    <?php echo Phalcon\Tag::javascriptInclude(array('src' => $this->url->get('js/bwizard.min.js'))); ?>
    <?php echo Phalcon\Tag::javascriptInclude(array('src' => $this->url->get('js/moment.min.js'))); ?>
    <?php echo Phalcon\Tag::javascriptInclude(array('src' => $this->url->get('js/daterangepicker.js'))); ?>

    <script language="JavaScript">
        var site_url = '<?php echo $this->url->get(); ?>';
        site_url = site_url.substr(0, site_url.length - 1);
    </script>
    <?php echo Phalcon\Tag::javascriptInclude(array('src' => $this->url->get('apps/js/apps.js'))); ?>
</head>
<body>
<?php echo $this->getContent(); ?>
</body>
</html>