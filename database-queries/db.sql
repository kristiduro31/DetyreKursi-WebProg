CREATE TABLE Users (
  user_id int NOT NULL AUTO_INCREMENT,
  first_name varchar(30) NOT NULL,
  surname varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  email varchar(40) NOT NULL,
  birthday date DEFAULT NULL,
  `role` varchar(20) NOT NULL,
  telephone varchar(20),
  address varchar(40),
  PRIMARY KEY (`user_id`), UNIQUE `email_user` (`email`)) ENGINE = InnoDB;

CREATE TABLE Flight_Company(
	flight_company_id int NOT NULL AUTO_INCREMENT,
    label varchar(30) NOT NULL,
    logo varchar(250) NOT NULL,
    company_description varchar(100),
    telephone varchar(20),
    address varchar(40),
    email_company varchar(40) NOT NULL,
    PRIMARY KEY (flight_Company_id), UNIQUE `email_company` (`email_company`)) ENGINE = InnoDB;

CREATE TABLE Country(
	country_id int NOT NULL AUTO_INCREMENT,
    country_name varchar(30) NOT NULL,
    PRIMARY KEY (country_id)
);

CREATE TABLE City(
	city_id int NOT NULL AUTO_INCREMENT,
    city_name varchar(30) NOT NULL,
    country int NOT NULL,
    FOREIGN KEY (country) REFERENCES Country(country_id),
    PRIMARY KEY (city_id)
);

CREATE TABLE Airport(
	airport_id int NOT NULL AUTO_INCREMENT,
    label varchar(40) NOT NULL,
    website varchar(40),
    tel varchar(13),
    city int NOT NULL,
    FOREIGN KEY (city) REFERENCES City(city_id),
    PRIMARY KEY (airport_id)
);

CREATE TABLE Flight(
	flight_id int NOT NULL auto_increment,
    flight_description varchar(100),
    type varchar(30),
    departure datetime NOT NULL,
    airplane varchar(20),
    seats_total int NOT NULL,
    seats_left int NOT NULL,
    departure_airport int not null,
    arrival_airport int NOT NULL,
    company int NOT NULL,
    ticket_price double NOT NULL,
	FOREIGN KEY (arrival_airport) REFERENCES Airport(airport_id),
    FOREIGN KEY (departure_airport) REFERENCES Airport(airport_id),
	FOREIGN KEY (company) REFERENCES Flight_Company(flight_company_id),
    PRIMARY KEY (flight_id)
);

CREATE TABLE Booking(
	booking_id int NOT NULL auto_increment,
    booking_date date NOT NULL,
    total_price double NOT NULL,
    discount double,
    tickets int NOT NULL,
    paid boolean,
    payment_form varchar(30) NOT NULL,
    valid_until date,
    buyer int NOT NULL,
    flight int NOT NULL,
    FOREIGN KEY (buyer) REFERENCES Users(user_id),
    FOREIGN KEY (flight) REFERENCES Flight(flight_id),
    PRIMARY KEY (booking_id)
);

CREATE TABLE Airport_Space(
	airport_space_id int NOT NULL AUTO_INCREMENT,
    label varchar(20) NOT NULL,
    space_type varchar(20) NOT NULL,
    logo varchar(250) NOT NULL,
    space_description varchar(255),
    tel varchar(13) NOT NULL,
    email varchar(50) NOT NULL,
    web varchar(100),
    PRIMARY KEY (airport_space_id)
);


CREATE TABLE Bank(
    card_id int NOT NULL AUTO_INCREMENT,
    card_number varchar(20) NOT NULL UNIQUE,
    holder varchar(30) NOT NULL,
    expiration_date varchar(6) NOT NULL,
    cvc varchar(3) NOT NULL,
    PRIMARY KEY (card_id)
);