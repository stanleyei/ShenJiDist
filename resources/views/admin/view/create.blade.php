@extends('layouts.backend')

@section('css')

@endsection

@section('main')

<div class="container">
    <form action="{{route('view.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="name">名稱</label>
            <input class="form-control" id="name" name="name" type="text" />
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="content">內容</label>
            <textarea class="form-control" id="content" name="content" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="phone">連絡電話</label>
            <input class="form-control" id="phone" name="phone" type="text" />
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="address">地址</label>
            <input class="form-control" id="address" name="address" type="text" />
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="time_open">開店時間</label>
            <select class="form-control" name="time_open" id="time_open">
                @for ($i = 0; $i < 24; $i++)
                <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="time_close">關店時間</label>
            <select class="form-control" name="time_close" id="time_close">
                @for ($i = 0; $i < 24; $i++)
                <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
        </div>
        <a class="btn btn-secondary" href="{{route('view.index')}}">取消</a>
        <button type="submit" class="btn btn-primary">新增</button>
    </form>
</div>

@endsection

@section('js')

@endsection
