<?php
defined('EMLOG_ROOT') || exit('access denied!');

function plugin_setting_view() {
    $plugin_storage = Storage::getInstance('hc_led');
    $message = $plugin_storage->getValue('message');
    ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">跑马灯公告</h1>
    </div>
    <div class="card shadow mb-4 mt-2">
        <div class="card-body">
            <form method="post" id="tips_form" action="./plugin.php?plugin=hc_led&action=setting">
                <div class="form">
                    <div style="margin-bottom:20px;"><textarea name="message" class="form-control" style="width: 300px;height:200px;"><?= $message ?></textarea></div>
                    <div><input type="submit" class="btn btn-success btn-sm mx-2" value="提交"></div>
                </div>
            </form>
        </div>
    </div>
    <script>
        setTimeout(hideActived, 3600);

        $("#menu_category_ext").addClass('active');

        $("#tips_form").submit(function (event) {
            event.preventDefault();
            submitForm("#tips_form");
        });
    </script>
<?php }

function plugin_setting() {
    $message = Input::postStrVar('message');

    $plugin_storage = Storage::getInstance('hc_led');
    $plugin_storage->setValue('message', $message);
    Output::ok();
}
