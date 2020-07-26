

  <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Youtube Search') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
   
    

</head>

<body>
    <style>
        body {
          /* background-image: url('https://images.unsplash.com/photo-1579546929518-9e396f3cc809?ixlib=rb-1.2.1&w=1000&q=80'); */
          background-image: url('https://ak.picdn.net/shutterstock/videos/488137/thumb/1.jpg');
          background-repeat: no-repeat;
          background-size: cover;
        }
        .formclass{
            margin-left: 20%;
        }

        #search_txt{
            width: 400px;
        }

        .fa-youtube{
            color: red; 
            margin-left:2%;
            margin-right: 0.5%;

        }

        html{
            font-size: 16px;
            font-family: Roboto, Arial, sans-serif;
        }


        </style>
  
<div class="row ">
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top ">
        <i class="fab fa-youtube fa-2x"></i><a class="navbar-brand" href="#"><strong>YouTube Search</strong></a>
 
        <form class="form-inline my-2 my-lg-0 formclass">
            <input class="form-control mr-sm-2" type="text" id="search_txt" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-danger my-2 my-sm-0"  id="youtube_search"type="button"><i class="fas fa-search"></i></button>
          </form>
        
    </nav>
</div>

<body>

    <main role="main" class="container">
        <div>
            <div id="search_result" >
                <div class="row"></div>
            </div>
        </div>
    </main>
    
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
{{-- <script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script></body> --}}
<script type="text/javascript">

//document.addEventListener('DOMContentLoaded',function(){
var key_id = "AIzaSyA32NJw6dEnGzrVaz9917CeiY3u7ljKlc8";
var part = "snippet";

var maxResults = 20;

   $('#youtube_search').click(function(){
     var q = document.getElementById('search_txt').value;
     var ajaxurl = 'https://www.googleapis.com/youtube/v3/search?part='+part+'&key='+key_id+'&q='+q;
     console.log(ajaxurl);

      $.ajax({
        type: "GET",
        url: ajaxurl,
        dataType:"jsonp",
        success: function(response){
          //console.log(response);
          if(response.items){
            $("#search_result > .row").empty();
            $.each(response.items, function(i,items){
              var video_id=items.id.videoId;
              var video_title=items.snippet.title;
              // IFRAME Embed for YouTube
              var video_frame="<div class='col-md-6 col-xs-12'><iframe width='100%' height='385' src='http://www.youtube.com/embed/"+video_id+"' frameborder='0' type='text/html'></iframe>";

              //var final="<div id='title'>"+video_title+"</div><div>"+video_frame+"</div><div id='count'>"+video_viewCount+" Views</div>";

              $("#search_result > .row").append(video_frame); // Result

             });
          }
          else{
            $("#search_result > .row").html("<div id='no'>No Video</div>");
          }
        }
    });


  //});
});
</script>



</body>
</html>




