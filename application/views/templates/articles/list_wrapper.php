<div class="center_side clear">

    <div class="page_header clearfix">

        <div class="follow_us fl_r">
            Мы завели канал в Телеграме, где будем анонсировать новые статьи, конкурсы, наши новости и инсайды. Подписывайтесь!<br />
            <a href="//telegram.me/codex_team" target="_blank"><i class="icon_telegram"></i><span>CodeX on Telegram</span></a>
        </div>

        <h1>Статьи команды CodeX</h1>
        <div class="description">
            Здесь собраны наши заметки о приобретенном опыте и результатах наших экспериментов. А еще так мы учимся писать интересные и грамотные тексты.
        </div>
    </div>

    <?= View::factory('templates/articles/list', array( 'articles' => $articles )); ?>

</div>