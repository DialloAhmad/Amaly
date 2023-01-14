<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout/head')
</head>
<body id="page-top">
    <div id="wrapper">
        @include('layout/sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('layout/header')
                @yield('contenu')
            </div>
            @include('layout/footer')
        </div>
       
       
    </div>
    
</body>
</html>