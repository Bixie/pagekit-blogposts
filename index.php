<?php

return [

	'name' => 'bixie/blogposts',

	'type' => 'extension',

	'main' => function ($app) {
		$app->factory('string.truncate', function ($app) {
			return function ($text, $length = 200) {
				$text = strip_tags($text);
				if ($length) {
					if (function_exists('mb_strpos')) {
						if (($pos = @mb_strpos($text, ' ', $length)) > 0) {
							$text = mb_substr($text, 0, $pos) . '...';
						}
					} else {
						if (($pos = @strpos($text, ' ', $length)) > 0) {
							$text = substr($text, 0, $pos) . '...';
						}
					}
				}
				return $text;
			};
		});
	},

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
