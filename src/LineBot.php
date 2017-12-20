<?php

namespace Fei77\LineBot;

use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;

class LineBot
{
    /**
     * Create a new Skeleton Instance
     */
    public function __construct()
    {
        $this->client = new CurlHTTPClient(config('line-bot.line_token'));
        $this->bot = new LINEBot($this->client, ['channelSecret' => config('line-bot.line_secret')]);
    }

    /**
     * Friendly welcome
     *
     * @param string $phrase Phrase to return
     *
     * @return string Returns the phrase passed in
     */
    public function echoPhrase($phrase)
    {
        return $phrase;
    }
}
