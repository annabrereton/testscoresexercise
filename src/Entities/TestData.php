<?php

namespace TestData\Entities;

class TestData implements \JsonSerializable
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private ?string $email;
    private ?string $gender;
    private int $score;
    private ?string $grade;

    public function __construct(int $id, string $firstName, string $lastName, int $score, ?string $email = null, ?string $gender = null, ?string $grade = null)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->gender = $gender;
        $this->score = $score;
        $this->grade = $grade;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'gender' => $this->gender,
            'score' => $this->score,
        ];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return ?string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return ?string
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @return string|null
     */
    public function getGrade(int $score): ?string
    {
//        $grade = "";

        switch ($this->getScore()) {
            case $this->getScore() > 95:
                return $this->grade = "A";
                break;
            case $this->getScore() > 80:
                return $this->grade = "B";
                break;
            case $this->getScore() > 70:
                return $this->grade = "C";
                break;
            case $this->getScore() > 60:
                return $this->grade = "D";
                break;
            default:
                return $this->grade = "F";

//        return $this->grade;
        }
    }
}