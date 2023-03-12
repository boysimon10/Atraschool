<?php
$categories = $bdd->query('SELECT * FROM f_categories ');
$subcat = $bdd->prepare('SELECT * FROM f_souscategories WHERE id_categorie = ?');