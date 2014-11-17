<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://bootflat.github.io/bootflat/css/bootflat.css">
        <link rel="stylesheet" href="{{URL::asset('assets/css/styles.css')}}">

        <!-- source: http://www.kryogenix.org/code/browser/sorttable/ -->
        <script src="{{URL::asset('assets/js/sorttable.js')}}"></script>

        <title>@yield('title') | Snippet manager</title>
    </head>
    <body>
        @include('templates.header')
        @include('templates.searchbar')
        <div class="col-md-12 col-xs-12" id="central">
            <div class="col-md-2">
                @include('templates.sidebar')
            </div>

            <div class="col-md-10">
                <div class="col-md-12" id="content">
                    @yield('content')
                </div>
            </div>
        </div>

        @include('templates.footer')
    </body>
</html>
