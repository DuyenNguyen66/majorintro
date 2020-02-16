$('#search-text').keyup(function () {
    var key = $(this).val();

    $.ajax({
        type: 'GET',
        url: 'index/searchNews',
        data: {key: key},
        dataType: 'json',
        success: function (data) {
            if(key != '' && data.length < 100) {
                $('.content-left').html('<h3 class="text-center">Không tìm thấy bài viết nào phù hợp</h3>')
            }else {
                $('.content-left').html(data)
            }
        }
    });
});