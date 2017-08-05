<?php

namespace NotificationChannels\WebhookNotifications;

use NotificationChannels\WebhookNotifications\Exceptions\CouldNotSendNotification;
use NotificationChannels\WebhookNotifications\Events\MessageWasSent;
use NotificationChannels\WebhookNotifications\Events\SendingMessage;
use Illuminate\Notifications\Notification;

class WebhookChannel
{
    public function __construct()
    {
        // Initialisation code here
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
        //$response = [a call to the api of your notification send]

//        if ($response->error) { // replace this by the code need to check for errors
//            throw CouldNotSendNotification::serviceRespondedWithAnError($response);
//        }
    }
}
