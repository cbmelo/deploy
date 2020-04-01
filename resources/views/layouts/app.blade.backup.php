<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name', 'Wish Birthdat Club')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
         <!-- Bootstrap CSS -->
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    </head>
    <body>
        @include('inc.navbar')
        <div class="container-fluid bg-white">
            <div class="row">
               
                <div class="col-md-2 col-sm-4 pl-0">
                    @include('inc.sidebar')
                </div><!--end cold md 3 -->
                <div class="col-md-10 col-sm-8 p-4">
                    @include('inc.messages')
                    @yield('content')  
                </div>
            </div>
             
        </div>
    

        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script>
    </body>
</html>
