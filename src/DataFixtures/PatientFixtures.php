<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Patients;
use App\Entity\User;


class PatientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $patient = new Patients();
        $patient->setNom('modou');
        $patient->setPrenom('diaw');
        $patient->setEmail('modou@gmail.com');
        $patient->setPassword('password123'); 
        $patient->setAge(30);

        $manager->persist($patient);
        $manager->flush();
    }
}
