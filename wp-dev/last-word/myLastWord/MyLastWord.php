<?php
/**
 * The file that defines the WpContentType abstract class
 *
 * @link       https://e-leven.net/
 * @since      1.0.0
 *
 * @package    last-word
 * @subpackage last-word/myLastWord
 */
namespace LastWord\MyLastWord;

abstract class MyLastWord {

    const WPLW_LAST_WORDS_TXT_FILE = 'last-words.txt';

    /**
     * Get the random last word
     *
     * @since     1.0.0
     * @return    string	$output    	  The generated random last word
     */

    protected function getRandomLastWord() {

        $lines = file(LAST_WORD_PLUGIN_DIR . self::WPLW_LAST_WORDS_TXT_FILE);

        return $lines[array_rand($lines)];
    }
}