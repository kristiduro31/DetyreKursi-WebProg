CREATE TABLE Users (
  id int NOT NULL AUTO_INCREMENT,
  username varchar(20) NOT NULL,
  first_name varchar(20) NOT NULL,
  surname varchar(20) NOT NULL,
  user_password varchar(60) NOT NULL,
  email varchar(30) NOT NULL,
  birthday date DEFAULT NULL,
  user_role varchar(20) NOT NULL,
  tel varchar(13),
  address varchar(30),
  PRIMARY KEY (id)
);

CREATE TABLE Flight_Company(
	id int NOT NULL AUTO_INCREMENT,
    label varchar(30) NOT NULL,
    logo longblob NOT NULL,
    company_description varchar(100),
    address varchar(30),
    tel varchar(13),
    PRIMARY KEY (id)
);

CREATE TABLE Country(
	id int NOT NULL AUTO_INCREMENT,
    country_name varchar(30) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE City(
	id int NOT NULL AUTO_INCREMENT,
    city_name varchar(20) NOT NULL,
    country int NOT NULL,
    FOREIGN KEY (country) REFERENCES Country(id),
    PRIMARY KEY (id)
);

CREATE TABLE Airport(
	id int NOT NULL AUTO_INCREMENT,
    label varchar(40) NOT NULL,
    website varchar(20),
    tel varchar(13),
    city int NOT NULL,
    FOREIGN KEY (city) REFERENCES City(id),
    PRIMARY KEY (id)
);

CREATE TABLE Flight(
	id int NOT NULL auto_increment,
    flight_description varchar(100),
    departure date NOT NULL,
    airplane varchar(20),
    seats_total int NOT NULL,
    seats_left int NOT NULL,
    arrival_airport int NOT NULL,
    company int NOT NULL,
	FOREIGN KEY (arrival_airport) REFERENCES Airport(id),
	FOREIGN KEY (company) REFERENCES Flight_Company(id),
    PRIMARY KEY (id)
);

CREATE TABLE Booking(
	id int NOT NULL auto_increment,
    booking_date date NOT NULL,
    total_price double NOT NULL,
    discount double,
    tickets int NOT NULL,
    paid boolean,
    payment_form varchar(30) NOT NULL,
    valid_until date,
    buyer int NOT NULL,
    flight int NOT NULL,
    FOREIGN KEY (buyer) REFERENCES Users(id),
    FOREIGN KEY (flight) REFERENCES Flight(id),
    PRIMARY KEY (id)
);

CREATE TABLE Airport_Space(
	id int NOT NULL AUTO_INCREMENT,
    label varchar(20) NOT NULL,
    space_type varchar(20) NOT NULL,
    opening_hours varchar(10),
    logo longblob NOT NULL,
    space_description varchar(100),
    PRIMARY KEY (id)
);

CREATE TABLE Space_Service(
	id int NOT NULL AUTO_INCREMENT,
    service_label varchar(20) NOT NULL,
    space int NOT NULL,
    FOREIGN KEY (space) REFERENCES Airport_Space(id),
    PRIMARY KEY (id)
);