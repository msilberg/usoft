ALTER TABLE `?:currencies` CHANGE `coefficient` `coefficient` double(12,5) NOT NULL DEFAULT '1.00000';
ALTER TABLE `?:product_features_values` CHANGE `value_int` `value_int` double(12,2) DEFAULT NULL;
ALTER TABLE `?:settings_objects` CHANGE `value` `value` text NOT NULL DEFAULT '';
DROP TABLE `?:settings_vendor_values`;

INSERT INTO `?:payment_processors` (processor_id, processor, processor_script, processor_template, admin_template, callback, type) VALUES ('89', 'Vsevcredit', 'vsevcredit.php', 'cc_outside.tpl', 'vsevcredit.tpl', 'Y', 'P') ON DUPLICATE KEY UPDATE `processor_id` = `processor_id`;
INSERT INTO `?:states` (state_id, country_code, code, status) VALUES ('503', 'GB', 'IOS', 'A') ON DUPLICATE KEY UPDATE `state_id` = `state_id`;
DELETE FROM `?:settings_objects` WHERE object_id='92';
DELETE FROM `?:settings_objects` WHERE object_id='142';
DELETE FROM `?:settings_objects` WHERE object_id='181';

DELETE FROM ?:payment_descriptions WHERE payment_id IN (
	SELECT p.payment_id FROM ?:payments p LEFT JOIN ?:payment_processors pp ON pp.processor_id = p.processor_id WHERE pp.processor_script IN (
		'assist.php',
		'qiwi.php',
		'pay_at_home.php',
		'rbk.php',
		'robokassa.php',
		'webmoney.php',
		'vsevcredit.php',
		'kupivkredit.php'
	)
);

DELETE ?:payments FROM ?:payments LEFT JOIN ?:payment_processors pp ON pp.processor_id = ?:payments.processor_id WHERE pp.processor_script IN (
		'assist.php',
		'qiwi.php',
		'pay_at_home.php',
		'rbk.php',
		'robokassa.php',
		'webmoney.php',
		'vsevcredit.php',
		'kupivkredit.php'
);

DELETE FROM ?:payment_processors WHERE processor_script IN (
		'assist.php',
		'qiwi.php',
		'pay_at_home.php',
		'rbk.php',
		'robokassa.php',
		'webmoney.php',
		'vsevcredit.php',
		'kupivkredit.php'
);

DELETE FROM ?:settings_objects WHERE object_id = 276;
DELETE FROM ?:settings_descriptions WHERE object_id = 276 AND object_type = 'O';

DELETE FROM ?:shipping_descriptions WHERE shipping_id IN (
	SELECT s.shipping_id FROM ?:shippings s LEFT JOIN ?:shipping_services ss ON ss.service_id = s.service_id WHERE ss.module IN (
		'ems'
	)
);

DELETE ?:shippings FROM ?:shippings LEFT JOIN ?:shipping_services ss ON ss.service_id = ?:shippings.service_id WHERE ss.module IN (
	'ems'
);

DELETE FROM ?:shipping_service_descriptions WHERE service_id IN (
	SELECT service_id FROM ?:shipping_services WHERE module IN (
		'ems'
	)
);

DELETE FROM ?:shipping_services WHERE module IN (
	'ems'
);