@extends('layouts.app')

    @section('content')

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Gamana</title>



    </head>

<body>


<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="http://www.airlinemarketing.com.au/media/1080/home-banner-1600x550.png?mode=pad&width=1600&height=550&rnd=131121963350000000" alt="Slide 3" draggable="false" width="100%">
            <div class="carousel-caption">
                ...
            </div>
        </div>
        <div class="item">
            <img src="https://www.stgregoryhotelwdc.com/wp-content/uploads/2015/06/St-Gregory-1600x560.jpg" alt="Slide 3" draggable="false" width="100%">
            <div class="carousel-caption">
                ...
            </div>
        </div>
        <div class="item">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ3TXaTllrTdDm786ostQlJQ-4kC1FNQBc8_TrNxulhEvK6VBcg0w" alt="Slide 3" draggable="false" width="100%">
            <div class="carousel-caption">
                ...
            </div>
        </div>

    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>

    </a>
</div>




@endsection


</body>

</html>



