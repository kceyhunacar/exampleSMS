<link rel="shortcut icon" type="image/png" href="{{ asset('backend/assets/images/icon/favicon.ico') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/css/metisMenu.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/css/slicknav.min.css') }}">
<!-- amchart css -->
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<!-- others css -->
<link rel="stylesheet" href="{{ asset('backend/assets/css/typography.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/css/default-css.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('backend/assets/css/responsive.css') }}">
<!-- modernizr css -->
<script src="{{ asset('backend/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>


<style>
    .upload-container {
        position: relative
    }

    .upload-container input {
        border: 1px solid #92b0b3;
        background: #f1f1f1;
        outline: 2px dashed #92b0b3;
        outline-offset: -10px;
        padding: 5rem 0 5rem 1rem;
        text-align: center !important;
        width: -webkit-fill-available;
    }

    .upload-container input:hover {
        background: #ddd
    }

    .upload-container:before {
        position: absolute;
        bottom: 50px;
        left: 1rem;
        content: " (or) Drag and Drop files here. ";
        color: #3f8188;
        font-weight: 900
    }

    .upload-btn {
        margin-left: 300px;
        padding: 7px 20px
    }
</style>