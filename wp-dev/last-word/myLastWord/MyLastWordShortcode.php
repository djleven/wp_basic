<?php
/**
 * The file that defines the MyLastWordShortCode concrete class
 *
 * @link       https://e-leven.net/
 * @since      1.0.0
 *
 * @package    last-word
 * @subpackage last-word/myLastWord
 */
namespace LastWord\MyLastWord;

class MyLastWordShortCode extends MyLastWord {

    public $my_last_word;

    /**
     * Initialize the class and set its properties.
     *
     * @since      1.0.0
     */
    public function __construct() {

        $this->my_last_word = $this->getRandomLastWord();
    }

    /**
     * Return the output
     *
     * @since     1.0.0
     * @return    string	The generated output
     */
    public function contentOutput() {

        return $this->my_last_word;
    }

}
