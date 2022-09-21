@if($data['category']->description!==null)
<div class="box2 box3" >
    <div class="title">در مورد دسته بندی {{$data['category']->name}}</div>
    <div class="body">
        <p style="padding: 0 30px 30px;">{{$data['category']->description}}</p>
    </div>
</div>
@endif
