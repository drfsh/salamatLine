<div class="cell">
    <div class="box shadow rounded hover">
        <div class="heading">
            <div class="grid-x">
                <div class="cell medium-6"><h4>آدرس ها</h4></div>
                <div class="cell medium-6">    
                    <div class="float-left">
                        <form style="display: flex;align-items: center;flex-direction: row;" method="get">
                            <input type="text" name="q" placeholder="id,نام,استان,شهر,موبایل,جزئیات"
                                   style="height: 35px;margin: 0 0 0 8px;font-size: 13px;" value="{{request()->q}}">
                            <input type="submit" value="جستجو" style="border: none;height: 35px;color: #545454;font-size: 14px;width: 83px;">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="hover">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">ثبت کننده</th>
                    <th>تحویل گیرنده</th>
                    <th class="text-center">استان</th>
                    <th class="text-center">شهر</th>
                    <th>منطقه</th> <th>جزئیات</th>
                    <th class="text-center">موبایل</th>
                    <th>تاریخ ثبت</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($address as $item)
                    <tr @if ($item->deleted_at)style="color:red;"@endif>
                        <td class="text-center">{{$item->id}}</td>
                        <td class="text-center"><span class="label">{{$item->user->name}}</span></td>
                        <td><span class="label secondary">{{$item->name}}</span></td>
                        @if($item->province_id)
                            <td class="text-center">{{$item->province->title}}</td>
                        @else
                            <td class="text-center">-</td>
                        @endif
                        @if($item->city_id)
                            <td class="text-center">{{$item->city->title}}</td>
                        @else
                            <td class="text-center">-</td>
                        @endif

                        @if($item->district_id)
                            <td class="text-center">{{$item->district->title}}</td>
                        @else
                            <td class="text-center">-</td>
                        @endif
                        <td>{{$item->content}}</td>
                        <td>{{$item->mobile}}</td>
                        <td>{{$item->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Pagination">
            {!! $address->links(); !!}
        </nav>
    </div>
</div>