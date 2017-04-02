//Michael Goll

$(document).ready(function() {

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

	$(".userBtn").click(function(e) {
		//prevents the page from being reloaded.
		e.preventDefault();

		//worker role is selected
		if (this.id == "workerBtn") {
			aja()
			.method('get')
			.url('/roles/setrole/Worker')
			.on('success', function(data) {
				document.cookie = "role=Worker";
				$("#userAddress").text("Welcome, " + data.user + "!");
			})
			.go()

		//manager role is selected
		} else if (this.id == "managerBtn") {
			aja()
			.method('get')
			.url('/roles/setrole/Manager')
			.on('success', function(data) {
				document.cookie = "role=Manager";
				$("#userAddress").text("Welcome, " + data.user + "!");
			})
			.go()
		} else {
			console.log("Unknown button");
		}	
	})
});