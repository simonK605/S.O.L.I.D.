<?php

// Objects of a superclass should be replaceable with objects of a
// subclass without affecting the correctness of the program.

class Employee {
    public function calculateSalary() {
        return 100000;
    }
    public function calculateBonus() {
        return 10000;
    }
}
class Manager extends Employee {
    public function calculateSalary() {
        return 150000;
    }
}
class contractualEmployee extends Employee {
    public function calculateSalary() {
        return 120000;
    }
    public function calculateBonus() {
        throw new Exception("No bonus for contractual employees.");
    }
}