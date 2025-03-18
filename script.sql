-- Table Auteur
CREATE TABLE auteur (
    id SERIAL PRIMARY KEY,  -- clé primaire auto-incrémentée
    nom TEXT NOT NULL,      -- nom de l'auteur
    a_propos TEXT           -- description de l'auteur
);

-- Table Categorie
CREATE TABLE categorie (
    id SERIAL PRIMARY KEY,  -- clé primaire auto-incrémentée
    nom TEXT NOT NULL       -- nom de la catégorie
);

-- Table Article
CREATE TABLE article (
    id SERIAL PRIMARY KEY,          -- clé primaire auto-incrémentée
    titre TEXT NOT NULL,            -- titre de l'article
    photo TEXT,                     -- lien vers la photo de l'article
    sous_titre TEXT,                -- sous-titre de l'article
    chapeau TEXT,                   -- introduction de l'article
    corps TEXT NOT NULL,            -- corps de l'article
    auteur_id INT REFERENCES auteur(id),  -- référence à l'auteur
    date DATE NOT NULL,             -- date de publication
    categorie_id INT REFERENCES categorie(id) -- référence à la catégorie
);
-- Insertion dans la table Auteur
INSERT INTO auteur (nom, a_propos) VALUES
('Jean Dupont', 'Journaliste passionné par les nouvelles technologies et les tendances actuelles.'),
('Marie Martin', 'Experte en cuisine végétarienne et auteure de plusieurs livres de recettes.');

-- Insertion dans la table Categorie
INSERT INTO categorie (nom) VALUES
('Technologie'),
('Cuisine'),
('Voyage'),
('Culture');

INSERT INTO categorie (nom) VALUES
('Scandales'),
('Solidarité');

-- Insertion dans la table Article
INSERT INTO article (titre, photo, sous_titre, chapeau, corps, auteur_id, date, categorie_id) VALUES
('Les dernières innovations en IA', 'photo1.jpg', 'L’intelligence artificielle est en constante évolution', 'Dans cet article, nous explorons les dernières avancées dans le domaine de l’intelligence artificielle.', 'L’intelligence artificielle a parcouru un long chemin ces dernières années. Des applications variées comme la reconnaissance vocale, la conduite autonome et même la médecine commencent à utiliser ces technologies pour améliorer la vie des gens.', 1, '2025-03-18', 1),
('Les secrets d’un curry végétarien réussi', 'photo2.jpg', 'Un curry végétarien facile et savoureux', 'Découvrez les astuces pour préparer un curry végétarien délicieux avec des ingrédients frais et sains.', 'Le curry végétarien est un plat plein de saveurs, facile à préparer et parfait pour les repas de la semaine. Vous y trouverez des épices qui réchauffent, des légumes frais et une sauce riche et crémeuse.', 2, '2025-03-18', 2),
('Voyage au Japon : top des incontournables', 'photo3.jpg', 'Découvrez les merveilles du Japon', 'Le Japon est un pays qui attire de plus en plus de touristes. Découvrez les lieux incontournables pour un séjour inoubliable.', 'Le Japon offre une expérience unique avec ses temples historiques, ses jardins zen, ses paysages magnifiques et sa culture riche. Voici une sélection des meilleurs endroits à visiter.', 1, '2025-03-18', 3);

-- Insertion dans la table Article
INSERT INTO article (titre, photo, sous_titre, chapeau, corps, auteur_id, date, categorie_id) VALUES
('Scandale : Leonardo DiCaprio accusé de fraude fiscale', 'photo4.jpg', 'Un nouveau scandale secoue le monde des célébrités', 'Les récentes accusations portées contre Leonardo DiCaprio font la une des journaux.', 'Une enquête internationale a révélé que Leonardo DiCaprio aurait dissimulé des millions de dollars dans des paradis fiscaux afin d’échapper à l’impôt. Selon des documents fuités, des sociétés écrans auraient été créées pour masquer les transactions. Cette révélation a choqué les fans, qui peinent à croire que l’acteur engagé dans des causes écologiques soit impliqué dans une telle affaire. L’intéressé n’a pour le moment fait aucun commentaire officiel.', 1, '2025-03-18', 4),

('Will Smith surpris dans une altercation explosive', 'photo5.jpg', 'Le comportement inattendu de Will Smith fait scandale', 'Will Smith fait de nouveau parler de lui après une altercation qui a choqué les témoins.', 'Des témoins affirment avoir vu Will Smith s’emporter lors d’un événement privé à Los Angeles. Selon les vidéos partagées sur les réseaux sociaux, l’acteur aurait eu des mots très durs envers un producteur de renom, avant d’être calmé par des proches. Cet incident intervient après une série de polémiques qui ternissent l’image de l’acteur, autrefois adoré du grand public. Pour l’instant, son équipe de communication n’a pas souhaité réagir.', 2, '2025-03-18', 4),

('Appel urgent : Aidez les victimes des récentes inondations à Madagascar', 'photo6.jpg', 'Unissez-vous pour soutenir les sinistrés', 'De violentes inondations ont dévasté plusieurs régions à Madagascar, laissant des milliers de personnes sans abri.', 'Les fortes pluies qui se sont abattues sur le pays ces dernières semaines ont causé des dégâts considérables. Des villages entiers ont été submergés, forçant les habitants à fuir leurs maisons. Les organisations humanitaires se mobilisent pour fournir une assistance d’urgence, mais les besoins restent immenses : abris temporaires, nourriture, eau potable et soins médicaux. Chacun peut contribuer à alléger la souffrance des sinistrés en faisant un don. Ensemble, faisons la différence.', 1, '2025-03-18', 5),

('Marathon caritatif : Angelina Jolie court pour la recherche médicale', 'photo7.jpg', 'Participez à un événement solidaire', 'Angelina Jolie se mobilise pour la recherche sur les maladies rares à travers un marathon exceptionnel.', 'Angelina Jolie, connue pour son engagement humanitaire, a annoncé sa participation à un marathon caritatif destiné à collecter des fonds pour la recherche médicale. L’événement, qui aura lieu à Paris, rassemblera des milliers de participants. Chaque kilomètre parcouru contribuera à financer des projets innovants et à soutenir les familles touchées par ces maladies. L’actrice espère que cet événement incitera d’autres personnalités à se joindre à la cause.', 2, '2025-03-18', 5);
