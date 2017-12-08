<?php

namespace alan\ArticleParser;


use hQuery;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class ParseContent
 * @package alan\ArticleParser
 */
class ParseContent implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var string $url
     */
    private $url;
    /**
     * @var array $content
     */
    private $content;

    /**
     * ParseContent constructor.
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function handle()
    {
        $article    = $doc = hQuery::fromURL($this->url, ['Accept' => config('parser.accept_headers')]);
        $paragraphs = $article->find('div#content > p');

        if (!$paragraphs) {
            return;
        }

        foreach ($paragraphs as $paragraph) {
            $this->content[] = $paragraph->text();
        }

        if (!$this->content) {
            return;
        }

        //TODO: Next step e.g
        //$analyzer = new NLAnalyzer($this->content)
        //$analyzer->processContent();
    }
}