<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 20-Oct-17
 * Time: 7:12 PM
 */
class MY_encrypt extends CI_Encryption
{
    /**
     * Encodes a string.
     *
     * @param string $string The string to encrypt.
     * @param string $key [optional] The key to encrypt with.
     * @param bool $url_safe [optional] Specifies whether or not the
     *                returned string should be url-safe.
     * @return string
     */
    function __construct()
    {
        parent::__construct();
    }

    public function encode($string)
    {
        $ret = parent::encrypt($string);

        if (!empty($string)) {
            $ret = strtr(
                $ret,
                [
                    '+' => '.',
                    '=' => '-',
                    '/' => '~'
                ]
            );
        }

        return $ret;
    }

    /**
     * Decodes the given string.
     *
     * @access public
     * @param string $string The encrypted string to decrypt.
     * @param string $key [optional] The key to use for decryption.
     * @return string
     */
    public function decode($string)
    {
        $string = strtr(
            $string,
            array(
                '.' => '+',
                '-' => '=',
                '~' => '/'
            )
        );

        if(!empty(parent::decrypt($string)))
        {
            return parent::decrypt($string);
        }
        else{
            return "error while decoding";
        }

    }
}

?>