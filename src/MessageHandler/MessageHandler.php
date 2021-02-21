<?php

namespace App\MessageHandler;

use GPB\Model\Message;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class MessageHandler implements MessageHandlerInterface
{
    public function __construct(
        private LoggerInterface $logger
    )
    {
    }

    public function __invoke(Message $message)
    {
        $this->logger->debug($message->serializeToString());
    }
}