<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    {{ get_title() }}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="OP-PP Individual Center">
    <meta name="author" content="Mr.Utit Sairat">

    <!-- Favicons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ url('ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ url('ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ url('ico/apple-touch-icon-57-precomposed.png') }}">
    <link rel="shortcut icon" href="{{ url('ico/favicon.png') }}">

    {{ stylesheet_link(["href": url('css/bootstrap.min.css')]) }}
    {{ stylesheet_link(["href": url('css/docs.css')]) }}
    {{ stylesheet_link(["href": url('css/font-awesome.css')]) }}
    {{ stylesheet_link(["href": url('css/bwizard.min.css')]) }}
    {{ stylesheet_link(["href": url('css/daterangepicker-bs3.css')]) }}

    <!--[if IE 7]>
    {{ stylesheet_link(["href": url('css/font-awesome-ie7.css')]) }}
    <![endif]-->

    {{ javascript_include(['src': url('js/jquery.min.js')]) }}
    {{ javascript_include(['src': url('js/bootstrap.min.js')]) }}
    {{ javascript_include(['src': url('js/underscore-min.js')]) }}
    {{ javascript_include(['src': url('js/bwizard.min.js')]) }}
    {{ javascript_include(['src': url('js/moment.min.js')]) }}
    {{ javascript_include(['src': url('js/daterangepicker.js')]) }}

    <script language="JavaScript">
        var site_url = '{{ url() }}';
        site_url = site_url.substr(0, site_url.length - 1);
    </script>
    {{ javascript_include(['src': url('apps/js/apps.js')]) }}
</head>
<body>
{{ content() }}
</body>
</html>