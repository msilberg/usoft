<?php

use Tygh\Debugger;
use Tygh\Development;
use Tygh\Less;
use Tygh\Registry;
use Tygh\Storage;

/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

function smarty_function_style($params, &$smarty)
{
    $location = Registry::get('config.current_location') . (strpos($params['src'], '/') === 0 ? '' : ('/' . fn_get_theme_path('[relative]/[theme]') . '/css'));
    $url = $location . '/' . $params['src'];

    if (Development::isEnabled('dev_css') && strpos($params['src'], '.less') !== false) {
        $relative_path = fn_get_theme_path('[relative]/[theme]/css');
        $filename = fn_get_theme_path('[themes]/[theme]') . '/css/' . $params['src'];
        $rel_filename = $relative_path . '/' . $params['src'] . '-' .  Registry::get('runtime.layout.layout_id') . '.css';

        if (Development::isEnabled('compile_check') || Debugger::isActive()) {
            $abs_filename = Storage::instance('statics')->getAbsolutePath($rel_filename);
            if (file_exists($abs_filename) && filemtime($filename) > filemtime($abs_filename)) {
                $force_update = true;
            }
        }

        if (!Storage::instance('statics')->isExist($rel_filename) || !empty($force_update)) {

            $less_output = fn_get_contents($filename);
            $less = new Less();
            $less->setImportDir(dirname($filename));

            Storage::instance('statics')->put($rel_filename, array(
                'contents' => $less->customCompile(fn_get_contents($filename), Storage::instance('statics')->getAbsolutePath(dirname($rel_filename))),
                'overwrite' => true
            ));

            fn_put_contents(fn_get_cache_path(false) . 'theme_editor/standalone.css', "\n" . $less_output, '', DEFAULT_FILE_PERMISSIONS, true);
        }

        $url = Storage::instance('statics')->getUrl($rel_filename);
    }

    return '<link type="text/css" rel="stylesheet"' . (!empty($params['media']) ? (' media="' . $params['media'] . '"') : '') .
           ' href="' . $url . '" />';

}
