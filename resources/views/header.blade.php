<!DOCTYPE html>
<html>
<head>
  <title>Blog</title>

    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
      <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
      <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <style type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></style>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!-- <meta name="google-translate-customization" content="a648e4b2b9009c0f-ca96432aba1106ac-gb7380bc44e8f6cea-10" charset="utf-8"></meta> -->
</head>
<div class="container-fullwidth">
  <nav class="headnav">
    <div class="nav-wrapper headnavwap">
      <ul id="nav-mobile" class="right hide-on-med-and-down headul">
        <li><a href="{{ url('/category') }}">{{ trans('file.string') }}</a></li>
        <li><a href="{{ url('/') }}">{{ trans('file.adblog') }}</a></li>
        <li><a href="{{ url('/languages') }}">{{ trans('file.languages') }}</a></li>
      </ul>
    </div>
  </nav>
</div>
</html>

<style type="text/css">
  .headnav
  {
    background: black;
  }
  .nav-wrapper.headnavwap {
    width: 1200px;
    margin:  0 auto;
  }
  .headul li a {
    color: #d2af2c;
    font-weight:  bold;
    text-transform:  uppercase;
    font-family:  monospace;
    letter-spacing:  1px;
 }
</style>
