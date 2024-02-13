#
# Table structure for table 'tx_verowatest_domain_model_event'
#
CREATE TABLE tx_verowatest_domain_model_event (
  event_id int(11) unsigned NOT NULL,
  date_from int(11) unsigned NOT NULL,
  date_to int(11) unsigned NOT NULL,
  date_text varchar(255) NOT NULL DEFAULT '',
  hide_time tinyint(1) unsigned NOT NULL DEFAULT 0,
  title varchar(255) NOT NULL DEFAULT '',
  topic varchar(255) NOT NULL DEFAULT '',
  short_desc varchar(1024) NOT NULL DEFAULT '',
  long_desc mediumtext,
  organizer int(11) unsigned COMMENT '1:n => person.id',
  organists int(11) unsigned NOT NULL DEFAULT 0 COMMENT 'coorganizers (persons) count',
  subs_date int(11) unsigned NOT NULL,
  subs_text varchar(255) NOT NULL DEFAULT '',
  subs_person_id int(11) unsigned COMMENT '1:n => person.id',
  target_groups int(11) unsigned NOT NULL DEFAULT 0 COMMENT 'target_groups (target_groups) count',
  layers int(11) unsigned NOT NULL DEFAULT 0 COMMENT 'layers (layers) count',
  rooms int(11) unsigned NOT NULL DEFAULT 0 COMMENT 'rooms (rooms) count',
  image_url varchar(1024) NOT NULL DEFAULT '',
  image_width int(11) unsigned NOT NULL DEFAULT 0,
  image_height int(11) unsigned NOT NULL DEFAULT 0,

  UNIQUE event_id (event_id),
);

#
# Table structure for table 'tx_verowatest_domain_model_person'
#
CREATE TABLE tx_verowatest_domain_model_person (
  name varchar(255) NOT NULL DEFAULT '',
  firstname varchar(255) NOT NULL DEFAULT '',
  lastname varchar(255) NOT NULL DEFAULT '',
  person_id int(11) unsigned NOT NULL,
  phone varchar(255) NOT NULL DEFAULT '',
  profession varchar(255) NOT NULL DEFAULT '',
  email varchar(255) NOT NULL DEFAULT '',
  url varchar(1024) NOT NULL DEFAULT '',
  url_type int(11) unsigned NOT NULL,

  UNIQUE person_id (person_id),
);

#
# Table structure for table 'tx_verowatest_domain_model_room'
#
CREATE TABLE tx_verowatest_domain_model_room (
  location_name varchar(255) NOT NULL DEFAULT '',
  location_url_is_external smallint(1) unsigned NOT NULL DEFAULT '0',
  location_url varchar(1024) NOT NULL DEFAULT '',
  location_address varchar(255) NOT NULL DEFAULT '',
  location_postcode varchar(255) NOT NULL DEFAULT '',
  location_city varchar(255) NOT NULL DEFAULT '',
  name varchar(255) NOT NULL DEFAULT '',
  id int(11) unsigned NOT NULL,
  order int(11) unsigned NOT NULL,

  UNIQUE id (id),
);

#
# Table structure for table 'tx_verowatest_event_person_mm'
#
CREATE TABLE tx_verowatest_event_person_mm (
    uid_local int(11) unsigned DEFAULT 0 NOT NULL COMMENT 'tx_verowatest_domain_model_event.uid',
    uid_foreign int(11) unsigned DEFAULT 0 NOT NULL COMMENT 'tx_verowatest_domain_model_person.uid',
    sorting int(11) DEFAULT '0' NOT NULL,

--    PRIMARY KEY (uid_local,uid_foreign),
    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_verowatest_event_room_mm'
#
CREATE TABLE tx_verowatest_event_room_mm (
    uid_local int(11) unsigned DEFAULT 0 NOT NULL COMMENT 'tx_verowatest_domain_model_event.uid',
    uid_foreign int(11) unsigned DEFAULT 0 NOT NULL COMMENT 'tx_verowatest_domain_model_room.uid',
    sorting int(11) DEFAULT '0' NOT NULL,

--    PRIMARY KEY (uid_local,uid_foreign),
    KEY uid_local (uid_local),
    KEY uid_foreign (uid_foreign)
);
