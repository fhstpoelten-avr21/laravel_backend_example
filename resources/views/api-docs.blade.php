<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link href="{{ mix('/css/theme-material.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="swaggerContainer"></div>
        <script type="text/javascript" src="{{asset('js/manifest.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/vendor.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/swagger.js')}}"></script>
    </body>
</html>
