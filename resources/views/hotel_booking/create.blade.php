@extends('layouts.app')
@section('content')

<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<div class="container">

    <!--Create new hotels and view a form to enter the details-->

    <div class="well col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left" style="background-color: white">
        <form method="post" files="true" action="{{route('hotel_booking.store')}}" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="page-header " style="padding-left: 45%"><h2><i>Hotel Form</i></h2></div>
        <div _ngcontent-c34="" class="clearfix com-wrap">
            <div _ngcontent-c34="" class="wrap-header clearfix">
                <div _ngcontent-c33="" class="com-header pull-left"><span _ngcontent-c33="" class="number"><h4><strong>1. </strong></span><span _ngcontent-c33="" class="room-details"> Hotel Details</h2></span>
                </div>
            </div>
            <br/>
            <div _ngcontent-c34="" class="com-container ng-trigger ng-trigger-toggleHeight" style="opacity: 1;">
                    <!----><div _ngcontent-c34="" class="room-guests ng-tns-c34-6">


                        <div _ngcontent-c34="" class="detail-wrap">
                            <div _ngcontent-c34="" class="row">
                                <div _ngcontent-c34="" class="col-md-3 infor-box">
                                    <p _ngcontent-c34="" class="ng-tns-c34-6"><b>Hotel Name</b></p>
                                    <input _ngcontent-c34="" name="hotel_name" class="form-control ng-untouched ng-pristine ng-invalid"  pattern="[a-zA-Z ]+" placeholder="Hotel Name" required type="text">
                                </div>
                                <div _ngcontent-c34="" class="col-md-4 infor-box">
                                    <p _ngcontent-c34="" class="ng-tns-c34-6"><b>Address *</b></p>
                                    <input _ngcontent-c34="" name="address" class="form-control ng-untouched ng-pristine ng-invalid"  pattern="[a-zA-Z ]+" placeholder="Address" required type="text">
                                    <!---->
                                    <!---->
                                </div>

                                <div _ngcontent-c34="" class="col-md-4 infor-box">
                                    <p _ngcontent-c34="" class="ng-tns-c34-6"><b>Hotel Image *</b></p>
                                    <input type="file" name="photo" id="photo" class="form-control ng-untouched ng-pristine ng-invalid"  placeholder="Image" required accept="image/*">
                                    <!---->
                                    <!---->
                                </div>

                            </div>
                            <br/>

                            <!----><div _ngcontent-c34="" class="row ng-tns-c34-6">
                                <div _ngcontent-c34="" class="col-md-3 infor-box">
                                    <p _ngcontent-c34="" class="ng-tns-c34-6"><b>Country *</b></p>
                                    <input _ngcontent-c34="" name="country" class="form-control country-code"  placeholder="Country" pattern="[a-zA-Z ]+" required type="text">
                                </div>
                                <div _ngcontent-c34="" class="col-md-4 infor-box">
                                    <p _ngcontent-c34="" class="ng-tns-c34-6"><b>City *</b></p>
                                    <input _ngcontent-c34="" name="city" class="form-control ng-untouched ng-pristine ng-invalid" pattern="[a-zA-Z ]+"   placeholder="City" ] required type="text">
                                    <!---->
                                    <!---->
                                </div>
                                <div _ngcontent-c34="" class="col-md-4 infor-box">
                                    <p _ngcontent-c34="" class="ng-tns-c34-6"><b>Hotel Average Room Price *</b></p>
                                    <input _ngcontent-c34="" name="hotel_price"  min="1" class="form-control ng-untouched ng-pristine ng-invalid"  pattern="^[0-9]{10}$" placeholder="Amount" required type="number">
                                    <!---->
                                    <!---->
                                </div>

                            </div>

                        </div>
                    </div>
                    <br/>
                <div _ngcontent-c34="" class="row">
                    <div _ngcontent-c34="" class="col-md-2">
                    </div>
                    <div _ngcontent-c34="" class="col-md-8 room-details">
                        <div _ngcontent-c34="" class="clearfix text-right">

                            <input type="Submit" name="add_Hotel" value="Add Hotel" class="btn btn-primary" id="add_Hotel">

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>



</div>



@endsection
</body>
</html>

