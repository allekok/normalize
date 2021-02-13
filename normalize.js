function normalize(text) {
	const filters = [
		/* 1. [،؛.!؟:] -> [،؛.!؟:]\s */
		[/ *([،؛\.!؟:]) */g, '$1 '],
		
		/* 2. (( -> « */
		[/\(( *\()+ */g, '«'],

		/* 3. )) -> » */
		[/ *\)( *\))+/g, '»'],

		/* 4. :« -> : « */
		[/: *«/g, ': «'],

		/* 5. «\s -> « */
		[/« +/g, '«'],

		/* 6. \s» -> » */
		[/ +»/g, '»'],

		/* 7. \s.. -> \s */
		[/ {2,}/g, ' '],
	]
	
	/* Apply Filters */
	for(const filter of filters)
		text = text.replace(filter[0], filter[1])
	
	/* Trim Text */
	text = text.trim()

	return text
}
