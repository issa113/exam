<?php

namespace App\DataFixtures;

use App\Entity\Rendezvous;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RendezvousFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Récupère un utilisateur existant
        $patient = $manager->getRepository(User::class)->findOneBy(['email' => 'modou@gmail.com']);

        if (!$patient) {
            throw new \Exception('Utilisateur avec l\'email modou@gmail.com non trouvé.');
        }

        $types = ['Consultation', 'Prestation'];

        
        for ($i = 0; $i < 6; $i++) {
            $rendezvous = new Rendezvous();
            $rendezvous->setDate((new \DateTime())->modify("+$i days"));
            $rendezvous->setHeure((new \DateTime())->setTime(9 + $i, 0));
            $rendezvous->setType($types[$i % 2]); // alterne entre Consultation et Prestation
            $rendezvous->setPatient($patient);

            $manager->persist($rendezvous);
        }

        $manager->flush();
    }
}
