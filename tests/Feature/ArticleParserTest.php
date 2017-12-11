<?php

namespace Tests\Feature;


use Alan\ArticleParser\ParseContent;
use Alan\ArticleParser\Parser;
use Tests\TestCase;

/**
 * Class ArticleParserTest
 * @package Tests\Feature
 */
class ArticleParserTest extends TestCase
{

    /**
     * Check if job was dispatched
     */
    public function testArticleParserDispatchesJob()
    {
        $this->expectsJobs(ParseContent::class);
        $parser = new Parser('https://en.wikipedia.org/wiki/Richard_Wagner', '.mw-parser-output p');
        $parser->pushToParserQueue();
    }

}