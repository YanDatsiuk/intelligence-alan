<?php

namespace Alan\ArticleParser;


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

    private $selector;

    /**
     * ParseContent constructor.
     * @param string $url
     * @param string $selector
     */
    public function __construct(string $url, string $selector)
    {
        $this->url      = $url;
        $this->selector = $selector;
    }

    public function handle()
    {
        $article    = hQuery::fromURL($this->url, ['Accept' => config('parser.accept_headers')]);
        $paragraphs = $article->find($this->selector);

        if (!$paragraphs) {
            return;
        }

        foreach ($paragraphs as $paragraph) {
            $this->content[] = $paragraph->text();
        }

        if (!$this->content) {
            return;
        }

        //TODO: Next step for example:
        //$analyzer = new NLAnalyzer($this->content);
        //$analyzer->processContent();
        unset($this->content);
    }
}