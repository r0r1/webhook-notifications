<?php

namespace NotificationChannels\WebhookNotifications;

use NotificationChannels\WebhookNotifications\Exceptions\CouldNotSendNotification;
use Illuminate\Notifications\Notification;
use GuzzleHttp\Client;

class WebhookChannel
{
    /**
     * @var \GuzzleHttp
     */
    protected $client;

    /**
     * WebhookChannel Constructor
     * 
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     *
     * @throws \NotificationChannels\WebhookNotifications\Exceptions\CouldNotSendNotification
     */
    public function send($notifiable, Notification $notification)
    {
        if (! $webhookEndpoint = collect($notifiable->routeNotificationFor('WebhookNotifications'))) {
            return;
        }

        $response = $this->client->post($webhookEndpoint);

        if ($response->getStatusCode() !== 200) {
            throw CouldNotSendNotification::serviceRespondedWithAnError($response);
        }
    }
}
