var imageLoader = document.getElementById('imagePhoto');
if (imageLoader) {
    imageLoader.addEventListener('change', handleImage, false);
}
function handleImage(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        
        $('#image').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
}

$('.building_id').change(function(){
	var building_id = $(this).val();
	$.get('building/getFloorByBuilding', {building_id:building_id},function(data){
		$('.floor_id').html(data);
		$('.floor_id').change(function(){
			var floor_id = $(this).val();
			$.get('room/getRoomByFloor', {floor_id:floor_id}, function(data){
				$('#room_table').html(data);
			});
		});
	});
});

$('.major_id').change(function(){
	var major_id = $(this).val();
	$('.course_id').change(function(){
		var course_id = $(this).val();
		$.post('classes/getClass', {major_id:major_id,course_id:course_id}, function(data){
			$('#class_table').html(data);
		});
	});
});

var stt = $('select option:selected').val();
function loadData(stt){
    $.get("student/getStudentsByStatus", {status:stt}, function(data){
        $('#student_table').html(data);
    });
}
loadData(stt);
$('.status').change(function(){
	stt = $(this).val();
	$.get('student/getStudentsByStatus',{status:stt}, function(data){
		$('#student_table').html(data);
	});
});
	
$('#confirm_btn').click(function(){
	var form_id = $(this).attr('data-id');
	$.get('confirm', {form_id:form_id}, function(data){

	});
})





