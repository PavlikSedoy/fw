$(function () {
    $('#send').click(function () {
        $.ajax({
            url: '/main/test',
            type: 'post',
            data: {id:2},
            success: function (res) {
                $('#answer').html(res);
            },
            error: function () {
                alert('Error!');
            }
        });
    });
});