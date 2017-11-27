CREATE DATABASE powerAppDB;

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

CREATE TABLE Exercise (
    IDExercise int NOT NULL AUTO_INCREMENT,
    Name varchar(80) NOT NULL,
    ExerciseType varchar(50),
    Content text,
	
    PRIMARY KEY (IDExercise)
);

CREATE TABLE ExerciseTable (
    IDTable varchar(80) NOT NULL,
    TableType varchar(50),
    TotalScore decimal,
    NumberOfVotes int, 
    Content text,
	
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

# Privilegios para `admin`@`localhost`

GRANT SELECT, INSERT, UPDATE, DELETE, FILE ON *.* TO 'admin'@'localhost' IDENTIFIED BY PASSWORD '*4ACFE3202A5FF5CF467898FC58AAB1D615029441';

# GRANT ALL PRIVILEGES ON `powerAppDB`.* TO 'admin'@'localhost';


# Insert admin with pass admin

INSERT INTO `UsersGym`(`DNI`, `UserType`, `PasswordHash`, `FirstName`, `LastName`, `Email`, `Telephone`, `City`, `Birthdate`) VALUES ("87654321X","ADMIN","21232f297a57a5a743894a0e4a801fc3","Admin","Admin","Admin@admin.es","666666666","Vigo","1991/11/19");

# Insert Coach with pass coach

INSERT INTO `UsersGym`(`DNI`, `UserType`, `PasswordHash`, `FirstName`, `LastName`, `Email`, `Telephone`, `City`, `Birthdate`) VALUES ("11111111H","COACH","f931b13aead002d7fcdb02f84e0f794f","Coach","Coach","Coach@Coach.es","666666666","Vigo","1991/11/19");

# Insert User with pass user

INSERT INTO `UsersGym`(`DNI`, `UserType`, `PasswordHash`, `FirstName`, `LastName`, `Email`, `Telephone`, `City`, `Birthdate`) VALUES ("12345678Z","PEF","ee11cbb19052e40b07aac0ca060c23ee","User","User","User@User.es","666666666","Vigo","1991/11/19");

# Insert User with pass user

INSERT INTO `UsersGym`(`DNI`, `UserType`, `PasswordHash`, `FirstName`, `LastName`, `Email`, `Telephone`, `City`, `Birthdate`) VALUES ("88888888Y","TDU","ee11cbb19052e40b07aac0ca060c23ee","User","User","User@User.es","666666666","Vigo","1991/11/19");

#Insert Curso

INSERT INTO `Courses`(`Name`, `Content`, `DataStart`, `DataEnd`, `NPlaces`, `DNICoach`) VALUES ("Rumba","estilo de baile que nadie entiende.","2018/02/21","2018/04/21","21","11111111H");

INSERT INTO `Courses`(`Name`, `Content`, `DataStart`, `DataEnd`, `NPlaces`, `DNICoach`) VALUES ("Salsa","estilo de baile que nadie entiende.","2018/02/21","2018/04/21","21","11111111H");

INSERT INTO `Courses`(`Name`, `Content`, `DataStart`, `DataEnd`, `NPlaces`, `DNICoach`) VALUES ("Tango","estilo de baile que nadie entiende.","2018/02/21","2018/04/21","21","11111111H");

INSERT INTO `Courses`(`Name`, `Content`, `DataStart`, `DataEnd`, `NPlaces`, `DNICoach`) VALUES ("Spinning","Pedalea hasta morir","2018/02/21","2018/04/21","21","11111111H");


#Insert Exercise

INSERT INTO `Exercise`(`Name`, `ExerciseType`, `Content`) VALUES ("Abdominales","Muscule","
Flexiona las rodillas y pon las puntas de los pies y los talones de forma plana, bien apoyados en el suelo.");

INSERT INTO `Exercise`(`Name`, `ExerciseType`, `Content`) VALUES ("Flexiones","Muscule","
Boca abajo en posicion horizonral y las manos rectas a los hombros levantar tu cuerpo con los brazos.");

INSERT INTO `Exercise`(`Name`, `ExerciseType`, `Content`) VALUES ("Bicicleta Estatica","fitness","
Sube a la bici y pedalea.");

INSERT INTO `Exercise`(`Name`, `ExerciseType`, `Content`) VALUES ("biceps","Muscule","
levanta una pesa varias veces.");

#Insert ExeciceTable

INSERT INTO `ExerciseTable` (`IDTable`, `TableType`, `TotalScore`, `NumberOfVotes`, `Content`) VALUES ('Muscule Table', 'Muscle', '0', '0', 'Tabla para musculatura');
INSERT INTO `ExerciseTable` (`IDTable`, `TableType`, `TotalScore`, `NumberOfVotes`, `Content`) VALUES ('Cardio Table', 'Cardio', '0', '0', 'Tabla para cardio');
