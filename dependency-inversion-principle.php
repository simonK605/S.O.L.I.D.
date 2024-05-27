<?php

// In this initial example, the Manager class directly depends on the Worker class.
// This violates the Dependency Inversion Principle because high-level modules
// (like Manager) should not depend on low-level modules (like Worker).
// Instead, both should depend on abstractions.
class Manager
{
    public function manage(Worker $worker)
    {
        $worker->work();
    }
}

class Worker
{
    public function work()
    {
        // Logic for work
    }
}



// In the improved example, we've introduced the Workable interface,
// and the Worker class implements it. Now, the Manager class depends on the
// abstraction (Workable interface) rather than the concrete Worker class.
// This adheres to the Dependency Inversion Principle by allowing high-level modules
// to depend on abstractions, not on low-level modules.
interface Workable
{
    public function work();
}

class Worker implements Workable
{
    public function work()
    {
        // Logic for work
    }
}

class Manager
{
    private $worker;

    public function __construct(Workable $worker)
    {
        $this->worker = $worker;
    }

    public function manage()
    {
        $this->worker->work();
    }
}