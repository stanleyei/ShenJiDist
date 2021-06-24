@extends('layouts.backend')

@section('css')

@endsection

@section('main')

<div class="container">
    <form action="{{route('view_img.update', ['view_img'=>$data->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input name="_method" type="hidden" value="PUT">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="view_id">附屬於</label>
            <select class="form-control" name="view_id" id="view_id">
                @foreach ($view ?? [] as $item)
                <option value="{{$item->id}}" @if ($item->id===$data->view_id) selected @endif>{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="img">圖片</label>
            <input class="form-control" id="img" name="img" type="file" accept="image/*" />
            <img src="{{$data->img}}" alt="">
        </div>
        <a class="btn btn-secondary" href="{{route('view_img.index')}}">取消</a>
        <button type="submit" class="btn btn-primary">新增</button>
    </form>
</div>

@endsection

@section('js')

@endsection
