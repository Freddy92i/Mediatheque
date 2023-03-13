<?php
include '../config.php';
?>
<html>
    <head>
        <link href="<?= SITE_URL ?>/style/style.css" rel="stylesheet">
    </head>

<?php
	include '../interface/navbar.php';

// Clé API TMDB
$api_key = "819b3b9f2b6ec0428a3888d8c512ba08";

// Configuration de l'URL de l'API
$url = "https://api.themoviedb.org/3/discover/movie";
$url .= "?api_key={$api_key}";
$url .= "&with_genres=28"; // ID du genre d'action
$url .= "&sort_by=release_date.desc";
$url .= "&page=1";

// Affichage des 5 derniers films d'action

		// Récupération des données JSON de l'API
		$data = file_get_contents($url);
		
		// Conversion des données JSON en tableau associatif
		$data = json_decode($data, true);
		
		// Affichage des 5 derniers films d'action
		if (isset($data['results'])) {
			$films = array_slice($data['results'], 0, 5);
		
			echo '<div class="block-selection"">';
			echo '<div style="text-align: center; padding-top: 2rem;color: #E0E0E0;"><p class="selection"> SÉLECTION</p>';
			echo '<div style="text-align: center; margin-top: 2rem;color: #E0E0E0;"> Action';
			?>
			<a style="color: #E0E0E0;margin: auto;width: 50%;display: block; margin-top: 2rem;";>
				Plongez dans l'univers de l'action et vibrez au rythme des cascades, combats et explosions les plus spectaculaires.
				Découvrez des héros au courage sans limite et des ennemis implacables dans des intrigues palpitantes et complexes.
				Laissez-vous emporter par l'énergie débordante et l'adrénaline de films qui vous feront vibrer jusqu'à la dernière minute.
			</a>
			
			<?php
			echo '<ul style="list-style-type: none; margin-top: 2rem; display: flex;flex-wrap: nowrap;overflow-x: auto;margin-top: 2rem;padding: 0;justify-content: center;">';
		
			foreach ($films as $film) {
				$poster = "https://image.tmdb.org/t/p/w200/{$film['poster_path']}";
				$title = $film['title'];
		
				echo '<li style="margin-right: 10px;">';
				echo '<a href="<?= SITE_URL ?>/pages/movie.php?id='.$film['id'].'">';
				echo '<img class="affiche-film" src="'.$poster.'" alt="'.$title.'" style="width: 100%; border-radius: 10px;">';
				echo '<div style="text-align: center; color: #E0E0E0 ; margin-top: 5px;">'.$title.'</div>';
				echo '</a>';
				echo '</li>';
			}
		
			if (count($data['results']) > 5) {
				$count = count($data['results']) - 5;
				echo '<li style="margin-right: 10px;">';
				echo '<div style="border: solid black;background: black;width: 100%;height: 91%;border-radius: 10px;text-align: center;color: #fff;display: flex;flex-direction: column;justify-content: center;">+'.$count.' films d’action</div>';
				echo '</li>';
			}
		
			echo '</ul>';
			echo '</div>';
		}
		?>

		<a href="discover.php?genre=28">
		<button class="btn-voirplus">
			<i class="fa fa-plus"></i> Voir toute la sélection 
		</button>
		</a>
<?php

// Configuration de l'URL de l'API
$url = "https://api.themoviedb.org/3/discover/movie";
$url .= "?api_key={$api_key}";
$url .= "&with_genres=80"; // ID du genre d'action
$url .= "&sort_by=release_date.desc";
$url .= "&page=1";

// Affichage des 5 derniers films de comédie

// Récupération des données JSON de l'API
$data = file_get_contents($url);

// Conversion des données JSON en tableau associatif
$data = json_decode($data, true);

// Affichage des 5 derniers films d'action
if (isset($data['results'])) {
	$films = array_slice($data['results'], 0, 5);

	echo '<div class="block-selection"">';
	echo '<div style="text-align: center; padding-top: 2rem;color: #E0E0E0;"><p class="selection"> SÉLECTION</p>';
	echo '<div style="text-align: center; margin-top: 2rem;color: #E0E0E0;"> Crime';
	?>
	<a style="color: #E0E0E0;margin: auto;width: 50%;display: block; margin-top: 2rem;";>
		Plongez dans l'univers de l'action et vibrez au rythme des cascades, combats et explosions les plus spectaculaires.
		Découvrez des héros au courage sans limite et des ennemis implacables dans des intrigues palpitantes et complexes.
		Laissez-vous emporter par l'énergie débordante et l'adrénaline de films qui vous feront vibrer jusqu'à la dernière minute.
	</a>
	
	<?php
	echo '<ul style="list-style-type: none; margin-top: 2rem; display: flex;flex-wrap: nowrap;overflow-x: auto;margin-top: 2rem;padding: 0;justify-content: center;">';

	foreach ($films as $film) {
		$poster = "https://image.tmdb.org/t/p/w200/{$film['poster_path']}";
		$title = $film['title'];

		echo '<li style="margin-right: 10px;">';
		echo '<a href="<?= SITE_URL ?>/pages/movie.php?id='.$film['id'].'">';
		echo '<img class="affiche-film" src="'.$poster.'" alt="'.$title.'" style="width: 100%; border-radius: 10px;">';
		echo '<div style="text-align: center; color: #E0E0E0 ; margin-top: 5px;">'.$title.'</div>';
		echo '</a>';
		echo '</li>';
	}

	if (count($data['results']) > 5) {
		$count = count($data['results']) - 5;
		echo '<li style="margin-right: 10px;">';
		echo '<div style="border: solid black;background: black;width: 100%;height: 91%;border-radius: 10px;text-align: center;color: #fff;display: flex;flex-direction: column;justify-content: center;">+'.$count.' films Criminel</div>';
		echo '</li>';
	}

	echo '</ul>';
	echo '</div>';
}
?>

