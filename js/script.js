// $(document).ready(function(){
// 	$('.follow-button').click(function(){
// 		var uid = $(this).attr('uid');
// 		console.log(uid);
// 		$.ajax({
// 			url: "process_follow.php",
// 			type: "post",
// 			data: {uid:uid},
// 			success: function(result){
// 				console.log(result);
// 				if(result == "Success!"){
// 					var buttonToChange = $("[uid="+uid+"]");
// 					buttonToChange.removeClass('btn-primary');
// 					buttonToChange.addClass('btn-default');
// 				}
// 			}
// 		})
// 	})
// });