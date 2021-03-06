PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
DROP TABLE IF EXISTS `user`;
DROP TABLE IF EXISTS `todo`;

CREATE TABLE `user` (
  -- Note that storing passwords in plaintext like this is very, very bad.
  -- But we'll address that issue later.
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  email TEXT UNIQUE NOT NULL,
  password TEXT NOT NULL,
  firstName TEXT NOT NULL,
  lastName TEXT NOT NULL
);

-- passwords:
--  Arya: v@larM0rghul1s
--  Theon: !r0nBorn
--  Tyrion: th3Imp?!
--  Todd: N1ceP@ssword
INSERT INTO "user" VALUES(1,'nobody@nowhere.com','$2y$10$uKHrSOviTMvN9vbGNLsvzOzk1aRNqwFmMkobUfd5IMNRymr7U0lBm','Arya','Stark');
INSERT INTO "user" VALUES(2,'ironborn@pyke.com','$2y$10$eulmGacwa6TjIOPHWC4an.i8o1cgcdBAiMBUyrNXQ7kHeBgJ79tl.','Theon','Greyjoy');
INSERT INTO "user" VALUES(3,'alwayspayshisdebts@casterlyrock.com','$2y$10$GNup.tzD3/kTYX3SN1g.neHtKQ295arZXGoelfo3Tk5ONyi05BM7m','Tyrion','Lannister');
INSERT INTO "user" VALUES(4,'todd.whittaker@franklin.edu','$2y$10$roDY2iVzz3gj0HDl1H1FvuE7tedwoE67p.0CMziZi7QsHC5NVL.8G','Todd','Whittaker');
COMMIT;
