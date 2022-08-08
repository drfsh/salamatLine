<html lang="">
<head>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body style="direction: rtl">
<div>
    <button onclick="exportTableToExcel('tblData')">Export</button>
    <table id="tblData">
        <thead>
        <tr>
            <th>#</th>
            <th>آدرس تصویر</th>
            <th>نام</th>
            <th>ادامه نام</th>
            <th>قیمت</th>
            <th>برند</th>
            <th>کشور</th>
            <th>تاریخ ایجاد</th>
            <th>وضعیت</th>
        </tr>
        </thead>
        <tbody>

        @foreach($product as $v)
            <tr>
                <td>{{$v->id}}</td>
                <td><a href="{{$v->large}}">
                        برای مشاهده کلیک کنید
                    </a></td>
                <td>{{$v->title}}</td>
                <td>{{$v->subtitle}}</td>
                <td>{!! $v->showing_price !!}</td>
                <td>@if($v->brand==null)
                        تعریف نشده
                    @else
                        {{$v->brand->title}}
                    @endif</td>
                <td>@if($v->country==null)
                        تعریف نشده
                    @else
                        {{$v->country->title}}
                    @endif
                </td>
                <td>{{$v->created_at}}</td>
                <td>@if($v->active==1)
                        فعال
                    @else
                        غیر فعال
                    @endif</td>

            </tr>
        @endforeach
        </tbody>

    </table>
</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>

<script>
    function exportTableToExcel(tableID, filename = '') {
        $("#" + tableID).table2excel({
            exclude: ".excludeThisClass",
            name: "Worksheet Name",
            filename: "SomeFile.xls", // do include extension
            preserveColors: false // set to true if you want background colors and font colors preserved
        });
    }
</script>
</body>
</html>
