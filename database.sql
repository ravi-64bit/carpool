create database carpool;
use carpool;
create table rides(rid int(3) AUTO_INCREMENT PRIMARY KEY,StartingPoint varchar(30),Destination varchar(40),DateAndTime datetime,SeatsAvailable int(10),PhoneNumber int(10),flag boolean default 1);