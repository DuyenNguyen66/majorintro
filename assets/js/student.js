$('.building_id').change(function(){
	var building_id = $(this).val();
	$.get('register/getFloorByBuilding', {building_id:building_id},function(data){
		$('.floor_id').html(data);
		$('.floor_id').change(function(){
			var floor_id = $(this).val();
			$.get('register/getRoomByFloor', {floor_id:floor_id}, function(data){
				$('#room_table').html(data);
			});
		});
	});
});

function loadRoom(building_id, floor_id) {
	$.get('register/getFloorByBuilding', {building_id:building_id},function(data){
		$('.floor_id').html(data);
			$.get('register/getRoomByFloor', {floor_id:floor_id}, function(data){
				$('#room_table').html(data);
			});
	});
}

var date = new Date();
var d = date.getDate();
var m = date.getMonth();
var y = date.getFullYear();

var calendar =  $('#calendar').fullCalendar({
	header: {
		left: 'title',
		center: 'agendaDay,agendaWeek,month',
		right: 'prev,next today'
	},
	firstDay: 1, 
	defaultView: 'month',

	axisFormat: 'h:mm',
	columnFormat: {
		month: 'ddd',   
		week: 'ddd d', 
		day: 'dddd M/d',  
		agendaDay: 'dddd d'
	},
	titleFormat: {
		month: 'MMM yyyy', 
		week: "MMMM yyyy", 
		day: 'MMMM yyyy'  
	},
	allDaySlot: false,
	selectHelper: true,
	select: function(start, end, allDay) {
		var title = prompt('Event Title:');
		if (title) {
			calendar.fullCalendar('renderEvent',
			{
				title: title,
				start: start,
				end: end,
				allDay: allDay
			},
			true
			);
		}
		calendar.fullCalendar('unselect');
	}
});

$('.tooltiptext').tooltip({placement: "bottom"});
