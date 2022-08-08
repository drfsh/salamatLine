<div class="cell medium-10 medium-offset-1">
    <div class="box shadow rounded hover">
        <div class="heading">
            <div class="grid-x">
                <div class="cell medium-6"><h4>نظرسنجی</h4></div>
            </div>
        </div>
        <table class="hover">
            <thead>
                <tr>
                    <th class="text-center">شماره فاکتور</th>
                    <th class="text-center">کیفیت</th>
                    <th class="text-center">قیمت</th>
                    <th class="text-center">حمل و نقل</th>
                    <th class="text-center">راحتی مراحل</th>
                    <th class="text-center">نحوه آشنایی</th>
                    <th class="text-center">محتوا</th>
                    <th class="text-center">نمره کل</th>
                    <th class="text-center">میانگین سیستمی</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['survey'] as $item)
                    <tr>
                        <td class="text-center"><strong><a href="{{ route('ShowInvoice', $item->invoice_id) }}">{{$item->invoice_id}}</a></strong></td>
                        <td class="text-center">{{$item->quality}}</td>
                        <td class="text-center">{{$item->price}}</td>
                        <td class="text-center">{{$item->transport}}</td>
                        <td class="text-center">@if($item->levels == 1)<span class="badge success"><i class="fas fa-check"></i></span>@else<span class="badge alert"><i class="fas fa-times"></i></span>@endif</td>
                        <td class="text-center">
                            @foreach($item->acquaint as $value)
                                <span class="label primary">{{$value}} </span>
                            @endforeach
                        </td>
                        <td class="text-center">{{$item->content}}</td>
                        <td class="text-center">{{$item->overall}}</td>
                        <td class="text-center">{{round(($item->quality += $item->price += $item->transport)/3, 2)}}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Pagination">
            {!! $data['survey']->links(); !!}
        </nav>
    </div>
</div>