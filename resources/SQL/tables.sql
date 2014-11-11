CREATE TABLE person (
	id varchar(36),
	first_name varchar(31),
	last_name varchar(31),
	admin int,
	email varchar(127),
	password vasrchar(31),
	picture varchar(127),
	creator_id varchar(36)
);

CREATE TABLE person_online (
	person_id varchar(36),
	latest_online timestamp
);

CREATE TABLE groups (
	id varchar(36),
	name varchar(65),
	creator_id varchar(36),
	color varchar(31)
);

CREATE TABLE group_person (
	group_id varchar(36),
	person_id varchar(36),
	added_by_id varchar(36)
);
