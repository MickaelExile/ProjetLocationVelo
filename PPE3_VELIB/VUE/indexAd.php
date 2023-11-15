<?php
session_start ();

require_once ('../Class/PageBase.class.php');
require_once ('../Class/PageSecuriseeAdherent.class.php');

if (isset ($_SESSION['mode']) && $_SESSION['mode']="serviceAdherent")
{
	$pageIndex = new PageSecuriseeAdherent ( "Bienvenue sur VELIBERTE..." );
}
else 
{
	$pageIndex = new PageBase ( "Bienvenue sur VELIBERTE..." );
}

$pageIndex->contenu = '<section>
		<article>
		<h2>
			SERVICE de LOCATION  de <ul>
			<li>vélos classiques géolocalisables avec leurs coordonnées GPS</li>
			 <li>vélos électriques en rechargement à différentes bornes dans la ville</li>
			 <li>et tous les bénéfices de la pratique du vélo ...</li>
			 </ul></h2>
			 
			<img src="./Image/velobenef.jpg" alt="benefices de la pratique du vélo"> 
		</article>	
	</section>';
				

$pageIndex->afficher ();

?>


