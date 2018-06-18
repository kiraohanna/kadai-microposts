@if (Auth::user()->likes($micropost->id))
    {!! Form::open(['route' => ['user.unlike', $micropost->id], 'method' => 'delete']) !!}
        {!! Form::submit('Unlike', ['class' => "btn btn-warning btn-xs"]) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['user.like', $micropost->id]]) !!}
        {!! Form::submit('Like', ['class' => "btn btn-default btn-xs"]) !!}
    {!! Form::close() !!}
@endif