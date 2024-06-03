<?php

namespace App\Http\Controllers;

use Google\Client;
use Google\Service\Gmail;

class GmailController extends Controller
{
    public function getMessages()
    {
        $credentials = json_decode(file_get_contents(env('GOOGLE_APPLICATION_CREDENTIALS')));
        $client = new Client();
        $client->setAuthConfig($credentials);
        $client->addScope(Gmail::USER_MESSAGES_READONLY);

        $service = new Gmail($client);
        $response = $service->users_messages->listUsersMessages('me');

        $messages = [];
        foreach ($response->getMessages() as $message) {
            $messageDetails = $service->users_messages->get('me', $message->getId());
            $messages[] = [
                'id' => $message->getId(),
                'subject' => $messageDetails->getSnippet(),
                'from' => $messageDetails->getPayload()->getHeaders()[0]->getValue(),
            ];
        }

        return $messages;
    }
}
