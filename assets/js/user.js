$('#search-text').keyup(function () {
    var key = $(this).val()
    var major_id = $('#major_id').val()

    if (major_id != null) {
        $.ajax({
            type: 'GET',
            url: '../admin/major/searchNews',
            data: {key: key, major_id: major_id},
            dataType: 'json',
            success: function (data) {
                console.log(data)
                if (key != '' && data.length < 300) {
                    $('.news-content').html('<h3 class="text-center">Không tìm thấy bài viết nào phù hợp</h3>')
                } else {
                    $('.content-left').html(data)
                }
            }
        });
    } else {
        $.ajax({
            type: 'GET',
            url: 'index/searchNews',
            data: {key: key},
            dataType: 'json',
            success: function (data) {
                if (key != '' && data.length < 100) {
                    $('.content-left').html('<h3 class="text-center">Không tìm thấy bài viết nào phù hợp</h3>')
                } else {
                    $('.content-left').html(data)
                }
            }
        });
    }
});

$(".btn-top").click(function() {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
});