<?php

namespace Alan\ArticleParser;


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
     * @var string $articleSelector
     */
    private $articleSelector;

    /**
     * Parser constructor.
     * @param string $articleUrl
     * @param string $selector
     */
    public function __construct(string $articleUrl, $selector = 'div#content > p')
    {
        $this->articleUrl      = $articleUrl;
        $this->articleSelector = $selector;
    }

    /**
     * @param string $queue
     * @throws InvalidUrlException
     */
    public function pushToParserQueue(string $queue = 'parsing')
    {
        if (filter_var($this->articleUrl, FILTER_VALIDATE_URL) === false) {
            throw new InvalidUrlException('Url is not valid');
        }
        dispatch(new ParseContent($this->articleUrl, $this->articleSelector))->onQueue($queue);
    }
}