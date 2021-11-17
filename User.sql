CREATE TABLE UserLoginDetails(
    Firstname VARCHAR(30) NOT NULL, 
    Lastname VARCHAR(30) NOT NULL, 
    Email VARCHAR(100) UNIQUE NOT NULL,
    Username VARCHAR(32) PRIMARY KEY NOT NULL, 
    Password VARCHAR(32) NOT NULL
);