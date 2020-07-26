

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
          background-image: url('https://image.freepik.com/free-photo/abstract-white-color-canvas-wallpaper-textures-surface_74190-6376.jpg');
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
            font-family:sans-serif;
        }

        #search_result{
           margin-top: 10%;
           margin-bottom: 4%
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
<script type="text/javascript">

var key_id = "AIzaSyBnR6aoR6SC5jZGgHYaUOHzbrPCJ3LQP8w"; // youtube api key
var part = "snippet";

var maxResults = 6;

$('#youtube_search').click(function() {
    var q = document.getElementById('search_txt').value;
    var ajaxurl = 'https://www.googleapis.com/youtube/v3/search?part=' + part + '&key=' + key_id + '&q=' + q + '&maxResults=' + maxResults;
    console.log(ajaxurl);

if(q != ""){
    $.ajax({
        type: "GET",
        url: ajaxurl,
        dataType: "jsonp",
        success: function(response) {
            //console.log(response);
            if (response.items) {
                $("#search_result > .row").empty();
                $.each(response.items, function(i, items) {
                    var video_id = items.id.videoId;
                    var video_title = items.snippet.title;
                    // IFRAME Embed for YouTube
                    var video_frame = "<div class='col-md-6 col-xs-12' style='margin-bottom: 25px;'><iframe width='100%' height='300' src='http://www.youtube.com/embed/" + video_id + "' frameborder='0' type='text/html'></iframe><span style='font-size: larger; font-weight: 900;'>" + video_title + "</span>";

                    $("#search_result > .row").append(video_frame); // appending Search results

                });
            } 
        }
    });
}else{
   
    $("#search_result > .row").empty();
    var message = "Sorry, no result found";
    var message_2 = "What you searched was unfortunately not found or doesn't exist.";
    var message_discription="<div style='font-size:40px;font-weight:800;font-family:inherit;color:black;margin-top:200px;margin-left:30%'>"+message+"</div><br/><center><div style='font-size:40px;font-weight:700;font-family:inherit;color:gray;''>"+message_2+"</div></center>";
    $("#search_result > .row").append(message_discription);
}

});
</script>



</body>
</html>




