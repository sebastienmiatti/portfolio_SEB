<?php

// Fonction pour afficher les debug (print_r())
function debug($tab){
	echo '<div style="color: white; padding: 20px; font-weight: bold; background:#' . rand(111111, 999999) . '">';

	$trace = debug_backtrace(); // Retourne les infos sur l'emplacement où est exécutée une fonction
	echo 'Le debug a été demandé dans le fichier : ' . $trace[0]['file'] . ' à la ligne : ' . $trace[0]['line'] . '<hr/>';

	echo '<pre>';
	print_r($tab);
	echo '</pre>';

	echo '</div>';
}

// paramètres de traitement d'une table en fonction de celle choisie
function table_choisie($table){
	switch ($table) {
		// table t_compétences
		case 't_utilisateurs' :
		$data = array(
			'table' => $table,
			'affiche_nom_table' => 'utilisateurs',
			'colonnes' => array(
				'prenom' => 'Prénom',
				'nom' => 'nom',
				'email' => 'email',
				'telephone' => 'téléphone',
				'autre_tel' => 'Autre téléphone',
				// 'mdp' => 'mdp',
				'pseudo' => 'Pseudo',
				'avatar' => 'avatar',
				'date_naissance' => 'date de naissance',
				'sexe' => 'Sexe',
				'etat_civil' => 'Etat civil',
				'adresse' => 'Adresse',
				'code_postal' => 'Code postal',
				'ville' => 'Ville',
				'pays' => 'Pays',
				'site_web' =>'Site web'
			),
			'largeur_tableau' => '12'
		);
		break;

		case 't_competences' :
		$data = array(
			'table' => $table,
			'affiche_nom_table' => 'compétences',
			'colonnes' => array('competence' => 'Compétence', 'c_description' => 'Description', 'c_niveau' => 'Niveau en %'),
			'largeur_tableau' => '3'
		);
		break;

		// table t_titre_CV
		case 't_titre_cv' :
		$data = array(
			'table' => $table,
			'affiche_nom_table' => 'titres CV',
			'colonnes' => array('titre_cv' => 'Titre', 'description' => 'Description', 'accroche' => 'Accroche', 'logo' => 'Logo'),
			'largeur_tableau' => '6'
		);
		break;

		// table t_formations
		case 't_formations' :
			$data = array(
				'table' => $table,
				'affiche_nom_table' => 'formations',
				'colonnes' => array('f_titre' => 'Titre', 'f_soustitre' => 'Sous-titre', 'f_dates' => 'Dates','f_description' => 'Description'),
				'largeur_tableau' => '8'
			);
			break;

			// table t_realisations
			case 't_realisations' :
			$data =  array(
				'table' => $table,
				'affiche_nom_table' => 'réalisations',
				'colonnes' => array('r_titre' => 'Titre', 'r_soustitre' => 'Sous-titre', 'r_lien' => 'Lien', 'r_photos' => 'Photos', 'r_dates' => 'Dates','r_description' => 'Description'),
				'largeur_tableau' => '8'
			);
			break;

			// table t_experiences
			case 't_experiences' :
			$data =  array(
				'table' => $table,
				'affiche_nom_table' => 'expériences',
				'colonnes' => array('e_titre' => 'Titre', 'e_soustitre' => 'Sous-titre', 'e_type' => 'Type', 'e_dates' => 'Dates', 'e_description' => 'Description'),
				'largeur_tableau' => '8'
			);
			break;

			// table t_loisirs
			case 't_loisirs' :
			$data =  array(
				'table' => $table,
				'affiche_nom_table' => 'loisirs',
				'colonnes' => array('loisir' => 'Loisirs'),
				'largeur_tableau' => '3'
			);
			break;

			// table t_reseaux
			case 't_reseaux' :
			$data =  array(
				'table' => $table,
				'affiche_nom_table' => 'réseaux',
				'colonnes' => array('nom' => 'Nom', 'lien' => 'Lien', 'logo' => 'Logo'),
				'largeur_tableau' => '4'
			);
			break;

			// table t_logos
			case 't_logos' :
			$data =  array(
				'table' => $table,
				'affiche_nom_table' => 'logos',
				'colonnes' => array('src' => 'Source', 'alt' => 'Alternative'),
				'largeur_tableau' => '4'
			);
			break;

			// table t_points_forts
			case 't_points_forts' :
			$data =  array(
				'table' => $table,
				'affiche_nom_table' => 'points forts',
				'colonnes' => array('point_fort' => 'Point fort'),
				'largeur_tableau' => '3'
			);
			break;

			// table t_points_forts
			case 't_interets' :
			$data =  array(
				'table' => $table,
				'affiche_nom_table' => 'centres d\'intérêt',
				'colonnes' => array('centre' => 'Centres d\'intérêt'),
				'largeur_tableau' => '3'
			);
			break;

			// table t_points_forts
			case 't_activites' :
			$data =  array(
				'table' => $table,
				'affiche_nom_table' => 'activités associatives',
				'colonnes' => array('activite' => 'activité associative'),
				'largeur_tableau' => '3'
			);
			break;

			default :
			$data = 'erreur';

		}
		return $data;
	}

	function table_liste($pdoCV, $table){
		$noUtilisateur = ($table != "t_utilisateurs")?" WHERE id_utilisateur=".$_SESSION['utilisateur_bo']['id']:"";
		$req= $pdoCV->prepare("SELECT * FROM ".$table.$noUtilisateur);
		$req->execute();
		$nbr_lignes = $req-> rowCount();
		$retour = array();
		$contenu = '';

		$lignes = $req->fetchAll(PDO::FETCH_ASSOC);
		// debug($lignes);
		$contenu .= '<h1>Liste des '.$_SESSION['table']['affiche_nom_table'].'</h1>';


		$contenu .= '<div class="row">';
		$contenu .= '    <div class="parent-table">';
		$contenu .= '<p class="text-center">Il ';

		$contenu .= ($nbr_lignes==0)?'n\'y en a pas':'y en a ';
		$contenu .= ($nbr_lignes==0)?'':$nbr_lignes.' ';
		// $contenu .= $_SESSION['table']['affiche_nom_table'];
		// $contenu .= ($nbr_lignes>1)?'s':'';

		$contenu .= ' </p>';

		$contenu .= '        <table>';
		$contenu .= '            <tr>';
		foreach($_SESSION['table']['colonnes'] as $titre){
			$contenu .= '                <th class="text-center">'.$titre.'</th>';
		}
		$contenu .= '                <th class="text-center">Actions</th>';
		$contenu .= '            </tr>';

		foreach($lignes as $ligne) {

			$contenu .= '                <tr>';
			foreach($_SESSION['table']['colonnes'] as $key =>$colonne) {
				// debug($ligne);

				switch ($key){
					case 'telephone' :
					case 'autre_tel' :
					$affiche = wordwrap($ligne["$key"], 2, ' ', true);
					break;

					case 'date_naissance' :
					$affiche = substr($ligne["$key"], 8) . '/';
					$affiche .= substr($ligne["$key"], 5, 2) . '/';
					$affiche .= substr($ligne["$key"], 0, 4);
					break;

					default:
					$affiche = $ligne["$key"];

				}

				$contenu .= '                    <td>'.$affiche.'</td>';
				// $contenu .= '                    <td>'.$ligne["$key"].'</td>';
			}
			$contenu .= '                    <td class="text-center">';

			// $contenu .= '                            <button type="button" onclick="form_ajout('.$ligne['id'].')" class="btn btn-info">';
			$contenu .= '                            <button type="button" class="btn btn-info modif" data-id="' . $ligne['id'] . '">';
			$contenu .= '                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>';
			$contenu .= '                            </button>';

			// $contenu .= '                            <button onclick="suppr('.$ligne['id'].')"  type="button" class="btn btn-danger">';
			$contenu .= '                            <button type="button" class="btn btn-danger suppr" data-id="' . $ligne['id'] . '">';
			$contenu .= '                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>';
			$contenu .= '                            </button>';

			$contenu .= '                    </td>';

			$contenu .= '                </tr>';
		}

		$contenu .= '        </table>';

		$contenu .= '    </div>';
		$contenu .= '</div>';
		$contenu .= '<div class="row">';
		if ($table != 't_utilisateurs'){
			$contenu .= '    <button id="ajout" type="button" class="btn btn-primary center-block" data-id="0">';
			$contenu .= '    Ajout';
			$contenu .= '                            </button>';
		}
		$contenu .= '</div>';

		// $contenu .= '<script src="js/ajax.js"></script>';
		// return $contenu;

		$retour['contenu'] = $contenu;
		$retour['title'] = 't'.$_SESSION['table']['affiche_nom_table'] . ' - Admin : ' . $_SESSION['utilisateur_bo']['pseudo'];


		return $retour;


	}

	function table_form($pdoCV, $table, $id){
		$action=($id==0)?'ajouter':'modifier';

		$retour = array();
		$req= $pdoCV->prepare("SELECT * FROM " . $table . " WHERE id=" . $id);
		$req->execute();
		$ligne = $req->fetch(PDO::FETCH_ASSOC);

		$contenu = '';
		$contenu = '		<div class="container">';
		$contenu = '	        <div class="row">';
		$contenu = '	            <div class="col-md-4 col-md-offset-4 cadre-form">';

		$contenu .= '<h1>'.$_SESSION['table']['affiche_nom_table'].' à '.$action.' </h1>';
		$contenu .= '		<form id="formulaire" action="table_ins.php" method="post">';
		// $contenu .= '		<form id="formulaire"  class="form-inline">';
		$contenu .= '				<input hidden type="number" name="id" value="'.$id.'">';
		foreach ($_SESSION['table']['colonnes'] as $key => $col){

			$contenu .= '			<div class="form-group">';
			$contenu .= '				<label for="' . $key . '">' . $_SESSION['table']['colonnes'][$key] . '</label>';

			// cas d'un champ textarea
			$textarea = '				<textarea name="'
			. $key
			.'" class="form-control" placeholder="'
			.$_SESSION["table"]["colonnes"]["$key"]
			.' à saisir">'
			. ((isset($ligne["$key"]))?$ligne["$key"]:"")
			.'</textarea>';

			// cas d'un champ input
			$input = '				<input type="text" class="form-control"  name="'
			.$key
			.'" placeholder="'
			.$_SESSION["table"]["colonnes"]["$key"]
			.' à saisir"  value="'
			. ((isset($ligne["$key"]))?$ligne["$key"]:"")
			. '">';

			// choix d'un champ textarea pour le champ 'accroche' de la table 'titre_cv'  et les champs 'description' des tables
			$contenu .= (!strstr($key, 'description') && $key != 'accroche')?$input:$textarea;







			$contenu .= '			</div>';
		}

		// $contenu .= '			<div class="form-group">';
		// $contenu .= '				<input type="number" class="form-control" name="c_niveau" id="c_niveau" placeholder="Inserez le niveau"  value="'.$c_niveau.'">';
		// $contenu .= '			</div>';

		$contenu .= '			<button type="submit" class="btn btn-primary center-block"  >Enregistrer</button>';
		$contenu .= '		</form>';
		$contenu .= '			</div>';
		$contenu .= '			</div>';
		$contenu .= '			</div>';

		// $contenu .= '<script src="js/ajax.js"></script>';

		// return $contenu;
		$retour['contenu'] = $contenu;
		$retour['title'] = 't'.$_SESSION['table']['affiche_nom_table'] . ' - Admin : ' . $_SESSION['utilisateur_bo']['pseudo'];

		return $retour;

	}

	// fonction pour voir si un utilisateur est connecté:
	function userConnecte(){
		if(isset($_SESSION['utilisateur_bo'])){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	// Cette fonction nous retourne TRUE si l'utilisateur est connecté et false, s'il ne l'est pas.

	// Fonction pour voir si l'utilisateur est admin :
	function userAdmin(){
		if(userConnecte() && $_SESSION['utilisateur_bo']['statut'] == 1){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	// Si l'utilisateur est connecté... et en plus si son statut c'est 1 alors il a les droits d'admin et pourra accéder au backoffice.