<a href="discover.php?genre=80">
<button class="btn-voirplus">
	<i class="fa fa-plus"></i> Voir toute la sélection 
</button>
</a>





<?php

// Configuration de l'URL de l'API
$url = "https://api.themoviedb.org/3/discover/movie";
$url .= "?api_key={$api_key}";
$url .= "&with_genres=9648"; // ID du genre d'action
$url .= "&sort_by=release_date.desc";
$url .= "&page=1";

// Affichage des 5 derniers films de comédie

// Récupération des données JSON de l'API
$data = file_get_contents($url);

// Conversion des données JSON en tableau associatif
$data = json_decode($data, true);

// Affichage des 5 derniers films d'action
if (isset($data['results'])) {
	$films = array_slice($data['results'], 0, 5);

	echo '<div class="block-selection"">';
	echo '<div style="text-align: center; padding-top: 2rem;color: #E0E0E0;"><p class="selection"> SÉLECTION</p>';
	echo '<div style="text-align: center; margin-top: 2rem;color: #E0E0E0;"> Mystère';
	?>
	<a style="color: #E0E0E0;margin: auto;width: 50%;display: block; margin-top: 2rem;";>
		Plongez dans l'univers de l'action et vibrez au rythme des cascades, combats et explosions les plus spectaculaires.
		Découvrez des héros au courage sans limite et des ennemis implacables dans des intrigues palpitantes et complexes.
		Laissez-vous emporter par l'énergie débordante et l'adrénaline de films qui vous feront vibrer jusqu'à la dernière minute.
	</a>
	
	<?php
	echo '<ul style="list-style-type: none; margin-top: 2rem; display: flex;flex-wrap: nowrap;overflow-x: auto;margin-top: 2rem;padding: 0;justify-content: center;">';

	foreach ($films as $film) {
		$poster = "https://image.tmdb.org/t/p/w200/{$film['poster_path']}";
		$title = $film['title'];

		echo '<li style="margin-right: 10px;">';
		echo '<a href="<?= SITE_URL ?>/pages/movie.php?id='.$film['id'].'">';
		echo '<img class="affiche-film" src="'.$poster.'" alt="'.$title.'" style="width: 100%; border-radius: 10px;">';
		echo '<div style="text-align: center; color: #E0E0E0 ; margin-top: 5px;">'.$title.'</div>';
		echo '</a>';
		echo '</li>';
	}

	if (count($data['results']) > 5) {
		$count = count($data['results']) - 5;
		echo '<li style="margin-right: 10px;">';
		echo '<div style="border: solid black;background: black;width: 100%;height: 91%;border-radius: 10px;text-align: center;color: #fff;display: flex;flex-direction: column;justify-content: center;">+'.$count.' films Mystérieux </div>';
		echo '</li>';
	}

	echo '</ul>';
	echo '</div>';
}
?>

<a href="discover.php?genre=9648">
<button class="btn-voirplus">
	<i class="fa fa-plus"></i> Voir toute la sélection 
</button>
</a>







<?php

// Configuration de l'URL de l'API
$url = "https://api.themoviedb.org/3/discover/movie";
$url .= "?api_key={$api_key}";
$url .= "&with_genres=10749"; // ID du genre d'action
$url .= "&sort_by=release_date.desc";
$url .= "&page=1";

// Affichage des 5 derniers films de comédie

// Récupération des données JSON de l'API
$data = file_get_contents($url);

// Conversion des données JSON en tableau associatif
$data = json_decode($data, true);

