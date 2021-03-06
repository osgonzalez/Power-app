DROP DATABASE IF EXISTS `powerAppDB`;
CREATE DATABASE `powerAppDB` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

use powerAppDB;

CREATE TABLE UsersGym (
    DNI varchar(9) NOT NULL,
    UserType ENUM('ADMIN', 'COACH', 'TDU', 'PEF') NOT NULL,
    PasswordHash char(32) NOT NULL,
    FirstName varchar(50) NOT NULL,
    LastName varchar(80),
    Email varchar(255),
    Telephone int(9),
    City varchar(255),
	Birthdate date,

    PRIMARY KEY (DNI)
);

CREATE TABLE Notifications (
IDNotification int NOT NULL AUTO_INCREMENT,
Notification varchar(255),
Notificationdate date,

PRIMARY KEY (IDNotification)
);

CREATE TABLE Exercise (
    IDExercise int NOT NULL AUTO_INCREMENT,
    Name varchar(80) NOT NULL,
    ExerciseType varchar(50),
    UrlImage varchar(255),
    UrlVideo varchar(255),
    Content text,

    PRIMARY KEY (IDExercise)
);

CREATE TABLE ExerciseTable (
    IDTable varchar(80) NOT NULL,
    TableType varchar(50),
    TotalScore decimal,
    NumberOfVotes int,
    Content text,
    Visibility varchar(9),

    PRIMARY KEY (IDTable)
);

CREATE TABLE ExerciseContainInTable (
    IDTable varchar(80) NOT NULL,
    IDExercise int NOT NULL,
    ExercisePosition int NOT NULL,
    Description varchar(255),


    PRIMARY KEY (IDTable,IDExercise,ExercisePosition),
    FOREIGN KEY (IDExercise) REFERENCES Exercise(IDExercise),
    FOREIGN KEY (IDTable) REFERENCES ExerciseTable(IDTable)
);


CREATE TABLE TableSession (
    IDTable varchar(80) NOT NULL,
    DNI varchar(9) NOT NULL,
    SesionTime TIMESTAMP NOT NULL,
    Record VARCHAR(9) NOT NULL ,
    Comment text,

    PRIMARY KEY (IDTable,DNI,SesionTime),
    FOREIGN KEY (IDTable) REFERENCES ExerciseTable(IDTable),
    FOREIGN KEY (DNI) REFERENCES UsersGym(DNI)
);


CREATE TABLE AthleteCheckIn (
    DNI varchar(9) NOT NULL,
    CheckInTime TIMESTAMP NOT NULL,

    PRIMARY KEY (DNI,CheckInTime),
    FOREIGN KEY (DNI) REFERENCES UsersGym(DNI)
);


CREATE TABLE Courses (

    IDCourses int NOT NULL AUTO_INCREMENT,
    Name varchar(80) NOT NULL,
    Content varchar(80) NOT NULL,
    DataStart date NOT NULL,
    DataEnd date NOT NULL,
    NPlaces int NOT NULL,
	DNICoach varchar(9) NOT NULL,

    PRIMARY KEY (IDCourses),
    FOREIGN KEY (DNICoach) REFERENCES UsersGym(DNI)
);

CREATE TABLE UserRealizeCourses (
    IDCourses int NOT NULL,
    DNI varchar(9) NOT NULL,


    PRIMARY KEY (IDCourses,DNI),
    FOREIGN KEY (IDCourses) REFERENCES Courses(IDCourses),
    FOREIGN KEY (DNI) REFERENCES UsersGym(DNI)
);

CREATE TABLE Space (
    IDSpace int(11) NOT NULL AUTO_INCREMENT,
    NameSpace varchar(50) NOT NULL,
    Description varchar(150),
    Capacity int(5),

    PRIMARY KEY (IDSpace)
);


# Privilegios para `admin`@`localhost`

GRANT SELECT, INSERT, UPDATE, DELETE, FILE ON *.* TO 'admin'@'localhost' IDENTIFIED BY PASSWORD '*4ACFE3202A5FF5CF467898FC58AAB1D615029441';

# GRANT ALL PRIVILEGES ON `powerAppDB`.* TO 'admin'@'localhost';


# Insert admin with pass admin

INSERT INTO `UsersGym`(`DNI`, `UserType`, `PasswordHash`, `FirstName`, `LastName`, `Email`, `Telephone`, `City`, `Birthdate`) VALUES ("87654321X","ADMIN","21232f297a57a5a743894a0e4a801fc3","Admin","Admin","Admin@admin.es","666666666","Vigo","1991/11/19");

# Insert Coach with pass coach

INSERT INTO `UsersGym`(`DNI`, `UserType`, `PasswordHash`, `FirstName`, `LastName`, `Email`, `Telephone`, `City`, `Birthdate`) VALUES ("11111111H","COACH","f931b13aead002d7fcdb02f84e0f794f","Coach","Coach","Coach@Coach.es","666666666","Vigo","1991/11/19");

