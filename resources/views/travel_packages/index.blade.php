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

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
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

.col-lg-4{
	width: 30%;
}
</style>

</head>
<body>
<br/>
<div class="selectPackage">
	<form method="post" action="{{route('travel_packages.search')}}">
          					{{ csrf_field() }}
		<table>
			<tr>
				<td>
					<input type="checkbox" name="WildLife" value="WildLife"> Wild Life<br>
				</td>
				<td>
					<input type="checkbox" name="HistoricalPlaces" value="HistoricalPlaces"> Historical Places<br>
				</td>
				<td>
					<input type="checkbox" name="ReligiousPlaces" value="ReligiousPlaces"> Religious Places<br>
				</td>
				<td>
					<input type="checkbox" name="Cultural" value="Cultural"> Cultural<br>
				</td>
			</tr>
			<tr>
				<td>
					<input type="checkbox" name="City" value="City"> City<br>
				</td>
				<td>
					<input type="checkbox" name="Adventure" value="Adventure"> Adventure<br>
				</td>
				<td>
					<input type="checkbox" name="Scenery" value="Scenery"> Scenery<br>
				</td>
				<td>
					<input type="checkbox" name="Beach" value="Beach"> Beach<br>
				</td>

			</tr>
			<tr>
				<td style="padding-left: 20px;">No of Days</td>
				<td style="padding-top: 25px;">
					<div class="persent-one less-per">
                       <input type="number" required min=3 max="7" name="no_days" class="textboxstyle" id="to-date" value="3" style="color: black; width: 100px;">
                    </div>
				</td>
				<td></td>
				<td> <input type="Submit" name="submit" value="Search" class="btn btn-info " id="srch" style="width: 100px"></td>
			</tr>
		</table>
	</form>
</div>
<br/>

</div>
 @endsection
</body>
</html>

