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

<!--hotel search engine-->

<body style="background-color: #CFDEF3">
<div class="flight-engine">
    <div class="tabing">
        <ul>
            <li><a class="active" href="#1"><i class="fa fa-hotel" aria-hidden="true"></i> Hotel</a>
            </li>
        </ul>
        <form method="post" action="{{route('hotel_booking.search')}}">
            {{ csrf_field() }}
            <div class="tab-content">
                <div id="1" class="tab1 active">
                    <div class="flight-tab row">
                        <div class="persent-one">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <input type="text" value="{{$search_detail->location}}" name="location" class="textboxstyle" id="location" placeholder="Location">
                        </div>

                        <div class="persent-one less-per">
                            <i class="fa fa-calendar" aria-hidden="true"></i><span></span>
                            <input  type="date"min={{$today}} value="{{$search_detail->check_in}}"  name="check_in" class="textboxstyle" id="from-check_in" placeholder="Check In Date">
                        </div>
                        <div class="persent-one less-per">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <input type="date" min={{$today}} value="{{$search_detail->check_out}}"  name="check_out" class="textboxstyle" id="check_out" placeholder="Check Out Date">
                        </div>

                        <div class="persent-one less-per">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <input type="number" value="{{$search_detail->no_rooms}}" min=1 name="no_rooms" class="textboxstyle" id="to-date" placeholder="1 Room">
                        </div>

                        <div class="persent-one less-btn">
                            <input type="Submit" name="submit" value="Search" class="btn btn-info cst-btn" id="srch">
                        </div></div></div></div>
        </form>

    </div>
    <script src="{{ asset('js/searchBar.js') }}"></script>
</div>

<!--hotels details view-->

<div class="container"  style="margin-top: 10%">
    <br/>

    @foreach($hotels as $resultHotels)
    <form method="post" action="{{route('hotel_booking.view')}}">
        {{ csrf_field() }}
        <input type="text" hidden value="{{$search_detail->location}}" name="location" >
        <input  type="date" hidden value="{{$search_detail->check_in}}"  name="check_in" >
        <input type="date" hidden value="{{$search_detail->check_out}}"  name="check_out" >
        <input type="number" hidden value="{{$search_detail->no_rooms}}" name="no_rooms">

        <input  type="text" hidden  name="hotel_id" value="{{$resultHotels->id}}">
        <input  type="text" hidden  name="hotel_name" value="{{$resultHotels->name}}">
        <input  type="text" hidden  name="hotel_address" value="{{$resultHotels->address}}">
        <input  type="text" hidden  name="hotel_country" value="{{$resultHotels->country}}">


        <div class="col-md-12 col-lg-12 col-sm-12 pull-left">

            <div class="well">
                
                <div _ngcontent-c17="" class="row sub-result-wrapper">
                    <div _ngcontent-c17="" class="col-md-3">
                        <div _ngcontent-c17="" class="hot-img">
                            <div _ngcontent-c17="" class="image-container">
                                <img src='/images/hotel/{{$resultHotels->img}}' width="250" height="150">
                            </div>
                        </div>
                    </div>
                    <div _ngcontent-c17="" class="col-md-9">
                        <div _ngcontent-c17="" class="hotel-content">

                            <div _ngcontent-c17="" class="row">
                                <div _ngcontent-c17="" class="col-md-8 col-sm-9">
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
                                            </li>
                                        </ul>
                                    </div>


                                </div>
                                <br/>

                                <div _ngcontent-c17="" class="col-md-4 col-sm-3">
                                    <p _ngcontent-c17="" class="dis-price">LKR {{ $resultHotels->room_price}}</p>
                                    <p _ngcontent-c17="" class="per-night">
                                    <span _ngcontent-c17="">
                                        <i _ngcontent-c17="" aria-hidden="true" class="fa fa-sort-desc fa-rotate-180"></i> avg/night
                                    </span>
                                    </p>
                                    <div _ngcontent-c17="" class="text-right alignme" style="padding-right: 270px">
                                        <input type="Submit" name="submit"  disabled="disabled" value="Select Room" class="btn btn-info cst-btn" id="srch">
                                    </div>
                                    <!---->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
    @endforeach

</div>
</body>

@endsection
</html>





