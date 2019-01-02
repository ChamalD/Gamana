@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/searchBar.css') }}" rel="stylesheet">


    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Displaying text directions with <code>setPanel()</code></title>
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }

        #floating-panel {
            position: relative;
            top: 10px;
            left: 25%;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
            text-align: center;
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
        }
        #right-panel {
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
        }

        #right-panel select, #right-panel input {
            font-size: 15px;
        }

        #right-panel select {
            width: 100%;
        }

        #right-panel i {
            font-size: 12px;
        }
        #right-panel {
            height: 100%;
            float: right;
            width: 390px;
            overflow: auto;
        }
        #map {
            margin-right: 400px;
        }
        #floating-panel {
            background: #fff;
            padding: 5px;
            font-size: 14px;
            font-family: Arial;
            border: 1px solid #ccc;
            box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
            display: none;
        }
        @media print {
            #map {
                height: 500px;
                margin: 0;
            }
            #right-panel {
                float: none;
                width: auto;
            }
        }
    </style>
</head>
<body>

<div id="txt">
    <input hidden id="start" value="{{$place_name}}" type="text" />
    <br>
    <input hidden id="end" value="{{$name}}" type="text" />
</div>
<div>
    <h3 style="padding-left: 10%">{{$name}}</h3>
</div>
<div id="right-panel"></div>
<div id="map" style="padding-top: 1%"></div>
<script>
    function initMap() {
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: {lat: -33.866, lng: 151.196}
        });
        directionsDisplay.setMap(map);

        directionsDisplay.setPanel(document.getElementById('right-panel'));


        calculateAndDisplayRoute(directionsService, directionsDisplay);

    }


    function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var start = document.getElementById('start').value;
        var end = document.getElementById('end').value;
        directionsService.route({
            origin: start,
            destination: end,
            travelMode: 'DRIVING'
        }, function(response, status) {
            if (status === 'OK') {
                directionsDisplay.setDirections(response);
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNLpeAyelrFUasRcA1P8or2w4JVv7d01E&callback=initMap">
</script>
<br/><br/>
<div class="container" style="background-color: white">
    <div class="row container-fluid" style="width: 90%">
        <form method="post" action="{{route('comments.store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <input  type="hidden" name="commentable_type" value="App\VisitingPlace" />

            <input  type="hidden" name="commentable_id" value="{{$place->id}}" />


            <div class="form-group">
                <label for="company-content">Comment</label>
                <textarea placeholder="Enter Comment"
                          id="comment-content"
                          name="body"
                          spellcheck="false"
                          rows="3"
                          class="form-control autosize-target text-left">
                </textarea>
            </div>

            <div class="form-group">
                <label for="company-content">Photo</label>
                <input type="file" name="photo" class="form-control autosize-target text-left">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit"/>
            </div>
        </form>
    </div>
    <br/>
    <br/>

    <div class="row">
        <div class="col-md-12 col-lg-10 col-sm-12 col-xm-12">

            <!-- Fluid width widget -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-comment"></span> 
                        Recent Comments
                    </h3>
                </div>
                @foreach($place->comments as $comment)
                <div class="panel panel-default">

                <div class="panel-body">
                    <ul class="media-list">
                        <li class="media">
                            <div class="media-left">
                                <img src="http://placehold.it/60x60" class="img-circle">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <small>
                                        <a href="users/{{$comment->user->id}}">
                                            {{$comment->user->name}} {{$comment->user->email}}</a>
                                        <br>
                                        commented on {{$comment->created_at}}
                                    </small>
                                </h4>
                                <p>
                                    {{$comment->body}}
                                </p>
                                <b> Proof: </b>
                                <p> <img src='/images/comment/{{$comment->image1}}' width="250" height="150">
                                    </p>
                            </div>
                        </li>
                    </ul>
                </div>
                </div>
                @endforeach
            </div>
            <!-- End fluid width widget -->


        </div>
    </div>


    </div>
    </div>
</div>

</body>

@endsection
</html>

