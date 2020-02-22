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

//Change password
$('#re_password').keyup(function () {
	var pass = $('#password').val();
	var re_pass = $('#re_password').val();
	if (re_pass != '' && pass != re_pass) {
		$('#icon_check').html('<i class="fa fa-times" style="color: red"></i>');
		$('.btn_save').html('<button type="submit" class="btn btn-inverse btn-custom" name=\'cmd\' value=\'Save\' disabled >Save\n' + '</button>')
	} else if (pass != '' && pass == re_pass) {
		$('#icon_check').html('<i class="fa fa-check" style="color: green;"></i>');
		$('.btn_save').html('<button type="submit" class="btn btn-inverse btn-custom" name=\'cmd\' value=\'Save\'>Save\n' + '</button>')
	} else {
		$('#icon_check').html('')
	}
});

//Ckeditor
// CKEDITOR.replace('edit_frame');

CKEDITOR.addCss('figure[class*=easyimage-gradient]::before { content: ""; position: absolute; top: 0; bottom: 0; left: 0; right: 0; }' +
	'figure[class*=easyimage-gradient] figcaption { position: relative; z-index: 2; }' +
	'.easyimage-gradient-1::before { background-image: linear-gradient( 135deg, rgba( 115, 110, 254, 0 ) 0%, rgba( 66, 174, 234, .72 ) 100% ); }' +
	'.easyimage-gradient-2::before { background-image: linear-gradient( 135deg, rgba( 115, 110, 254, 0 ) 0%, rgba( 228, 66, 234, .72 ) 100% ); }');

CKEDITOR.replace('edit_frame', {
	extraPlugins: 'print,pagebreak,pastefromword,format,font,copyformatting,colorbutton,justify,easyimage,tableresize,embed,emoji',
	removePlugins: 'image',
	toolbar: [
		{
			name: 'document',
			items: ['Print','PageBreak']
		},
		{
			name: 'clipboard',
			items: ['Paste', 'PasteFromWord', 'Undo', 'Redo', 'CopyFormatting']
		},
		{
			name: 'styles',
			items: ['Format', 'Font', 'FontSize']
		},
		{
			name: 'colors',
			items: ['TextColor', 'BGColor']
		},
		{
			name: 'basicstyles',
			items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat']
		},
		{
			name: 'align',
			items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
		},
		{
			name: 'paragraph',
			items: ['NumberedList', 'BulletedList', 'Outdent', 'Indent', 'Blockquote']
		},
		{
			name: 'links',
			items: ['Link', 'Unlink', 'EmojiPanel']
		},
		{
			name: 'insert',
			items: ['EasyImageUpload', 'Embed', 'Table']
		},
		{
			name: 'tools',
			items: ['Maximize']
		},
		{
			name: 'editing',
			items: ['Scayt']
		}

	],
	height: 630,

	//Embed resources
	embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',
	// image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],
	// image2_disableResizer: false,

	//Easy image
	cloudServices_uploadUrl: 'https://33333.cke-cs.com/easyimage/upload/',
	cloudServices_tokenUrl: 'https://33333.cke-cs.com/token/dev/ijrDsqFix838Gh3wGO3F77FSW94BwcLXprJ4APSp3XQ26xsUHTi0jcb1hoBt',
	easyimage_styles: {
		gradient1: {
			group: 'easyimage-gradients',
			attributes: {
				'class': 'easyimage-gradient-1'
			},
			label: 'Blue Gradient',
			icon: 'https://ckeditor.com/docs/ckeditor4/4.13.1/examples/assets/easyimage/icons/gradient1.png',
			iconHiDpi: 'https://ckeditor.com/docs/ckeditor4/4.13.1/examples/assets/easyimage/icons/hidpi/gradient1.png'
		},
		gradient2: {
			group: 'easyimage-gradients',
			attributes: {
				'class': 'easyimage-gradient-2'
			},
			label: 'Pink Gradient',
			icon: 'https://ckeditor.com/docs/ckeditor4/4.13.1/examples/assets/easyimage/icons/gradient2.png',
			iconHiDpi: 'https://ckeditor.com/docs/ckeditor4/4.13.1/examples/assets/easyimage/icons/hidpi/gradient2.png'
		},
		noGradient: {
			group: 'easyimage-gradients',
			attributes: {
				'class': 'easyimage-no-gradient'
			},
			label: 'No Gradient',
			icon: 'https://ckeditor.com/docs/ckeditor4/4.13.1/examples/assets/easyimage/icons/nogradient.png',
			iconHiDpi: 'https://ckeditor.com/docs/ckeditor4/4.13.1/examples/assets/easyimage/icons/hidpi/nogradient.png'
		}
	},
	easyimage_toolbar: [
		'EasyImageFull',
		'EasyImageSide',
		'EasyImageGradient1',
		'EasyImageGradient2',
		'EasyImageNoGradient',
		'EasyImageAlt'
	],
});





