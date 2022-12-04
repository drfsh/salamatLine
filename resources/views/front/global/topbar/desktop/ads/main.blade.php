<div class="ads-layout" style="background: {{$ads->color}};background-image: url('/img/ads/{{$ads->img}}');color: {{$ads->text_color}}">
    <div class="grid-container body">
        <div class="text">
            <i style="width: 16px;height: 16px;margin-left: 10px;">
                @include('icons.flag')
            </i>
            <p>{{$ads->body}}</p>

            <a target="_blank" href="{{$ads->link}}" >
                <button role="button" class="see-ads">مشاهده</button>
            </a>
        </div>
        <i id="close-ads-layout" class="fas fa-times"></i>
    </div>
</div>
