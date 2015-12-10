<div class="center_side clear">
    <article class="article" itemscope itemtype="http://schema.org/Article">

        <h1 class="big_header" itemprop="name">
            <?= $article->title ?>
        </h1>

        <div class="article_info">
            <div class="ava_holder">
                <time itemprop="datePublished"><?= Date::fuzzy_span($article->dt_create) ?></time>
                <span class="list_user_ava">
                    <img src="<?= $article->author->photo ?>" alt="<?= $article->author->name ?>">
                </span>
                <a class="list_user_name" href="/user/<?= $article->author->id ?>" itemscope itmetype="http://schema.org/Person"><?= $article->author->name ?></a>
            </div>
        </div>

        <div class="article_content"  itemprop="articleBody">
            <?= nl2br($article->text) ?>
        </div>

     <? /* Comments

        <h3>Комментарии</h3>
        <? if ($comments) { foreach ($comments as $comment): ?>
            <div>
                <p>
                    <? if ($comment->user_id == $user->id) {?>
                        <a href='/comment/delete/<?= $comment->id ?>'><i class="icon-cancel"></i></a>
                    <? } ?>

                    <span class="list_user_ava">
                            <img src="<?= $comment->author->photo ?>" alt="<?= $comment->author->name ?>">
                        </span>
                    <a class="list_user_name" href="/user/<?= $comment->author->id ?>" itemscope itmetype="http://schema.org/Person"><?= $comment->author->name ?></a>
                    <?= $comment->text ?>

                </p>

            </div>
        <? endforeach; } else { ?>
            <p>Комментариев нет</p>
        <? } ?>

        <p>
            <? if ($user->id): ?>
                <h3 id="answer_username">Выскажи свое мнение</h3>

                <form method="POST" action="/comment/add">
                    <input type="hidden" name="article_id" value="<?= $article->id ?>"/>
                    <label for="blankCommentTextarea">Комментарий</label>
                    <textarea name="text" id="blankCommentTextarea" required></textarea>

                    <p>
                        <input type="submit" class="master" value="Добавить комментарий" />
                    </p>
                </form>
            <? else: ?>
                <h3>Комментарии могут оставлять только зарегистрированные пользователи</h3>
            <? endif ?>
        </p>
     */ ?>

    </article>
</div>
