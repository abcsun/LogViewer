<!DOCTYPE html>
<html lang="en-GB">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>LogViewer for Laravel/Lumen - @section('title')
@show</title>

<link rel="stylesheet" type="text/css" href="{{ asset('assets/logviewer/styles/bootstrap.default.min.css') }}">
<!--[if lt IE 9]>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<script type="text/javascript" src="{{ asset('assets/logviewer/scripts/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/logviewer/scripts/bootstrap.min.js') }}"></script>

</head>
<body>
<div id="wrap">
<div class="container" style='padding-top: 0px;'>
@section('top')
@show

@section('content')
@show
@section('css')
@show
@section('js')
@show

</body>
</html>
