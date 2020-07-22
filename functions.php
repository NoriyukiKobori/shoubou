<?php
    //add_theme_support('meuns');
    add_theme_support('title-tag');

    function hanawashouboh_title($title){
        if(is_front_page() && is_home()){
            $title = get_bloginfo('name','display');
        }elseif(is_singular()){
            $title = single_post_title('',false);
        }
        return $title;
    }
    add_filter('pre_get_document_title','hanawashouboh_title' );

    function hanawashouboh_script(){
        wp_enqueue_style('Roboto','https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap',array());
        wp_enqueue_style('mplus1p','http://mplus-webfonts.sourceforge.jp/mplus_webfonts.css',array());
        wp_enqueue_style('ress','https://unpkg.com/ress/dist/ress.min.css',array());
        wp_enqueue_style('style',get_template_directory_uri() .'/css/style.css',array());
        wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), '1.0.0');
        wp_enqueue_script('menu', get_template_directory_uri() . '/js/menu.js', array('jquery'),true);
    }
    add_action('wp_enqueue_scripts', 'hanawashouboh_script');

    function hanawashouboh_widgets_init(){
        register_sidebar( 
            array(
                'name' => 'カテゴリーウィジット',
                'id' => 'category_widget',
                'before_widget' => '<div id="%1$s" class="widget %2$s"><button class="c-button__close">閉じる</button>',
                'after_widget' => '</div>',
                'before_title' => '<h2><i class="fa fa-folder-open" aria-hidden="true"></li>',
                'after_title' => "</h2>\n",
            )
            );
    }
    add_action('widgets_init', 'hanawashouboh_widgets_init');

    add_filter( 'show_admin_bar', '__return_false' );