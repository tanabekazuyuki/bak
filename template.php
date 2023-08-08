<?php
// template.php

// 設定の保存処理
if (isset($_POST['head_code']) && isset($_POST['footer_code'])) {

    // スラッシュが削除された値を保存
    update_option('custom_head_code', wp_unslash($_POST['head_code']));
    update_option('custom_footer_code', wp_unslash($_POST['footer_code']));

    echo '<div id="message" class="updated notice is-dismissible"><p>Settings saved.</p></div>';
}

// 設定フォームを表示
$head_code = get_option('custom_head_code', '');
$footer_code = get_option('custom_footer_code', '');

?>

<div class="wrap-custom">
    <h1>Custom Head Footer</h1>
    <form method="post">
        <h2>Head Code</h2>
        <textarea name="head_code" rows="10" cols="50"><?= $head_code ?></textarea>
        <h2>Footer Code</h2>
        <textarea name="footer_code" rows="10" cols="50"><?= $footer_code ?></textarea>
        <p><input type="submit" value="Save Changes" class="button-primary"></p>
    </form>
</div>