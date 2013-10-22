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

ALTER TABLE `?:currencies` CHANGE `coefficient` `coefficient` double(12,5) NOT NULL DEFAULT '1.00000';
ALTER TABLE `?:product_features_values` CHANGE `value_int` `value_int` double(12,2) DEFAULT NULL;
ALTER TABLE `?:settings_objects` CHANGE `value` `value` text NOT NULL DEFAULT '';





DROP TABLE IF EXISTS ?:settings_objects_upg;
CREATE TABLE `?:settings_objects_upg` (
  `object_id` mediumint(8) unsigned NOT NULL auto_increment,
  `name` varchar(128) NOT NULL default '',
  `section_name` varchar(128) NOT NULL default '',
  `value` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`object_id`)
) Engine=MyISAM DEFAULT CHARSET UTF8;

INSERT INTO ?:settings_objects_upg
	SELECT
		?:settings_objects.object_id,
		?:settings_objects.name,
		?:settings_sections.name as section_name,
		?:settings_objects.value
	FROM ?:settings_objects
	LEFT JOIN ?:settings_sections ON ?:settings_sections.section_id = ?:settings_objects.section_id;

DELETE FROM ?:settings_descriptions WHERE object_type = 'V' AND object_id IN (
	SELECT variant_id FROM ?:settings_variants WHERE object_id IN (
		SELECT object_id FROM ?:settings_objects WHERE section_id IN (
			SELECT section_id FROM ?:settings_sections WHERE type = 'ADDON'
		)
	)
);

DELETE FROM ?:settings_descriptions WHERE object_type = 'O' AND object_id IN (
	SELECT object_id FROM ?:settings_objects WHERE section_id IN (
		SELECT section_id FROM ?:settings_sections WHERE type = 'ADDON'
	)
);

DELETE FROM ?:settings_descriptions WHERE object_type = 'S' AND object_id IN (
	SELECT section_id FROM ?:settings_sections WHERE parent_id IN (
		SELECT section_id FROM ?:settings_sections WHERE type = 'ADDON'
	)
);

DELETE FROM ?:settings_descriptions WHERE object_type = 'S' AND object_id IN (
	SELECT section_id FROM ?:settings_sections WHERE type = 'ADDON'
);

DELETE FROM ?:settings_variants WHERE object_id IN (
	SELECT object_id FROM ?:settings_objects WHERE section_id IN (
		SELECT section_id FROM ?:settings_sections WHERE type = 'ADDON'
	)
);

DELETE FROM ?:settings_objects WHERE section_id IN (
	SELECT section_id FROM ?:settings_sections WHERE type = 'ADDON'
);

DELETE s1, s2 FROM ?:settings_sections s1 LEFT JOIN ?:settings_sections as s2 ON s2.parent_id = s1.section_id WHERE s1.type = 'ADDON';
