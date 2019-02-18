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

    public function __destruct()
    {
        echo 'Object of class "' . __CLASS__ . '" was destructed.' . PHP_EOL;
    }

    public function __toString()
    {
        return $this->showMyself();
    }

    public function __call($name, $args)
    {
        echo 'Cannot call ' . $name. '-method because it undefined.';
    }

    public static function __callStatic($name, $args)
    {
        echo 'Cannot call ' . $name . '-static method cause it undefined.';
    }

    public function __set($name, $args)
    {
        throw new RuntimeException('Cannot writing data to inaccessible properties - $' . $name . '.');
    }
    public function __get($name)
    {
        throw new RuntimeException('Cannot reading data from inaccessible properties - $' . $name . '.');
    }

    public function __isset($name)
    {
        throw new RuntimeException('Cannot calling isset() or empty() on inaccessible properties - $' . $name . '.');
    }
    public function __unset($name)
    {
        throw new RuntimeException('Cannot calling unset() on inaccessible properties - $' . $name . '.');
    }
    public function __sleep()
    {
        return $this->showMyself();
    }
    public function __wakeup()
    {
        return json_decode($this->showMyself());
    }
    public function __invoke()
    {
        throw new RuntimeException('This object cannot be a function.');
    }
    public function __set_state()
    {
        return json_decode($this->showMyself());
    }

    public function __clone()
    {
        echo 'Your object was cloned.' . PHP_EOL;
    }

    public function __debugInfo()
    {
        return [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'gender' => $this->gender,
            'status' => $this->status,
            'gpa' => $this->gpa,
        ];
    }
}

$student0 = new Student('sdf', 'Peter', 'female', 'junior', 2);
echo $student0 . PHP_EOL;
var_dump($student0);
echo PHP_EOL;
$student1 = clone $student0;