// Affichage des 5 derniers films d'action
if (isset($data['results'])) {
	$films = array_slice($data['results'], 0, 5);

	echo '<div class="block-selection"">';
	echo '<div style="text-align: center; padding-top: 2rem;color: #E0E0E0;"><p class="selection"> SÉLECTION</p>';
	echo '<div style="text-align: center; margin-top: 2rem;color: #E0E0E0;"> Romance';
	?>
	<a style="color: #E0E0E0;margin: auto;width: 50%;display: block; margin-top: 2rem;";>
		Plongez dans l'univers de l'action et vibrez au rythme des cascades, combats et explosions les plus spectaculaires.
		Découvrez des héros au courage sans limite et des ennemis implacables dans des intrigues palpitantes et complexes.
		Laissez-vous emporter par l'énergie débordante et l'adrénaline de films qui vous feront vibrer jusqu'à la dernière minute.
	</a>
	
	<?php
	echo '<ul style="list-style-type: none; margin-top: 2rem; display: flex;flex-wrap: nowrap;overflow-x: auto;margin-top: 2rem;padding: 0;justify-content: center;">';

	foreach ($films as $film) {
		$poster = "https://image.tmdb.org/t/p/w200/{$film['poster_path']}";
		$title = $film['title'];

		echo '<li style="margin-right: 10px;">';
		echo '<a href="<?= SITE_URL ?>/pages/movie.php?id='.$film['id'].'">';
		echo '<img class="affiche-film" src="'.$poster.'" alt="'.$title.'" style="width: 100%; border-radius: 10px;">';
		echo '<div style="text-align: center; color: #E0E0E0 ; margin-top: 5px;">'.$title.'</div>';
		echo '</a>';
		echo '</li>';
	}

	if (count($data['results']) > 5) {
		$count = count($data['results']) - 5;
		echo '<li style="margin-right: 10px;">';
		echo '<div style="border: solid black;background: black;width: 100%;height: 91%;border-radius: 10px;text-align: center;color: #fff;display: flex;flex-direction: column;justify-content: center;">+'.$count.' films Romantique </div>';
		echo '</li>';
	}

	echo '</ul>';
	echo '</div>';
}
?>

<a href="discover.php?genre=10749">
<button class="btn-voirplus">
	<i class="fa fa-plus"></i> Voir toute la sélection 
</button>
</a>








<?php

// Configuration de l'URL de l'API
$url = "https://api.themoviedb.org/3/discover/movie";
$url .= "?api_key={$api_key}";
$url .= "&with_genres=37"; // ID du genre d'action
$url .= "&sort_by=release_date.desc";
$url .= "&page=1";

// Affichage des 5 derniers films de comédie

// Récupération des données JSON de l'API
$data = file_get_contents($url);

// Conversion des données JSON en tableau associatif
$data = json_decode($data, true);

// Affichage des 5 derniers films d'action
if (isset($data['results'])) {
	$films = array_slice($data['results'], 0, 5);

	echo '<div class="block-selection"">';
	echo '<div style="text-align: center; padding-top: 2rem;color: #E0E0E0;"><p class="selection"> SÉLECTION</p>';
	echo '<div style="text-align: center; margin-top: 2rem;color: #E0E0E0;"> Western';
	?>
	<a style="color: #E0E0E0;margin: auto;width: 50%;display: block; margin-top: 2rem;";>
		Plongez dans l'univers de l'action et vibrez au rythme des cascades, combats et explosions les plus spectaculaires.
		Découvrez des héros au courage sans limite et des ennemis implacables dans des intrigues palpitantes et complexes.
		Laissez-vous emporter par l'énergie débordante et l'adrénaline de films qui vous feront vibrer jusqu'à la dernière minute.
	</a>
	
	<?php
	echo '<ul style="list-style-type: none; margin-top: 2rem; display: flex;flex-wrap: nowrap;overflow-x: auto;margin-top: 2rem;padding: 0;justify-content: center;">';

	foreach ($films as $film) {
		$poster = "https://image.tmdb.org/t/p/w200/{$film['poster_path']}";
		$title = $film['title'];

		echo '<li style="margin-right: 10px;">';
		echo '<a href="<?= SITE_URL ?>/pages/movie.php?id='.$film['id'].'">';
		echo '<img class="affiche-film" src="'.$poster.'" alt="'.$title.'" style="width: 100%; border-radius: 10px;">';
		echo '<div style="text-align: center; color: #E0E0E0 ; margin-top: 5px;">'.$title.'</div>';
		echo '</a>';
		echo '</li>';
	}

	if (count($data['results']) > 5) {
		$count = count($data['results']) - 5;
		echo '<li style="margin-right: 10px;">';
		echo '<div style="border: solid black;background: black;width: 100%;height: 91%;border-radius: 10px;text-align: center;color: #fff;display: flex;flex-direction: column;justify-content: center;">+'.$count.' films Western </div>';
		echo '</li>';
	}

	echo '</ul>';
	echo '</div>';
}
?>

<a href="discover.php?genre=37">
<button class="btn-voirplus">
	<i class="fa fa-plus"></i> Voir toute la sélection 
</button>
</a>
