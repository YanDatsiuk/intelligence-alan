<?php

namespace alan\ArticleParser;

/**
 * Class InvalidUrlException
 * @package alan\ArticleParser
 */
class InvalidUrlException extends \Exception
{

    /**
     * InvalidUrlException constructor.
     * @param string          $message
     * @param int             $code
     * @param \Exception|null $previous
     */
    public function __construct($message, $code = 666, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}