<?php

namespace Fei77\LineBot;

use LINE\LINEBot;
use LINE\LINEBot\Constant\HTTPHeader;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;

class Line
{
    private $client;
    private $bot;
    private $events;
    private $replyToken;
    private $text;
    private $to;
    /**
     * Create a new Skeleton Instance
     */
    public function __construct($request)
    {
        $this->client = new CurlHTTPClient(config('line-bot.line_token'));
        $this->bot = new LINEBot($this->client, ['channelSecret' => config('line-bot.line_secret')]);
        $signature = $request->header(HTTPHeader::LINE_SIGNATURE);
        if (!empty($signature)) {
            $this->events = $this->bot->parseEventRequest($request->getContent(), $signature);
        }
    }

    public function create($request)
    {
        $signature = $request->header(HTTPHeader::LINE_SIGNATURE);
        if (!empty($signature)) {
            $this->events = $this->bot->parseEventRequest($request->getContent(), $signature);
            return $this;
        }
    }

    public function hears($data)
    {
        foreach ($this->events as $event) {
            if ($event->getText()==$data) {
                $this->replyToken = $event->getReplyToken();
            }
        }
        return $this;
    }

    public function getId($event)
    {
        if ($event->isGroupEvent()) {
            return $event->getGroupId();
        } else if ($event->isRoomEvent()) {
            return $event->getRoomId();
        } else if ($event->isUserEvent()) {
            return $event->getUserId();
        }
    }

    public function getReplyToken($event)
    {
        return $event->getReplyToken();
    }

    public function getMessages()
    {
        return $this->events;
    }

    public function buildTextMessage($message)
    {
        return new TextMessageBuilder($message);
    }

    public function buildImageMessage($imageUrl, $previewImageUrl)
    {
        return new 
    }

    public function reply($message, $replyToken=null)
    {
        if (!$replyToken) {
            $replyToken = $this->replyToken;
        }
        $this->bot->replyMessage($replyToken, $this->buildTextMessage($message));
    }

    public function replyImage($imageUrl, $previewImageUrl)
    {
        if (!$replyToken) {
            
        }
    }

    
}
