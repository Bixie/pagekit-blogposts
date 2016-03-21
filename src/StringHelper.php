<?php


namespace Bixie\Blogposts;


class StringHelper {

	/**
	 * @param     $text
	 * @param int $length
	 * @return string
	 */
	public static function truncate ($text, $length = 200) {
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
	}
}