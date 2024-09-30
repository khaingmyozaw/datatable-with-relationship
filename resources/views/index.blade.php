<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Datatable</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset("css/dataTables-2.1.7.min.css") }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.tailwindcss.css">
</head>
<body>
    
    <div class="container-fluid py-5">
        <div class="container shadow p-3">
            @yield('contents')
        </div>
    </div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset("js/dataTables-2.1.7.min.js") }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@stack('script')


</body>
</html>