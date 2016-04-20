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


INSERT INTO char_appear (aid,eid)
VALUES
((SELECT id FROM charname WHERE fname = 'Philip' AND lname = 'Fry'),(SELECT id FROM episode WHERE e_name = 'Space Pilot 3000')),
((SELECT id FROM charname WHERE fname = 'Turanga' AND lname = 'Leela'),(SELECT id FROM episode WHERE e_name = 'Space Pilot 3000')),
((SELECT id FROM charname WHERE fname = 'Bender' AND lname = 'Rodrigues'),(SELECT id FROM episode WHERE e_name = 'Space Pilot 3000')),
((SELECT id FROM charname WHERE fname = 'Hubert' AND lname = 'Farnsworth'),(SELECT id FROM episode WHERE e_name = 'Space Pilot 3000')),
((SELECT id FROM charname WHERE fname = 'Amy' AND lname = 'Wong'), (SELECT id FROM episode WHERE e_name = 'The Series Has Landed')),
((SELECT id FROM charname WHERE fname = 'Hermes' AND lname = 'Conrad'),(SELECT id FROM episode WHERE e_name = 'The Series Has Landed')),
((SELECT id FROM charname WHERE fname = 'John' AND lname = 'Zoidberg'),(SELECT id FROM episode WHERE e_name = 'The Series Has Landed'))
;


