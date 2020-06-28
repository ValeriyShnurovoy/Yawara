<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/admin.css') }}" rel="stylesheet">

</head>
<body>
    <div class="admin" style="display: flex;">
        <div class="nav-bar">
            <ul class="left-navbar">
                <li><a href="<?= URL::to('admin').'/configuration' ?>">Configuration</a></li>
                <li><a href="<?= URL::to('admin').'/report' ?>">Reports</a></li>                
                <li><a href="<?= URL::to('admin').'/userrole' ?>">User Roles</a></li>
            </ul>
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script>
        let urlAccessConfigurationDelete = '{{route('configuration.destroy')}}';
        let urlAccessConfigurationCreate = '{{route('configuration.store')}}';
        let urlUserRoleUpdate = '{{route('userrole.ajax')}}';
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/admin/admin.js') }}"></script>

</body>
</html>