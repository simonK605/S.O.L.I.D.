<?php

// Software entities (classes, modules, functions, etc.) should be open for extension but closed for modification.

// In this initial example, adding a new notification method requires modifying the existing class.

class NotificationService {
    public function sendNotification($message, $notificationMethod) {
        if ($notificationMethod === 'Email') {
            // Send notification via email
            // ...
        } elseif ($notificationMethod === 'SMS') {
            // Send notification via SMS
            // ...
        } else {
            // Unknown notification method
            // ...
        }
    }
}

// Client code
$notificationService = new NotificationService();
$emailNotification = $notificationService->sendNotification('Hello!', 'Email');
$smsNotification = $notificationService->sendNotification('Hi!', 'SMS');





// Better Code: Adding a new notification method is done through extension, not modification.

interface Notification {
    public function send($message);
}

class EmailNotification implements Notification {
    public function send($message) {
        // Send notification via email
        // ...
        return "Email Notification sent: $message";
    }
}

class SMSNotification implements Notification {
    public function send($message) {
        // Send notification via SMS
        // ...
        return "SMS Notification sent: $message";
    }
}

class NotificationService {
    public function sendNotification(Notification $notificationMethod, $message) {
        return $notificationMethod->send($message);
    }
}

// Client code
$emailNotificationMethod = new EmailNotification();
$smsNotificationMethod = new SMSNotification();

$notificationService = new NotificationService();
$emailNotification = $notificationService->sendNotification($emailNotificationMethod, 'Hello!');
$smsNotification = $notificationService->sendNotification($smsNotificationMethod, 'Hi!');