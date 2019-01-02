<div class="row">
    <div class="col-md-12  col-sm-12 col-xm-12">

        <!-- Fluid width widget -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-comment"></span> 
                    Recent Comments
                </h3>
            </div>
            @foreach($comments as $comment)
            <div class="panel-body">
                <ul class="media-list">
                    <li class="media">
                        <div class="media-left">
                            <img src="http://placehold.it/60x60" class="img-circle">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <small>
                                    <a href="users/{{$comment->user->id}}">
                                        {{$comment->user->name}} {{$comment->user->email}}</a>
                                    <br>
                                    commented on {{$comment->created_at}}
                                </small>
                            </h4>
                            <p>
                                {{$comment->body}}
                            </p>
                            <b> Proof: </b>
                            <p>{{$comment->url}}</p>
                        </div>
                    </li>
                </ul>
            </div>
            @endforeach
        </div>
        <!-- End fluid width widget -->


    </div>
</div>