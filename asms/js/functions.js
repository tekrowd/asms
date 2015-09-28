// JavaScript Document
function changeTab(tab1,tab2) {
	
	$(tab1).removeClass('hidden');
	$(tab2).removeClass('active');
	$(tab1).addClass('active');
	$(tab2).addClass('hidden');
}

function proDropdown(id) {
	if ( $('#pro-dropdown-'+id).is( ":hidden" ) ) {
		$('#pro-dropdown-'+id).slideDown("slow");
	} else {
		$('#pro-dropdown-'+id).hide();
	}
}