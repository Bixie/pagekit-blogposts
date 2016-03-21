<?php

return [

	'name' => 'bixie/blogposts',

	'type' => 'extension',

	'autoload' => [

		'Bixie\\Blogposts\\' => 'src'

	],

	'widgets' => [

		'widgets/blogposts.php'

	],

	'resources' => [

		'bixie/blogposts:' => ''

	],

	'config' => [

	],

	'events' => [
	]

];
