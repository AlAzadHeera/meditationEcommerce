<html>
<head>
    <title> Integrating TinyMCE with Responsive Filemanager </title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Integrating TinyMCE with Responsive filemanager">
    <meta name="author" content="Riyadh Ahmed">
    <meta name="keyword" content="TinyMCE,tinymce,filemanager,codeigniter">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/datepicker.css">

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="tinymce/tinymce.min.js"></script>


    <!--<script type="text/javascript" src="js/jquery-1.11.1.js"></script>-->

</head>
<body>
<div class="container jumbotron">
    <div class="row">
        <div class="col-md-12">
            <h2>Integrating TinyMCE with Responsive Filemanager </h2>
            <h5>--By Riyadh Ahmed </h5>

        </div>
    </div>

    <div class="row">
        <div class='col-sm-12'>
            <div class="col-md-10 form-group">
                <label for="BlogDetails"> Details </label>
                <textarea id="BlogDetails" name="blog_details" placeholder="Write Here"></textarea>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var BASE_URL = "http://localhost:8080/Integrate-TinyMCE-with-Responsive-Filemanager-master/"; // use your own base url
    tinymce.init({
        selector: "#BlogDetails",
        theme: "modern",
        // width: 680,
        height: 200,
        relative_urls: false,
        remove_script_host: false,
        // document_base_url: BASE_URL,
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
        ],
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
        toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
        image_advtab: true,
        external_filemanager_path: BASE_URL + "./filemanager/",
        filemanager_title: "Media Gallery",
        external_plugins: { "filemanager": BASE_URL + "./filemanager/plugin.min.js" }
    });
</script>
</body>
</html>