<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Silsilah Keluarga Ne Allu">
        <meta name="author" content="Tommy Toban">

        <title>Silsilah Keluarga</title>

        <!-- Bootstrap core CSS -->
        <link href="{{asset('public/bootstrap/')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="{{asset('public/bootstrap/')}}/css/full-width-pics.css" rel="stylesheet">

        <style>



            /*Now the CSS*/
            * {margin: 0; padding: 0;}
            .tree {
                width:20000px;
            }
            .tree ul {
                padding-top: 20px;
                position: relative;

                transition: all 0.5s;
                -webkit-transition: all 0.5s;
                -moz-transition: all 0.5s;
            }

            .tree li {

                float: left; 
                text-align: center;
                list-style-type: none;
                position: relative;
                padding: 20px 5px 0 5px;

                transition: all 0.5s;
                -webkit-transition: all 0.5s;
                -moz-transition: all 0.5s;
            }

            /*We will use ::before and ::after to draw the connectors*/

            .tree li::before, .tree li::after{
                content: '';
                position: absolute; top: 0; right: 50%;
                border-top: 1px solid #ccc;
                width: 50%; height: 20px;
            }
            .tree li::after{
                right: auto; left: 50%;
                border-left: 1px solid #ccc;
            }

            /*We need to remove left-right connectors from elements without 
            any siblings*/
            .tree li:only-child::after, .tree li:only-child::before {
                display: none;
            }

            /*Remove space from the top of single children*/
            .tree li:only-child{ padding-top: 0;}

            /*Remove left connector from first child and 
            right connector from last child*/
            .tree li:first-child::before, .tree li:last-child::after{
                border: 0 none;
            }
            /*Adding back the vertical connector to the last nodes*/
            .tree li:last-child::before{
                border-right: 1px solid #ccc;
                border-radius: 0 5px 0 0;
                -webkit-border-radius: 0 5px 0 0;
                -moz-border-radius: 0 5px 0 0;
            }
            .tree li:first-child::after{
                border-radius: 5px 0 0 0;
                -webkit-border-radius: 5px 0 0 0;
                -moz-border-radius: 5px 0 0 0;
            }

            /*Time to add downward connectors from parents*/
            .tree ul ul::before{
                content: '';
                position: absolute; top: 0; left: 50%;
                border-left: 1px solid #ccc;
                width: 0; height: 20px;
            }

            .tree li a{
               /* border: 1px solid #ccc;*/
               /* padding: 5px 10px; */
                text-decoration: none;
                color: #666;
                font-family: arial, verdana, tahoma;
                font-size: 11px;
                display: inline-block;

                border-radius: 5px;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;

                transition: all 0.5s;
                -webkit-transition: all 0.5s;
                -moz-transition: all 0.5s;
                background-color:white;
            }

            .perempuan{
                background-color: #ffe6ee;
                 
                  
            }

            /*Time for some hover effects*/
            /*We will apply the hover effect the the lineage of the element also*/
            .tree li a:hover, .tree li a:hover+ul li a {
               background: #c8e4f8; color: #000; 
             /*  border: 1px solid #94a0b4; */
            }
            /*Connector styles on hover*/
            .tree li a:hover+ul li::after, 
            .tree li a:hover+ul li::before, 
            .tree li a:hover+ul::before, 
            .tree li a:hover+ul ul::before{
                border-color:  #94a0b4;
            }
            
            .kotak_keluarga {
                
                
                border:1px solid #476b6b;
                height: 37px;
            }
            .kotak_keluarga .foto{
                width:35px;
                height:35px;
                float:left;
                background-image: url("{{asset('public/img/')}}/no_foto.jpg");
               
            }
            .kotak_keluarga .info{
                float:left;
               
                padding-left:10px;
                padding-right: 10px;
                padding-bottom: 2px;
                padding-top: 2px;
                height:35px;
            }
          

            /*Thats all. I hope you enjoyed it.
            Thanks :)*/
        </style>

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">Silsilah Keluarga Ne Allu & Ne Matta</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>



        <!-- Content section -->
        <section class="py-5">
            <div class="container">
                <div class="tree">
                    {!! $family !!}
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-5 bg-inverse">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Allu Projects 2017</p>
            </div>
            <!-- /.container -->
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="{{asset('public/bootstrap/')}}/vendor/jquery/jquery.min.js"></script>
        <script src="{{asset('public/bootstrap/')}}/vendor/popper/popper.min.js"></script>
        <script src="{{asset('public/bootstrap/')}}/vendor/bootstrap/js/bootstrap.min.js"></script>

    </body>

</html>
