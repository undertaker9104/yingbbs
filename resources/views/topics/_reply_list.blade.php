<div class="reply-list">
    @foreach($replies as $index => $reply)
    <div class="media" name="reply{{$reply->id}}" id="reply{{$reply->id}}">
        <div class="avatar pull-left">
            <a href="{{route('users.show',[$reply->user_id])}}">
            <img src="{{$reply->user->avatar}}" style="width:48px;height:48px;" class="media-object img-thumbnail" alt="{{$reply->user->name}}">
            </a>
        </div>

        <div class="info">
            <div class="media-heading">
                <a href="{{route('users.show',[$reply->user_id])}}" title="{{$reply->user->name}}">
                    {{$reply->user->name}}
                </a>
                <span> •  </span>
                <span class="meta" title="{{$reply->created_at}}">{{$reply->created_at->diffForHumans()}}</span>

                {{--回復刪除按鈕--}}
                <span class="meta pull-right">
                    <a title="刪除回覆">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </a>
                </span>
            </div>
            <div class="reply-content">
                {!! $reply->content !!}
            </div>
        </div>
    </div>
    <hr>
    @endforeach
</div>