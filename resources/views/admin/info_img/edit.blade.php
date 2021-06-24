@extends('layouts.backend')

@section('css')

@endsection

@section('main')

<div class="container">
    <form action="{{route('info_img.update', ['info_img'=>$data->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input name="_method" type="hidden" value="PUT">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="info_id">類型</label>
            <select class="form-control" name="info_id" id="info_id">
                @foreach ($info ?? [] as $item)
                <option value="{{$item->id}}" @if ($item->id===$data->info_id) selected @endif>{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="name">名稱</label>
            <input class="form-control" id="name" name="name" type="text" value="{{$data->name}}" />
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="content">內容</label>
            <textarea class="form-control" id="content" name="content" cols="30" rows="10">{{$data->content}}</textarea>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="img">圖片</label>
            <input class="form-control" id="img" name="img" type="file" accept="image/*" value="{{$data->img}}" />
            <img src="{{$data->img}}" alt="">
        </div>
        <a class="btn btn-secondary" href="{{route('info_img.index')}}">取消</a>
        <button type="submit" class="btn btn-primary">修改</button>
    </form>
</div>

@endsection

@section('js')

@endsection
