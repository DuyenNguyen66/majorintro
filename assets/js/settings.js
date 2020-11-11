var imageLoader = document.getElementById('imagePhoto');
if (imageLoader) {
    imageLoader.addEventListener('change', handleImage, false);
}

function handleImage(e) {
    var reader = new FileReader();
    reader.onload = function (event) {

        $('#image').attr('src', event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
}

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
var base_url = window.location.origin
CKEDITOR.replace('edit_frame', {
    height: 700,
    filebrowserBrowseUrl: base_url + '/assets/plugins/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
    filebrowserUploadUrl: base_url + '/assets/plugins/responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
    filebrowserImageBrowseUrl: base_url + '/assets/plugins/responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
    embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',
    extraPlugins: 'embed, embedbase',
    removePlugins: 'iframe'
});







