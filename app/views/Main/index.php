<div class="container">
    <button class="btn btn-default" id="send">Кнопка</button>
    <?php if (!empty($posts)): ?>
        <?php foreach ($posts as $post): ?>
            <div class="panel panel-default">
                <div class="panel-heading"><?=$post['name']?></div>
                <div class="panel-body">
                    <?=$post['description']?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<!--script src="/js/test.js"></script-->
<script>
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
</script>