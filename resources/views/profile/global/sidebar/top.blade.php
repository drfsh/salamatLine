@if ($agent->isMobile())
    <div class="ProfileName">
        <div style="display: flex;flex-direction: row-reverse;">
            <div class="pic">
                <div class="hupload">
                    <img style="border-radius: 100%;" src="{{Auth::user()->avatar}}">
                    <label class="upload" for="FileUpload">
                        <i style="width: 15px;height: 15px;">
                            @include('icons.edit')
                        </i>
                    </label>
                </div>
                {!! Form::open(['route'=>'ChangeAvatar','method' => 'PUT','class'=>'hide','files'=>true]) !!}
                <input name="profile" id="FileUpload" type="file" onchange="this.form.submit();">
                <button type="submit" class="button success">افزودن</button>
                {!! Form::close() !!}
            </div>
            <div class="title">
                {{ Auth::user()->name }}
                @if(Auth::user()->lname)
                    {{ Auth::user()->lname }}
                @endif
            </div>
        </div>
        <div class="menu-profile-i">
            <i class="menu-icon"></i>
        </div>
    </div>
@else
    <div class="ProfileName">
        <div class="pic">
            <div class="hupload">
                <img style="border-radius: 100%;" src="{{Auth::user()->avatar}}">
                <label class="upload" for="FileUpload">
                    <i style="width: 15px;height: 15px;">
                        @include('icons.edit')
                    </i>
                </label>
            </div>
            {!! Form::open(['route'=>'ChangeAvatar','method' => 'PUT','class'=>'hide','files'=>true]) !!}
            <input name="profile" id="FileUpload" type="file" onchange="this.form.submit();">
            <button type="submit" class="button success">افزودن</button>
            {!! Form::close() !!}
        </div>
        <div class="title">
            {{ Auth::user()->name }}
            @if(Auth::user()->lname)
                {{ Auth::user()->lname }}
            @endif
        </div>
    </div>
@endif