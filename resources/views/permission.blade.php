@extends('layouts.app')




@section('content')

    <div class="row">
        <div class="col-sm-12">
            @foreach($models as $model)
                <div>{{$model}}</div>
            @endforeach
        </div>
    </div>

@endsection