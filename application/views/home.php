<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?=base_url()?>/resource/css/bootstrap.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="<?=base_url()?>/resource/css/bootstrap-theme.css">

        <script src="<?=base_url()?>/resource/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Get Movie Info</a>
        </div>
      </div>
    </div>
    <div class="container">
    <header id="header">
      <div class="row">
        Header
      </div>    
    </header><!-- /header -->  
    
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-2">
          
        </div>
        <div class="col-md-8">
          
        
          <div class="form-group">
            <label>Please Enter Movie Name:</label><br>
            <input type="text" class="form-control" id="moviename" name="movie" placeholder="Please Enter Movie Name" /><br>
            <button class="btn btn-info" id="submitb" name="getinfo">Get Info</button>
          </div>
        
        </div>
            
          </div> 
        </form>

       </div>
        <div class="col-md-2">
          
        </div>
      </div>
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <div class="target">
          
          </div>  
        </div>
        <div class="col-lg-2"></div>
        
      </div>

      <hr>

      <footer>
        <p>&copy; Rahul Bussa 2014</p>
      </footer>
    </div>
    </div>
     <!-- /container -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
        <script src="<?=base_url()?>/resource/js/jquery-1.11.0.js"></script>

        <script src="<?=base_url()?>/resource/js/bootstrap.min.js"></script>
        <script type="text/javascript">
        $( document ).ready(function() {
                     console.log( 'ready!' );
                     $('#submitb').click(function(){
                      var mov = $("#moviename").val();
                      console.log(mov);
                      $.ajax({
                            url: '<?=base_url()?>/index.php/movie/getdata/'+mov,
                            type: "POST",
                            success: function( resp ) {
                              console.log(resp);
                              $( '.target').html(resp);
                            },
                            error: function( req, status, err ) {
                              console.log( 'something went wrong', status, err );
                            }
                         });

             });


          });
        </script>
    </body>
</html>
