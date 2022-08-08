<table class="hover">
    <thead>
        <tr>
            <th width="20" class="text-center">شناسه</th>
            <th class="text-center">نام کاربر</th>
            <th class="text-center">شماره</th>
            <th class="text-center">محصول</th>
            <th width="100" class="text-center">تصویر</th>
            <th class="text-center">تاریخ ثبت</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data['list'] as $item)
            <tr class="text-center">
                <td>{{$item->id}}</td>
                <td>{{$item->user->name}} {{$item->user->lname}}</td>
                <td>{{$item->user->mobile}}</td>
                <td><a href="{{ route('product.edit',$item->product->id)}}" target="_blank">{{$item->product->title}}</a></td>
                <td><a href="{{ route('product',$item->product->slug)}}" target="_blank"><img src="{{$item->product->tiny}}" width="100"></a></td>
                <td>{{$item->created_at}}</td>
            </tr>
        @endforeach
    </tbody>
</table>