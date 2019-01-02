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

 <!--Hotel Adding form-->

    <div class="well col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left" style="background-color: white">
        <form method="post" files="true" action="{{route('hotel_booking.addRoom')}}" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="page-header " style="padding-left: 45%"><h2><i>Add Rooms</i></h2></div>
            <div _ngcontent-c34="" class="clearfix com-wrap">
                <div _ngcontent-c34="" class="wrap-header clearfix">
                    <div _ngcontent-c33="" class="com-header pull-left"><span _ngcontent-c33="" class="number"><h4></span><span _ngcontent-c33="" class="room-details"> Room Details</h2></span>
                    </div>
                </div>
                <br/>
                <div _ngcontent-c34="" class="com-container ng-trigger ng-trigger-toggleHeight" style="opacity: 1;">
                    <!----><div _ngcontent-c34="" class="room-guests ng-tns-c34-6">

                        <input hidden name="hotel_id" value="{{$hotelID}}" type="number">

                        <div _ngcontent-c34="" class="detail-wrap">
                            <div _ngcontent-c34="" class="row">
                                <div _ngcontent-c34="" class="col-md-3 infor-box">
                                    <p _ngcontent-c34="" class="ng-tns-c34-6"><b>Room Name *</b></p>
                                    <input _ngcontent-c34="" required name="name1" class="form-control ng-untouched ng-pristine ng-invalid"  pattern="[a-zA-Z ]+" placeholder="Room Name"  type="text">
                                </div>
                                <div _ngcontent-c34="" class="col-md-4 infor-box">
                                    <p _ngcontent-c34="" class="ng-tns-c34-6"><b>Room Type *</b></p>
                                    <input _ngcontent-c34="" required name="type1" class="form-control ng-untouched ng-pristine ng-invalid"  pattern="[a-zA-Z ]+" placeholder="Room Type"  type="text">
                                    <!---->
                                    <!---->
                                </div>

                                <div _ngcontent-c34="" class="col-md-4 infor-box">
                                    <p _ngcontent-c34="" class="ng-tns-c34-6"><b>Room Image *</b></p>
                                    <input type="file" name="photo" class="form-control ng-untouched ng-pristine ng-invalid"  placeholder="Image"  accept="image/*">
                                    <!---->
                                    <!---->
                                </div>
                            </div>
                            <br/>

                            <!----><div _ngcontent-c34="" class="row ng-tns-c34-6">
                                <div _ngcontent-c34="" class="col-md-3 infor-box">
                                    <p _ngcontent-c34="" class="ng-tns-c34-6"><b>Number of Rooms *</b></p>
                                    <input _ngcontent-c34="" required name="rooms1" min="1" class="form-control country-code"  placeholder="Number of Rooms" pattern="^[0-9]{10}$"   type="number">
                                </div>
                                <div _ngcontent-c34="" class="col-md-4 infor-box">
                                    <p _ngcontent-c34="" class="ng-tns-c34-6"><b>Capacity *</b></p>
                                    <input _ngcontent-c34="" required name="capacity1" min="1" class="form-control ng-untouched ng-pristine ng-invalid"  pattern="^[0-9]{10}$"    placeholder="Room Capacity" ]  type="number">
                                    <!---->
                                    <!---->
                                </div>
                                <div _ngcontent-c34="" class="col-md-4 infor-box">
                                    <p _ngcontent-c34="" class="ng-tns-c34-6"><b>Room Price *</b></p>
                                    <input _ngcontent-c34="" required name="amount1" min="1" class="form-control ng-untouched ng-pristine ng-invalid"  pattern="^[0-9]{10}$" placeholder="Amount"  type="number">
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

                                <input type="Submit" name="add_Room" value="Add Room" class="btn btn-primary" id="add_Hotel">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <div style="padding-left: 850px" ><a href="/">Finish </a> </div>
    </div>

</div>



@endsection
</body>
</html>

