<script src="{{ URL::asset('js/library/persian-date.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(function() {
		    $("#input1, #span1").persianDatepicker({
				cellWidth: 40,
				cellHeight: 30,
				fontSize: 16,
				formatDate: "YYYY-MM-DD",
				showGregorianDate: true
		    });       
		});
	});
</script>