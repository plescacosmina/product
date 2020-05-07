<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Product</title>
    <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="{{ URL::asset('css/fontawesome.min.css') }}"/>
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}"/>
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
</head>

<body id="reportsPage">
@yield('content')
<footer class="tm-footer row tm-mt-small">
    <div class="col-12 font-weight-light">
        <p class="text-center text-white mb-0 px-4 small">
            Copyright &copy; <b>2019</b> All rights reserved.
        </p>
    </div>
</footer>

<script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
<!-- https://jquery.com/download/ -->
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<!-- https://getbootstrap.com/ -->
</body>
</html>