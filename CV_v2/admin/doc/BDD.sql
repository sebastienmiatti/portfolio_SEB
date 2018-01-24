CREATE TABLE t_utilisateurs (
    id_utilisateur INT (3),
    prenom VARCHAR (30),
    nom VARCHAR (30),
    email VARCHAR (50),
    telephone INT (10),
    mdp VARCHAR (12),
    pseudo VARCHAR (30),
    avatar VARCHAR (20),
    age INT (3),
    date_naissance DATE,
    sexe ENUM ('H', 'F'),
    etat_civil ENUM ('M.', 'Mme'),
    adresse VARCHAR (50),
    code_postal INT (5),
    ville VARCHAR (30),
    pays VARCHAR (20),
    site_web VARCHAR (50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE t_titre_cv (
    id_titre_cv INT,
    titre_cv TEXT,
    accroche TEXT,
    utilisateur_id INT (3)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE t_loisirs (
    id_loisir INT (3),
    loisir VARCHAR (30),
    utilisateur_id INT (3)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE t_competences (
    id_competence INT (3),
    competence VARCHAR (30),
    c_niveau INT (3),
    utilisateur_id INT (3)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
