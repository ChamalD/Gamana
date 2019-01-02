@extends('layouts.app')
@section('content')

<?php
use Carbon\Carbon;

$today = Carbon::today();
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/hotelSearch.css') }}" rel="stylesheet">


</head>
<body>
<!--Show all hotels in the system-->
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

                    <div class="flight-tab1 row">
                        <div class="persent-one1">Location</div>
                    </div>

                    <div class="flight-tab row">
                        <div class="persent-one">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <input type="text" name="location" class="textboxstyle" required id="location" placeholder="Location">
                        </div>

                        <div class="persent-one less-btn">
                            <input type="Submit" name="submit" value="Search" class="btn btn-info cst-btn" id="srch">
                        </div></div></div></div>
        </form>

    </div>

    <script src="{{ asset('js/searchBar.js') }}"></script>
</div>

@endsection
</body>
</html>

