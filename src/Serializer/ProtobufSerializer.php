<?php

namespace App\Serializer;

use GPB\Model\Message;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Transport\Serialization\SerializerInterface;

class ProtobufSerializer implements SerializerInterface
{
    public function __construct(
        private LoggerInterface $logger
    )
    {
    }

    public function decode(array $encodedEnvelope): Envelope
    {
        $message = new Message();
        $message->mergeFromString($encodedEnvelope['body']);

        return new Envelope($message);
    }

    public function encode(Envelope $envelope): array
    {
        $message = $envelope->getMessage();

        $body = "";
        if ($message instanceof Message) {
            $body = $message->serializeToString();
        }

        return [
            'body' => $body,
        ];
    }
}
