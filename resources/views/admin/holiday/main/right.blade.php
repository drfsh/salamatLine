<div class="grid-x grid-padding-x">
    <div class="cell">
        <div class="box shadow rounded hover space">
            <div class="heading">
                <h4>روز تعطیل</h4>
            </div>
            <div class="content">
                {!! Form::open(array('route' => 'holiday.store')) !!}
                
                    {{ Form::label('title', 'نام روز') }}
                    {{ Form::text('title', null) }}

                    {{ Form::label('day', 'روز') }}
                    <input type="text" id="input1" name="day" autocomplete="off" readonly style="cursor: pointer;" />
                    <span id="span1"></span>   



                    <div class="double-gap"></div>
                    {{ Form::submit('ذخیره', array('class' => 'button success')) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>