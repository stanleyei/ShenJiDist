@extends('layouts.backend')

@section('css')

@endsection

@section('main')

<div class="container">
    <form action="{{route('contact.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="content_id">類型</label>
            <select class="form-control" name="content_id" id="content_id">
                @foreach ($type ?? [] as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="sender">寄件者</label>
            <input class="form-control" id="sender" name="sender" type="text" />
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="mail">郵件地址</label>
            <input class="form-control" id="mail" name="mail" type="email" />
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="content">內容</label>
            <textarea class="form-control" id="content" name="content" cols="30" rows="10"></textarea>
        </div>
        <a class="btn btn-secondary" href="{{route('contact.index')}}">取消</a>
        <button type="submit" class="btn btn-primary">新增</button>
    </form>
</div>

@endsection

@section('js')

@endsection
