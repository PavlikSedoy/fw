$(function () {
    $('#send').click(function () {
        $.ajax({
            url: '/main/test',
            type: 'post',
            data: {id:2},
            success: function (data) {
                console.log(data);
            },
            error: function () {
                alert('Error!');
            }
        });
    });
});