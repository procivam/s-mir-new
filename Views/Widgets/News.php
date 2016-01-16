<div class="wRight">
    <div class="index news">
        <div class="title_news">новости</div>
        <div class="date_news">
            <div class="date"><?php echo date( 'd', $obj->date ); ?></div>
            <div class="mounth"><?php echo Core\Dates::shortMonth( date( 'm', $obj->date ) ); ?></div>
        </div>
        <div class="news_text">
            <a href="<?php echo Core\HTML::link('news/'.$obj->alias); ?>" class="news_title"><span><?php echo $obj->name; ?></span></a>
            <p><?php echo Core\Text::limit_words( strip_tags($obj->text), 20 ); ?></p>
            <a href="<?php echo Core\HTML::link('news/'.$obj->alias); ?>" class="next_but">подробнее</a>
        </div>
        <a href="<?php echo Core\HTML::link('news'); ?>" class="slide_but"><span>все новости</span></a>
    </div>
</div>