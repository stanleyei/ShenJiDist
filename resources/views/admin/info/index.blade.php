@extends('layouts.backend')

@section('css')


@endsection

@section('main')

<div class="container">
    <a href="{{route('info.create')}}"><button class="btn btn-success">新增</button></a>
    <hr>
    <table id="ajaxdata" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>類型</th>
                <th>名稱</th>
                <th>內容</th>
                <th>副圖片數量</th>
                <th>開始時間</th>
                <th>結束時間</th>
                <th>編輯</th>
                <th>刪除</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@endsection

@section('js')

<script>
    // init datatable
    const dataTable = $('#ajaxdata').DataTable({
        ajax: {
            url: "/admin/info_data",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
        },
        order: [[ 4, "desc" ]],
        columns: [
            { data: "type_id" },
            { data: "name" },
            { data: "content" },
            { data: "infoImgs" },
            { data: "date_start" },
            { data: "date_end" },
            { data: "editBtn" },
            { data: "destroyBtn" }
        ],
        // columnDefs: [
        //     { width: "25%", "targets": 2 },
        //     { width: "8%", "targets": 3 },
        //     { width: "8%", "targets": 4 },
        //     { className: "test", "targets": [ 0,1 ] },
        //     { className: "btn-column", "targets": [ 3,4 ] }
        // ],
        language: {
            processing: "處理中...",
            loadingRecords: "載入中...",
            lengthMenu: "顯示 _MENU_ 項結果",
            zeroRecords: "沒有符合的結果",
            info: "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
            infoEmpty: "顯示第 0 至 0 項結果，共 0 項",
            infoFiltered: "(從 _MAX_ 項結果中過濾)",
            infoPostFix: "",
            search: "搜尋:",
            paginate: {
                first: "第一頁",
                previous: "上一頁",
                next: "下一頁",
                last: "最後一頁"
            },
            aria: {
                sortAscending: ": 升冪排列",
                sortDescending: ": 降冪排列"
            }
        },
    });

    function destroyBtnFunction(id) {
        const path = `/admin/info/${id}`
        if (confirm(`是否要刪除此筆資料`)) {
            axios.delete(path).then(
                response=>{
                    dataTable.ajax.reload()
                },
                error=>{
                    console.log('失敗了');
                }
                )
        }
    }

</script>

<script>

</script>

@endsection
