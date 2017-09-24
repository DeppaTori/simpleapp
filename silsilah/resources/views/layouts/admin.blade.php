<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{$urls["theme"]}}/css/bootstrap.min.css" />
<link rel="stylesheet" href="{{$urls["theme"]}}/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="{{$urls["theme"]}}/css/uniform.css" />
<link rel="stylesheet" href="{{$urls["theme"]}}/css/select2.css" />
<link rel="stylesheet" href="{{$urls["theme"]}}/css/matrix-style.css" />
<link rel="stylesheet" href="{{$urls["theme"]}}/css/matrix-media.css" />
<link href="{{$urls["theme"]}}/font-awesome/css/font-awesome.css" rel="stylesheet" />
<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'> -->
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Panel Admin</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li class=""><a title="" href="#"><i class="icon icon-user"></i> <span class="text">Welcome {{$user}}</span></a></li>
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
  
  </ul>
</div>

<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch--> 

<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Tables</a>
  <ul>
    <li><a href="{{ $urls["index"] }}"><i class="icon icon-home"></i> <span>Daftar Keluarga</span></a> </li>
    <li><a href="{{ $urls["add"] }}"><i class="icon icon-signal"></i> <span>Tambah Baru</span></a> </li>
    <li><a href="{{ url("/app_home/") }}" target="_blank"><i class="icon icon-signal" ></i> <span>Diagram</span></a> </li>
    <li><a href="{{ $urls["blog_admin"] }}"><i class="icon icon-signal"></i> <span>Blog Admin</span></a> </li>
    <li><a href="{{ $urls["index"] }}"><i class="icon icon-inbox"></i> <span>Setting</span></a> </li>
    
  </ul>
</div>
<div id="content">
  @yield('content')
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2017 &copy; Allu Projects . Brought to you by <a href="#">Banua Labs</a> </div>
</div>
<!--end-Footer-part-->
<script src="{{$urls["theme"]}}/js/jquery.min.js"></script> 
<script src="{{$urls["theme"]}}/js/jquery.ui.custom.js"></script> 
<script src="{{$urls["theme"]}}/js/bootstrap.min.js"></script> 
<script src="{{$urls["theme"]}}/js/jquery.uniform.js"></script> 
<script src="{{$urls["theme"]}}/js/select2.min.js"></script> 
<script src="{{$urls["theme"]}}/js/jquery.dataTables.min.js"></script> 
<script src="{{$urls["theme"]}}/js/matrix.js"></script> 
<script src="{{$urls["theme"]}}/js/matrix.tables.js"></script>
</body>
</html>


