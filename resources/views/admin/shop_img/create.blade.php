@extends('layouts.backend')

@section('css')

@endsection

@section('main')

<div class="container">
    <form action="{{route('shop_img.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="shop_id">附屬於</label>
            <select class="form-control" name="shop_id" id="shop_id">
                @foreach ($shop ?? [] as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="content">內容</label>
            <textarea class="form-control" id="content" name="content" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="img">圖片</label>
            <input class="form-control" id="img" name="img" type="file" accept="image/*" />
        </div>
        <a class="btn btn-secondary" href="{{route('shop_img.index')}}">取消</a>
        <button type="submit" class="btn btn-primary">新增</button>
    </form>
</div>

@endsection

@section('js')

@endsection
