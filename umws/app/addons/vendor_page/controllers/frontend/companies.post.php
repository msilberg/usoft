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

use Tygh\Registry;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

if ($mode == 'view') {
    $company_id = $_REQUEST['company_id'];
    if (!empty($company_id)) {
        $navigation_tabs = Registry::get('navigation.tabs');
        $navigation_tabs['categories'] = array(
            'title' => __('categories_company'),
            'js' => true
        );

        $brands = db_query('SELECT cp.product_id, cpfv.variant_id, cpfvd.variant, cil.image_id, ci.image_path, ci.image_x, ci.image_y
                FROM ?:products AS cp
                LEFT JOIN ?:product_features_values as cpfv ON cpfv.product_id = cp.product_id
                LEFT JOIN ?:product_feature_variant_descriptions as cpfvd ON cpfvd.variant_id = cpfv.variant_id
                LEFT JOIN ?:images_links as cil ON cil.object_id = cpfv.variant_id AND cil.object_type = "feature_variant"
                LEFT JOIN ?:images as ci ON ci.image_id = cil.image_id
                WHERE cp.company_id = ?i AND cpfv.feature_id = 18 GROUP BY cpfv.variant_id', $company_id);
        if($brands) {
            $navigation_tabs['brands'] = array(
                'title' => __('brands_company'),
                'js' => true
            );
            Registry::get('view')->assign('company_brands', $brands);
        }

        Registry::set('navigation.tabs', $navigation_tabs);
    }
}
