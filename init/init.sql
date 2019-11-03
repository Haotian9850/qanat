SOURCE /var/www/html/init/create_tables.sql;

INSERT INTO Station (num_plugs, location)
VALUES(   
    12,
    "Charlottesville, VA"
);

INSERT INTO Station (num_plugs, location)
VALUES(
    22,
    "Richmond, VA"
);

INSERT INTO Station (num_plugs, location)
VALUES(
    80,
    "Washington, D.C."
);

INSERT INTO Plug_Model(model_no, charge_speed)
VALUES(
    "modelnum1",
    197
);

INSERT INTO Plug_Model(model_no, charge_speed)
VALUES(
    "modelnum2",
    225
);

INSERT INTO Plug(serial_no, model_no)
VALUES(
    "plugserialno1",
    "modelnum1"
);

INSERT INTO Plug(serial_no, model_no)
VALUES(
    "plugserialno2",
    "modelnum1"
);

INSERT INTO Plug(serial_no, model_no)
VALUES(
    "plugserialno3",
    "modelnum2"
);

INSERT INTO Plug(serial_no, model_no)
VALUES(
    "plugserialno4",
    "modelnum2"
);

INSERT INTO Hosts(serial_no, station_ID)
VALUES(
    "plugserialno1",
    1
);

INSERT INTO Hosts(serial_no, station_ID)
VALUES(
    "plugserialno2",
    2
);

INSERT INTO Hosts(serial_no, station_ID)
VALUES(
    "plugserialno3",
    3
);

INSERT INTO Hosts(serial_no, station_ID)
VALUES(
    "plugserialno4",
    3
);



