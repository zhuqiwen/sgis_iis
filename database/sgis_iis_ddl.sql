DROP TABLE IF EXISTS contact;

CREATE TABLE contact(
  id INTEGER AUTO_INCREMENT NOT NULL,
  first_name VARCHAR(255) NOT NULL,
  middle_name VARCHAR(255) DEFAULT NULL,
  last_name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  phone_home VARCHAR(255) DEFAULT NULL,
  phone_mobile VARCHAR(255) DEFAULT NULL,
  address_country VARCHAR(255) DEFAULT NULL,
  address_state VARCHAR(255) DEFAULT NULL,
  address_city VARCHAR(255) DEFAULT NULL,
  address_line1 VARCHAR(255) DEFAULT NULL,
  address_line2 VARCHAR(255) DEFAULT NULL,
  address_zip VARCHAR(255) DEFAULT NULL,
  no_email TINYINT(1) DEFAULT 0,
  no_phone_call TINYINT(1) DEFAULT 0,
  no_mail TINYINT(1) DEFAULT 0,
  iuaa_member TINYINT(1) DEFAULT 0,
  share_with_iuaa TINYINT(1) DEFAULT 0,
  created DATETIME NOT NULL,
  modified DATETIME ON UPDATE current_timestamp,
  deleted DATETIME DEFAULT NULL,
  PRIMARY KEY (id)
);
DROP TABLE IF EXISTS employer_type;

CREATE TABLE employer_type(
  id INTEGER AUTO_INCREMENT NOT NULL,
  type VARCHAR(255) NOT NULL,
  created DATETIME NOT NULL,
  modified DATETIME ON UPDATE current_timestamp,
  deleted DATETIME DEFAULT NULL,
  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS employer;

CREATE TABLE employer(
  id INTEGER AUTO_INCREMENT NOT NULL,
  name VARCHAR(255) NOT NULL,
  web_address VARCHAR(255) NOT NULL,
  type_id INTEGER,
  created DATETIME NOT NULL,
  modified DATETIME ON UPDATE current_timestamp,
  deleted DATETIME DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (type_id) REFERENCES employer_type(id)
);

DROP TABLE IF EXISTS employment;

CREATE TABLE employment(
  id INTEGER AUTO_INCREMENT NOT NULL,
  contact_id INTEGER,
  employer_id INTEGER,
  job_title VARCHAR(255) NOT NULL,
  country VARCHAR(255) DEFAULT NULL,
  state VARCHAR(255) DEFAULT NULL,
  city VARCHAR(255) DEFAULT NULL,
  created DATETIME NOT NULL,
  modified DATETIME ON UPDATE current_timestamp,
  deleted DATETIME DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (contact_id) REFERENCES contact(id),
  FOREIGN KEY (employer_id) REFERENCES employer(id)
);

DROP TABLE IF EXISTS engagement_indicator;

CREATE TABLE engagement_indicator(
  id INTEGER AUTO_INCREMENT NOT NULL,
  name VARCHAR(255) NOT NULL,
  created DATETIME NOT NULL,
  modified DATETIME ON UPDATE current_timestamp,
  deleted DATETIME DEFAULT NULL,
  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS engagement;

CREATE TABLE engagement(
  id INTEGER AUTO_INCREMENT NOT NULL,
  contact_id INTEGER,
  indicator_id INTEGER,
  created DATETIME NOT NULL,
  modified DATETIME ON UPDATE current_timestamp,
  deleted DATETIME DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (contact_id) REFERENCES contact(id),
  FOREIGN KEY (indicator_id) REFERENCES engagement_indicator(id)
);

DROP TABLE IF EXISTS study_field;

CREATE TABLE study_field(
  id INTEGER AUTO_INCREMENT NOT NULL,
  field VARCHAR(255) NOT NULL,
  created DATETIME NOT NULL,
  modified DATETIME ON UPDATE current_timestamp,
  deleted DATETIME DEFAULT NULL,
  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS academic_info;

CREATE TABLE academic_info(
  id INTEGER AUTO_INCREMENT NOT NULL,
  contact_id INTEGER,
  field_id INTEGER,
  class_year YEAR(4) DEFAULT NULL,
  degree VARCHAR(255) DEFAULT NULL,
  created DATETIME NOT NULL,
  modified DATETIME ON UPDATE current_timestamp,
  deleted DATETIME DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (contact_id) REFERENCES contact(id),
  FOREIGN KEY (field_id) REFERENCES study_field(id)
);

DROP TABLE IF EXISTS event;

CREATE TABLE event(
  id INTEGER AUTO_INCREMENT NOT NULL,
  name VARCHAR(255) NOT NULL,
  date DATE DEFAULT NULL,
  country VARCHAR(255) DEFAULT NULL,
  state VARCHAR(255) DEFAULT NULL ,
  city VARCHAR(255) DEFAULT NULL ,
  created DATETIME NOT NULL,
  modified DATETIME ON UPDATE current_timestamp,
  deleted DATETIME DEFAULT NULL,
  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS event_attendance;

CREATE TABLE event_attendance(
  id INTEGER AUTO_INCREMENT NOT NULL,
  contact_id INTEGER,
  event_id INTEGER,
  created DATETIME NOT NULL,
  modified DATETIME ON UPDATE current_timestamp,
  deleted DATETIME DEFAULT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (contact_id) REFERENCES contact(id),
  FOREIGN KEY (event_id) REFERENCES event(id)
);

