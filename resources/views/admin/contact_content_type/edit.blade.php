@extends('layouts.backend')

@section('css')

@endsection

@section('main')

<div class="container">
    <form action="{{route('contact_content_type.update', ['contact_content_type'=>$data->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input name="_method" type="hidden" value="PUT">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="type_id">附屬於</label>
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
        <a class="btn btn-secondary" href="{{route('contact_content_type.index')}}">取消</a>
        <button type="submit" class="btn btn-primary">新增</button>
    </form>
</div>

@endsection

@section('js')

@endsection
