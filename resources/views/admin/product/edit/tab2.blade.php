<div class="grid-x grid-padding-x">
    <div class="cell medium-4">
        <div class="s-card y12">
            <i class="far fa-sticky-note"></i>
            <div class="title">نکته<br><small>در صورتی که محصول دارای چند قیمت میباشد، فیلد زیر را خالی بگذارید</small></div>
            <div class="total number"></div>
            <div class="bot"></div>
        </div>
        {{ Form::label('price', 'قیمت') }}
        <div class="input-group">
            {{ Form::text('price', null, ['class' => 'number input-group-field']) }}
            <span class="input-group-label">ريال</span>
        </div>
        @if ($errors->has('price'))
            <span class="label warning">
                <strong>{{ $errors->first('price') }}</strong>
            </span>
        @endif
    </div>
    <div class="cell medium-8">
        <div class="heading">
            <div class="grid-x">
                <div class="cell medium-6"><h4>چند قیمتی</h4></div>
                <div class="cell medium-6">    
                    <div class="float-left">
                        <button type="button" name="add" id="add-btn" class="button tiny success">افزودن قیمت</button>
                    </div> 
                </div>
            </div>
        </div>
        <div class="grid-x grid-padding-x">
            <div class="cell medium-4 text-center">
                عنوان
            </div>
            <div class="cell medium-4 text-center">
                قیمت
            </div>
            <div class="cell medium-4 text-center">
                عملیات
            </div>
            <div class="cell" id="dynamicAddRemove">
                @foreach ($product->multiprice as $item)
                    {{ Form::hidden("exs[$item->id][id]", $item->id) }}
                    <div class="grid-x grid-padding-x">
                        <div class="cell medium-4 text-center">
                            {{ Form::text("exs[$item->id][title]", $item->title) }}
                        </div>
                        <div class="cell medium-4 text-center">
                            {{ Form::number("exs[$item->id][price]", $item->price) }}
                        </div>
                        <div class="cell medium-4 text-center">
                            <a href="{{route('Pricedelete', $item->id)}}" class="button tiny alert">حذف</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

<div class="double-gap"></div>
<hr class="large">
<div class="double-gap"></div>
<div class="grid-x grid-padding-x">
    <div class="cell medium-4">
        <div class="s-card y12">
            <i class="far fa-sticky-note"></i>
            <div class="title">نکته<br>
            <small>این ویژگی فقط برای انتخاب کاربران میباشد و در قیمت تاثیر گذار نیست (مثال سمت راست یا سمت چپ)</small></div>
            <div class="total number"></div>
            <div class="bot"></div>
        </div>
    </div>
    <div class="cell medium-4">
        <div class="heading">
            <div class="grid-x">
                <div class="cell medium-6"><h4>قابلیت انتخابی (قیمت ثابت)</h4></div>
                <div class="cell medium-6">    
                    <div class="float-left">
                        <button type="button" name="add" id="add-bt" class="button tiny success">افزودن آیتم</button>
                    </div> 
                </div>
            </div>
        </div>
        <div class="grid-x grid-padding-x">
            <div class="cell medium-8 text-center">
                عنوان
            </div>
            <div class="cell medium-4 text-center">
                عملیات
            </div>
            <div class="cell" id="AddRemove">
                @foreach ($product->multifeature as $item)
                    {{ Form::hidden("fea[$item->id][id]", $item->id) }}
                    <div class="grid-x grid-padding-x">
                        <div class="cell medium-8 text-center">
                            {{ Form::text("fea[$item->id][title]", $item->title) }}
                        </div>
                        <div class="cell medium-4 text-center">
                            <a href="{{route('Featuredelete', $item->id)}}" class="button tiny alert">حذف</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>