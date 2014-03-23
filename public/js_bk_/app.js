
	
	function showSaveStatus(status) {
		if (status == 1) {
			$("#save_icon").addClass('icon-spinner');
			$("#save_icon").addClass('icon-spin');
			$("#save_icon").removeClass('icon-save');
			$("#save_button").attr('disabled', 'disabled')
		} else {
			$("#save_icon").removeClass('icon-spin');
			$("#save_icon").removeClass('icon-spinner');
			$("#save_icon").addClass('icon-save');
			$("#save_button").removeAttr('disabled');
		}
	}


		function getCurrentTime() {
		var currentdate = new Date();
		var datetime = "<small>" + currentdate.getFullYear() + "/" + (currentdate.getMonth() + 1) + "/" + currentdate.getDate() + " @ " + currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds() + "</small>";
		return datetime;
	}


	function ngShowMessage(data, bShowTime)
	{
		//window.location.href = '?message=done';

		var show='<div class="span5">';
		var showError = '<div class="alert">';
		angular.forEach(data.error, function(value, key) {
			showError += value.message + "<br />";
		});
		showError += '</div>';
		show += showError;

		bShowTime = typeof bShowTime !== 'undefined' ? bShowTime : false;
		if (bShowTime)
		{
			show = show + "<small>" + getCurrentTime() + "</small>";
		}
		return show + "</div></div>";
	}