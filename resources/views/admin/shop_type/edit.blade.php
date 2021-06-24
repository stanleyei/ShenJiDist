@extends('layouts.backend')

@section('css')

@endsection

@section('main')

<div class="container">
    <form action="{{route('shop_type.update', ['shop_type'=>$data->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input name="_method" type="hidden" value="PUT">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="name">名稱</label>
            <input class="form-control" id="name" name="name" type="text" value="{{$data->name}}" />
        </div>
        <a class="btn btn-secondary" href="{{route('shop_type.index')}}">取消</a>
        <button type="submit" class="btn btn-primary">修改</button>
    </form>
</div>

@endsection

@section('js')

@endsection
