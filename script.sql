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

-- Insertion dans la table Article
INSERT INTO article (titre, photo, sous_titre, chapeau, corps, auteur_id, date, categorie_id) VALUES
('Les dernières innovations en IA', 'photo1.jpg', 'L’intelligence artificielle est en constante évolution', 'Dans cet article, nous explorons les dernières avancées dans le domaine de l’intelligence artificielle.', 'L’intelligence artificielle a parcouru un long chemin ces dernières années. Des applications variées comme la reconnaissance vocale, la conduite autonome et même la médecine commencent à utiliser ces technologies pour améliorer la vie des gens.', 1, '2025-03-18', 1),
('Les secrets d’un curry végétarien réussi', 'photo2.jpg', 'Un curry végétarien facile et savoureux', 'Découvrez les astuces pour préparer un curry végétarien délicieux avec des ingrédients frais et sains.', 'Le curry végétarien est un plat plein de saveurs, facile à préparer et parfait pour les repas de la semaine. Vous y trouverez des épices qui réchauffent, des légumes frais et une sauce riche et crémeuse.', 2, '2025-03-18', 2),
('Voyage au Japon : top des incontournables', 'photo3.jpg', 'Découvrez les merveilles du Japon', 'Le Japon est un pays qui attire de plus en plus de touristes. Découvrez les lieux incontournables pour un séjour inoubliable.', 'Le Japon offre une expérience unique avec ses temples historiques, ses jardins zen, ses paysages magnifiques et sa culture riche. Voici une sélection des meilleurs endroits à visiter.', 1, '2025-03-18', 3);
