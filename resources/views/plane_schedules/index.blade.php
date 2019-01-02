@extends('layouts.app')
@section('content')

<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ asset('css/searchBar.css') }}" rel="stylesheet">


</head>
<body>

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
                                 <i class="fa fa-map-marker" aria-hidden="true"></i>
                                 <input type="text" required name="takeoff_airport" class="textboxstyle" id="takeoff_airport" placeholder="From City or airport">
                              </div>
                              <div class="persent-one">
                                 <i class="fa fa-map-marker" aria-hidden="true"></i>
                                 <input type="text" value="Sri Lanka" disabled="disabled"  name="landing_airport" class="textboxstyle" id="landing_airport">
                              </div>
                              <div class="persent-one less-per">
                                 <i class="fa fa-calendar" aria-hidden="true"></i>
                                 <input type="date" required min={{$today}} name="departure_date" class="textboxstyle" id="departure_date" placeholder="Depart Date">
                              </div>
                               <div class="persent-one less-per">
                                 <i class="fa fa-user" aria-hidden="true"></i>
                                 <input type="number" required min=1 name="no_passengers" class="textboxstyle" id="to-date" placeholder="Number of Passengers">
                              </div>

                              <div class="persent-one less-btn">
                                 <input type="Submit" name="submit" value="Search" class="btn btn-info cst-btn" id="srch">
                              </div></div></div></div>
            </form>
          
        </div>

    </div>


<br/>
<br/>

 @endsection
</body>
</html>

