<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title')</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{asset("../../backend/assets/vendors/mdi/css/materialdesignicons.min.css")}}">
        <link rel="stylesheet" href="{{asset("../../backend/assets/vendors/css/vendor.bundle.base.css")}}">
        <link rel="stylesheet" href="{{asset("../../backend/assets/css/style.css")}}">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="{{asset("../../backend/assets/images/favicon.png")}}" />
</head>
<body>
@yield('content')



<script src="{{asset("../../backend/assets/vendors/js/vendor.bundle.base.js")}}"></script>
<script src="{{asset("../../backend/assets/js/off-canvas.js")}}"></script>
<script src="{{asset("../../backend/assets/js/hoverable-collapse.js")}}"></script>
<script src="{{asset("../../backend/assets/js/misc.js")}}"></script>
<script src="{{asset("../../backend/assets/js/settings.js")}}"></script>
<script src="{{asset("../../backend/assets/js/todolist.js")}}"></script>
<!-- endinject -->
</body>
</html>
