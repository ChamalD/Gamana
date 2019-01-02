@extends('layouts.app')
@section('content')
<html>

<?php
use Carbon\Carbon;

$today = Carbon::today();


$date1=date_create("$data->check_in");
$date2=date_create("$data->check_out");
$diff=date_diff($date1,$date2);
$date_diff= $diff->format("%R%a")+1;
$nights= $date_diff-1;

$room_price= $data->price;
$amount = $room_price * $nights;
$tax= $amount * 0.02;
$grand_tot= $amount + $tax;


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

    <!--View selected Hotel and room details-->

    <div class="well col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left" style="background-color: white">

                <div _ngcontent-c33="" class="wrap-header clearfix">
                    <div _ngcontent-c33="" class="com-header pull-left"><span _ngcontent-c33="" class="number"><h4><strong>1. </strong></span><span _ngcontent-c33="" class="room-details"> Room Details</h2></span>
                    </div>
                    <br/>
                </div>
                <br/>


                <div _ngcontent-c33="" class="com-container collapse show zero-padding-bottom ng-trigger ng-trigger-toggleHeight" style="opacity: 1;">
                    <div _ngcontent-c33="" class="row">

                        <div _ngcontent-c33="" class="col-md-3">
                            <img src='/images/hotel/{{$data->img}}' width="250" height="200">

                        </div>
                        <div _ngcontent-c33="" class="col-md-9 hotel-name">
                            <h3 _ngcontent-c33="" class="ng-tns-c33-5">{{$data->hotel_name}}</h3>
                            <p _ngcontent-c33="" class="ng-tns-c33-5">{{$data->hotel_address}}, {{$data->hotel_country}}</p>

                            <!---->
                            <div _ngcontent-c33="" class="clearfix chekck-row">
                                <div _ngcontent-c33="" class="row">
                                    <table><tr><td>

                                    <div _ngcontent-c33="" class="well" style="width: 200px">
                                        <p _ngcontent-c33="" class="ng-tns-c33-5">Check In</p>
                                        <p _ngcontent-c33="" class="date">{{$data->check_in}}</p>
                                    </div>

                                            </td>
                                            <td>   &nbsp;&nbsp;</td>

                                        <td>
                                            <div _ngcontent-c33="" class="well" style="width: 200px">
                                                <p _ngcontent-c33="" class="ng-tns-c33-5">Check Out</p>
                                                <p _ngcontent-c33="" class="date">{{$data->check_out}}</p>

                                            </div>
                                        </td></tr></table>
                                </div>
                                <div _ngcontent-c33="" class="date-night ">
                                    <p _ngcontent-c33="" class="clearfix">
                                        <span _ngcontent-c33="" class="pull-left "><b>{{$date_diff}} Days &amp; {{$nights}} Nights </b>  </span>
                                    </p>
                                    <!----><p _ngcontent-c33="" class="ng-tns-c33-5"><b>{{$data->no_rooms}} Room</b>
                                    </p>
                                </div>

                            </div>
                            <!---->
                        </div>
                        <div _ngcontent-c33="" class="check-instructions">
                            <div _ngcontent-c33="" class="ng-tns-c33-5"><p><b>Know Before You Go</b> <br></p><ul>  <li>This property offers transfers from the airport and train station (surcharges may apply). Guests must contact the property with arrival details before travel, using the contact information on the booking confirmation. </li>  <li>One child 3 years old or younger stays free when occupying the parent or guardian's room, using existing bedding. </li><li>Only registered guests are allowed in the guestrooms. </li> <li>No pets and no service animals are allowed at this property. </li> </ul></div>
                            <!----><div _ngcontent-c33="" class="ng-tns-c33-5">
                                <p _ngcontent-c33="" class="ng-tns-c33-5">
                                    <b _ngcontent-c33="" class="ng-tns-c33-5">Special Check-in Instructions</b><br _ngcontent-c33="" class="ng-tns-c33-5">
                                </p>
                                <p _ngcontent-c33="" class="ng-tns-c33-5">24-hour airport shuttle service is available. Contact the property in advance to get details.</p>
                            </div>
                            <div _ngcontent-c33="" class="ng-tns-c33-5">
                                <p _ngcontent-c33="" class="ng-tns-c33-5">
                                    <b _ngcontent-c33="" class="ng-tns-c33-5">Cancellation Policy</b><br _ngcontent-c33="" class="ng-tns-c33-5">
                                </p>
                                <p _ngcontent-c33="" class="ng-tns-c33-5">This rate is non-refundable. Ypu can't change or cancel this booking you will not be refunded any of the payment.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <form method="post" action="{{route('hotel_booking.checker')}}">
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
                                        <input _ngcontent-c34="" autofocus="" class="form-control ng-untouched ng-pristine ng-invalid"  pattern="[a-zA-Z ]+" placeholder="First Name" required type="text">
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
                                    <h4 _ngcontent-c36="">Room Rates</h4>
                                </div>
                            </div>
                            <div _ngcontent-c36="" class="com-container1">
                                <div _ngcontent-c36="" class="col-md-12 room-type padding-left-right-10">
                                    <p _ngcontent-c36="">ROOM TYPE: COLONIAL KING</p>

                                </div>
                                <!----><div _ngcontent-c36="" class="col-md-12 hotel-tripad padding-left-right-10">
                                    <!---->
                                    <ul _ngcontent-c36="">

                                        <li _ngcontent-c36="" >
                                            <span _ngcontent-c36="" class="pull-left">Nightly Rate</span>
                                            <span _ngcontent-c36="" class="pull-right">{{$data->price}}</span>
                                        </li><li _ngcontent-c36="">
                                            <span _ngcontent-c36="" class="pull-left">No. of Rooms</span>
                                            <span _ngcontent-c36="" class="pull-right">{{$date_diff}}</span>
                                        </li>
                                        <li _ngcontent-c36="">
                                            <span _ngcontent-c36="" class="pull-left">No. of Nights</span>
                                            <span _ngcontent-c36="" class="pull-right">{{$nights}}</span>
                                        </li>
                                    </ul>

                                    <!---->
                                </div>
                                <div _ngcontent-c36="" class="col-md-12 total-room-rate">
                                    <div _ngcontent-c36="" class="clearfix">
                                        <div _ngcontent-c36="" class="pull-left">
                                            <h4> <p _ngcontent-c36="">Total Room Rate</p></h4>
                                        </div>
                                        <div _ngcontent-c36="" class="pull-right total-room-rate-price">
                                            <h4> <p _ngcontent-c36="">{{$amount}}</p></h4>
                                        </div>
                                    </div>
                                </div>
                                <div _ngcontent-c36="" class="col-md-12 tax-rate">
                                    <div _ngcontent-c36="" class="clearfix">
                                        <div _ngcontent-c36="" class="pull-left">
                                            <p _ngcontent-c36="">Tax &amp; Service fee</p>
                                        </div>
                                        <div _ngcontent-c36="" class="pull-right">
                                            <p _ngcontent-c36="">LKR {{$tax}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div _ngcontent-c38="" class="total-room-rate">
                                    <div _ngcontent-c38="" class="clearfix">
                                        <div _ngcontent-c38="" class="pull-left">
                                            <h3><b>  <p _ngcontent-c38="" class="ng-tns-c38-12">Grand Total</p></b></h3>
                                        </div>
                                        <div _ngcontent-c38="" class="pull-right last-price">
                                            <h3> <b>  <p _ngcontent-c38="" class="ng-tns-c38-12">LKR {{$grand_tot}}</p></b></h3>
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


