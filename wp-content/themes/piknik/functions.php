<?php
//echo '<pre>';
//var_dump($wp_query);
//echo '</pre>';
function create_post_type()
{
    register_post_type('product_menu',
        array(
            'labels'      => array(
                'name'          => __('Меню'),
                'singular_name' => __('Меню')
            ),
            'public'   => true,
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        )
    );
}

function create_taxonomy(){
    // заголовки
    $labels = array(
        'name'              => 'Категории',
        'singular_name'     => 'Категория',
        'search_items'      => 'Поиск Категории',
        'all_items'         => 'Все Категории',
        'parent_item'       => 'Родительская Категория',
        'parent_item_colon' => 'Родительская Категория:',
        'edit_item'         => 'Редактировать Категорию',
        'update_item'       => 'Обновить Категорию',
        'add_new_item'      => 'Добавить новую Категорию',
        'new_item_name'     => 'Название новой Категории',
        'menu_name'         => 'Категории',
    );
    // параметры
    $args = array(
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => $labels,
        'description'           => '', // описание таксономии
        'public'                => true,
        'publicly_queryable'    => null, // равен аргументу public
        'show_in_nav_menus'     => true, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_tagcloud'         => true, // равен аргументу show_ui
        'hierarchical'          => true,
        'update_count_callback' => '',
        'rewrite'           => array( 'slug' => 'menu' ),
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
        'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
        '_builtin'              => false,
        'show_in_quick_edit'    => null, // по умолчанию значение show_ui
    );
    register_taxonomy('product_tax', array('product_menu'), $args );
}

function my_post_image_html( $html, $post_id, $post_image_id ) {

    $html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';
    return $html;

}
//add_theme_support( 'post-thumbnails' );
add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );
add_action('init', 'create_post_type');
add_action( 'init', 'create_taxonomy', 0 );
