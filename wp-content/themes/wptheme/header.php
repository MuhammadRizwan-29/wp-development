<header>
    <div class="header__logo">
        <img src="<?php header_image(); ?>"
            width="<?php echo absint(get_custom_header( )->width); ?>"
            height="<?php echo absint(get_custom_header( )->height); ?>"
        />
    </div>
    <h1><em>Header</em></p>
    <?php wp_head( ); ?>
</header>
