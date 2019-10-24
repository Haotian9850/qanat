use ns9wr_qanat;

-- Station(station_ID,num_plugs,location)
create table Station(
  station_ID int not null AUTO_INCREMENT,
  num_plugs int not null,
  location varchar(50),
  primary key (station_ID)
);

-- Plug_Model(model_no, charge_speed)
create table Plug_Model(
  model_no varchar(50) not null,
  charge_speed int not null,
  primary key (model_no)
);

-- Plug(serial_no, model_no)
create table Plug(
  serial_no varchar(50) not null,
  model_no varchar(50) not null,
  primary key (serial_no),
  constraint fk_plug_plug_type
    foreign key (model_no) references Plug_Model(model_no)
);

-- Car_Type(year,make,model)
create table Car_Type(
  make varchar(50) not null,
  model varchar(50) not null,
  year int not null,
  primary key (make,model,year)
);

-- Vehicle(VIN,year,make,model)
create table Vehicle(
  VIN varchar(50) not null,
  make varchar(50) not null,
  model varchar(50) not null,
  year int not null,
  primary key (VIN),
  constraint fk_vehicle_car_type
    foreign key (make,model,year) references Car_Type(make,model,year)
);

-- User(user_id,username)
create table User(
  user_id int not null AUTO_INCREMENT,
  username varchar(50) not null,
  primary key (user_id)
);

-- Review(review_id,text,rating)
create table Review(
  review_id int not null AUTO_INCREMENT,
  text varchar(100) not null,
  rating int not null,
  primary key (review_id)
);

-- Charge_Event(VIN, dt_start, dt_end)
create table Charge_Event(
  VIN varchar(50) not null,
  dt_start date not null,
  dt_end date not null,
  primary key (VIN,dt_start),
  constraint fk_charge_event_vehicle
    foreign key (VIN) references Vehicle(VIN)
);

-- Hosts(serial_no, station_ID)
create table Hosts(
  serial_no varchar(50) not null,
  station_ID int not null,
  primary key (serial_no),
  constraint fk_hosts_plug
    foreign key (serial_no) references Plug(serial_no),
  constraint fk_hosts_station
    foreign key (station_ID) references Station(station_ID)
);

-- Supports(model_no,year,make,model)
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

-- Owns(VIN, user_id)
create table Owns(
  VIN varchar(50) not null,
  user_id int not null,
  primary key (VIN,user_id),
  constraint fk_owns_vehicle
    foreign key (VIN) references Vehicle(VIN),
  constraint fk_owns_user
    foreign key (user_id) references User(user_id)
);

-- Makes(review_id, user_id)
create table Makes(
  review_id int not null,
  user_id int not null,
  primary key (review_id),
  constraint fk_makes_review
    foreign key (review_id) references Review(review_id),
  constraint fk_makes_user
    foreign key (user_id) references User(user_id)

);

-- Happens_At(VIN, dt_start, serial_no)
create table Happens_At(
  VIN varchar(50) not null,
  dt_start date not null,
  serial_no varchar(50) not null,
  primary key (VIN,dt_start),
  constraint fk_happens_at_plug
    foreign key (serial_no) references Plug(serial_no),
  constraint fk_happens_at_charge_event
    foreign key (VIN,dt_start) references Charge_Event(VIN,dt_start)
);

-- ------------------------------------
-- For demo. Delete if used:
-- desc Station;
-- desc Plug;
-- desc Plug_Model;
-- desc Car_Type;
-- desc Vehicle;
-- desc User;
-- desc Review;
-- desc Charge_Event;
-- desc Hosts;
-- desc Supports;
-- desc Owns;
-- desc Makes;
-- desc Happens_At;
-- source destroy_database.sql
