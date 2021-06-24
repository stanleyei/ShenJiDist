@extends('layouts.backend')

@section('css')

@endsection

@section('main')

<div class="container">
    <form action="{{route('shop.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="type_id">類型</label>
            <select class="form-control" name="type_id" id="type_id">
                @foreach ($type ?? [] as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="name">名稱</label>
            <input class="form-control" id="name" name="name" type="text" />
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="url">相關網址</label>
            <input class="form-control" id="url" name="url" type="text" />
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="phone">連絡電話</label>
            <input class="form-control" id="phone" name="phone" type="text" />
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="content">內容</label>
            <textarea class="form-control" id="content" name="content" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="location">地點</label>
            <input class="form-control" id="location" name="location" type="text" />
        </div>
        <a class="btn btn-secondary" href="{{route('info.index')}}">取消</a>
        <button type="submit" class="btn btn-primary">新增</button>
    </form>
</div>

@endsection

@section('js')

@endsection
