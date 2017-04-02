//Michael Goll

$(document).ready(function() {

	var userRole = null;

	/* Michael Goll
	** March 30, 2017
	** Toggles the icon to the right of the "User Roles" menu item"
	*/
	$("#sidebarToggle").click(function() {
		if ($("#indicatorIcon").hasClass("fa fa-chevron-down")) {
			$("#indicatorIcon").removeClass("fa fa-chevron-down");
			$("#indicatorIcon").addClass("fa fa-chevron-up");
		} else {
			$("#indicatorIcon").removeClass("fa fa-chevron-up");
			$("#indicatorIcon").addClass("fa fa-chevron-down");
		}
	});

	$(".userBtn").click(function() {

		//worker role is selected
		if (this.id == "workerBtn") {
			aja()
			.method('get')
			.url('/roles/setrole/Worker')
			.on('success', function(data) {
				console.log(data);
				userRole = data.user;
			})
			.go()

		//manager role is selected
		} else if (this.id == "managerBtn") {
			aja()
			.method('get')
			.url('/roles/setrole/Manager')
			.on('success', function(data) {
				console.log(data);
				userRole = data.user;
			})
			.go()
		} else {
			console.log("Unknown button");
		}	
	})
});