@extends('layouts.app')
@section('content')
<html>

<head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/searchBar.css') }}" rel="stylesheet">

    <link href="https://mdbootstrap.com/previews/docs/latest/css/bootstrap.min.css" rel="stylesheet">


</head>

<body style="background-color: #CFDEF3">
<div class="flight-engine">
    <div class="tabing">
        <ul>
            <li><a class="active" href="#1"><i class="fa fa-plane" aria-hidden="true"></i> Flight</a>
            </li>
        </ul>
        <form method="post" action="{{route('plane_schedules.search')}}">
            {{ csrf_field() }}
            <div class="tab-content">
                <div id="1" class="tab1 active">
                    <div class="flight-tab row">
                        <div class="persent-one">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <input type="text" name="takeoff_airport" class="textboxstyle" id="takeoff_airport" placeholder="From City or airport">
                        </div>
                        <div class="persent-one">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <input type="text" name="landing_airport" class="textboxstyle" id="landing_airport" placeholder="To City or airport">
                        </div>
                        <div class="persent-one less-per">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <input type="date" min={{$today}} name="departure_date" class="textboxstyle" id="from-date1" placeholder="Depart Date">
                        </div>
                        <div class="persent-one less-per">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <input type="date" min={{$today}} name="return_date" class="textboxstyle" id="return_date" placeholder="Returrn Date">
                        </div>

                        <div class="persent-one less-per">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <input type="number" min=1 name="no_passengers" class="textboxstyle" id="to-date" placeholder="Number of Passengers">
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
      <div class="col-md-8 col-lg-8 col-sm-8 pull-left">
        @foreach($searchResult as $searchResults)    
        <div class="col-md-12 col-lg-12 col-sm-12 pull-left">
            <div class="well">
                 <div class="col-lg-12 heading-title-v2 clearfix">
                    <span class="itin_dateinfo col-lg-10 col-md-10 col-sm-12 col-xs-12 ">
                    <span style="font-weight: bold">
                        <span>{{$searchResults->takeoff_airport}} to {{$searchResults->landing_airport}}</span>
                      </span>
                      <span style="font-weight: bold" class="light_gray ">(3hr 50min)</span>
                 </span> 
                </div>
                <div class="itin_logo col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <span class="logoitnry_section hidden-xs  pull-left block">
                                <img src="https://fmffiles.s3.amazonaws.com/ibe/airlogo/smEK.gif" alt="Emirates">
                            </span><br/>

                            <span class="logo_txt hidden-xs pull-left"> <span class="block flght_name">{{$searchResults->airline}}</span><br/>
                                <span class="block fligh_number">EK- {{$searchResults->plane_id}}</span> <br/>
                                <span class="block fligh_number ">Boeing 777-300</span>
                            </span>

                        </div>
              <ul data-brackets-id="12674" id="sortable" class="list-unstyled ui-sortable">
                <hr/>
                <strong class="pull-left primary-font">{{$searchResults->takeoff_time1}} </strong><span>&nbsp;&nbsp;&nbsp;<strong class="pull-center primary-font">{{$searchResults->landing_time1}}</strong></span>
                <small class="pull-right"><b>
                   <span></span>Price Rs. 1000</b></small>
                   <p><a class="btn btn-primary pull-right"  href="/user_plane_reservation" role="button">Book Now</a></p>
                 <br/>
            </ul>
            </div>
        </div>
     @endforeach 

  </div>
</div>
</body>


<div style="margin-top: 10%">
    <div class="row">
        <div class="col-lg-12 text-center" style="margin-bottom: 50px">
            <h2 class="section-heading text-uppercase">Services</h2><hr/>
            <h3 class="section-subheading text-muted">Plan Your Journey In Easy Way.</h3>
        </div>
    </div>


    <div class="row text-center">
        <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                <i class="fa fa-plane fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Air Ticket Booking</h4>
            <!--<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>-->
        </div>
        <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-hotel fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Hotel Booking</h4>
            <!--<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>-->
        </div>
        <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-location-arrow fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Visiting Location</h4>
            <!--<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>-->
        </div>
    </div>
</div>


<div style="margin-top: 5%">
    <div class="row">
        <div class="col-lg-12 mx-auto text-center">
            <h2 class="section-heading">Let's Get In Touch!</h2>
            <hr class="my-4">
            <p class="mb-5">Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-pull-6 ml-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact" data-sr-id="8" style="; visibility: visible;  -webkit-transform: scale(1); opacity: 1;transform: scale(1); opacity: 1;-webkit-transition: -webkit-transform 0.6s cubic-bezier(0.6, 0.2, 0.1, 1) 0s, opacity 0.6s cubic-bezier(0.6, 0.2, 0.1, 1) 0s; transition: transform 0.6s cubic-bezier(0.6, 0.2, 0.1, 1) 0s, opacity 0.6s cubic-bezier(0.6, 0.2, 0.1, 1) 0s; "></i>
            <p>+9476699402</p>
        </div>
        <div class="col-lg-pull-6 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact" data-sr-id="9" style="; visibility: visible;  -webkit-transform: scale(1); opacity: 1;transform: scale(1); opacity: 1;-webkit-transition: -webkit-transform 0.6s cubic-bezier(0.6, 0.2, 0.1, 1) 0s, opacity 0.6s cubic-bezier(0.6, 0.2, 0.1, 1) 0s; transition: transform 0.6s cubic-bezier(0.6, 0.2, 0.1, 1) 0s, opacity 0.6s cubic-bezier(0.6, 0.2, 0.1, 1) 0s; "></i>
            <p>
                <a href="mailto:your-email@your-domain.com">dilshan.15@cse.mrt.ac.lk</a>
            </p>
        </div>
    </div>
</div>




@endsection
</html>




