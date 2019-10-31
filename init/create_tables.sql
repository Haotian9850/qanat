CREATE DATABASE qanat;

use qanat;

create table Station(
  station_ID int not null AUTO_INCREMENT,
  num_plugs int not null,
  location varchar(50),
  primary key (station_ID)
);


create table Plug_Model(
  model_no varchar(50) not null,
  charge_speed int not null,
  primary key (model_no)
);


create table Plug(
  serial_no varchar(50) not null,
  model_no varchar(50) not null,
  primary key (serial_no),
  constraint fk_plug_plug_type
    foreign key (model_no) references Plug_Model(model_no)
);


create table Car_Type(
  make varchar(50) not null,
  model varchar(50) not null,
  year int not null,
  primary key (make,model,year)
);


create table Vehicle(
  VIN varchar(50) not null,
  make varchar(50) not null,
  model varchar(50) not null,
  year int not null,
  primary key (VIN),
  constraint fk_vehicle_car_type
    foreign key (make,model,year) references Car_Type(make,model,year)
);


create table User(
  user_id int not null AUTO_INCREMENT,
  username varchar(50) not null,
  password varchar(76) not null,
  primary key (user_id)
);


create table Review(
  review_id int not null AUTO_INCREMENT,
  text varchar(100) not null,
  rating int not null,
  primary key (review_id)
);


create table Charge_Event(
  VIN varchar(50) not null,
  dt_start DATETIME not null,
  dt_end DATETIME not null,
  primary key (VIN,dt_start),
  constraint fk_charge_event_vehicle
  foreign key (VIN) references Vehicle(VIN)
);


create table Hosts(
  serial_no varchar(50) not null,
  station_ID int not null,
  primary key (serial_no),
  constraint fk_hosts_plug
    foreign key (serial_no) references Plug(serial_no),
  constraint fk_hosts_station
    foreign key (station_ID) references Station(station_ID)
);


create table Supports(
  model_no varchar(50) not null,
  make varchar(50) not null,
  model varchar(50) not null,
  year int not null,
  primary key (model_no,make,model,year),
  constraint fk_supports_plug_model
    foreign key (model_no) references Plug_Model(model_no),
  constraint fk_supports_car_type
    foreign key (make,model,year) references Car_Type(make,model,year)
);


create table Owns(
  VIN varchar(50) not null,
  user_id int not null,
  primary key (VIN,user_id),
  constraint fk_owns_vehicle
    foreign key (VIN) references Vehicle(VIN),
  constraint fk_owns_user
    foreign key (user_id) references User(user_id)
);


create table Makes(
  review_id int not null,
  user_id int not null,
  primary key (review_id),
  constraint fk_makes_review
    foreign key (review_id) references Review(review_id),
  constraint fk_makes_user
    foreign key (user_id) references User(user_id)

);


create table Happens_At(
  VIN varchar(50) not null,
  dt_start timestamp not null,
  serial_no varchar(50) not null,
  primary key (VIN,dt_start),
  constraint fk_happens_at_plug
    foreign key (serial_no) references Plug(serial_no),
  constraint fk_happens_at_charge_event
    foreign key (VIN,dt_start) references Charge_Event(VIN,dt_start)
);

