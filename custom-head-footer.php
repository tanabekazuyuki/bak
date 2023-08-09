<?php
/**
 * Plugin Name: Custom Head Footer
 * Description: ヘッドとフッターにコードを追加および編集できます。
 * Version: 1.0
 * Released: 2023/05/17
 * Author: Tanabe Kazuyuki
 * Author URI:
 */
defined('ABSPATH') or die("Direct access is not allowed.");

//CSSファイルを読み込む
function custom_head_footer_enqueue_styles() {
    wp_enqueue_style('custom-Head-footer', plugin_dir_url(__FILE__) . 'style.min.css');
}
add_action('admin_enqueue_scripts', 'custom_head_footer_enqueue_styles');

// 管理画面での設定ページを追加
function custom_head_footer_menu() {
    add_options_page(
        'Custom Head Footer', //管理メニュータイトル
        'Custom Head Footer', //ページタイトル
        'manage_options', // 権限
        'custom-Head-footer', //スラッグ
        'custom_head_footer_options_page' //表示する関数（設定ページのコンテンツ）
    );
}
add_action('admin_menu', 'custom_head_footer_menu');

// 設定ページのコンテンツを表示
function custom_head_footer_options_page() {
    require_once(plugin_dir_path(__FILE__) . 'template.php');
}

// headにカスタムコードを挿入
function custom_head_code() {
    $head_code = get_option('custom_head_code', '');
    echo "<!-- Head Code -->\n$head_code\n";
}
add_action('wp_head', 'custom_head_code');

// footerにカスタムコードを挿入
function custom_footer_code() {
    $footer_code = get_option('custom_footer_code', '');
    echo "<!-- Footer Code -->\n$footer_code\n";
}
add_action('wp_footer', 'custom_footer_code');
