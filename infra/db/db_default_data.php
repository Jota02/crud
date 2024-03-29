<?php
require __DIR__ . '/connection.php';

// Insert default categories
// $pdo->exec(
//     "INSERT INTO categories (id, category_name) 
//     VALUES
//     (1, 'Action'),
//     (2, 'Adventure'),
//     (3, 'Comedy'),
//     (4, 'Drama'),
//     (5, 'Fantasy'),
//     (6, 'Horror'),
//     (7, 'Thriller'),
//     (8, 'Romance'),
//     (9, 'Sci-Fi'),
//     (10, 'History'),
//     (11, 'Crime'),
//     (12, 'Western'),
//     (13, 'Animation');
// ");

// // Insert default types
// $pdo->exec(
//     "INSERT INTO type (id, show_type) VALUES
//     (1, 'movie'),
//     (2, 'serie');
// ");

// // Insert default shows
// $pdo->exec(
//     "INSERT INTO shows (id, id_type, title, description, seasons, rating, age, release_year, end_year, trailer, poster_path, cover_path) 
//     VALUES
//     (1, 1, 'Skyfall', 'James Bond loyalty to M is tested when her past comes back to haunt her. When MI6 comes under attack, 007 must track down and destroy the threat, no matter how personal the cost.', NULL, 7.8, 'M/12', '2012', '0000', 'https://www.youtube.com/embed/6kw1UVovByw', 'assets/images/uploads/movies/007_skyfall.jpg', NULL),
//     (2, 1, 'The Amazing Spider-Man', 'After Peter Parker is bitten by a genetically altered spider, he gains newfound, spider-like powers and ventures out to save the city from the machinations of a mysterious reptilian foe.', NULL, 6.9, 'M/12', '2012', '0000', 'https://www.youtube.com/embed/-tnxzJ0SSOw', 'assets/images/uploads/movies/amazing_spiderman.jpg', NULL),
//     (3, 1, 'The Avengers', 'Earth mightiest heroes must come together and learn to fight as a team if they are going to stop the mischievous Loki and his alien army from enslaving humanity.', NULL, 8, 'M/12', '2012', '0000', 'https://www.youtube.com/embed/eOrNdBpGMv8', 'assets/images/uploads/movies/avg_1.jpg', NULL),
//     (4, 1, 'AVP: Alien vs. Predator', 'During an archaeological expedition on Bouvetøya Island in Antarctica, a team of archaeologists and other scientists find themselves caught up in a battle between the two legends. Soon, the team realize that only one species can win.', NULL, 5.7, 'M/12', '2004', '0000', 'https://www.youtube.com/embed/Cld40qD7HcY', 'assets/images/uploads/movies/avsp.jpg', NULL),
//     (5, 1, 'The Batman', 'When a sadistic serial killer begins murdering key political figures in Gotham, Batman is forced to investigate the city hidden corruption and question his family involvement.', NULL, 7.8, 'M/14', '2022', '0000', 'https://www.youtube.com/embed/mqqft2x_Aa4', 'assets/images/uploads/movies/batman_22.jpg', NULL),
//     (6, 1, 'The Dark Knight Rises', 'Eight years after the Joker reign of chaos, Batman is coerced out of exile with the assistance of the mysterious Selina Kyle in order to defend Gotham City from the vicious guerrilla terrorist Bane.', NULL, 8.4, 'M/12', '2012', '0000', 'https://www.youtube.com/embed/GokKUqLcvD8', 'assets/images/uploads/movies/batman_dkr.jpg', 'assets/images/uploads/movies/covers/dkr.jpg'),
//     (7, 1, 'Baywatch', 'Devoted lifeguard Mitch Buchannon butts heads with a brash new recruit, as they uncover a criminal plot that threatens the future of the bay.', NULL, 5.5, 'M/14', '2017', '0000', 'https://www.youtube.com/embed/eyKOgnaf0BU', 'assets/images/uploads/movies/baywatch.jpg', NULL),
//     (8, 1, 'Big Hero 6', 'A special bond develops between plus-sized inflatable robot Baymax and prodigy Hiro Hamada, who together team up with a group of friends to form a band of high-tech heroes.', NULL, 7.8, 'M/6', '2014', '0000', 'https://www.youtube.com/embed/z3biFxZIJOQ', 'assets/images/uploads/movies/bh6.jpg', NULL),
//     (9, 1, 'Blade Runner', 'A blade runner must pursue and terminate four replicants who stole a ship in space and have returned to Earth to find their creator.', NULL, 8.1, 'M/12', '1982', '0000', 'https://www.youtube.com/embed/eogpIG53Cis', 'assets/images/uploads/movies/br_82.jpg', NULL),
//     (10, 1, 'Cars', 'On the way to the biggest race of his life, a hotshot rookie race car gets stranded in a rundown town and learns that winning is not everything in life.', NULL, 7.2, 'M/6', '2006', '0000', 'https://www.youtube.com/embed/W_H7_tDHFE8', 'assets/images/uploads/movies/cars.jpg', NULL),
//     (11, 1, 'Dune: Part One', 'A noble family becomes embroiled in a war for control over the galaxy most valuable asset while its heir becomes troubled by visions of a dark future.', NULL, 8, 'M/12', '2021', '0000', 'https://www.youtube.com/embed/n9xhJrPXop4', 'assets/images/uploads/movies/dune.jpg', 'assets/images/uploads/movies/covers/dune.jpg'),
//     (12, 1, 'The Evil Dead', 'Five friends travel to a cabin in the woods, where they unknowingly release flesh-possessing demons.', NULL, 7.4, 'M/18', '1981', '0000', 'https://www.youtube.com/embed/NL6mioAlpJk', 'assets/images/uploads/movies/evil_dead.jpg', NULL),
//     (13, 1, 'Furious 6', 'Hobbs has Dominic and Brian reassemble their crew to take down a team of mercenaries: Dominic unexpectedly gets sidetracked with facing his presumed deceased girlfriend, Letty.', NULL, 7, 'M/12', '2013', '0000', 'https://www.youtube.com/embed/oc_P11PNvRs', 'assets/images/uploads/movies/ff_6.jpg', NULL),
//     (14, 1, 'Five Nights at Freddys', 'A troubled security guard begins working at Freddy Fazbear Pizza. During his first night on the job, he realizes that the night shift will not be so easy to get through. Pretty soon he will unveil what actually happened at Freddys.', NULL, 5.5, 'M/14', '2023', '0000', 'https://www.youtube.com/embed/0VH9WCFV6XQ', 'assets/images/uploads/movies/fnaf.jpg', NULL),
//     (15, 1, 'Fright Night', 'When a nice new neighbor moves in next door, Charley discovers that he is an ancient vampire who preys on the community. Can he save his neighborhood from the creature with the help of the famous \"vampire killer\", Peter Vincent?', NULL, 6.4, 'M/12', '2011', '0000', 'https://www.youtube.com/embed/sUipgKdTi_k', 'assets/images/uploads/movies/fright_night.jpg', NULL),
//     (16, 1, 'The Godfather', 'Don Vito Corleone, head of a mafia family, decides to hand over his empire to his youngest son Michael. However, his decision unintentionally puts the lives of his loved ones in grave danger.', NULL, 9.2, 'M/16', '1972', '0000', 'https://www.youtube.com/embed/UaVTIH8mujA', 'assets/images/uploads/movies/godfather.jpg', NULL),
//     (17, 1, 'The Hunger Games', 'Katniss Everdeen voluntarily takes her younger sister place in the Hunger Games: a televised competition in which two teenagers from each of the twelve Districts of Panem are chosen at random to fight to the death.', NULL, 7.2, 'M/12', '2012', '0000', 'https://www.youtube.com/embed/PbA63a7H0bo', 'assets/images/uploads/movies/hunger_games.jpg', NULL),
//     (18, 1, 'The Incredibles', 'While trying to lead a quiet suburban life, a family of undercover superheroes are forced into action to save the world.', NULL, 8, 'M/6', '2004', '0000', 'https://www.youtube.com/embed/-UaGUdNJdRQ', 'assets/images/uploads/movies/incredibles.jpg', NULL),
//     (19, 1, 'John Wick', 'An ex-hitman comes out of retirement to track down the gangsters who killed his dog and stole his car.', NULL, 7.4, 'M/16', '2014', '0000', 'https://www.youtube.com/embed/C0BMx-qxsP4', 'assets/images/uploads/movies/john_wick.jpg', 'assets/images/uploads/movies/covers/john_wick.jpg'),
//     (20, 1, 'Jurassic World', 'A new theme park, built on the original site of Jurassic Park, creates a genetically modified hybrid dinosaur, the Indominus Rex, which escapes containment and goes on a killing spree.', NULL, 6.9, 'M/12', '2015', '0000', 'https://www.youtube.com/embed/RFinNxS5KN4', 'assets/images/uploads/movies/jurrasic_world.jpg', NULL),
//     (21, 1, 'The Kitchen', 'In a dystopian future London where all social housing has been eliminated, Izi and Benji fight to navigate the world as residents of The Kitchen, a community that refuses to abandon their home.', NULL, 6.7, 'M/18', '2023', '0000', 'https://www.youtube.com/embed/GgT5cEV5Qt0', 'assets/images/uploads/movies/kitchen.jpg', NULL),
//     (22, 1, 'Knives Out', 'A detective investigates the death of the patriarch of an eccentric, combative family.', NULL, 7.9, 'M/12', '2019', '0000', 'https://www.youtube.com/embed/sL-9Khv7wa4', 'assets/images/uploads/movies/knives_out.jpg', NULL),
//     (23, 1, 'The Lego Movie', 'An ordinary LEGO construction worker, thought to be the prophesied as special, is recruited to join a quest to stop an evil tyrant from gluing the LEGO universe into eternal stasis.', NULL, 7.7, 'M/4', '2014', '0000', 'https://www.youtube.com/embed/fZ_JOBCLF-I', 'assets/images/uploads/movies/lego.jpg', NULL),
//     (24, 1, 'The Lord of the Rings: The Two Towers', 'While Frodo and Sam edge closer to Mordor with the help of the shifty Gollum, the divided fellowship makes a stand against Sauron new ally, Saruman, and his hordes of Isengard.', NULL, 8.8, 'M/12', '2002', '0000', 'https://www.youtube.com/embed/hYcw5ksV8YQ', 'assets/images/uploads/movies/lotr_two_towers.jpg', NULL),
//     (25, 1, 'The Super Mario Bros. Movie', 'A plumber named Mario travels through an underground labyrinth with his brother Luigi, trying to save a captured princess.', NULL, 7, 'M/6', '2023', '0000', 'https://www.youtube.com/embed/TnGl01FkMMo', 'assets/images/uploads/movies/mario_bros.jpg', NULL),
//     (26, 1, 'Megamind', 'Evil genius Megamind finally defeats his do-gooder nemesis, Metro Man, but is left without a purpose in a superhero-free world.', NULL, 7.3, 'M/6', '2010', '0000', 'https://www.youtube.com/embed/ead9HCX9fe4', 'assets/images/uploads/movies/megamind.jpg', NULL),
//     (27, 1, 'Oppenheimer', 'The story of American scientist J. Robert Oppenheimer and his role in the development of the atomic bomb.', NULL, 8.4, 'M/14', '2023', '0000', 'https://www.youtube.com/embed/uYPbbksJxIg', 'assets/images/uploads/movies/opp.jpg', NULL),
//     (28, 1, 'Pulp Fiction', 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', NULL, 8.9, 'M/16', '1994', '0000', 'https://www.youtube.com/embed/tGpTpVyI_OQ', 'assets/images/uploads/movies/pulp_fiction.jpg', NULL),
//     (29, 1, 'The Purge: Anarchy', 'Three groups of people intertwine and are left stranded in the streets on Purge Night, trying to survive the chaos and violence that occurs.', NULL, 6.4, 'M/18', '2014', '0000', 'https://www.youtube.com/embed/LPYLj1IHge0', 'assets/images/uploads/movies/purge_anarchy.jpg', NULL),
//     (30, 1, 'Ratatouille', 'A rat who can cook makes an unusual alliance with a young kitchen worker at a famous Paris restaurant.', NULL, 8.1, 'M/4', '2007', '0000', 'https://www.youtube.com/embed/NgsQ8mVkN8w', 'assets/images/uploads/movies/ratatouille.jpg', NULL),
//     (31, 1, 'Saw', 'Two strangers awaken in a room with no recollection of how they got there, and soon discover they are pawns in a deadly game perpetrated by a notorious serial killer.', NULL, 7.6, 'M/18', '2004', '0000', 'https://www.youtube.com/embed/S-1QgOMQ-ls', 'assets/images/uploads/movies/saw.jpg', NULL),
//     (32, 1, 'Scream', '25 years after a streak of brutal murders shocked the quiet town of Woodsboro, Calif., a new killer dons the Ghostface mask and begins targeting a group of teenagers to resurrect secrets from the town deadly past.', NULL, 6.3, 'M/16', '2022', '0000', 'https://www.youtube.com/embed/beToTslH17s', 'assets/images/uploads/movies/scream.jpg', 'assets/images/uploads/movies/covers/scream.jpg'),
//     (33, 1, 'The Shining', 'A family heads to an isolated hotel for the winter where a sinister presence influences the father into violence, while his psychic son sees horrific forebodings from both past and future.', NULL, 8.4, 'M/16', '1980', '0000', 'https://www.youtube.com/embed/FZQvIJxG9Xs', 'assets/images/uploads/movies/shining.jpg', NULL),
//     (34, 1, 'Spider-Man: Across the Spider-Verse', 'Miles Morales catapults across the multiverse, where he encounters a team of Spider-People charged with protecting its very existence. When the heroes clash on how to handle a new threat, Miles must redefine what it means to be a hero.', NULL, 8.6, 'M/12', '2023', '0000', 'https://www.youtube.com/embed/cqGjhVJWtEg', 'assets/images/uploads/movies/spiderman_across.jpg', NULL),
//     (35, 1, 'Star Wars: Episode IV - A New Hope', 'Luke Skywalker joins forces with a Jedi Knight, a cocky pilot, a Wookiee and two droids to save the galaxy from the Empire world-destroying battle station, while also attempting to rescue Princess Leia from the mysterious Darth Vader.', NULL, 8.6, 'M/12', '1977', '0000', 'https://www.youtube.com/embed/vZ734NWnAHA', 'assets/images/uploads/movies/sw_4.jpg', NULL),
//     (36, 1, 'Star Wars: Episode IX - The Rise of Skywalker', 'In the riveting conclusion of the landmark Skywalker saga, new legends will be born-and the final battle for freedom is yet to come.', NULL, 6.4, 'M/12', '2019', '0000', 'https://www.youtube.com/embed/8Qn_spdM5Zg', 'assets/images/uploads/movies/sw_9.jpg', 'assets/images/uploads/movies/covers/sw_9.jpg'),
//     (37, 1, 'Terminator 2: Judgment Day', 'A cyborg, identical to the one who failed to kill Sarah Connor, must now protect her ten year old son John from an even more advanced and powerful cyborg.', NULL, 8.6, 'M/12', '1991', '0000', 'https://www.youtube.com/embed/CRRlbK5w8AE', 'assets/images/uploads/movies/terminator_2.jpg', NULL),
//     (38, 1, 'Teenage Mutant Ninja Turtles', 'When a kingpin threatens New York City, a group of mutated turtle warriors must emerge from the shadows to protect their home.', NULL, 5.8, 'M/12', '2014', '0000', 'https://www.youtube.com/embed/VZZ0PnDZdZk', 'assets/images/uploads/movies/tmnt.jpg', NULL),
//     (39, 1, 'Venom', 'A failed reporter is bonded to an alien entity, one of many symbiotes who have invaded Earth. But the being takes a liking to Earth and decides to protect it.', NULL, 6.6, 'M/14', '2018', '0000', 'https://www.youtube.com/embed/u9Mv98Gr5pY', 'assets/images/uploads/movies/venom.jpg', 'assets/images/uploads/movies/covers/venom.jpg'),
//     (40, 1, 'The Expendables 3', 'Barney augments his team with new blood for a personal battle: to take down Conrad Stonebanks, the Expendables co-founder and notorious arms trader who is hell bent on wiping out Barney and every single one of his associates.', NULL, 6.1, 'M/12', '2014', '0000', 'https://www.youtube.com/embed/4xD0junWlFc', 'assets/images/uploads/movies/xpendables_3.jpg', NULL),
//     (41, 2, 'Arcane: League of Legends', 'Set in Utopian Piltover and the oppressed underground of Zaun, the story follows the origins of two iconic League Of Legends champions and the power that will tear them apart.', 1, 9, 'M/14', '2021', NULL, 'https://www.youtube.com/embed/3MB3OK3Xnvs', 'assets/images/uploads/series/arcane.jpg', NULL),
//     (42, 2, 'Arrow', 'Spoiled billionaire playboy Oliver Queen is missing and presumed dead when his yacht is lost at sea. He returns five years later a changed man, determined to clean up the city as a hooded vigilante armed with a bow.', 8, 7.5, 'M/12', '2012', '2020', 'https://www.youtube.com/embed/ofzPONG8hDU', 'assets/images/uploads/series/arrow.jpg', NULL),
//     (43, 2, 'Black Lagoon', 'A Japanese businessman, captured by modern-day pirates, is written off and left for dead by his company. Tired of the corporate life, he opts to stick with the mercenaries that kidnapped him, becoming part of their gang.', 2, 7.9, 'M/18', '2006', '2006', NULL, 'assets/images/uploads/series/black_lagoon.jpg', NULL),
//     (44, 2, 'Bleach', 'High school student Ichigo Kurosaki, who has the ability to see ghosts, gains soul reaper powers from Rukia Kuchiki and sets out to save the world from \"Hollows\".', 17, 8.2, 'M/14', '2004', '2023', NULL, 'assets/images/uploads/series/bleach.jpg', NULL),
//     (45, 2, 'Bobs Burgers', 'Bob Belcher runs his dream restaurant with his wife and three children as their last hope of holding the family together.', 15, 8.2, 'M/14', '2011', NULL, 'https://www.youtube.com/embed/GDcOfvVVyzE', 'assets/images/uploads/series/bob_burguer.jpg', NULL),
//     (46, 2, 'Bones', 'Forensic anthropologist Dr. Temperance \"Bones\" Brennan and cocky F.B.I. Special Agent Seeley Booth build a team to investigate murders. Quite often, there is not more to examine than rotten flesh or mere bones.', 12, 7.8, 'M/14', '2005', '2017', 'https://www.youtube.com/embed/_47rwW4rePc', 'assets/images/uploads/series/bones.jpg', NULL),
//     (47, 2, 'Brooklyn Nine-Nine', 'Comedy series following the exploits of Det. Jake Peralta and his diverse, lovable colleagues as they police the NYPD 99th Precinct.', 8, 8.4, 'M/14', '2013', '2021', 'https://www.youtube.com/embed/icTOP9F17pU', 'assets/images/uploads/series/br_99.jpg', NULL),
//     (48, 2, 'Breaking Bad', 'A chemistry teacher diagnosed with inoperable lung cancer turns to manufacturing and selling methamphetamine with a former student in order to secure his family future.', 5, 9.5, 'M/16', '2008', '2013', NULL, 'assets/images/uploads/series/breaking_bad.jpg', 'assets/images/uploads/series/covers/breaking_bad.jpg'),
//     (49, 2, 'Bridgerton', 'The eight close-knit siblings of the Bridgerton family look for love and happiness in London high society.', 2, 7.4, 'M/16', '2020', NULL, 'https://www.youtube.com/embed/gpv7ayf_tyE', 'assets/images/uploads/series/bridgerton.jpg', NULL),
//     (50, 2, 'Cobra Kai', 'Decades after their 1984 All Valley Karate Tournament bout, a middle-aged Daniel LaRusso and Johnny Lawrence find themselves martial-arts rivals again.', 5, 8.5, 'M/14', '2018', '2024', 'https://www.youtube.com/embed/xCwwxNbtK6Y', 'assets/images/uploads/series/cobra_kai.jpg', NULL),
//     (51, 2, 'Cyberpunk: Edgerunners', 'A Street Kid trying to survive in a technology and body modification-obsessed city of the future. Having everything to lose, he chooses to stay alive by becoming an Edgerunner, a Mercenary outlaw also known as a Cyberpunk.', 1, 8.3, 'M/16', '2022', '2022', 'https://www.youtube.com/embed/JtqIas3bYhg', 'assets/images/uploads/series/cyberpunk.jpg', 'assets/images/uploads/series/covers/cyberpunk.jpg'),
//     (52, 2, 'Death Note: Desu nôto', 'An intelligent high school student goes on a secret crusade to eliminate criminals from the world after discovering a notebook capable of killing anyone whose name is written into it.', 1, 8.9, 'M/12', '2006', '2007', 'https://www.youtube.com/embed/NlJZ-YgAt-c', 'assets/images/uploads/series/death_note.jpg', NULL),
//     (53, 2, 'Doctor Who', 'The further adventures in time and space of the alien adventurer known as the Doctor and his companions from planet Earth.', 13, 8.6, 'M/12', '2005', NULL, 'https://youtu.be/RYIu7Qlqh4M', 'assets/images/uploads/series/doc_who.jpg', NULL),
//     (54, 2, 'Family Guy', 'In a wacky Rhode Island town, a dysfunctional family strives to cope with everyday life as they are thrown from one crazy scenario to another.', 22, 8.2, 'M/12', '1999', NULL, 'https://www.youtube.com/embed/qMAZYfwEJ6k', 'assets/images/uploads/series/family_guy.jpg', NULL),
//     (55, 2, 'Gilmore Girls', 'A dramedy centering around the relationship between a thirtysomething single mother and her teen daughter living in Stars Hollow, Connecticut.', 7, 8.2, 'M/12', '2000', '2007', 'https://www.youtube.com/embed/1F6_VK-Adt0', 'assets/images/uploads/series/gilmore_girls.jpg', 'assets/images/uploads/series/covers/gilmore_girls.jpg'),
//     (56, 2, 'Glee', 'A group of ambitious misfits try to escape the harsh realities of high school by joining a glee club headed by a passionate Spanish teacher.', 6, 6.8, 'M/12', '2009', '2015', 'https://www.youtube.com/embed/fLwB0TEbFAc', 'assets/images/uploads/series/glee.jpg', NULL),
//     (57, 2, 'Good Girls', 'Three suburban mothers suddenly find themselves in desperate circumstances and decide to stop playing it safe and risk everything to take back their power.', 4, 7.7, 'M/14', '2018', '2021', 'https://www.youtube.com/embed/kbjIaPzODs0', 'assets/images/uploads/series/good_girls.jpg', NULL),
//     (58, 2, 'Game of Thrones', 'Nine noble families fight for control over the lands of Westeros, while an ancient enemy returns after being dormant for a millennia.', 8, 9.2, 'M/16', '2011', '2019', 'https://www.youtube.com/embed/bjqEWgDVPe0', 'assets/images/uploads/series/got.jpg', NULL),
//     (59, 2, 'Greys Anatomy', 'A drama centered on the personal and professional lives of five surgical interns and their supervisors.', 19, 7.6, 'M/12', '2005', NULL, NULL, 'assets/images/uploads/series/greys_anatomy.jpg', NULL),
//     (60, 2, 'How I Met Your Mother', 'A father recounts to his children - through a series of flashbacks - the journey he and his four best friends took leading up to him meeting their mother.', 9, 8.3, 'M/14', '2005', '2014', 'https://www.youtube.com/embed/cjJLEYMzpjc', 'assets/images/uploads/series/himym.jpg', 'assets/images/uploads/series/covers/himym.jpg'),
//     (61, 2, 'Invincible', 'An adult animated series based on the Skybound/Image comic about a teenager whose father is the most powerful superhero on the planet.', 2, 8.7, 'M/18', '2021', NULL, 'https://www.youtube.com/embed/-bfAVpuko5o', 'assets/images/uploads/series/invincible.jpg', NULL),
//     (62, 2, 'Jane the Virgin', 'A young, devout Catholic woman discovers that she was accidentally artificially inseminated.', 5, 7.9, 'M/12', '2014', '2019', 'https://www.youtube.com/embed/JOKUcwrPFmg', 'assets/images/uploads/series/jane.jpg', NULL),
//     (63, 2, 'Lucifer', 'Lucifer Morningstar has decided he has had enough of being the dutiful servant in Hell and decides to spend some time on Earth to better understand humanity. He settles in Los Angeles - the City of Angels.', 6, 8.1, 'M/14', '2016', '2021', 'https://www.youtube.com/embed/X4bF_quwNtw', 'assets/images/uploads/series/lucifer.jpg', 'assets/images/uploads/series/covers/lucifer.jpg'),
//     (64, 2, 'The Mandalorian', 'The travels of a lone bounty hunter in the outer reaches of the galaxy, far from the authority of the New Republic.', 2, 8.7, 'M/12', '2019', NULL, 'https://www.youtube.com/embed/aOC8E8z_ifw', 'assets/images/uploads/series/mandalorian.jpg', NULL),
//     (65, 2, 'Modern Family', 'Three different but related families face trials and tribulations in their own uniquely comedic ways.', 11, 8.5, 'M/12', '2009', '2020', 'https://www.youtube.com/embed/Ub_lfN2VMIo', 'assets/images/uploads/series/modern_family.jpg', NULL),
//     (66, 2, 'Moon Knight', 'Steven Grant discovers he has been granted the powers of an Egyptian moon god. But he soon finds out that these newfound powers can be both a blessing and a curse to his troubled life.', 1, 7.3, 'M/14', '2022', NULL, 'https://www.youtube.com/embed/x7Krla_UxRg', 'assets/images/uploads/series/moon_knight.jpg', NULL),
//     (67, 2, 'New Girl', 'After a bad break-up, Jess, an offbeat young woman, moves into an apartment loft with three single men. Although they find her behavior very unusual, the men support her - most of the time.', 7, 7.8, 'M/14', '2011', '2018', 'https://www.youtube.com/embed/19jvAM1oZRA', 'assets/images/uploads/series/new_girl.jpg', NULL),
//     (68, 2, 'One Piece', 'In a seafaring world, a young pirate captain sets out with his crew to attain the title of Pirate King, and to discover the mythical treasure known as \'One Piece.\'', 1, 8.4, 'M/14', '2023', NULL, 'https://www.youtube.com/embed/l6kp780S-os', 'assets/images/uploads/series/one_piece_la.jpg', NULL),
//     (69, 2, 'Prison Break', 'A structural engineer installs himself in a prison he helped design, in order to save his falsely accused brother from a death sentence by breaking themselves out from the inside.', 5, 8.3, 'M/14', '2005', '2017', 'https://www.youtube.com/embed/VNHD_pHlrpM', 'assets/images/uploads/series/prison_break.jpg', NULL),
//     (70, 2, 'Psych', 'When a novice sleuth convinces the police he has psychic powers, he and his reluctant best friend are hired on as consultants to help solve complicated cases.', 8, 8.4, 'M/12', '2006', '2014', 'https://www.youtube.com/embed/gi6Ox__CCo8', 'assets/images/uploads/series/psych.jpg', NULL),
//     (71, 2, 'Seinfeld', 'The continuing misadventures of neurotic New York City stand-up comedian Jerry Seinfeld and his equally neurotic New York City friends.', 9, 8.9, 'M/12', '1989', '1998', 'https://www.youtube.com/embed/hQXKyIG_NS4', 'assets/images/uploads/series/seinfeld.jpg', NULL),
//     (72, 2, 'The Simpsons', 'The satiric adventures of a working-class family in the misfit city of Springfield.', 35, 8.7, 'M/12', '1989', NULL, NULL, 'assets/images/uploads/series/simpsons.jpg', NULL),
//     (73, 2, 'Sons of Anarchy', 'A biker struggles to balance being a father and being involved in an outlaw motorcycle club.', 7, 8.6, 'M/18', '2008', '2014', 'https://www.youtube.com/embed/paBZJJXUEtg', 'assets/images/uploads/series/sons_anarchy.jpg', NULL),
//     (74, 2, 'Ojing-eo geim - Squid Game', 'Hundreds of cash-strapped players accept a strange invitation to compete in children games. Inside, a tempting prize awaits with deadly high stakes: a survival game that has a whopping 45.6 billion-won prize at stake.', 1, 8, 'M/18', '2021', NULL, 'https://www.youtube.com/embed/oqxAJKy0ii4', 'assets/images/uploads/series/squid_game.jpg', NULL),
//     (75, 2, 'Stranger Things', 'When a young boy vanishes, a small town uncovers a mystery involving secret experiments, terrifying supernatural forces and one strange little girl.', 4, 8.7, 'M/16', '2016', NULL, 'https://www.youtube.com/embed/b9EkMc79ZSU', 'assets/images/uploads/series/st.jpg', 'assets/images/uploads/series/covers/st.jpg'),
//     (76, 2, 'Supernatural', 'Two brothers follow their father footsteps as hunters, fighting evil supernatural beings of many kinds, including monsters, demons, and gods that roam the earth.', 15, 8.4, 'M/14', '2005', '2020', 'https://www.youtube.com/embed/t-775JyzDTk', 'assets/images/uploads/series/supernatural.jpg', NULL),
//     (77, 2, 'The Boys', 'A group of vigilantes set out to take down corrupt superheroes who abuse their superpowers.', 3, 8.7, 'M/18', '2019', NULL, 'https://www.youtube.com/embed/5SKP1_F7ReE', 'assets/images/uploads/series/the_boys.jpg', NULL),
//     (78, 2, 'The Fall of the House of Usher', 'To secure their fortune (and future) two ruthless siblings build a family dynasty that begins to crumble when their heirs mysteriously die, one by one.', 1, 7.9, 'M/18', '2023', '2023', 'https://www.youtube.com/embed/yvuAWVzP6wI', 'assets/images/uploads/series/usher.jpg', NULL),
//     (79, 2, 'Vis a vis', 'She broke the law for the boss she fell in love with. Now this naive girl has to pay the price.', 4, 8.1, 'M/18', '2015', '2019', 'https://www.youtube.com/embed/UJZgmhHVV5Q', 'assets/images/uploads/series/vis_vis.jpg', NULL),
//     (80, 2, 'What If...?', 'Exploring pivotal moments from the Marvel Cinematic Universe and turning them on their head, leading the audience into uncharted territory.', 2, 7.4, 'M/14', '2021', NULL, 'https://www.youtube.com/embed/x9D0uUKJ5KI', 'assets/images/uploads/series/what_if.jpg', NULL);
// ");

