<?php

namespace alan\ArticleParser;


/**
 * Class Parser
 * @package alan\ArticleParser
 */
class Parser
{
    /**
     * @var string $articleUrl
     */
    private $articleUrl;

    /**
     * Parser constructor.
     * @param string $articleUrl
     */
    public function __construct(string $articleUrl)
    {
        $this->articleUrl = $articleUrl;
    }

    /**
     * @throws \alan\ArticleParser\InvalidUrlException
     */
    public function pushToParserQueue()
    {
        if (filter_var($this->articleUrl, FILTER_VALIDATE_URL) === false) {
            throw new InvalidUrlException('Url is not valid');
        }
        dispatch(new ParseContent($this->articleUrl))->onQueue('parsing');
    }
}