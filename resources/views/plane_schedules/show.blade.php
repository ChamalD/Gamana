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
    <link href="{{ asset('css/searchBar.css') }}" rel="stylesheet">
</head>

<body style="background-color: #CFDEF3">
<div class="flight-engine" style="padding-left: 200px">
    <div class="tabing" style="width: 95%">
        <ul>
            <li><a class="active" href="#1"><i class="fa fa-plane" aria-hidden="true"></i> Flight</a>
                <br/>
            </li>
        </ul>
        <form method="post" action="{{route('plane_schedules.search')}}">
            {{ csrf_field() }}
            <div class="tab-content">
                <div id="1" class="tab1 active">
                    <div class="flight-tab1 row">
                        <div class="persent-one1">Origin</div>
                        <div class="persent-one1">Destination Airport</div>
                        <div class="persent-one1">Departure Date</div>
                        <div class="persent-one1">No. of passengers</div>
                    </div>
                    <div class="flight-tab row">
                        <div class="persent-one">
                            <input type="text" name="takeoff_airport" class="textboxstyle" value="{{$searchData->takeoff_airport}}" id="takeoff_airport" placeholder="From City or airport">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="persent-one">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <input type="text" value="Sri Lanka" disabled="disabled"  name="landing_airport" class="textboxstyle" id="landing_airport">
                        </div>
                        </span>

                        <div class="persent-one less-per">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <input type="date min={{$today}} value="{{$searchData->departure_date}}"  name="departure_date" class="textboxstyle" id="departure_date" placeholder="Depart Date">
                        </div>

                        <div class="persent-one less-per">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <input type="number" value="1" min=1 value="{{$searchData->no_passengers}}"  name="no_passengers" class="textboxstyle" id="to-date" placeholder="Number of Passengers">
                        </div>

                        <div class="persent-one less-btn">
                            <input type="Submit" name="submit" value="Search" class="btn btn-info cst-btn" id="srch">
                        </div></div></div></div>
        </form>

    </div>
</div>

<div class="container"  style="margin-top: 10%">

      <br/>
      <div class="col-md-8 col-lg-8 col-sm-8 pull-left">
          <br/>
          <h3><b><i>Available Flights</i></b></h3>

          <br/>
          @foreach($searchResult as $searchResults)

      <form method="post" action="{{route('plane_schedules.review')}}">
          {{ csrf_field() }}

          <input  hidden value="{{$searchResults->landing_airport}}" name="landing_airport"  >
          <input  hidden value="{{$searchResults->takeoff_airport}}" name="takeoff_airport" >

          <input   hidden value="{{$searchResults->airline_img}}"  name="airline_img"  >
          <input  hidden value="{{$searchResults->duration}}"  name="duration" >
          <input type="number"  hidden value="{{$searchResults->ticket_price}}" name="ticket_price" >

          <input hidden value="{{$searchResults->plane_id}}" name="plane_id"  >
          <input   hidden value="{{$searchResults->airline}}"  name="airline"  >
          <input  hidden value="{{$searchResults->takeoff_time1}}" name="takeoff_time1" >
          <input  hidden value="{{$searchResults->landing_time1}}" name="landing_time1" >

          <input  hidden value="{{$searchData->departure_date}}" name="departure_date">
          <input type="number" hidden value="{{$searchData->no_passengers}}" name="no_passengers" >

          <div class="col-md-12 col-lg-12 col-sm-12 pull-left">
              <div class="well">
                  <div class="col-lg-12 heading-title-v2 clearfix">
                <span class="itin_dateinfo col-lg-10 col-md-10 col-sm-12 col-xs-12 ">
                <span style="font-weight: bold">
                    <span>{{$searchResults->takeoff_airport}} to {{$searchResults->landing_airport}}</span>
                  </span>
                      <span style="font-weight: bold" class="light_gray ">({{$searchResults->duration}} hrs)</span>
             </span>
                  </div>
                  <div class="col-md-2 col-lg-2 col-sm-2 pull-right"><strong>LKR {{$searchResults->ticket_price}}</strong></div>
                  <div class="itin_logo col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <span class="logoitnry_section hidden-xs  pull-left block">

                            <img src='/images/airline/{{$searchResults->airline_img}}' width="30" height="20">
                        </span><br/>

                      <span class="logo_txt hidden-xs pull-left"> <span class="block flght_name">{{$searchResults->airline}}</span><br/>
                            <span class="block fligh_number">EK- {{$searchResults->plane_id}}</span> <br/>

                        </span>

                  </div>

                  <ul data-brackets-id="12674" id="sortable" class="list-unstyled ui-sortable">
                      <hr/>
                      <p>

                      <div class="itineary_departure hidden-xs col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <span class="block time "><strong><span>{{$searchResults->takeoff_airport}}</span><br/>
                            </strong>
                             <span class="block note_text"> </span>
                            <span class="block" style="font-size:20px"><strong>{{$searchResults->takeoff_time1}} hrs</strong></span>
                        </span>
                      </div>

                      <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                          <i style="color:rgb(164, 164, 164)" class="fa fa-long-arrow-right"></i>
                      </div>

                      <div class="itineary_departure hidden-xs col-lg-3 col-md-3 col-sm-2 col-xs-3">
                    <span class="block time"><strong><span>{{$searchResults->landing_airport}} </span><br/>
                        </strong>

                            <span class="block" style="font-size:20px">
                                <strong>{{$searchResults->landing_time1}} hrs</strong>
                            </span>
                    </span>
                      </div>
                      <input type="Submit" name="booknow" value="Book Now" class="btn btn-primary pull-right" id="booknow">

                      </p>
                <br/>

                  </ul>
              </div>
          </div>
      </form>
          @endforeach




      </div>
</div>
</body>

@endsection
</html>





