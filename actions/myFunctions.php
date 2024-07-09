<?php
    function dateFormat($endpoint) {
          // Convertir la chaîne datetime en objet DateTime
          $date = DateTime::createFromFormat("Y-m-d H:i:s",  $endpoint);

          //Créer un objet IntlDateFormatter pour le formatage en français
          $formatter = new IntlDateFormatter("fr_FR", IntlDateFormatter::LONG, IntlDateFormatter::NONE);

          return $formatter->format($date);

    }

    //Fonction pour afficher la barre en tiret 
	function Barre($value) {
		$barre = '-';
		for ($i=0; $i < $value; $i++) { 
			$barre = '-'.$barre;
		}
		return $barre;
	}
?>