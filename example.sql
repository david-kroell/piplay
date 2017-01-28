delete from media;
delete from paths;

ALTER TABLE media AUTO_INCREMENT = 1;
ALTER TABLE paths AUTO_INCREMENT = 1;


INSERT INTO paths VALUES (DEFAULT , "D:\\Music\\K-391");
INSERT INTO paths VALUES (DEFAULT , "D:\\Music\\Dame");paths


INSERT INTO media VALUES (DEFAULT , 1, "K-391 - Boombox 2012", "mp3");
INSERT INTO media VALUES (DEFAULT , 1, "K-391 - Deep Blue", "mp3");
INSERT INTO media VALUES (DEFAULT , 1, "K-391 - Farmers", "mp3");
INSERT INTO media VALUES (DEFAULT , 1, "K-391 - Windows", "mp3");


INSERT INTO media VALUES (DEFAULT , 2, "Dame - Pave Low", "mp3");
INSERT INTO media VALUES (DEFAULT , 2, "Dame - 12 Millionen", "mp3");
INSERT INTO media VALUES (DEFAULT , 2, "Dame - Notiz An Mich", "mp3");

INSERT INTO playlists VALUES(1, 1);
INSERT INTO playlists VALUES(1, 2);



SELECT * from media;


SELECT concat(p.Path,"\\", m.Name, ".", m.Extension) as AbsoluteFileName
FROM media m INNER JOIN paths p USING(PathID);


SELECT *
from playlists inner join media using(MediaID)

