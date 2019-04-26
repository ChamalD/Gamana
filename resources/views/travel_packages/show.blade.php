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
  height: 420px;
  border-color: grey;
}
.innerCard {
  transition: 0.3s;
  width: 300px;
  height: auto;
  border-color: grey;
  padding-left: 1px;
}
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  width: 300px;
  margin-left: 0px;
  margin-right: 1px;
}
table tr td {
	padding-top: 20px;
	width: 200px;
	color: white;
}
.selectPackage{
	padding-left: 180px; 
	background-color: rgba(0, 130, 185, .8);
	width: 80%;
	margin-left: 150px;
	margin-right: 200px;
	padding-bottom: 10px;
}
.label{
	background-color: rgba(0, 130, 185, .8);
}
.col-lg-4{
	width: 30%;
}
.col-lg-3{
	width: 300px;
}
.h6 {
	width: 280px;
}
.h5 {
	width: 280px;
}
.p{
	width: 400px;
}

</style>

</head>
<body>
</body>


<br/>
<div class="selectPackage">
	<form method="post" action="{{route('travel_packages.search')}}">
          					{{ csrf_field() }}
		<table>
			<tr>
				<td>
					<input type="checkbox" name="WildLife" value="WildLife" 
					<?php 
						if ($searchDetails->input('WildLife')==="WildLife")
						{
							echo('checked');
						}

					?>> Wild Life<br/>
				</td>
				<td>
					<input type="checkbox" name="HistoricalPlaces" value="Historical Places" 
					<?php 
						if ($searchDetails->input('HistoricalPlaces')==="Historical Places")
						{
							echo('checked');
						}

					?>> Historical Places<br/>
				</td>
				<td>
					<input type="checkbox" name="ReligiousPlaces" value="ReligiousPlaces" 
					<?php 
						if ($searchDetails->input('ReligiousPlaces')==="ReligiousPlaces")
						{
							echo('checked');
						}

					?>> Religious Places<br/>

				</td>

				<td>
					<input type="checkbox" name="Cultural" value="Cultural" 
					<?php 
						if ($searchDetails->input('Cultural')==="Cultural")
						{
							echo('checked');
						}

					?>> Cultural<br/>

				</td>

			</tr>
			<tr>


				<td>
					<input type="checkbox" name="City" value="City" 
					<?php 
						if ($searchDetails->input('City')==="City")
						{
							echo('checked');
						}

					?>> City life<br/>

				</td>


				<td>
					<input type="checkbox" name="Adventure" value="Adventure" 
					<?php 
						if ($searchDetails->input('Adventure')==="Adventure")
						{
							echo('checked');
						}

					?>> Adventure<br/>

				</td>

				<td>
					<input type="checkbox" name="Scenery" value="Scenery" 
					<?php 
						if ($searchDetails->input('Scenery')==="Scenery")
						{
							echo('checked');
						}

					?>> Scenery<br/>

				</td>

				<td>
					<input type="checkbox" name="Beach" value="Beach" 
					<?php 
						if ($searchDetails->input('Beach')==="Beach")
						{
							echo('checked');
						}

					?>> Beach<br/>

				</td>

			</tr>
			<tr>
				<td style="padding-left: 20px;">No of Days</td>
				<td style="padding-top: 25px;">
					<div class="persent-one less-per">
                       <input type="number" required min=3 max="7" class="textboxstyle" name="selectedDates" 
                       value="{{$searchDetails->input('selectedDates')}}"
                       style="color: black; width: 100px;">
                    </div>
				</td>
				<td></td>
				<td> <input type="Submit" name="submit" value="Search" class="btn btn-info " id="srch" style="width: 100px"></td>
			</tr>
		</table>
	</form>
</div>
<br/>
<br/>


<h2 style="padding-left: 150px; padding-bottom: 0.5px;">Packages</h2>
<hr>
@foreach (json_decode($searchResult) as $element)
	<form method="post" action="{{route('travel_packages.store')}}">
          					{{ csrf_field() }}
        <input  hidden value="{{$element->package_id}}" name="package_id"> 
        <input  hidden  value="{{$searchResult}}" name="searchResult"> 
		<input hidden name="selectedDates" 
                       value="{{$searchDetails->input('selectedDates')}}">
		

 
		<div style="padding-left: 160px;">
					<div class="col-lg-4 col-md-4 col-sm-4" style="margin-bottom: 30px;">
						<div class="card">
					  		<img src='/images/packages/{{$element->image}}.jpg' width="300px" height="150px" alt="Avatar" >
					  		<div class="container">
					    	<h4><b>{{$element->package_name}}</b></h4>
					    		<div class="col-lg-3 col-md-3" style="padding-left: 1px;;">
					    			<p><h6>{{$element->description}}</h6></p> 
								</div>
							</div>
							<div class="container">

								<div class="col-lg-3 col-md-3" style="padding-left: 1px;">
				    				<a href="{{ route('view_more.index') }}">view more</a>
								</div>
							</div>
					  		<div class="container">

								<div class="col-lg-3 col-md-3" style="padding-left: 1px;">
				    				<p><b><h5>Days: {{$element->package_days}}</h5></b></p> 
								</div>

					  		</div>
						  	<?php
								$catagories = $element->tag;
								$data   = explode(',', $catagories);
							?>
							<div class="innerCard" style="padding-left: 10px;">
								
								@foreach($data as $data)

							    <div class="label col-lg-2 col-md-4 col-sm-4" style="width: auto; height: 20px; padding: 5px; margin: 6px; margin-bottom: 5px;">			{{$data}}
							    </div>

				                @endforeach

							 </div>
							 <div class="container" >
								
									<div class="col-lg-3 col-md-3" style="padding-left: 180px;">
					    				<input type="Submit" name="submit" value="Add Package" class="btn btn-info cst-btn" id="srch" style="padding: 4px 8px; font-size: 12px;">
									</div>		                
							 </div>
							 <br/>
						</div>
					</div>
				</div>
			</form>
@endforeach
@endsection


</body>

</html>

