DROP TABLE IF exists alum_contact;

create table alum_contact(
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
DROP TABLE IF exists alum_employer_type;

create table alum_employer_type(
  id INTEGER AUTO_INCREMENT NOT NULL,
  type VARCHAR(255) NOT NULL,
  created DATETIME NOT NULL,
  modified DATETIME ON UPDATE current_timestamp,
  deleted DATETIME DEFAULT NULL,
  PRIMARY KEY (id)
);

DROP TABLE IF exists alum_employer;

create table alum_employer(
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

DROP TABLE IF exists alum_employment;

create table alum_employment(
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

DROP TABLE IF exists alum_engagement_indicator;

create table alum_engagement_indicator(
  id INTEGER AUTO_INCREMENT NOT NULL,
  name VARCHAR(255) NOT NULL,
  created DATETIME NOT NULL,
  modified DATETIME ON UPDATE current_timestamp,
  deleted DATETIME DEFAULT NULL,
  PRIMARY KEY (id)
);

DROP TABLE IF exists alum_engagement;

create table alum_engagement(
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

DROP TABLE IF exists alum_study_field;

create table alum_study_field(
  id INTEGER AUTO_INCREMENT NOT NULL,
  field VARCHAR(255) NOT NULL,
  created DATETIME NOT NULL,
  modified DATETIME ON UPDATE current_timestamp,
  deleted DATETIME DEFAULT NULL,
  PRIMARY KEY (id)
);

DROP TABLE IF exists alum_academic_info;

create table alum_academic_info(
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

DROP TABLE IF exists alum_event;

create table alum_event(
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

DROP TABLE IF exists alum_event_attendance;

create table alum_event_attendance(
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

# internship module

DROP TABLE IF EXISTS intern_students;
DROP TABLE IF EXISTS intern_organizations;
DROP TABLE IF EXISTS intern_supervisors;
DROP TABLE IF EXISTS intern_internships;
DROP TABLE IF EXISTS intern_approvals;
DROP TABLE IF EXISTS intern_site_evaluations;
DROP TABLE IF EXISTS intern_student_evaluations;




