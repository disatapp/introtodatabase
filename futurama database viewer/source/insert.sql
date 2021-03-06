INSERT INTO `species` VALUES 
(1,'Amazonian'),
(2,'Amphibiosan'),
(3,'Brain Slug'),
(4,'Brain Spawn'),
(5,'Blob'),
(6,'Cygnoid'),
(7,'Decapodian'),
(8,'Encyclopod'),
(9,'Grunka Lanka'),
(10,'Maggotian'),
(11,'Green Alien'),
(12,'Native Marian'),
(13,'Neptunian'),
(14,'Nautral People'),
(15,'Nibblonian'),
(16,'Omicronian'),
(17,'Osirian'),
(18,'Paramecium'),
(19,'Rock Alien'),
(20,'Slurm Worm'),
(21,'Space Bee'),
(22,'Spheroid'),
(23,'Spiderian'),
(24,'Thubnian'),
(25,'Trisolian'),
(26,'Venusian'),
(27,'Vinician'),
(28,'Yarn People'),
(29,'Robot'),
(30,'Human'),
(31,'Mutant');

INSERT INTO `planet` VALUES 
(1,'Amazonia','Forest'),
(2,'Amphibio 9','Swamp'),
(3,'Chapek 9','Small'),
(4,'Cyclopia','Continents'),
(5,'Decapod 10','Islands'),
(6,'Doohan 6','Grassy'),
(7,'Earth','Continents'),
(8,'Eternium','Pink'),
(9,'Fantasy Planet', NULL),
(10,'Globetrotters Homeworld','Basketball'),
(11,'Jupiter','Gas'),
(12,'Kronos', NULL),
(13,'Mars','Rocky'),
(14,'Mercury','Metal'),
(15,'Near Death Star','Metal'),
(16,'Neptune','Gas'),
(17,'Neutral Planet','Gray'),
(18,'Nursery Planet','Forest'),
(19,'Omega 3','Desert'),
(20,'Omicron Persei 8','Forest'),
(21,'Osiris 4','Desert'),
(22,'Pandora','3D'),
(23,'The Planet of the Moochers','Brown'),
(24,'Pluto','Ice'),
(25,'Saturn','Rings'),
(26,'Simian 7','Continents'),
(27,'Spa 5','Spa'),
(28,'Space Planet 4','Rocky'),
(29,'Spheron 1','Desert'),
(30,'Stumbos 4','Rainforrest'),
(31,'Trisol','Desert'),
(32,'Venus','Jungle'),
(33,'Wormulon','Rings'),
(34,'Vergon 6','Continents');


InsERT INTO `episode` VALUES 
(1,'Space Pilot 3000',1),
(2,'The Series Has Landed',1),
(3,'I, Roommate',1),
(4,'Loves Labours Lost in Space',1),
(5,'Fear of a Bot Planet',1),
(6,'A Fishful of Dollars',1),
(7,'My Three Sun',1),
(8,'A Big Piece of Garbage',1),
(9,'Hell Is Other Robots',1),
(10,'A Flight to Remember',1),
(11,'Mars University',1),
(12,'When Alien Attack',1),
(13,'Fry and the Slurm Factory',1),
(14,'I Second That Emotion',2),
(15,'Brannigan, Begin Again',2),
(16,'A Head in the Polls',2),
(17,'Xmas Story',2),
(18,'Why Must I Be a Crustacean in Love?',2),
(19,'The Lesser of Two Evils',2),
(20,'Put Your Head on My Shoulders',2),
(21,'Ragin Bender',2),
(22,'A Bicyclops Bult for Two',2),
(23,'A Clone of My Own',2),
(24,'How Hermes Requisitioned His Groove Back',2),
(25,'The Deep South',2),
(26,'Benter Gets Made',2),
(27,'Mothers Day',2),
(28,'The Problem with Popplers',2),
(29,'Anthology of Interest I',2),
(30,'War Is the H-Word',2),
(31,'The Honking',2),
(32,'The Cryonic Woman',2),
(33,'Amazon Women',3),
(34,'Parasites Lost',3),
(35, 'A Tale of Two Santas',3),
(36,'The Luck of the Fryish',3),
(37,'The Birdbot of Ice-Catraz',3),
(38,'Bendless Love',3),
(39,'The Day the Earth Stood Stupid',3),
(40,'Thats Lobstertainment', 3),
(41,'The Cyber House Rules',3),
(42,'Where the Buggalo Roam',3),
(43,'Inane in the Main Frame', 3),
(44,'The Route of All Evil',3),
(45,'Bendin in the Wind',3),
(46,'Time Keeps On slippin',3),
(47,'I Dated a Robot',3),
(48,'A Leela of Her Own',3),
(49,'A Pharoh to Remember',3),
(50,'Anthology of Interest II',3),
(51,'Roswell That Ends Well',3),
(52,'Godfellas',3),
(53,'Future Stock',3),
(54,'The 30% Iron Chef',3),
(55,'Kif Gets Knocked Up a Notch',4),
(56,"Leela's Homeworld",4),
(57,'Love and Rocket', 4),
(58,'Less Than Hero',4),
(59,'A Taste of Freedom',4),
(60, "Bender Should Not Be Allowed on TV", 4),
(61, "Jurassic Bark", 4),
(62, "Crimes of the Hot", 4),
(63, "Teenage Mutant Leela's Hurdles", 4),
(64, "The Why of Fry", 4),
(65, "Where No Fan Has Gone Before", 4),
(66, "The Sting",4),
(67, "Bend Her",4),
(68, "Obsoletely Fabulous",4),
(69, "The Farnsworth Parabox",4),
(70, "Three Hundred Big Boys",4),
(71, "Spanish Fry",4),
(72, "The Devil's Hands Are Idle Playthings",4);

