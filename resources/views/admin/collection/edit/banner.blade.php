<table class="hover">
    <thead>
    <tr>
        <th width="90">جایگاه</th>
        <th width="200">فایل</th>
        <th width="200">عنوان بنر</th>
        <th width="300">لینک بنر</th>
        <th>وضعیت</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>بنر یک</td>
        <td role="button" style="padding: 0">
            <label class="uploadFileH" role="button">
                <img src="{{$banners[0]->tiny}}" id="banner_img_show1"/>
                <input style="display: none" onchange="change(1,this)" type="file" name="banner_img1" id="banner_img1">
            </label>
        </td>
        <td>{{ Form::text('banner_title1', $banners[0]->title) }}</td>
        <td>{{ Form::text('banner_link1', $banners[0]->link) }}</td>
        <td>{{ Form::label('banner_active1', 'فعال') }}{{ Form::checkbox('banner_active1', null,$banners[0]->active) }}</td>
    </tr>
    <tr>
        <td>بنر دو</td>
        <td role="button" style="padding: 0">
            <label class="uploadFileH" role="button">
                <img src="{{$banners[1]->tiny}}" id="banner_img_show2"/>
                <input style="display: none" onchange="change(2,this)" type="file" name="banner_img2" id="banner_img2">
            </label>
        </td>
        <td>{{ Form::text('banner_title2', $banners[1]->title) }}</td>
        <td>{{ Form::text('banner_link2', $banners[1]->link) }}</td>
        <td>{{ Form::label('banner_active2', 'فعال') }}{{ Form::checkbox('banner_active2', null,$banners[1]->active) }}</td>

    </tr>
    <tr>
        <td>بنر سه</td>
        <td role="button" style="padding: 0">
            <label class="uploadFileH" role="button">
                <img src="{{$banners[2]->tiny}}" id="banner_img_show3"/>
                <input style="display: none" type="file" onchange="change(3,this)" name="banner_img3" id="banner_img3">
            </label>
        </td>
        <td>{{ Form::text('banner_title3', $banners[2]->title) }}</td>
        <td>{{ Form::text('banner_link3', $banners[2]->link) }}</td>
        <td>{{ Form::label('banner_active3', 'فعال') }}{{ Form::checkbox('banner_active3', null,$banners[2]->active) }}</td>
    </tr>
    <tr>
        <td>بنر چهار</td>
        <td role="button" style="padding: 0">
            <label class="uploadFileH" role="button">
                <img src="{{$banners[3]->tiny}}" id="banner_img_show4"/>
                <input style="display: none" type="file" onchange="change(4,this)" name="banner_img4" id="banner_img4">
            </label>
        </td>
        <td>{{ Form::text('banner_title4', $banners[3]->title) }}</td>
        <td>{{ Form::text('banner_link4', $banners[3]->link) }}</td>
        <td>{{ Form::label('banner_active4', 'فعال') }}{{ Form::checkbox('banner_active4', null,$banners[3]->active) }}</td>
    </tr>
    <tr>
        <td>بنر پنج</td>

        <td role="button" style="padding: 0">
            <label class="uploadFileH" role="button">
                <img src="{{$banners[4]->tiny}}" id="banner_img_show5"/>
                <input style="display: none" type="file" onchange="change(5,this)" name="banner_img5" id="banner_img5">
            </label>
        </td>
        <td>{{ Form::text('banner_title5', $banners[4]->title) }}</td>
        <td>{{ Form::text('banner_link5', $banners[4]->link) }}</td>
        <td>{{ Form::label('banner_active5', 'فعال') }}{{ Form::checkbox('banner_active5', null,$banners[4]->active) }}</td>
    </tr>
    <tr>
        <td>بنر شیش</td>

        <td role="button" style="padding: 0">
            <label class="uploadFileH" role="button">
                <img src="{{$banners[5]->tiny}}" id="banner_img_show6"/>
                <input style="display: none" onchange="change(6,this)" type="file" name="banner_img6" id="banner_img6">
            </label>
        </td>
        <td>{{ Form::text('banner_title6',  $banners[5]->title) }}</td>
        <td>{{ Form::text('banner_link6', $banners[5]->link) }}</td>
        <td>{{ Form::label('banner_active6', 'فعال') }}{{ Form::checkbox('banner_active6', null,$banners[5]->active) }}</td>
    </tr>
    <tr>
        <td>بنر هفت</td>

        <td role="button" style="padding: 0">
            <label class="uploadFileH" role="button">
                <img src="{{$banners[6]->tiny}}" id="banner_img_show7"/>
                <input style="display: none" type="file" onchange="change(7,this)" name="banner_img7" id="banner_img7">
            </label>
        </td>
        <td>{{ Form::text('banner_title7', $banners[6]->title) }}</td>
        <td>{{ Form::text('banner_link7',  $banners[6]->link) }}</td>
        <td>{{ Form::label('banner_active7', 'فعال') }}{{ Form::checkbox('banner_active7', null, $banners[6]->active) }}</td>
    </tr>

    </tbody>
</table>
<script>
    function change(i,e){
        var type = e.files[0].type;
        if (type.substr(0, 5) === 'image') {
            var reader = new FileReader();
            reader.onload = function (e) {
                let show1 = document.getElementById('banner_img_show'+i)
                show1.src = e.target.result;
            }
            reader.readAsDataURL(e.files[0])
        }
    }
</script>