<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <base href="{{asset('')}}">

    <link href="admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
        @include('admin.layout_admin.header')
        @include('admin.layout_admin.menu')
        @yield('content')

    </div>

    <script src="admin/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="admin/dist/js/sb-admin-2.js"></script>
    <script src="admin/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                    responsive: true
            });
            $('.xemtl').click(function(){
                var traloi = '.xemtraloi' + $(this).attr('id');        
                $('.xemtraloi').hide();
                $(traloi).show(500);
            });
        });
    </script>
    @yield('script')
</body>
</html>
