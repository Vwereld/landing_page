<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">
    <title>Unique</title>
    <link rel="icon" href="favicon.png" type="image/png">
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    <link href="/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="/css/animate.css" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
    <script src="js/respond-1.1.0.min.js"></script>
    <script src="js/html5shiv.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
    <script src="js/html5element.js"></script>
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
    <![endif]-->

</head>
<body>

<header id="header_wrapper">
    @yield ('header')
    @if (count($errors)>0)
        <div class ="alert alert=danger">
            <ul>
                @foreach($errors as $error)
                   <li>{{$error}}</li>
                    @endforeach
            </ul>
        </div>
    @endif
        @if(session('status'))
            <div class ="alert alert-success">
                {{session('status')}}
            </div>
        @endif
</header>
@yield('content')
</body>
</html>
