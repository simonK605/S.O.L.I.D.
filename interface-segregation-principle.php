<?php

// In this initial example, the Robot class implements the eat method,
// even though it doesn't make sense for a robot to eat.
// This violates the Interface Segregation Principle because classes implementing
// an interface should not be forced to implement methods they do not need.
interface Worker
{
    public function work();

    public function eat();
}

class Robot implements Worker
{
    public function work()
    {
        // Logic for robot to work
    }

    public function eat()
    {
        // Robots don't eat, but forced to implement the method
    }
}

class Human implements Worker
{
    public function work()
    {
        // Logic for human to work
    }

    public function eat()
    {
        // Logic for human to eat
    }
}



// In the improved example, we've split the original Worker interface into two separate interfaces:
// Workable and Eatable. Now, classes can implement the interfaces they need without being
// forced to implement unnecessary methods. The Robot class only implements Workable,
// and the Human class implements both Workable and Eatable.
// This adheres to the Interface Segregation Principle.

interface Workable
{
    public function work();
}

interface Eatable
{
    public function eat();
}

class Robot implements Workable
{
    public function work()
    {
        // Logic for robot to work
    }
}

class Human implements Workable, Eatable
{
    public function work()
    {
        // Logic for human to work
    }

    public function eat()
    {
        // Logic for human to eat
    }
}