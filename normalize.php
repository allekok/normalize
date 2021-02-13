<?php
function normalize($text) {
	$filters = [
		/* 1. [،؛.!؟:] -> [،؛.!؟:]\s */
		["/ *([،؛\.!؟:]) */u", "$1 "],
		
		/* 2. (( -> « */
		["/\(( *\()+ */u", "«"],

		/* 3. )) -> » */
		["/ *\)( *\))+/u", "»"],

		/* 4. :« -> : « */
		["/: *«/u", ": «"],

		/* 5. «\s -> « */
		["/« +/u", "«"],

		/* 6. \s» -> » */
		["/ +»/u", "»"],

		/* 7. \s.. -> \s */
		["/ {2,}/u", " "],
	];
	
	/* Apply Filters */
	foreach($filters as $filter)
		$text = preg_replace($filter[0], $filter[1], $text);
	
	/* Trim Text */
	$text = trim($text);

	return $text;
}
?>