# Insert User with pass user

INSERT INTO `UsersGym`(`DNI`, `UserType`, `PasswordHash`, `FirstName`, `LastName`, `Email`, `Telephone`, `City`, `Birthdate`) VALUES ("12345678Z","PEF","ee11cbb19052e40b07aac0ca060c23ee","TDUUser","UserTDU","User@User.es","666666666","Vigo","1991/11/19");

# Insert User with pass user

INSERT INTO `UsersGym`(`DNI`, `UserType`, `PasswordHash`, `FirstName`, `LastName`, `Email`, `Telephone`, `City`, `Birthdate`) VALUES ("88888888Y","TDU","ee11cbb19052e40b07aac0ca060c23ee","PEFUser","UserPEF","User@User.es","666666666","Vigo","1991/11/19");

#Insert Curso

INSERT INTO `Courses`(`Name`, `Content`, `DataStart`, `DataEnd`, `NPlaces`, `DNICoach`) VALUES ("Rumba","estilo de baile que nadie entiende.","2018/02/21","2018/04/21","21","11111111H");

INSERT INTO `Courses`(`Name`, `Content`, `DataStart`, `DataEnd`, `NPlaces`, `DNICoach`) VALUES ("Salsa","estilo de baile que nadie entiende.","2018/02/21","2018/04/21","21","11111111H");

INSERT INTO `Courses`(`Name`, `Content`, `DataStart`, `DataEnd`, `NPlaces`, `DNICoach`) VALUES ("Tango","estilo de baile que nadie entiende.","2018/02/21","2018/04/21","21","11111111H");

INSERT INTO `Courses`(`Name`, `Content`, `DataStart`, `DataEnd`, `NPlaces`, `DNICoach`) VALUES ("Spinning","Pedalea hasta morir","2018/02/21","2018/04/21","21","11111111H");


#Insert Exercise

INSERT INTO `Exercise`(`Name`, `ExerciseType`,`UrlImage`,`UrlVideo`,`Content`) VALUES ("Abdominales","Muscule","http://paratenerelabdomenplano.com/wp-content/uploads/2013/06/crunch-abdominal1.jpg",
	"https://www.youtube.com/embed/mMieHCr-H0c","Flexiona las rodillas y pon las puntas de los pies y los talones de forma plana, bien apoyados en el suelo.");

