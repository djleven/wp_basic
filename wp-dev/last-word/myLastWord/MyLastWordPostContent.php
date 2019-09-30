<?php
/**
 * The file that defines MyLastWordPostContent concrete class
 *
 * @link       https://e-leven.net/
 * @since      1.0.0
 *
 * @package    last-word
 * @subpackage last-word/myLastWord
 */
namespace LastWord\MyLastWord;

class MyLastWordPostContent extends MyLastWord {

    public $content;
    public $my_last_word;

    /**
     * Initialize the class and set its properties.
     *
     * @since      1.0.0
     * @param      string     $content  The wp $content
     */
    public function __construct($content) {
        $this->content = $content;
        $this->my_last_word = $this->getRandomLastWord();
    }

    /**
     * Get the position setting for the last word
     *
     * @since     1.0.0
     * @return    string
     */

    private function getPositionSetting() {

        // we can later add an option to place it before content

        return 'after';
    }

    /**
     * Place my last word before or after the wp content
     *
     * @since      1.0.0
     * @return     string    	  The complete content
     */
    public function orderTheContent() {

        $content = $this->content;
        $my_last_word = $this->my_last_word;
        $position = $this->getPositionSetting();
        if ($position == 'after') {
            $new_content = $content;
            $new_content.= $my_last_word;
        }
        else {
            $new_content = $my_last_word;
            $new_content.= $content;
        }
        return $new_content;
    }

    /**
     * Return the content output
     *
     * @since     1.0.0
     * @return    string	The generated content output
     */
    public function contentOutput() {

        return $this->orderTheContent();
    }
}