INSERT INTO profession (j_name)
VALUES
('Delivery Boy'),
('Emperor'),
('Pope'),
('Cryogenics Administrator'),
('Holophone Player'),
('Police Officer'),
('Soldier'),
('Animal Trainer'),
('Captain'),
('Cryogenic Counselor'),
('Pitcher'),
('Founder of Planet Express'),
('Professor'),
('Engineer'),
('Bending Unit'),
('Planet Express Worker'),
('Intern'),
('Student'),
('Limboer'),
('Bureaucrat'),
('Accountant'),
('Doctor'),
('Scientist');

INSERT INTO charname (fname, lname, planet, specie, f_episode, age) 
VALUES 
('Philip', 'Fry', (SELECT id FROM planet WHERE pl_name = 'Earth'), (SELECT id FROM species WHERE s_name = 'Human'), (SELECT id FROM episode WHERE e_name = 'Space Pilot 3000'), 40),
('Turanga', 'Leela', (SELECT id FROM planet WHERE pl_name = 'Earth'), (SELECT id FROM species WHERE s_name = 'Mutant'), (SELECT id FROM episode WHERE e_name = 'Space Pilot 3000'), 37),
('Bender', 'Rodrigues', (SELECT id FROM planet WHERE pl_name = 'Earth'), (SELECT id FROM species WHERE s_name = 'Robot'), (SELECT id FROM episode WHERE e_name = 'Space Pilot 3000'),1066),
('Amy', 'Wong', (SELECT id FROM planet WHERE pl_name = 'Mars'), (SELECT id FROM species WHERE s_name = 'Human'), (SELECT id FROM episode WHERE e_name = 'The Series Has Landed'),35),
('Hermes', 'Conrad', (SELECT id FROM planet WHERE pl_name = 'Earth'), (SELECT id FROM species WHERE s_name = 'Human'), (SELECT id FROM episode WHERE e_name = 'The Series Has Landed'),54),
('Hubert', 'Farnsworth', (SELECT id FROM planet WHERE pl_name = 'Earth'), (SELECT id FROM species WHERE s_name = 'Human'), (SELECT id FROM episode WHERE e_name = 'Space Pilot 3000'),173),
('John', 'Zoidberg', (SELECT id FROM planet WHERE pl_name = 'Decapod 10'), (SELECT id FROM species WHERE s_name = 'Decapodian'), (SELECT id FROM episode WHERE e_name = 'The Series Has Landed'),86);


