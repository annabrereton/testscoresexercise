<?php

namespace TestData\Services;

use TestData\Database\TestDataDao;
use TestData\Entities\TestData;

// Create an endpoint that outputs all names and test scores in json format like:
// { scores: [ {name: 'Mike', score: 46}, {name: 'Anna', score: 99}] }

class TestDataServices
{
    public function allTestDataJSONResponse(): array
    {
        $testDataDao = new TestDataDao();

        $allDataArray = $testDataDao->getTestScoresData();
        $outputAllScores = [];

        foreach ($allDataArray as $data) {
            $row = new TestData(
                $data['id'],
                $data['first_name'],
                $data['last_name'],
                $data['score'],
                $data['email'],
                $data['gender'],
            );

             $outputAllScores[] = [
                'name:' => $row->getFirstName(),
                'score:' => $row->getScore()
            ];
        }
        return ['scores:' => $outputAllScores];
    }

    public function fetchTestDataByIdJSONResponse(int $id): TestData
    {
        $testDataDao = new TestDataDao();
        $scoreById = $testDataDao->getTestDataFromId($id);

        $score = new TestData(
            $scoreById->getId(),
            $scoreById->getFirstName(),
            $scoreById->getLastName(),
            $scoreById->getScore(),
            $scoreById->getEmail(),
            $scoreById->getGender(),
        );
        return $score;
    }

    public function gradeScoreById(int $id): TestData
    {
        $testDataDao = new TestDataDao();
        $scoreById = $testDataDao->getTestDataFromId($id);

        $score = new TestData(
            $scoreById->getId(),
            $scoreById->getFirstName(),
            $scoreById->getLastName(),
            $scoreInt = $scoreById->getScore(),
            $scoreById->getEmail(),
            $scoreById->getGender(),
            $scoreById->getGrade($scoreInt)
        );
        var_dump($score);
        return $score;

    }
}
