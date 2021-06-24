@extends('layouts.backend')

@section('css')

@endsection

@section('main')

<div class="container">
    <form action="{{route('info.update', ['info'=>$data->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input name="_method" type="hidden" value="PUT">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="type_id">類型</label>
            <select class="form-control" name="type_id" id="type_id">
                @foreach ($type ?? [] as $item)
                <option value="{{$item->id}}" @if ($item->id===$data->type_id) selected @endif>{{$item->name}}</option>
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
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="date_start">開始日期</label>
            <input class="form-control" id="date_start" name="date_start" type="date" value="{{$data->date_start}}" />
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="date_end">結束日期</label>
            <input class="form-control" id="date_end" name="date_end" type="date" value="{{$data->date_end}}" />
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="location">地點</label>
            <input class="form-control" id="location" name="location" type="text" value="{{$data->location}}" />
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="organizer">主辦單位</label>
            <input class="form-control" id="organizer" name="organizer" type="text" value="{{$data->organizer}}" />
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="calendar">日曆</label>
            <input class="form-control" id="calendar" name="calendar" type="text" value="{{$data->calendar}}" />
        </div>
        <a class="btn btn-secondary" href="{{route('info.index')}}">取消</a>
        <button type="submit" class="btn btn-primary">修改</button>
    </form>
</div>

@endsection

@section('js')

@endsection
