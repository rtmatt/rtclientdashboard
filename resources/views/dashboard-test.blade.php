<!doctype html>
<html lang="en">
<head>
    <title> Admin Dashboard ::
        RedTrain Web Services
    </title>
    <meta charset="utf-8">

</head>
<body class="">
<div class="admin-wrapper">
    @include('rtclientdashboard::components.dashboard-component')
</div>
<script src="https://code.jquery.com/jquery-2.2.3.min.js"
integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
@yield('footer')
<script src='/js/dashboard.js'></script>
<script>
    new ClientDashboard({
        auth:'{{$auth}}'
    });
</script>
</body>
</html>