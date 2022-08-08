{!! Form::open(['method' => 'PUT', 'route' => ['UpdatePassword']]) !!}
	<label>رمز عبور قدیم
		<input type="password" name="old_password">
	</label>
	<label>رمز عبور جدید
		<input type="password" name="new_password">
	</label>
	<label>تکرار رمز عبور جدید
		<input type="password" name="repeat_password">
	</label>
    <button type="submit" value="" class="button success expanded">ذخیره تغییرات</button>
{!! Form::close() !!}


