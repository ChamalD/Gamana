@extends('layouts.app')
@section('content')
<html>

<?php
use Carbon\Carbon;

$today = Carbon::today();


?>
<head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/hotelSearch.css') }}" rel="stylesheet">
</head>

<body style="background-color: #CFDEF3">

<!--View searched Hotel results-->

<div class="flight-engine">
    <div class="tabing">
        <ul>
            <li><a class="active" href="#1"><i class="fa fa-hotel" aria-hidden="true"></i> Hotels View</a>
            </li>
        </ul>
        <form method="post" action="{{route('hotel_booking.results')}}">
            {{ csrf_field() }}
            <div class="tab-content">
                <div id="1" class="tab1 active">
                    <div class="flight-tab row">
                        <div class="persent-one">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <input type="text" value="{{$search_detail->location}}" name="location" class="textboxstyle" id="location" placeholder="Location">
                        </div>

                        <div class="persent-one less-btn">
                            <input type="Submit" name="submit" value="Search" class="btn btn-info cst-btn" id="srch">
                        </div></div></div></div>
        </form>

    </div>
    <script src="{{ asset('js/searchBar.js') }}"></script>
</div>

<div class="container"  style="margin-top: 10%">
    <br/>

    @foreach($hotels as $resultHotels)

        <div class="col-md-9 col-lg-9 col-sm-9 pull-left">

            <div class="well">

                <div _ngcontent-c17="" class="row sub-result-wrapper">
                    <div _ngcontent-c17="" class="col-md-3">
                        <br/>
                        <div _ngcontent-c17="" class="hot-img">
                            <div _ngcontent-c17="" class="image-container">
                                <img src='/images/hotel/{{$resultHotels->img}}' width="250" height="150">
                            </div>
                        </div>
                    </div>
                    <div _ngcontent-c17="" class="col-md-9">
                        <div _ngcontent-c17="" class="hotel-content">

                            <div _ngcontent-c17="" class="row">
                                <div _ngcontent-c17="" class="col-md-8 col-sm-9 pull-right">
                                    <h2 _ngcontent-c17="" class="cursor-point">
                                        {{ $resultHotels->name}}</h2>
                                    <p _ngcontent-c17="" class="hot-location">
                                        <span _ngcontent-c17=""><i _ngcontent-c17="" aria-hidden="true" class="fa fa-map-marker"></i></span>
                                        {{ $resultHotels->address}}, {{ $resultHotels->country}}
                                        <span _ngcontent-c17="" class="supperb"><img _ngcontent-c17="" src=""></span>

                                    </p>


                                    <div _ngcontent-c17="" class="clearfix">
                                        <ul _ngcontent-c17="" class="list-row">
                                            <li _ngcontent-c17=""><b _ngcontent-c17=""><i _ngcontent-c17="" aria-hidden="true" class="fa fa-wifi"></i></b>Free WiFi</li>
                                            <!---->
                                            <li _ngcontent-c17=""><b _ngcontent-c17=""><i _ngcontent-c17="" aria-hidden="true" class="fa fa-bed"></i></b>Standard Room
                                            </li><br/>


                                        </ul>

                                    </div>
                                    per Night : LKR {{ $resultHotels->room_price}}

                                    <br/>



                                </div>
                                <br/>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endforeach

</div>
</body>

@endsection
</html>





