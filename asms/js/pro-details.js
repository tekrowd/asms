// JavaScript Document
function getProDetails(id) {
	$.ajax({
		url:"includes/pro-details.php",
		type:'POST',
		data:{id: id},
		success: function (output) {
			document.getElementById('pro_details').innerHTML = output;
		}
	});
}