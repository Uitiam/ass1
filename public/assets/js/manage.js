$(document).ready(function() {
	$("#rebootMeBtn").click(function() {
		aja()
			.method('get')
			.url('/manage/reboot')
			.on('success', function() {
				$('#rebootUpdate').text("Reboot Successful");
			})
			.go()
	})

	$("#registerPRC").click(function() {
		var code = $("#passcodeInput").val();

		if (code != "") {
			aja()
			.method('get')
			.url('/manage/register/zucchini/' + code)
			.on('success', function(data) {
				var retSplit = data.msg.split(" ");
				$('#updateText').text(retSplit[1]);
			})
			.go()
		}
	})
});