<div class="head-content">
    <div class="title"><?= $news['title']?></div>
    <div class="share">
        <div class="fb-share-button"
             data-href="<?= $_SERVER['QUERY_STRING'] ?>"
             data-layout="button_count">
        </div>
    </div>
</div>
<hr>
<div class="main-content" style="max-width: 100%;">
    <?= $news['content'] ?>
</div>
<hr>
<div class="fb-comments" data-href="<?= base_url('bai-viet/' . $news['news_id'])?>" data-width="100%" data-numposts="10"></div>