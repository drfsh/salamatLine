<form>
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="medium-6 cell">
				<label>متن
					<input type="text" placeholder="Plceholder">
				</label>
			</div>
			<div class="medium-6 cell">
					<label>
					عدد
					<input type="number" value="100">
				</label>
			</div>
			<div class="medium-6 cell">
				<label>انتخابی
					<select>
						<option value="husker">عنوان نمونه</option>
						<option value="starbuck">عنوان نمونه</option>
						<option value="hotdog">عنوان نمونه</option>
						<option value="apollo">عنوان نمونه</option>
					</select>
				</label>
			</div>


<div class="cell medium-6">
	<label>انتخابی چندتایی
		<select class="chosen-select" multiple>
			<option value="showboat">عنوان نمونه</option>
			<option value="redwing">عنوان نمونه</option>
			<option value="narcho">عنوان نمونه</option>
			<option value="hardball">عنوان نمونه</option>
		</select>
	</label>
</div>



<div class="medium-6 cell">

<div class="gap"></div>
<div class="input-group">
  <span class="input-group-label">$</span>
  <input class="input-group-field" type="number">
  <div class="input-group-button">
    <input type="submit" class="button" value="ارسال">
  </div>
</div>

			</div>

	<div class="medium-6 cell">
	</div>
			<div class="medium-6 cell">

				<legend>انتخاب تکی</legend>
			    <input type="radio" name="pokemon" value="Red" id="pokemonRed" required><label for="pokemonRed">قرمز</label>
			    <input type="radio" name="pokemon" value="Blue" id="pokemonBlue"><label for="pokemonBlue">زرد</label>
			    <input type="radio" name="pokemon" value="Yellow" id="pokemonYellow"><label for="pokemonYellow">بنفش</label>




			</div>
			<div class="medium-6 cell">
				<legend>انتخاب چندتایی</legend>
			    <input id="checkbox1" type="checkbox"><label for="checkbox1">قرمز</label>
			    <input id="checkbox2" type="checkbox"><label for="checkbox2">زرد</label>
			    <input id="checkbox3" type="checkbox"><label for="checkbox3">بنفش</label>
			</div>

			<div class="cell">
				<div class="double-gap"></div>
				<textarea id="mytextarea">Text editor(text-area)!</textarea>
			</div>





		</div>
	</div>
</form>