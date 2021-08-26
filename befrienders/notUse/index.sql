CREATE DATABASE befrienders;

CREATE TABLE home(
    ID 	            INTEGER			NOT NULL AUTO_INCREMENT PRIMARY KEY,
    sec_name	    VARCHAR(40)	    NOT NULL,
    image	        VARCHAR(255),	
    description     VARCHAR(8000),
    link            VARCHAR(200)

    
);


INSERT INTO home(ID,sec_name,image,description,link)
VALUES
    (1,'banner','./img/Banner1.jpeg','',''),
    (2,'banner','./img/Banner2.jpeg','',''),
    (3,'banner','./img/Banner3.jpg','',''),
    (4,'aboutus','./img/president.png',"José Emilien is our actual President and has been in charge of Befrienders for the past 6 years. He has
followed the Training Course to become a volunteer of the NGO in 2006 and has ever since been
regularly listening and helping all those needing an emotional support.
José Emilien has always had the social fibre inherited from a family very active in the community. During
his college days, he was already involved in extracurricular activities, visiting and helping in Homes for
the elderly or children in need. After his professional studies in Computer Science and Business, he
dedicated a large part of his spare time to those in need.
Apart from Befrienders, he has also been a regular member of Caritas and most particularly with the
Homeless of Abri de Nuit of Plaine Wilhems. Psychological and continuous training has enabled him to
be more professional in providing a holistic approach to people in distress, not only in material help but
also in the emotional support they need to get back their resilience in life.",'"Suicide doesn’t end the chances of life getting worse, it eliminates the possibility of it ever getting any better." – Unknown'),
    (5,'ourteam','./img/grouppic.jpg',"",''),
    (6,'ourpromise','','Our mission is to be a principal resource in emotional support delivered by volunteers. We value giving a person the opportunity to explore feelings which can cause distress, the importance of being listened to, in confidence, anonymously. We believe in the capacity for each person to build up his resilience and take fundamental descisions about his own life.','OUR MISSION'),
    (7,'ourpromise','','A society in which nobody dies by suicide, where people are able to explore their own feelings, acknowledge and respect the feelings of others.','OUR VISION'),
    (8,'ourpromise','','Our values are based on these beliefs. The importance of having the opportunity to express painful feelings. That being listened to, in confidence and accepted without prejudice can alleviate despair and suicidal feelings.','OUR VALUES'),
    (9,'getintouch','','1st Floor Flat, 152 Royal Road, Beau Bassin','Address'),
    (10,'getintouch','','+230 8009393','HOTLINE'),
    (11,'getintouch','','+230 4670160','Phone'),
    (12,'getintouch','','+230 54837233','Whatsapp'),
    (13,'getintouch','','adminofficer.befrienders@gmail.com','Email');