// $pdo->exec(
//     "INSERT INTO show_categories (show_id, category_id) 
//     VALUES
//     (1, 1),
//     (1, 2),
//     (1, 7),
//     (2, 1),
//     (2, 2),
//     (2, 9),
//     (3, 1),
//     (3, 9),
//     (4, 1),
//     (4, 2),
//     (4, 6),
//     (5, 1),
//     (5, 4),
//     (5, 11),
//     (6, 1),
//     (6, 4),
//     (6, 7),
//     (7, 1),
//     (7, 3),
//     (7, 11),
//     (8, 1),
//     (8, 2),
//     (8, 13),
//     (9, 1),
//     (9, 4),
//     (9, 9),
//     (10, 2),
//     (10, 3),
//     (10, 13),
//     (11, 1),
//     (11, 2),
//     (11, 4),
//     (12, 6),
//     (13, 1),
//     (13, 2),
//     (13, 11),
//     (14, 6),
//     (14, 7),
//     (15, 3),
//     (15, 6),
//     (16, 4),
//     (16, 11),
//     (17, 1),
//     (17, 2),
//     (17, 9),
//     (18, 1),
//     (18, 2),
//     (18, 13),
//     (19, 1),
//     (19, 7),
//     (19, 11),
//     (20, 1),
//     (20, 2),
//     (20, 9),
//     (21, 2),
//     (21, 4),
//     (21, 9),
//     (22, 3),
//     (22, 4),
//     (22, 11),
//     (23, 1),
//     (23, 2),
//     (23, 13),
//     (24, 1),
//     (24, 2),
//     (24, 4),
//     (25, 2),
//     (25, 3),
//     (25, 13),
//     (26, 1),
//     (26, 3),
//     (26, 13),
//     (27, 4),
//     (27, 10),
//     (28, 4),
//     (28, 11),
//     (29, 1),
//     (29, 6),
//     (29, 9),
//     (30, 2),
//     (30, 3),
//     (30, 13),
//     (31, 6),
//     (31, 7),
//     (32, 6),
//     (32, 7),
//     (33, 4),
//     (33, 6),
//     (34, 1),
//     (34, 2),
//     (34, 13),
//     (35, 1),
//     (35, 2),
//     (35, 5),
//     (36, 1),
//     (36, 2),
//     (36, 5),
//     (37, 1),
//     (37, 9),
//     (38, 1),
//     (38, 2),
//     (38, 3),
//     (39, 1),
//     (39, 2),
//     (39, 9),
//     (40, 1),
//     (40, 2),
//     (40, 7),
//     (41, 1),
//     (41, 2),
//     (41, 13),
//     (42, 1),
//     (42, 2),
//     (42, 11),
//     (43, 1),
//     (43, 2),
//     (43, 13),
//     (44, 1),
//     (44, 2),
//     (44, 13),
//     (45, 3),
//     (45, 13),
//     (46, 4),
//     (46, 11),
//     (47, 3),
//     (47, 11),
//     (48, 4),
//     (48, 7),
//     (48, 11),
//     (49, 4),
//     (49, 8),
//     (50, 1),
//     (50, 3),
//     (50, 4),
//     (51, 1),
//     (51, 2),
//     (51, 13),
//     (52, 4),
//     (52, 11),
//     (52, 13),
//     (53, 2),
//     (53, 4),
//     (53, 9),
//     (54, 3),
//     (54, 13),
//     (55, 3),
//     (55, 4),
//     (56, 3),
//     (56, 4),
//     (57, 3),
//     (57, 4),
//     (57, 11),
//     (58, 1),
//     (58, 2),
//     (58, 4),
//     (59, 4),
//     (59, 8),
//     (60, 3),
//     (60, 4),
//     (60, 8),
//     (61, 1),
//     (61, 2),
//     (61, 13),
//     (62, 3),
//     (63, 4),
//     (63, 5),
//     (63, 11),
//     (64, 1),
//     (64, 2),
//     (64, 5),
//     (65, 3),
//     (65, 4),
//     (65, 8),
//     (66, 1),
//     (66, 2),
//     (66, 5),
//     (67, 3),
//     (67, 8),
//     (68, 1),
//     (68, 2),
//     (68, 3),
//     (69, 1),
//     (69, 4),
//     (69, 11),
//     (70, 3),
//     (70, 11),
//     (71, 3),
//     (72, 3),
//     (72, 13),
//     (73, 4),
//     (73, 7),
//     (73, 11),
//     (74, 1),
//     (74, 4),
//     (75, 4),
//     (75, 5),
//     (75, 6),
//     (76, 4),
//     (76, 5),
//     (76, 6),
//     (77, 1),
//     (77, 3),
//     (77, 11),
//     (78, 4),
//     (78, 6),
//     (79, 4),
//     (79, 7),
//     (80, 1),
//     (80, 2),
//     (80, 13);
// ");

// $pdo->exec(
//     "INSERT INTO user_reviews(id, id_user, id_show, comment, rating, attachments)
//     VALUES
//     (1, 1, 1, 'Loved it! Great Music!', 8.3, NULL),
//     (2, 1, 41, 'Its the guys from League of Legends!! :o', 7.4, NULL),
//     (3, 1, 27, 'I dont understand whats the hype about...', 3.6, NULL),
//     (4, 2, 41, 'GREAT SHOW! CANT WAIT FOR SEASON 2!!!', 9, NULL);
//     ");
?>
