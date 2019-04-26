@extends('layouts.app')
@section('content')

<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ asset('css/searchBar.css') }}" rel="stylesheet">


<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 300px;
  height: 300px;
  border-color: grey;
}
.innerCard {
  transition: 0.3s;
  width: 300px;
  height: auto;
  border-color: grey;
  padding-left: 1px;
}

.label{
  background-color: rgba(0, 130, 185, .8);
}
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}
table tr td {
	padding-top: 20px;
	width:150px;
	color: white;
}
.selectPackage{
	padding-left: 100px; 
	background-color: rgba(0, 130, 185, .8);
	width: 80%;
	margin-left: 150px;
	margin-right: 200px;
	padding-bottom: 10px;
}

.col-lg-4{
	width: 30%;
}



.media
{
    /*box-shadow:0px 0px 4px -2px #000;*/
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
	transition: 0.3s;
	width: 350px;
  	height: 180px;
    margin: 20px 0;
    /*padding:30px;*/
}
.dp
{
    border:10px solid #eee;
    transition: all 0.2s ease-in-out;
}
.dp:hover
{
    border:2px solid #eee;
    transform:rotate(360deg);
    -ms-transform:rotate(360deg);  
    -webkit-transform:rotate(360deg);  
    /*-webkit-font-smoothing:antialiased;*/
}
</style>

</head>
<body>

<div class="selectPackage">
	<form action="/action_page.php" method="get">
		<table>
			<tr>
				<td> 
					<label>Favorite Packages : </label>
				</td>
        @foreach ($packages as $packageDetails)
  				<td style="width: auto; padding-right: 10px;"> 
  					<button type="button" class="btn btn-success">{{$packageDetails->package_name}}</button>
  				</td>		
        @endforeach		
			</tr>
		</table>
	    
	</form>


</div>
<br/>
<h2 style="padding-left: 150px; padding-bottom: 0.5px;">Partners</h2>
	<br/>

<div style="padding-left: 150px;">

    @foreach (json_decode($searchDetails) as $userDetail)

	<div class="col-lg-4 col-md-4">
		<div class="media">

        	 <a class="pull-left" href="#">
                <img class="media-object dp img-circle" src ="/images/profile.jpg" style="width: 100px;height:100px;">
            </a>
            
            <div class="media-body" style="padding-top: 10px">
                <h4 class="media-heading">{{$userDetail->first_name}}  {{$userDetail->last_name}}</h4> 
                <small> {{$userDetail->gender}} </small>
                <h5>{{$userDetail->email}} </h5>
                <h5><b><i>{{$userDetail->country}}</i></b> </h5>

                <hr style="margin:8px auto">

                <?php
                  $catagories = $userDetail->tag;
                  $data   = explode(',', $catagories);
                ?>
                <span class="innerCard" style="padding-left: 10px;">
                  
                  @foreach($data as $data)
                    <div class="label col-lg-2 col-md-4 col-sm-4" style="width: auto; height: 20px; padding: 5px; margin: 6px; margin-bottom: 5px;">      {{$data}}
                  </div>
                   
                  @endforeach

                </span>

        
            </div>
        </div>
		<br/>
	</div>


    @endforeach
	




</div>


<div class="row">


    <div class="col-lg-5">
        

    </div>

    

</div>




 @endsection
</body>
</html>

