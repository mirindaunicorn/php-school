<?php
declare(strict_types=1);
ini_set('serialize_precision', '2');
class Student
{
    private $firstName;
    private $lastName;
    private $gender;
    private $status;
    private $gpa;
    
    public function __construct(string $firstName, string $lastName, string $gender, string $status, float $gpa)
    {
        if (!is_numeric($firstName) && !is_numeric($lastName)) {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
        } else {
            throw new RuntimeException('Incorrect first  or last name.');
        }
        if (in_array($gender, ['male', 'female'], true)) {
            $this->gender = $gender;
        } else {
            throw new RuntimeException('Gender must be male or female.');
        }
        if (in_array($status, ['freshman', 'sophomore', 'junior', 'senior'], true)) {
            $this->status = $status;
        } else {
            throw new RuntimeException('Incorrect status(try freshman, sophomore, junior or senior)');
        }
        $gpa >= 4.0 ? $this->gpa = 4.0 : $this->gpa = $gpa;
    }
    public function showMyself(): string
    {
        return json_encode([
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'gender' => $this->gender,
            'status' => $this->status,
            'gpa' => $this->gpa,
        ]);
    }
    public function studyTime(float $study_time): float
    {
        $this->gpa = $this->gpa + log($study_time);
        return $this->gpa >= 4.0? $this->gpa = 4.0: $this->gpa;
    }
}

$student0 = new Student('sdf', 'Peter', 'female', 'junior', 2);
echo $student0;
