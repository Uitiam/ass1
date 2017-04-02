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

				if (retSplit[1] != "Bad")
					$('#updateText').text(retSplit[1]);
				else
					$('#updateText').text(data.msg);
			})
			.go()
		}
	})

	$('.sellRobotBtn').click(function() {
		var id = this.id;
		console.log(id);

		aja()
			.method('get')
			.url('/manage/getRobotToSell/' + id)
			.on('success', function(data) {
				console.log(data);
				alert(data.msg);
				location.reload();
			})
			.go()
	})
});