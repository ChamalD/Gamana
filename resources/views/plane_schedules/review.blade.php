@extends('layouts.app')
@section('content')
<html>

<?php
use Carbon\Carbon;

$today = Carbon::today();

$total_price=0;
$discount_price=0;
$grand_price=0;

$total_price = $data->ticket_price * $data->no_passengers;
$discount_price =$total_price*0.05;
$grand_price =$total_price - $discount_price;
?>
<head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/hotelSearch.css') }}" rel="stylesheet">
</head>

<body>


<div class="container">

    <div class="well col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left" style="background-color: white">

        <div _ngcontent-c33="" class="wrap-header clearfix">
            <div _ngcontent-c33="" class="com-header pull-left"><span _ngcontent-c33="" class="number"><h4><strong>1. </strong></span><span _ngcontent-c33="" class="room-details"> Flight Details</h2></span>
            </div>
            <br/>
        </div>
        <br/>


        <div _ngcontent-c33="" class="com-container collapse show zero-padding-bottom ng-trigger ng-trigger-toggleHeight" style="opacity: 1;">
            <div _ngcontent-c33="" class="row">

                <div _ngcontent-c33="" class="col-md-3">
                    <img src='/images/airline/{{$data->airline_img}}' width="250" height="150">
                </div>
                <div _ngcontent-c33="" class="col-md-9 hotel-name">
                    <p _ngcontent-c33="" class="ng-tns-c33-5"><b>Airline : </b> {{$data->airline}}</p>
                    <p _ngcontent-c33="" class="ng-tns-c33-5"><b>Plane ID : </b> EK {{$data->plane_id}}</p>
                    <p _ngcontent-c33="" class="ng-tns-c33-5"><b>Duration :</b> {{$data->duration}} hrs</p>
                    <p _ngcontent-c33="" class="ng-tns-c33-5"><b>Date :</b> {{$data->departure_date}}</p>

                    <p _ngcontent-c33="" class="ng-tns-c33-5"><b>Passengers :</b> {{$data->no_passengers}}</p>


                    <!---->
                    <div _ngcontent-c33="" class="clearfix chekck-row">
                        <div _ngcontent-c33="" class="row">
                            <table><tr><td>

                                        <div _ngcontent-c33="" class="well" style="width: 200px">
                                            <p _ngcontent-c33="" class="ng-tns-c33-5">Departure</p>
                                            <br/>
                                            <p _ngcontent-c33="" class="ng-tns-c33-5">{{$data->takeoff_airport}}</p>
                                            <span _ngcontent-c33="" class="font-size-13">{{$data->takeoff_time1}} hrs</span>
                                        </div>

                                    </td>
                                    <td>   &nbsp;&nbsp;</td>

                                    <td>
                                        <div _ngcontent-c33="" class="well" style="width: 200px">
                                            <p _ngcontent-c33="" class="ng-tns-c33-5">Arrival</p>
                                            <br/>
                                            <p _ngcontent-c33="" class="ng-tns-c33-5">{{$data->landing_airport}}</p>
                                            <span _ngcontent-c33="" class="font-size-13">{{$data->landing_time1}} hrs</span>
                                        </div>
                                    </td></tr></table>
                        </div>
                    </div>
                    <!---->
                </div>

            </div>


        </div>


    </div>
    <form method="post" action="{{route('plane_schedules.checker')}}">
        {{ csrf_field() }}
        <div class="well col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left" style="background-color: white">

            <div _ngcontent-c34="" class="clearfix com-wrap">
                <div _ngcontent-c34="" class="wrap-header clearfix">

                    <div _ngcontent-c33="" class="com-header pull-left"><span _ngcontent-c33="" class="number"><h4><strong>2. </strong></span><span _ngcontent-c33="" class="room-details"> Traveller Details</h2></span>
                    </div>
                </div>
                <br/>
                <div _ngcontent-c34="" class="com-container ng-trigger ng-trigger-toggleHeight" style="opacity: 1;">
                    <!----><div _ngcontent-c34="" class="room-guests ng-tns-c34-6">


                        <div _ngcontent-c34="" class="detail-wrap">
                            <div _ngcontent-c34="" class="row">
                                <div _ngcontent-c34="" class="col-md-3 infor-box">
                                    <p _ngcontent-c34="" class="ng-tns-c34-6"><b>Title *</b></p>
                                    <select _ngcontent-c34="" class="form-control font-size-14" title="Title">
                                        <option _ngcontent-c34="" class="ng-tns-c34-6">Mr</option>
                                        <option _ngcontent-c34="" class="ng-tns-c34-6">Mrs</option>
                                        <option _ngcontent-c34="" class="ng-tns-c34-6">Ms</option>
                                    </select>
                                </div>
                                <div _ngcontent-c34="" class="col-md-4 infor-box">
                                    <p _ngcontent-c34="" class="ng-tns-c34-6"><b>First Name *</b></p>
                                    <input _ngcontent-c34="" class="form-control ng-untouched ng-pristine ng-invalid" autofocus=""  pattern="[a-zA-Z ]+" placeholder="First Name" required type="text">
                                    <!---->
                                    <!---->
                                </div>

                                <div _ngcontent-c34="" class="col-md-4 infor-box">
                                    <p _ngcontent-c34="" class="ng-tns-c34-6"><b>Last Name *</b></p>
                                    <input _ngcontent-c34="" class="form-control ng-untouched ng-pristine ng-invalid" pattern="[a-zA-Z ]+" placeholder="Last Name" required type="text">
                                    <!---->
                                    <!---->
                                </div>

                            </div>
                            <br/>

                            <!----><div _ngcontent-c34="" class="row ng-tns-c34-6">
                                <div _ngcontent-c34="" class="col-md-3 infor-box">
                                    <p _ngcontent-c34="" class="ng-tns-c34-6"><b>Country Code</b></p>
                                    <input _ngcontent-c34="" class="form-control country-code"  value="+94" placeholder="+94" type="text">
                                </div>
                                <div _ngcontent-c34="" class="col-md-4 infor-box">
                                    <p _ngcontent-c34="" class="ng-tns-c34-6"><b>Mobile Number *</b></p>
                                    <input _ngcontent-c34="" class="form-control ng-untouched ng-pristine ng-invalid" maxlength="10" minlength="10" pattern="^[0-9]{10}$" placeholder="Mobile Number" required step="1" type="text">
                                    <!---->
                                    <!---->
                                </div>
                                <div _ngcontent-c34="" class="col-md-4 infor-box">
                                    <p _ngcontent-c34="" class="ng-tns-c34-6"><b>E-mail Address *</b></p>
                                    <input _ngcontent-c34="" class="form-control ng-untouched ng-pristine ng-invalid"  pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" placeholder="E-mail Address" required type="text">
                                    <!---->
                                    <!---->
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="well col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-left"  style="background-color: white">

            <div _ngcontent-c34="" class="wrap-header clearfix">

                <div _ngcontent-c33="" class="com-header pull-left"><span _ngcontent-c33="" class="number"><h4><strong>3. </strong></span><span _ngcontent-c33="" class="room-details"> Payment Details</h2></span>
                </div>
            </div>
            <br/>
            <section id="room-rates">
                <app-room-rates _nghost-c36=""><div _ngcontent-c36="" class="box-wrap">
                        <div _ngcontent-c36="" class="com-wrap">
                            <div _ngcontent-c36="" class="wrap-header clearfix">
                                <div _ngcontent-c36="" class="com-header room-rate">
                                    <h4 _ngcontent-c36="">Reservation Rates</h4>
                                </div>
                            </div>
                            <div _ngcontent-c36="" class="com-container1">

                                <!----><div _ngcontent-c36="" class="col-md-12 hotel-tripad padding-left-right-10">
                                    <!---->
                                    <ul _ngcontent-c36="">

                                        <li _ngcontent-c36="" >
                                            <span _ngcontent-c36="" class="pull-left">Ticket Rate</span>
                                            <span _ngcontent-c36="" class="pull-right">LKR {{$data->ticket_price}}</span>
                                        </li><li _ngcontent-c36="">
                                            <span _ngcontent-c36="" class="pull-left">No. of Passengers</span>
                                            <span _ngcontent-c36="" class="pull-right">{{$data->no_passengers}}</span>
                                        </li>

                                    </ul>

                                    <!---->
                                </div>
                                <div _ngcontent-c36="" class="col-md-12 total-room-rate">
                                    <div _ngcontent-c36="" class="clearfix">
                                        <div _ngcontent-c36="" class="pull-left">
                                            <h4> <p _ngcontent-c36="">Total Ticket Price</p></h4>
                                        </div>
                                        <div _ngcontent-c36="" class="pull-right total-room-rate-price">
                                            <h4> <p _ngcontent-c36="">LKR {{$total_price}} </p></h4>
                                        </div>
                                    </div>
                                </div>
                                <div _ngcontent-c36="" class="col-md-12 tax-rate">
                                    <div _ngcontent-c36="" class="clearfix">
                                        <div _ngcontent-c36="" class="pull-left">
                                            <p _ngcontent-c36="">Tax &amp; Service fee</p>
                                        </div>
                                        <div _ngcontent-c36="" class="pull-right">
                                            <p _ngcontent-c36="">LKR {{$discount_price}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div _ngcontent-c38="" class="total-room-rate">
                                    <div _ngcontent-c38="" class="clearfix">
                                        <div _ngcontent-c38="" class="pull-left">
                                            <h3><b>  <p _ngcontent-c38="" class="ng-tns-c38-12">Grand Total</p></b></h3>
                                        </div>
                                        <div _ngcontent-c38="" class="pull-right last-price">
                                            <h3> <b>  <p _ngcontent-c38="" class="ng-tns-c38-12"> LKR {{$grand_price}}</p></b></h3>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </app-room-rates>
            </section>
        </div>
        <div class="well col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right"  style="background-color: white">
            <!-- CREDIT CARD FORM STARTS HERE -->
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table">
                    <div class="row display-tr">
                        <div class="display-td">
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="cardNumber">CARD NUMBER</label>
                                <div class="input-group">
                                    <input type="tel" class="form-control" name="cardNumber" placeholder="Valid Card Number" autocomplete="cc-number" required=""  aria-required="true">
                                    <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7 col-md-7">
                            <div class="form-group">
                                <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                <input type="tel" class="form-control" name="cardExpiry" placeholder="MM / YY" autocomplete="cc-exp" required="" aria-required="true">
                            </div>
                        </div>
                        <div class="col-xs-5 col-md-5 pull-right">
                            <div class="form-group">
                                <label for="cardCVC">CV CODE</label>
                                <input type="tel" class="form-control" name="cardCVC" placeholder="CVC" autocomplete="cc-csc" required="" aria-required="true">
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-xs-12">
                            <input class="subscribe btn btn-success btn-lg btn-block" type="submit" value="Start Subscription" >
                        </div>
                    </div>
                    <div class="row" style="display:none;">
                        <div class="col-xs-12">
                            <p class="payment-errors"></p>
                        </div>
                    </div>

                </div>
            </div>
            <!-- CREDIT CARD FORM ENDS HERE -->

        </div>
    </form>

</div>
</body>
@endsection
</html>





