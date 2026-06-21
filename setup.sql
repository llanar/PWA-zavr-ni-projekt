CREATE DATABASE projekt
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE projekt;

CREATE TABLE vijesti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    datum DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    naslov VARCHAR(255) NOT NULL,
    sazetak TEXT NOT NULL,
    tekst TEXT NOT NULL,
    slika VARCHAR(255) NOT NULL,
    kategorija VARCHAR(64) NOT NULL,
    arhiva TINYINT(1) NOT NULL DEFAULT 0
);

INSERT INTO vijesti
(naslov, sazetak, tekst, slika, kategorija, arhiva)
VALUES
(
    'Wie Sie dank besserer Körpersprache mehr Erfolg haben',
    'Ein souveränes Auftreten kann so manchen physischen Nachteil ausgleichen. Einfach nur gerade zu stehen und Haltung anzunehmen, reicht allerdings nicht. WELT verrät Ihnen die Geheimnisse einer positiven Körpersprache.',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    'img1.jpeg',
    'beruf',
    0
);

INSERT INTO vijesti
(naslov, sazetak, tekst, slika, kategorija, arhiva)
VALUES
(
    'Wenn die App den Feierabend bestimmt',
    'Die Technik, um die Arbeitszeit von Beschäftigten zu erfassen, wäre zwar vorhanden, hat aber einige Haken. Und das ist längst nicht das einzige Problem',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    'img2.jpeg',
    'beruf',
    0
);

INSERT INTO vijesti
(naslov, sazetak, tekst, slika, kategorija, arhiva)
VALUES
(
    'So schafft Ihr Kind es nach Harvard',
    'Wer an einer der acht Ivy-League-Unis studiert, hat beste Karrierechancen. Aber die Auswahlprozesse sind hart. Interessenten sollten sich lange vor dem Abi vorbereiten – und eine besondere Passion vorweisen. Drei Punkte sind dabei entscheidend.',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
    'img3.avif',
    'beruf',
    0
);

INSERT INTO vijesti
(naslov, sazetak, tekst, slika, kategorija, arhiva)
VALUES
(
    'Zitronenhähnchen aus dem Ofen',
    'Allein der Duft, der durch Wohnung zieht, ist es wert: Jeder Mensch sollte wissen, wie man ein ganzes Huhn brät - und dieses Rezept gelingt selbst Anfängern. Die Beilage? Schmort einfach mit dem Fleisch im Ofen. Einfacher geht es kaum.',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    'img4.webp',
    'food',
    0
);

INSERT INTO vijesti
(naslov, sazetak, tekst, slika, kategorija, arhiva)
VALUES
(
    'Nicht scharf genug? Diese Soßen sollten Sie kennen',
    'Ob zum Marinieren, Kochen oder Nachwürzen: Fünf scharfe Soßen, mit denen Sie Ihrem Gewürzschrank ein Upgrade verpassen - und die Rezepte, in denen sie besonders gut zur Geltung kommen.',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    'img5.jpeg',
    'food',
    0
);

INSERT INTO vijesti
(naslov, sazetak, tekst, slika, kategorija, arhiva)
VALUES
(
    'Spaghetti all‘ ubriaco',
    'Dieses Gericht lebt von zwei Zutaten, die einander ergänzen: Pasta und Wein. Als Kombination ein Klassiker. Doch bei den Spaghetti „nach Säuferart“ kommt der Rotwein direkt mit in den Topf.',
    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
    'img6.webp',
    'food',
    0
);

CREATE TABLE korisnik (
    id INT AUTO_INCREMENT PRIMARY KEY,

    ime VARCHAR(50) NOT NULL,
    prezime VARCHAR(50) NOT NULL,

    korisnicko_ime VARCHAR(50) NOT NULL UNIQUE,

    lozinka VARCHAR(255) NOT NULL,

    razina TINYINT(1) NOT NULL DEFAULT 0
);

INSERT INTO korisnik
(ime, prezime, korisnicko_ime, lozinka, razina)

VALUES
(
    'Admin',
    'User',
    'admin',
    '$2y$10$nTokLknA5gHvYcDCagT/C.jBJOzzEvk7TePC7GbT65Tlk0KRLab9q',
    1
);