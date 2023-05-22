<?php

namespace TestData\Database;

use TestData\Database\Database;
use TestData\Entities\TestData;

class TestDataDao
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getTestScoresData(): array
    {
        $sql = 'SELECT `id`, `first_name`, `last_name`, `email`, `gender`, `score` '
            . 'FROM `test_scores` '
            . 'WHERE `id` IS NOT NULL';

        $query = $this->db->getPdo()->prepare($sql);
        $query->execute();
        return $allData = $query->fetchAll();
    }

    public function getTestDataFromId($id): TestData
    {
        $sql = 'SELECT `id`, `first_name`, `last_name`, `email`, `gender`, `score` '
            . 'FROM `test_scores`'
            . 'WHERE `id` = :id; ';

        $value = [':id' => $id];

        $query = $this->db->getPdo()->prepare($sql);
        $query->execute($value);
        $scoreData = $query->fetch();

//        if (!$scoreData) {
//            throw new \Exception('Unknown id');
//        }

        return new TestData(
            $scoreData['id'],
            $scoreData['first_name'],
            $scoreData['last_name'],
            $scoreData['score'],
            $scoreData['email'],
            $scoreData['gender'],
//            $scoreData['grade']
        );
    }
}
//$dao= new TestDataDao();
//$test = $dao->getTestDataFromId(11);
//print_r($test);