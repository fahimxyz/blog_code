<?php
	// include global things for use
	include 'global_data.php';

	// sql string
	$sql = '
		SELECT
			*
		FROM
			drinks
		WHERE
			size = :size AND 
			sugar_free = :sugar_free
	';

	$params = array( // keys must match the variables in the sql so they can get replaced with the value
		':size' => '8oz',
		':sugar_free' => '1'
	);

	// prepare the sql
	$statement = $database->prepare( $sql );

	// execute the sql
	$statement->execute( $params );

	// get the query data
	$queryDrinks = $statement->fetchAll();

	// display the html
	displayViewHtml( $sql, $allDrinks, $queryDrinks, $statement );
?>