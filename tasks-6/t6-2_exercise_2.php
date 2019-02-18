<?php
declare(strict_types=1);

require_once('./t6-1_exercise_1.php');

$student1 = new Student('Mike', 'Barnes', 'male', 'freshman', 4.0);
$student2 = new Student('Jim', 'Nickerson', 'male', 'sophomore', 3.0);
$student3 = new Student('Jack', 'Indabox', 'male', 'junior', 2.5);
$student4 = new Student('Jane', 'Miller', 'female', 'senior', 3.6);
$student5 = new Student('Mary', 'Scott', 'female', 'senior', 2.7);

$students = [$student1, $student2, $student3, $student4, $student5];

foreach ($students as $student) {
    echo $student->showMyself(), PHP_EOL;
}
