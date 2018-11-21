<?php ter_template_comment(__FILE__) ?>
<?php require(TER_CHILD_INCLUDES . 'kanji-generator.php') ?>
<?php $kanji_generator = new KanjiGenerator() ?>
<aside id="secondary" class="<?php echo TER_SECONDARY_CLASS ?> widget-area" role="complementary">
    <?php if(!dynamic_sidebar('sidebar-3')): ?>
    <div id="archives" class="widget">
        <h3 class="widget-title"><?php _e('Archives','terra') ?></h3>
        <ul><?php wp_get_archives(array('type' => 'monthly')) ?></ul>
    </div>
    <div id="meta" class="widget">
        <h3 class="widget-title"><?php _e('Meta','terra') ?></h3>
        <ul>
            <?php wp_register() ?>
            <li><?php wp_loginout() ?></li>
            <?php wp_meta() ?>
        </ul>
    </div>
    <?php endif ?>
    <?php $kanji_generator->print_random_kanji() ?>
    <div class="text-center margin-top pad-top"><a href="/contact-kuesuto/" class="btn btn-default">Feedback</a></div>
</aside><!-- #secondary -->