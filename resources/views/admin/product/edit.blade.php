@extends('layouts.admin')

@section('NavItems')
   @include('admin.categories.NavItems')
@endsection

@section('content')
    <div class="double-gap"></div>
    <div class="grid-x grid-padding-x">
        <div class="cell">
            @if (Session::has('alert'))
                <div class="cell callout alert">
                    {{ Session::get('alert') }}
                </div>
                <div class="double-gap"></div>
            @elseif (Session::has('success'))
                <div class="cell callout success">
                    {{ Session::get('success') }}
                </div>
                <div class="double-gap"></div>
            @endif
            {{ Form::model($product, array('route' => array('product.update', $product->id), 'method' => 'PUT', 'files' => true)) }}
            <div class="box shadow rounded hover" data-equalizer-watch>
                <div class="heading">
                    <h4>محصول {{$product->title}}</h4>
                </div>
                @include('admin.product.edit.tabs')

                <div class="tabs-content" data-tabs-content="example-tabs">
                    <div class="tabs-panel is-active" id="panel1">
                        @include('admin.product.edit.tab1')
                    </div>
                    <div class="tabs-panel" id="panel2">
                        @include('admin.product.edit.tab2')
                    </div>
                    <div class="tabs-panel" id="panel3">
                        @include('admin.product.edit.tab3')
                    </div>
                    <div class="tabs-panel" id="panel4">
                        @include('admin.product.edit.tab4')
                    </div>
                    <div class="tabs-panel" id="panel5">
                        @include('admin.product.edit.tab5')
                    </div>
                    <div class="tabs-panel" id="panel6">
                        @include('admin.product.edit.tab6')
                    </div>
                </div>
            </div>
            @include('admin.product.edit.button')
            {!! Form::close() !!}
        </div>
    </div>
	<div class="double-gap"></div>
@endsection


@section('js')

    <script type="text/javascript">
        var i = 0;
        $("#add-btn").click(function(){
            ++i;
            $("#dynamicAddRemove").append('<div class="grid-x grid-padding-x" id="radif"><div class="cell medium-4 text-center"><input type="text" name="moreFields['+i+'][title]" placeholder="عنوان" /></div><div class="cell medium-4 text-center"><input type="number" name="moreFields['+i+'][price]" placeholder="قیمت" /></div><div class="cell medium-4 text-center"><button type="button" id="add-btn" class="button warning hollow remove-tr">حذف</button></div></div>');
        });
        $(document).on('click', '.remove-tr', function(){
            $('#radif').remove();
        });
    </script>
    <script type="text/javascript">
        var x = 0;
        $("#add-bt").click(function(){
            ++x;
            $("#AddRemove").append('<div class="grid-x grid-padding-x" id="fitem"><div class="cell medium-8 text-center"><input type="text" name="moreFeatures['+x+'][title]" placeholder="عنوان" /></div><div class="cell medium-4 text-center"><button type="button" id="add-bt" class="button warning hollow remove-tr">حذف</button></div></div>');
        });
        $(document).on('click', '.remove-tr', function(){
            $('#fitem').remove();
        });
    </script>
    <script>
        $('input.number').keyup(function(event) {

            // skip for arrow keys
            if(event.which >= 37 && event.which <= 40) return;

            // format number
            $(this).val(function(index, value) {
            return value
            .replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            ;
            });
            });
    </script>
    <script>

        // let checkbox = document.querySelectorAll('.ed')
        // for (const i in checkbox) {
        //
        //     if(!checkbox[i].checked){
        //         let name =checkbox[i].name.replace('is_','')
        //         let input = document.getElementById(name)
        //         input.disabled = 'disabled'
        //     }
        //     checkbox[i].addEventListener('click',function (e) {
        //         let name = e.target.name.replace('is_','')
        //
        //         let checked = e.target.checked
        //         let input = document.getElementById(name)
        //         if (checked){
        //             input.disabled = ''
        //         }else{
        //             input.disabled = 'disabled'
        //         }
        //     })
        // }
    </script>
    @include('admin.global.CkEditor')
@endsection
