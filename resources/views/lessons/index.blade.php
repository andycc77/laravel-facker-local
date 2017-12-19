@extends('app')
@section('content')
    @foreach($lessons->chunk(3) as $row)
        <div class="row">
            @foreach($row as $lesson)
            <article class="col-md-4">
                <h2>{{ $lesson->title }}</h2>
                <img src="{{ $lesson->image }}" alt="" width="360">
                <div class="body">
                    @if(Auth::check())
                    @if(in_array($lesson->id,$favorites))
                        {!! Form::open(['method'=>'DELETE','url'=>'/favorite/'.$lesson->id]) !!}
                    @else
                        {!! Form::open(['url'=>'/favorite']) !!}
                        {!! Form::hidden('lesson_id',$lesson->id) !!}
                    @endif
                        <button type="submit"><i class="fa fa-heart {{ in_array($lesson->id,$favorites)? 'favorite' : 'not-favorite' }}" ></i></button>
                    {!! Form::close() !!}
                    @endif
                        {{ $lesson->intro }}
                </div>
            </article>
            @endforeach
        </div>
    @endforeach
    {!! $lessons->appends(['type'=>'article','price'=>'500'])->render() !!}
@stop