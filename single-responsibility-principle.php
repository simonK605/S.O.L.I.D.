<?php

// A class should have only one reason to change,
// meaning that it should have only one responsibility.

// In this example, the UserManager class is responsible for both user registration and user login.
// This violates the Single Responsibility Principle because the class has two reasons to change
// One if the user registration logic changes and another if the user login logic changes.

class UserManager
{
    public function registerUser($username, $password)
    {
        // Logic for registering a user
        // ...
        $this->sendWelcomeEmail($username);
    }

    public function loginUser($username, $password)
    {
        // Logic for logging in a user
        // ...
    }

    private function sendWelcomeEmail($username)
    {
        // Logic for sending a welcome email
        // ...
    }
}




// A better approach would be to split this class into two separate classes, each with a single responsibility
class RegistrationManager
{
    public function registerUser($username, $password)
    {
        // Logic for registering a user
        // ...
        $this->sendWelcomeEmail($username);
    }

    private function sendWelcomeEmail($username)
    {
        // Logic for sending a welcome email
        // ...
    }
}

class LoginManager
{
    public function loginUser($username, $password)
    {
        // Logic for logging in a user
        // ...
    }
}

// Now, the RegistrationManager class is responsible for user registration and sending welcome emails,
// while the LoginManager class is responsible for user login. Each class has a single responsibility
// and only one reason to change.
// This adheres to the Single Responsibility Principle, making the code more modular and maintainable.