INSERT INTO char_prof (cid,jid)
VALUES
((SELECT id FROM charname WHERE fname = 'Philip' AND lname = 'Fry'),(SELECT id FROM profession WHERE j_name = 'Delivery Boy')),
((SELECT id FROM charname WHERE fname = 'Philip' AND lname = 'Fry'),(SELECT id FROM profession WHERE j_name = 'Emperor')),
((SELECT id FROM charname WHERE fname = 'Philip' AND lname = 'Fry'),(SELECT id FROM profession WHERE j_name = 'Pope')),
((SELECT id FROM charname WHERE fname = 'Philip' AND lname = 'Fry'),(SELECT id FROM profession WHERE j_name = 'Cryogenics Administrator')),
((SELECT id FROM charname WHERE fname = 'Philip' AND lname = 'Fry'),(SELECT id FROM profession WHERE j_name = 'Holophone Player')),
((SELECT id FROM charname WHERE fname = 'Philip' AND lname = 'Fry'),(SELECT id FROM profession WHERE j_name = 'Police Officer')),
((SELECT id FROM charname WHERE fname = 'Philip' AND lname = 'Fry'),(SELECT id FROM profession WHERE j_name = 'Soldier')),
((SELECT id FROM charname WHERE fname = 'Philip' AND lname = 'Fry'),(SELECT id FROM profession WHERE j_name = 'Planet Express Worker')),
((SELECT id FROM charname WHERE fname = 'Turanga' AND lname = 'Leela'),(SELECT id FROM profession WHERE j_name = 'Planet Express Worker')),
((SELECT id FROM charname WHERE fname = 'Turanga' AND lname = 'Leela'),(SELECT id FROM profession WHERE j_name = 'Captain')),
((SELECT id FROM charname WHERE fname = 'Turanga' AND lname = 'Leela'),(SELECT id FROM profession WHERE j_name = 'Cryogenic Counselor')),
((SELECT id FROM charname WHERE fname = 'Turanga' AND lname = 'Leela'),(SELECT id FROM profession WHERE j_name = 'Pitcher')),
((SELECT id FROM charname WHERE fname = 'Bender' AND lname = 'Rodrigues'),(SELECT id FROM profession WHERE j_name = 'Soldier')),
((SELECT id FROM charname WHERE fname = 'Bender' AND lname = 'Rodrigues'),(SELECT id FROM profession WHERE j_name = 'Planet Express Worker')),
((SELECT id FROM charname WHERE fname = 'Bender' AND lname = 'Rodrigues'),(SELECT id FROM profession WHERE j_name = 'Bending Unit')),
((SELECT id FROM charname WHERE fname = 'Hubert' AND lname = 'Farnsworth'),(SELECT id FROM profession WHERE j_name = 'Founder of Planet Express')),
((SELECT id FROM charname WHERE fname = 'Hubert' AND lname = 'Farnsworth'),(SELECT id FROM profession WHERE j_name = 'Scientist')),
((SELECT id FROM charname WHERE fname = 'Hubert' AND lname = 'Farnsworth'),(SELECT id FROM profession WHERE j_name = 'Engineer')),
((SELECT id FROM charname WHERE fname = 'Amy' AND lname = 'Wong'),(SELECT id FROM profession WHERE j_name = 'Intern')),
((SELECT id FROM charname WHERE fname = 'Amy' AND lname = 'Wong'),(SELECT id FROM profession WHERE j_name = 'Student')),
((SELECT id FROM charname WHERE fname = 'Amy' AND lname = 'Wong'),(SELECT id FROM profession WHERE j_name = 'Planet Express Worker')),
((SELECT id FROM charname WHERE fname = 'Hermes' AND lname = 'Conrad'),(SELECT id FROM profession WHERE j_name = 'Limboer')),
((SELECT id FROM charname WHERE fname = 'Hermes' AND lname = 'Conrad'),(SELECT id FROM profession WHERE j_name = 'Bureaucrat')),
((SELECT id FROM charname WHERE fname = 'Hermes' AND lname = 'Conrad'),(SELECT id FROM profession WHERE j_name = 'Accountant')),
((SELECT id FROM charname WHERE fname = 'John' AND lname = 'Zoidberg'),(SELECT id FROM profession WHERE j_name = 'Doctor')),
((SELECT id FROM charname WHERE fname = 'John' AND lname = 'Zoidberg'),(SELECT id FROM profession WHERE j_name = 'Planet Express Worker'))
;


