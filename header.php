<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="l-header">
        <a href="<?= esc_url( home_url( '/' ) ) ?>"><h1><?php bloginfo('name'); ?></h1></a>

        <button class="c-button__menu">Menu</button>

        <!--<?//php get_search_form(); ?>-->

    </header>