INSERT INTO `Exercise`(`Name`, `ExerciseType`,`UrlImage`,`UrlVideo`,`Content`) VALUES ("Flexiones","Muscule","https://www.musculaciontotal.com/wp-content/uploads/2014/10/flexiones-de-brazos.jpg","https://www.youtube.com/embed/pv0k9ohkBSA","
Boca abajo en posicion horizonral y las manos rectas a los hombros levantar tu cuerpo con los brazos.");

INSERT INTO `Exercise`(`Name`, `ExerciseType`,`UrlImage`,`UrlVideo`,`Content`) VALUES ("Bicicleta Estatica","fitness","https://ejerciciosencasa.es/wp-content/uploads/2013/10/bicicleta-estatica.jpg","https://www.youtube.com/embed/em-NSkZVjkA",
"Sube a la bici y pedalea.");

INSERT INTO `Exercise`(`Name`, `ExerciseType`,`UrlImage`,`UrlVideo`,`Content`) VALUES ("biceps","Muscule","https://s-media-cache-ak0.pinimg.com/originals/32/70/82/327082666917d0b04ff85f396d2476df.png"
	,"https://www.youtube.com/embed/q10Vm7YVpLM","levanta una pesa varias veces.");

#Insert ExeciceTable.

INSERT INTO `ExerciseTable` (`IDTable`, `TableType`, `TotalScore`, `NumberOfVotes`, `Content`,`Visibility`) VALUES ('Muscule Table', 'Muscle', '0', '0', 'Tabla para musculatura','');
INSERT INTO `ExerciseTable` (`IDTable`, `TableType`, `TotalScore`, `NumberOfVotes`, `Content`,`Visibility`) VALUES ('Cardio Table', 'Cardio', '0', '0', 'Tabla para cardio','');

#Insert AthleteCheckIn.

INSERT INTO `AthleteCheckIn`(`DNI`, `CheckInTime`) VALUES ('12345678Z','2013-08-05 18:19:03');
INSERT INTO `AthleteCheckIn`(`DNI`, `CheckInTime`) VALUES ('88888888Y','2014-07-23 10:32:26');
INSERT INTO `AthleteCheckIn`(`DNI`, `CheckInTime`) VALUES ('12345678Z','2014-12-26 14:07:03');
INSERT INTO `AthleteCheckIn`(`DNI`, `CheckInTime`) VALUES ('88888888Y','2016-11-24 20:08:26');
INSERT INTO `AthleteCheckIn`(`DNI`, `CheckInTime`) VALUES ('12345678Z','2016-12-08 11:08:26');
INSERT INTO `AthleteCheckIn`(`DNI`, `CheckInTime`) VALUES ('88888888Y','2016-12-23 11:08:26');
INSERT INTO `AthleteCheckIn`(`DNI`, `CheckInTime`) VALUES ('12345678Z','2017-01-20 09:17:26');
INSERT INTO `AthleteCheckIn`(`DNI`, `CheckInTime`) VALUES ('88888888Y','2017-02-16 14:25:37');
INSERT INTO `AthleteCheckIn`(`DNI`, `CheckInTime`) VALUES ('12345678Z','2017-03-24 14:34:37');
INSERT INTO `AthleteCheckIn`(`DNI`, `CheckInTime`) VALUES ('88888888Y','2017-03-15 14:34:37');
INSERT INTO `AthleteCheckIn`(`DNI`, `CheckInTime`) VALUES ('12345678Z','2017-03-17 08:34:37');
INSERT INTO `AthleteCheckIn`(`DNI`, `CheckInTime`) VALUES ('88888888Y','2017-04-12 06:34:37');
INSERT INTO `AthleteCheckIn`(`DNI`, `CheckInTime`) VALUES ('12345678Z','2017-05-25 06:34:37');
INSERT INTO `AthleteCheckIn`(`DNI`, `CheckInTime`) VALUES ('88888888Y','2017-05-25 09:34:37');

#Insert ExerciseContainInTable
INSERT INTO `ExerciseContainInTable`(`IDTable`, `IDExercise`, `ExercisePosition`, `Description`) VALUES ("Cardio Table","1","1","25 repeticiones");
INSERT INTO `ExerciseContainInTable`(`IDTable`, `IDExercise`, `ExercisePosition`, `Description`) VALUES ("Cardio Table","1","2","10 repeticiones");
INSERT INTO `ExerciseContainInTable`(`IDTable`, `IDExercise`, `ExercisePosition`, `Description`) VALUES ("Cardio Table","2","3","20 repeticiones");
INSERT INTO `ExerciseContainInTable`(`IDTable`, `IDExercise`, `ExercisePosition`, `Description`) VALUES ("Cardio Table","3","4","15 repeticiones");
INSERT INTO `ExerciseContainInTable`(`IDTable`, `IDExercise`, `ExercisePosition`, `Description`) VALUES ("Cardio Table","4","5","15 minutos");

INSERT INTO `ExerciseContainInTable`(`IDTable`, `IDExercise`, `ExercisePosition`, `Description`) VALUES ("Muscule Table","1","1","50 repeticiones");
INSERT INTO `ExerciseContainInTable`(`IDTable`, `IDExercise`, `ExercisePosition`, `Description`) VALUES ("Muscule Table","2","2","45 repeticiones");
INSERT INTO `ExerciseContainInTable`(`IDTable`, `IDExercise`, `ExercisePosition`, `Description`) VALUES ("Muscule Table","3","3","35 repeticiones");
INSERT INTO `ExerciseContainInTable`(`IDTable`, `IDExercise`, `ExercisePosition`, `Description`) VALUES ("Muscule Table","4","4","80 repeticiones");


#Insert TableSession.
INSERT INTO `TableSession`(`IDTable`, `DNI`, `SesionTime`,`Record`,`Comment`) VALUES ("Cardio Table","88888888Y","2017-01-06 10:32:26","75.2","Inicio tabla nueva");
INSERT INTO `TableSession`(`IDTable`, `DNI`, `SesionTime`,`Record`,`Comment`) VALUES ("Cardio Table","88888888Y","2017-01-08 11:08:26","65.32","Hoy tengo agujetas");
INSERT INTO `TableSession`(`IDTable`, `DNI`, `SesionTime`,`Record`,`Comment`) VALUES ("Cardio Table","88888888Y","2017-01-17 08:34:37","45.45","Le voy pillando el ritmo");
INSERT INTO `TableSession`(`IDTable`, `DNI`, `SesionTime`,`Record`,`Comment`) VALUES ("Cardio Table","88888888Y","2017-01-23 11:08:26","80.12","Me duele el gemelo");
INSERT INTO `TableSession`(`IDTable`, `DNI`, `SesionTime`,`Record`,`Comment`) VALUES ("Cardio Table","88888888Y","2017-01-27 06:34:37","65.12","Hoy estire mejor y no me duele el gemelo");
INSERT INTO `TableSession`(`IDTable`, `DNI`, `SesionTime`,`Record`,`Comment`) VALUES ("Muscule Table","12345678Z","2017-02-05 09:34:37","70.78","Inicio otra tabla");
INSERT INTO `TableSession`(`IDTable`, `DNI`, `SesionTime`,`Record`,`Comment`) VALUES ("Muscule Table","12345678Z","2017-02-07 06:34:37","35.56","Con poco peso es facil");
INSERT INTO `TableSession`(`IDTable`, `DNI`, `SesionTime`,`Record`,`Comment`) VALUES ("Muscule Table","12345678Z","2017-02-16 18:19:03","80.21","Le he subido el peso y me ha costado mucho mas");
INSERT INTO `TableSession`(`IDTable`, `DNI`, `SesionTime`,`Record`,`Comment`) VALUES ("Muscule Table","12345678Z","2017-02-22 11:08:26","15.20","Hoy Solo hice la mitad que estaba cansado");
INSERT INTO `TableSession`(`IDTable`, `DNI`, `SesionTime`,`Record`,`Comment`) VALUES ("Muscule Table","12345678Z","2017-02-26 18:19:03","65.25","Hoy lo he dado todo con el maximo peso posible");
INSERT INTO `TableSession`(`IDTable`, `DNI`, `SesionTime`,`Record`,`Comment`) VALUES ("Cardio Table","12345678Z","2017-01-06 10:32:26","75.33","Inicio tabla nueva");
INSERT INTO `TableSession`(`IDTable`, `DNI`, `SesionTime`,`Record`,`Comment`) VALUES ("Cardio Table","12345678Z","2017-01-08 11:08:26","65.75","Hoy tengo agujetas");
INSERT INTO `TableSession`(`IDTable`, `DNI`, `SesionTime`,`Record`,`Comment`) VALUES ("Cardio Table","12345678Z","2017-01-17 08:34:37","45.20","Le voy pillando el ritmo");
INSERT INTO `TableSession`(`IDTable`, `DNI`, `SesionTime`,`Record`,`Comment`) VALUES ("Cardio Table","12345678Z","2017-01-23 11:08:26","80","Me duele el gemelo");
INSERT INTO `TableSession`(`IDTable`, `DNI`, `SesionTime`,`Record`,`Comment`) VALUES ("Cardio Table","12345678Z","2017-01-27 06:34:37","65.10","Hoy estire mejor y no me duele el gemelo");
INSERT INTO `TableSession`(`IDTable`, `DNI`, `SesionTime`,`Record`,`Comment`) VALUES ("Muscule Table","88888888Y","2017-02-05 09:34:37","70.412","Inicio otra tabla");
INSERT INTO `TableSession`(`IDTable`, `DNI`, `SesionTime`,`Record`,`Comment`) VALUES ("Muscule Table","88888888Y","2017-02-07 06:34:37","35.65","Con poco peso es facil");
INSERT INTO `TableSession`(`IDTable`, `DNI`, `SesionTime`,`Record`,`Comment`) VALUES ("Muscule Table","88888888Y","2017-02-16 18:19:03","80.10","Le he subido el peso y me ha costado mucho mas");
INSERT INTO `TableSession`(`IDTable`, `DNI`, `SesionTime`,`Record`,`Comment`) VALUES ("Muscule Table","88888888Y","2017-02-22 11:08:26","15.45","Hoy Solo hice la mitad que estaba cansado");
INSERT INTO `TableSession`(`IDTable`, `DNI`, `SesionTime`,`Record`,`Comment`) VALUES ("Muscule Table","88888888Y","2017-02-26 18:19:03","65.58","Hoy lo he dado todo con el maximo peso posible");

#Insert UserRealizeCourses
INSERT INTO `UserRealizeCourses`(`IDCourses`, `DNI`) VALUES ("1","12345678Z");
INSERT INTO `UserRealizeCourses`(`IDCourses`, `DNI`) VALUES ("2","12345678Z");
INSERT INTO `UserRealizeCourses`(`IDCourses`, `DNI`) VALUES ("3","88888888Y");
INSERT INTO `UserRealizeCourses`(`IDCourses`, `DNI`) VALUES ("4","88888888Y");
INSERT INTO `UserRealizeCourses`(`IDCourses`, `DNI`) VALUES ("4","11111111H");
INSERT INTO `UserRealizeCourses`(`IDCourses`, `DNI`) VALUES ("3","11111111H");
INSERT INTO `UserRealizeCourses`(`IDCourses`, `DNI`) VALUES ("2","11111111H");
INSERT INTO `UserRealizeCourses`(`IDCourses`, `DNI`) VALUES ("1","11111111H");


#Insert Notifications
INSERT INTO `Notifications`(`Notification`,`Notificationdate`) VALUES ("Notificacion de prueba 1","2018/01/03");
INSERT INTO `Notifications`(`Notification`,`Notificationdate`) VALUES ("Notificacion de prueba 2","2018/01/04");
