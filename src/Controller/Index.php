<?php

namespace App\Controller;

use GPB\Model\Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class Index extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(MessageBusInterface $bus)
    {
        $message = (new Message())
            ->setId(666)
            ->setUser("Eric")
            ->setActivity("Midnight oil burner");

        $bus->dispatch($message);

        return new Response("Message send !");
    }
}