<div class="container">
    <div id="answer"></div>
    <button class="btn btn-default" id="send">Кнопка</button>
    <br>
    <?php new \fw\widgets\menu\Menu([
//        'tpl' => WWW . '/menu/my_menu.php',
        'tpl' => WWW . '/menu/select.php',
        'container' => 'select',
        'class' => 'my_select',
        'table' => 'categories',
        'cache' => 60,
        'cacheKey' => 'menu_select',
    ]); ?>

<!--    --><?php //new \fw\widgets\menu\Menu([
//        'tpl' => WWW . '/menu/my_menu.php',
//        'container' => 'ul',
//        'class' => 'my_menu',
//        'table' => 'categories',
//        'cache' => 60,
//        'cacheKey' => 'menu_ul',
//    ]); ?>
    <!--  <?php //var_dump($_GET['n']); ?>  -->
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
<script src="/js/test2.js"></script>
<!--<script>-->
<!--    $(function () {-->
<!--        $('#send').click(function () {-->
<!--            $.ajax({-->
<!--                url: '/main/test',-->
<!--                type: 'post',-->
<!--                data: {id:2},-->
<!--                success: function (data) {-->
<!--                    console.log(data);-->
<!--                },-->
<!--                error: function () {-->
<!--                    alert('Error!');-->
<!--                }-->
<!--            });-->
<!--        });-->
<!--    });-->
<!--</script>-->