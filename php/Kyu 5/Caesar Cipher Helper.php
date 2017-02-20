<?php

/**
 * Description:
 *
 * Write a class that, when given a string, will return an uppercase string with each letter shifted forward in the alphabet by however many spots the cipher was initialized to.
 *
 * For example:
 *
 * $c = new CaesarCipher(5);
 * $c->encode('Codewars'); // returns 'HTIJBFWX'
 * $c->decode('BFKKQJX'); // returns 'WAFFLES'
 *
 * If something in the string is not in the alphabet (e.g. punctuation, spaces), simply leave it as is.
 *
 */

class CaesarCipher {
  private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function encode($msg)
    {
        return $this->cipher($msg, $this->key);
    }

    public function decode($msg)
    {
        return $this->cipher($msg, -$this->key);
    }

    protected function cipher($string, $key)
    {
        return strtoupper(implode(array_map(function ($char) use ($key) {
            return ctype_alpha($char) ? $this->shift($char, $key) : $char;
        }, str_split($string)), ''));
    }

    protected function asciiUppercase($ascii)
    {
        if ($ascii < 65) {
            $ascii = 91 - (65 - $ascii);
        }

        if ($ascii > 90) {
            $ascii = ($ascii - 90) + 64;
        }

        return $ascii;
    }

    protected function asciiLowercase($ascii)
    {
        if ($ascii < 97) {
            $ascii = 123 - (97 - $ascii);
        }

        if ($ascii > 122) {
            $ascii = ($ascii - 122) + 96;
        }

        return $ascii;
    }

    protected function shift($char, $shift)
    {
        $shift = $shift % 26;
        $ascii = ord($char);
        $shifted = $ascii + $shift;
        if ($ascii >= 65 && $ascii <= 90) {
            return chr($this->asciiUppercase($shifted));
        }
        if ($ascii >= 97 && $ascii <= 122) {
            return chr($this->asciiLowercase($shifted));
        }
        return chr($ascii);
    }
}
