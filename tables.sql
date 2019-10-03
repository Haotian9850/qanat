CREATE DATABASE cs4750;

USE cs4750;

CREATE TABLE IF NOT EXISTS users(
    user_id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    PRIMARY KEY(user_id)
);

CREATE TABLE IF NOT EXISTS vehicles(
    car_id INT NOT NULL AUTO_INCREMENT,
    vin VARCHAR(255) NOT NULL,
    make VARCHAR(255) NOT NULL,
    model VARCHAR(255) NOT NULL 
    year INT NOT NULL,
    PRIMARY KEY(car_id)
);

CREATE TABLE IF NOT EXISTS plugs(
    plug_id INT NOT NULL AUTO_INCREMENT,
    model_no BIGINT NOT NULL,
    charge_sppend FLOAT NOT NULL,
    PRIMARY KEY(serial_no)
);

CREATE TABLE IF NOT EXISTS supports(
    vin BIGINT NOT NULL,
    model_no BIGINT NOT NULL
);

CREATE TABLE IF NOT EXISTS charge_events(
    event_id INT NOT NULL AUTO_INCREMENT,
    dt_start DATETIME NOT NULL,
    dt_end DATETIME NOT NULL,
    PRIMARY KEY (event_id)
);

CREATE TABLE IF NOT EXISTS happens_at(
    event_id INT NOT NULL,
    plug_id INT NOT NULL
);

CREATE TABLE IF NOT EXISTS undergoes(
    vin VARCHAR(255) NOT NULL,
    event_id INT NOT NULL
);

CREATE TABLE IF NOT EXISTS users(
    user_id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    PRIMARY KEY(user_id)
);

CREATE TABLE IF NOT EXISTS owns(
    user_id INT NOT NULL,
    car_id INT NOT NULL
);

CREATE TABLE IF NOT EXISTS stations(
    station_id INT NOT NULL AUTO_INCREMENT,
    num_plugs INT NOT NULL,
    location VARCHAR(255) NOT NULL,
    PRIMARY KEY (station_id)
);

CREATE TABLE IF NOT EXISTS hosts(
    station_id INT NOT NULL,
    plug_id INT NOT NULL
);

CREATE TABLE IF NOT EXISTS reviews(
    review_id INT NOT NULL AUTO_INCREMENT,
    rating INT NOT NULL,
    review_text VARCHAR(1000) NOT NULL,
    PRIMARY KEY(review_id)
);

CREATE TABLE IF NOT EXISTS makes(
    user_id INT NOT NULL,
    review_id INT NOT NULL
);