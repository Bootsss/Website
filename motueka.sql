CREATE DATABASE IF NOT EXISTS motueka;
USE motueka;

-- Drop the process_booking table first
DROP TABLE IF EXISTS process_booking;

-- Customers
DROP TABLE IF EXISTS customer;
CREATE TABLE IF NOT EXISTS customer (
  customerID int unsigned NOT NULL auto_increment,
  firstname varchar(50) NOT NULL,
  lastname varchar(50) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(40) NOT NULL default '.',
  PRIMARY KEY (customerID)
) AUTO_INCREMENT=1;

INSERT INTO customer (customerID, firstname, lastname, email) VALUES
(2,"Desiree","Collier","Maecenas@non.co.uk"),
(3,"Irene","Walker","id.erat.Etiam@id.org"),
(4,"Forrest","Baldwin","eget.nisi.dictum@a.com"),
(5,"Beverly","Sellers","ultricies.sem@pharetraQuisqueac.co.uk"),
(6,"Glenna","Kinney","dolor@orcilobortisaugue.org"),
(7,"Montana","Gallagher","sapien.cursus@ultriciesdignissimlacus.edu"),
(8,"Harlan","Lara","Duis@aliquetodioEtiam.edu"),
(9,"Benjamin","King","mollis@Nullainterdum.org"),
(10,"Rajah","Olsen","Vestibulum.ut.eros@nequevenenatislacus.ca"),
(11,"Castor","Kelly","Fusce.feugiat.Lorem@porta.co.uk"),
(12,"Omar","Oconnor","eu.turpis@auctorvelit.co.uk"),
(13,"Porter","Leonard","dui.Fusce@accumsanlaoreet.net"),
(14,"Buckminster","Gaines","convallis.convallis.dolor@ligula.co.uk"),
(15,"Hunter","Rodriquez","ridiculus.mus.Donec@est.co.uk"),
(16,"Zahir","Harper","vel@estNunc.com"),
(17,"Sopoline","Warner","vestibulum.nec.euismod@sitamet.co.uk"),
(18,"Burton","Parrish","consequat.nec.mollis@nequenonquam.org"),
(19,"Abbot","Rose","non@et.ca"),
(20,"Barry","Burks","risus@libero.net");

-- The rooms for the bed and breakfast
DROP TABLE IF EXISTS room;

-- Recreate the room table
CREATE TABLE IF NOT EXISTS room (
  roomID int unsigned NOT NULL auto_increment,
  roomname varchar(100) NOT NULL,
  description text default NULL,
  roomtype character default 'D',  
  beds int,
  PRIMARY KEY (roomID)
) AUTO_INCREMENT=1; 

INSERT INTO room (roomID, roomname, description, roomtype, beds) VALUES
(1,"Kellie","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing","S",5),
(2,"Herman","Lorem ipsum dolor sit amet, consectetuer","D",5),
(3,"Scarlett","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur","D",2),
(4,"Jelani","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam","S",2),
(5,"Sonya","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus.","S",5),
(6,"Miranda","Lorem ipsum dolor sit amet, consectetuer adipiscing","S",4),
(7,"Helen","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus.","S",2),
(8,"Octavia","Lorem ipsum dolor sit amet,","D",3),
(9,"Gretchen","Lorem ipsum dolor sit","D",3),
(10,"Bernard","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer","S",5),
(11,"Dacey","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur","D",2),
(12,"Preston","Lorem","D",2),
(13,"Dane","Lorem ipsum dolor","S",4),
(14,"Cole","Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam","S",1);

-- Recreate the process_booking table with the updated schema
CREATE TABLE IF NOT EXISTS process_booking (
  bookingID int unsigned NOT NULL auto_increment,
  checkin_date INT NOT NULL,
  checkout_date INT NOT NULL,
  firstname varchar(50) NOT NULL,
  lastname varchar(50) NOT NULL,
  contact_number BIGINT NOT NULL,
  room_id int unsigned NOT NULL,
  PRIMARY KEY (bookingID),
  FOREIGN KEY (room_id) REFERENCES room(roomID)
) AUTO_INCREMENT=1;

-- Sample booking data
INSERT INTO process_booking (checkin_date, checkout_date, firstname, lastname, contact_number, room_id)
VALUES
(1679836800, 1680086400, 'John', 'Doe', 1234567890, 1),
(1680172800, 1680326400, 'Jane', 'Smith', 9876543210, 2),
(1680604800, 1680864000, 'Alice', 'Johnson', 5555555555, 3),
(1680940800, 1681190400, 'Bob', 'Williams', 1111111111, 4),
(1681353600, 1681603200, 'Emily', 'Brown', 8888888888, 5),
(1681747200, 1681996800, 'Michael', 'Davis', 2222222222, 6),
(1682083200, 1682332800, 'Olivia', 'Wilson', 9999999999, 7),
(1682515200, 1682764800, 'David', 'Moore', 3333333333, 8),
(1682908800, 1683158400, 'Sophia', 'Johnson', 4444444444, 9),
(1683273600, 1683523200, 'Jacob', 'Miller', 6666666666, 10),
(1683662400, 1683912000, 'Emma', 'Martinez', 7777777777, 11),
(1684041600, 1684291200, 'Matthew', 'Clark', 8888888888, 12),
(1684396800, 1684646400, 'Ava', 'Hernandez', 2222222222, 13),
(1684771200, 1685020800, 'Joshua', 'Lee', 3333333333, 14);