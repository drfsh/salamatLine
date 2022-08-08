<div class="double-gap"></div>
@foreach ($data['product']->getApprovedRatings($data['product']->id, 'desc') as $item)

    {{$item->author->name}}<br>
    {{$item->rating}}<br>
    {{$item->body}}<br>
    --------------<br>
@endforeach