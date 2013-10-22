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

use Tygh\StoreImport\General;
use Tygh\Registry;
use Tygh\Settings;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

$si_data = unserialize(Settings::instance()->getValue('si_data', 'store_import'));
$store_data = !empty($si_data['store_data']) ? $si_data['store_data'] : array('type' => 'local', 'path' =>'');
$step = !empty($si_data['step']) ? $si_data['step'] : 1;

if (empty($action)) {
    $action = 'step_' . $step;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($action == 'step_1') {
        $step = 1;
    } elseif ($action == 'step_2') {
        $store_data['type'] = 'local';
        $store_data['path'] = !empty($_REQUEST['store_data']['path']) ? fn_remove_trailing_slash($_REQUEST['store_data']['path']) : $store_data['path'];

        if (!empty($store_data['path']) && is_dir($store_data['path'])) {
            $config = General::getConfig($store_data['path']);
            if ($config !== false) {
                $store_data = fn_array_merge($store_data, $config);
                $store_data['new_storefront_url'] = str_replace('http://', '', Registry::get('config.http_location'));
                $store_data['new_secure_storefront_url'] = str_replace('http://', '', Registry::get('config.https_location'));
                $step = 2;
                if (!General::checkEditionMapping($store_data)) {
                    fn_set_notification('E', __('error'), __('store_import.edition_mapping_failed'));
                    $step = 1;
                } elseif (!General::testDatabaseConnection($store_data)) {
                    fn_set_notification('E', __('error'), __('store_import.cannot_connect_to_database_server'));
                    $step = 1;
                } elseif (!General::checkLicense($store_data)) {
                    fn_set_notification('E', __('error'), __('store_import.invalid_license'));
                    $step = 1;
                }
            } else {
                fn_set_notification('E', __('error'), __('store_import.this_is_not_cart_path'));
            }
        } else {
            fn_set_notification('E', __('error'), __('store_import.path_does_not_exist'));
            $step = 1;
        }
    } elseif ($action == 'step_3') {
        $step = 3;
        if (empty($store_data['path']) || !is_dir($store_data['path'])) {
            fn_set_notification('E', __('error'), __('store_import.path_does_not_exist'));
            $step = 2;
        }

        if (!General::testDatabaseConnection($store_data)) {
            fn_set_notification('E', __('error'), __('store_import.cannot_connect_to_database_server'));
            $step = 2;
        } elseif (!General::testTablePrefix($store_data)) {
            fn_set_notification('E', __('error'), __('store_import.wrong_table_prefix'));
            $step = 2;
        } elseif (!General::testStoreConfiguration($store_data)) {
            fn_set_notification('E', __('error'), __('store_import.configuration_test_failed'));
            $step = 2;
        } elseif (!General::checkEditionMapping($store_data)) {
            fn_set_notification('E', __('error'), __('store_import.edition_mapping_failed'));
            $step = 1;
        }
    } elseif ($action == 'step_4') {
        $step4_notification = General::getNotification($store_data);
        Registry::get('view')->assign('step4_notification', $step4_notification);
        $step = 4;
    } elseif ($action == 'step_5') {
        if (!General::testDatabaseConnection($store_data)) {
            fn_set_notification('E', __('error'), __('store_import.cannot_connect_to_database_server'));
        }
        if (!General::checkCompanyCount($store_data)) {
            Registry::get('view')->assign('check_company_count_failed', true);
        }
        $step = 5;
    } elseif ($action == 'actualize') {
        $enable_import = true;
        if (!General::testDatabaseConnection($store_data)) {
            fn_set_notification('E', __('error'), __('store_import.cannot_connect_to_database_server'));
            $enable_import = false;
        }
        if (!General::checkCompanyCount($store_data)) {
            fn_set_notification('E', __('error'), __('store_import.check_company_count_failed'));
            $enable_import = false;
        }
        if ($enable_import) {
            if (General::import($store_data, true)) {
                $si_data['store_data'] = $store_data;
                $si_data['step'] = 5;
                $si_data['import_date'] = time();
                General::updateStoreimportSetting($si_data);
                fn_set_notification('N', __('notice'), __('store_import.actualization_completed'), 'S');
            } else {
                fn_set_notification('E', __('error'), __('store_import.actualization_failed'));
            }
        }

        if (defined('AJAX_REQUEST')) {
            Registry::get('ajax')->assign('non_ajax_notifications', true);
            Registry::get('ajax')->assign('force_redirection', fn_url('store_import.index.step_5'));
        }

        return array(CONTROLLER_STATUS_REDIRECT, 'store_import.index.step_5');

    } elseif ($action == 'step_6') {
        $step = 6;
        $si_data['store_data'] = $store_data;
        $si_data['step'] = $step;
        $si_data['import_date'] = time();
        General::updateStoreimportSetting($si_data);
    } elseif ($action == 'step_7') {
        //Click to Start new store import. We should reset si data to default.
        Settings::instance()->updateValue('si_data', 'a:1:{s:11:"import_date";s:0:"";}', 'store_import');
        return array(CONTROLLER_STATUS_REDIRECT, 'store_import.index.step_1');
    }
}

if ($step == '2') {
    if (!General::testDatabaseConnection($store_data)) {
        fn_set_notification('E', __('error'), __('store_import.cannot_connect_to_database_server'));
    }
    Registry::get('view')->assign('companies_count_from', count(General::getCompanies($store_data)));
    General::connectToOriginalDB();
}

if ($step == '3') {
    $import_result = General::import($store_data);
    if ($import_result) {
        $si_data['store_data'] = $store_data;
        $si_data['step'] = $step;
        $si_data['import_date'] = time();
        General::updateStoreimportSetting($si_data);

        if (defined('AJAX_REQUEST')) {
            Registry::get('ajax')->assign('non_ajax_notifications', true);
            Registry::get('ajax')->assign('force_redirection', fn_url('store_import.index.step_4'));
        }

        return array(CONTROLLER_STATUS_REDIRECT, 'store_import.index.step_4');
    } else {
        fn_set_notification('E', __('error'), __('store_import.import_failed'));
    }
}

$si_data = unserialize(Settings::instance()->getValue('si_data', 'store_import'));
$si_data['store_data'] = $store_data;
$si_data['step'] = $step;
General::updateStoreimportSetting($si_data);

if ($step !== 1) {
    list($text_from, $text_to) = General::getFromToText($store_data);
    Registry::get('view')->assign('text_from', $text_from);
    Registry::get('view')->assign('text_to', $text_to);
}
Registry::get('view')->assign('step', $step);
Registry::get('view')->assign('import_date', $si_data['import_date']);
Registry::get('view')->assign('store_data', $store_data);
Registry::get('view')->assign('steps', array(
    '1' => array(
        'name' => __('store_import.first_step'),
        'href' => '',
    ),
    '2' => array(
        'name' => __('store_import.second_step'),
        'href' => '',
    ),
    '4' => array(
        'name' => __('store_import.configure_store'),
        'href' => fn_url('store_import.index.step_4'),
    ),
    '5' => array(
        'name' => __('store_import.actualize_data'),
        'href' => fn_url('store_import.index.step_5'),
    ),
    '6' => array(
        'name' => __('store_import.finish_store'),
        'href' => fn_url('store_import.index.step_6'),
    ),
));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (defined('AJAX_REQUEST')) {
        exit;
    }
}
