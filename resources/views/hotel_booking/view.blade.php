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

<!--hotel room details view-->

<div class="container"  style="margin-top: 10%">
    @foreach($room_details as $room_details)
        <form method="post" action="{{route('hotel_booking.review')}}">
            {{ csrf_field() }}
            <input  type="number" hidden  name="hotel_id"  value="{{$room_details->hotel_id}}">

            <input hidden type="text" value="{{$resultHotels->location}}" name="location">
            <input hidden  type="date" value="{{$resultHotels->check_in}}"  name="check_in" >
            <input hidden type="date" value="{{$resultHotels->check_out}}"  name="check_out" >

            <input hidden type="text" value="{{$room_details->address}}"  name="hotel_address" >
            <input hidden type="text" value="{{$room_details->country}}"  name="hotel_country" >
            <input hidden type="text" value="{{$room_details->name}}"  name="hotel_name" >

            <input hidden type="number" value="{{ $room_details->price}}" name="price">

            <input hidden type="number" value="{{$resultHotels->no_rooms}}" name="no_rooms">
            <input hidden type="text" value="{{$room_details->room_img}}" name="img">

            <div class="col-md-12 col-lg-12 col-sm-12 pull-left">

                <div class="well">

                    <div _ngcontent-c25="" class="room-box">
                        <div _ngcontent-c25="" class="container">
                            <div _ngcontent-c25="" class="row">
                                <div _ngcontent-c25="" class="col-lg-2 col-md-4 col-sm-4 col-12 room-image">
                                    <img src='/images/hotel/{{$room_details->room_img}}' width="350" height="200">

                                </div>
                                <div _ngcontent-c25="" class="col-lg-4 col-md-2 col-sm-2 col-12 room-desc" style="padding-left: 200px">
                                    <div _ngcontent-c25="" class="room-name"><h3>{{ $room_details->room_name}}</h3></div>
                                   
                                    <!----><div _ngcontent-c25="" class="room-options">
                                        <ul _ngcontent-c25="">
                                            <!----><li _ngcontent-c25="">
                            <span _ngcontent-c25="">
                                <img _ngcontent-c25="" src="https://fmffiles.s3.amazonaws.com/site-v7/fmf-ng/point-right.png">
                            </span>
                                                <span _ngcontent-c25="">Free Wifi</span>
                                            </li><li _ngcontent-c25="">
                            <span _ngcontent-c25="">
                                <img _ngcontent-c25="" src="https://fmffiles.s3.amazonaws.com/site-v7/fmf-ng/point-right.png">
                            </span>
                                                <span _ngcontent-c25="">Welcome Drink</span>
                                            </li><li _ngcontent-c25="">
                            <span _ngcontent-c25="">
                                <img _ngcontent-c25="" src="https://fmffiles.s3.amazonaws.com/site-v7/fmf-ng/point-right.png">
                            </span>
                                                <span _ngcontent-c25="">Free Parking</span>
                                            </li>
                                        </ul>
                                    </div>


                                </div>
                                <br/>
                                <div _ngcontent-c25="" class="col-lg-2 col-md-2 col-sm-2 col-12 room-guests">
                                    <p _ngcontent-c25="" class="guests-title"><strong _ngcontent-c25="">Guests:</strong></p>
                                    <!----><p _ngcontent-c25="" class="guests">
                                        <!----><i _ngcontent-c25="" aria-hidden="true" class="fa fa-user"></i>
                                        {{ $room_details->capacity}} Adults per Room
                                        <!---->
                                    </p>
                                </div>
                                <div _ngcontent-c25="" class="col-lg-2 col-md-2 col-sm-2 col-6 room-price">
                                    <div _ngcontent-c25="" class="price-container ">
                                        <!---->
                                        <div _ngcontent-c25="" class="new-price">LKR {{ $room_details->price}}
                                        </div>
                                    </div>
                                </div>
                                <div _ngcontent-c25="" class="col-lg-3 col-md-3 col-sm-3 col-6 room-select">
                                    <!---->
                                    <div _ngcontent-c25="" class="rooms-left">{{ $room_details->no_rooms_available}}
                                        rooms left
                                        <br/>
                                    </div>
                                    <button _ngcontent-c25="" name="select" class="btn btn-primary" type="submit">
                                        Select Room
                                    </button>

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





