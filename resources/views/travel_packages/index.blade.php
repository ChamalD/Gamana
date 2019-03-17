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

<div class="selectPackage">
	<form action="/action_page.php" method="get">
		<table>
			<tr>
				<td> 
					<input type="checkbox" name="vehicle" value="Bike"> I have a bike<br>
				</td>
				<td>
					<input type="checkbox" name="vehicle" value="Car"> I have a car<br>
				<td>
					<input type="checkbox" name="vehicle" value="Car"> I have a car<br>
				<td>
					<input type="checkbox" name="vehicle" value="Car"> I have a car<br>
				</td>

			</tr>
			<tr>
				<td> 
					<input type="checkbox" name="vehicle" value="Bike"> I have a bike<br>
				</td>
				<td>
					<input type="checkbox" name="vehicle" value="Car"> I have a car<br>
				<td>
					<input type="checkbox" name="vehicle" value="Car"> I have a car<br>
				<td>
					<input type="checkbox" name="vehicle" value="Car"> I have a car<br>
				</td>

			</tr>
			<tr>
				<td style="padding-left: 20px;">No of Days</td>
				<td style="padding-top: 25px;">
					<div class="persent-one less-per">
                                
                       <input type="number" required min=3 max="7" name="no_passengers" class="textboxstyle" id="to-date" value="3" style="color: black; width: 100px;">
                    </div>
				</td>
				<td></td>
				<td> <input type="Submit" name="submit" value="Search" class="btn btn-info " id="srch" style="width: 100px"></td>
			</tr>
		</table>
	    
	</form>



</div>
<br/>
<h2 style="padding-left: 150px; padding-bottom: 0.5px;">Packages</h2>
	<br/>

<div style="padding-left: 160px;">

	<div class="col-lg-4 col-md-4">
		<div class="card">
		  <img src="img_avatar.png" alt="Avatar" >
		  <div class="container">
		    <h4><b>John Doe</b></h4> 
		    <p>Architect & Engineer</p> 
		  </div>
		</div>
		<br/><br/>
	</div>

</div>
 @endsection
</body>
</html>

