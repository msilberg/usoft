<?php
/***************************************************************************
*                                                                          *
*   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
*                                                                          *
* This  is  commercial  software,  only  users  who have purchased a valid *
* license  and  accept  to the terms of the  License Agreement can install *
* and use this program.                                                    *
*                                                                          *
****************************************************************************
* PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
* "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
****************************************************************************/

namespace Tygh\Themes;

use Tygh\Registry;

class Patterns
{
    /**
     * Gets theme patterns
     * @return array theme patterns
     */
    public static function get()
    {
        $url = Registry::get('config.current_location') . '/' . fn_get_theme_path('[relative]/[theme]/media/images/patterns/');

        $patterns = self::getPath();

        return fn_get_dir_contents($patterns, false, true, '', $url);
    }

    /**
     * Saves uploaded pattern to theme
     * @param  array $uploaded_data uploaded data
     * @param  array $preset        preset
     * @return array modified preset
     */
    public static function save($uploaded_data, $preset)
    {
        $patterns = self::getPath();
        if (!is_dir($patterns)) {
            fn_mkdir($patterns);
        }

        foreach ($uploaded_data as $var => $file) {
            $fname = $var . '.' . fn_get_file_ext($file['name']);

            if (fn_copy($file['path'], $patterns . '/' . $fname)) {
                $preset['data'][$var] = "url('../media/images/patterns/" . $fname . "')";
            }
        }

        return $preset;
    }

    /**
     * Gets patterns absolute path
     * @return string patterns absolute path
     */
    public static function getPath()
    {
        return fn_get_theme_path('[themes]/[theme]/media/images/patterns');
    }

    /**
     * Gets patterns relative (to css files) path
     * @return string patterns relative path
     */
    public static function getRelPath()
    {
        return '../media/images/patterns';
    }
}
