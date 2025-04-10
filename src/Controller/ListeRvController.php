<?php
namespace App\Controller;

use App\Entity\Rendezvous;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class ListeRvController extends AbstractController
{
    #[Route('/mes-rendezvous', name: 'liste_rv')]
    public function index(EntityManagerInterface $entityManager): Response
    {
       
        $user = $this->getUser(); 
        $rendezvous = $entityManager->getRepository(Rendezvous::class)
            ->findBy(['patient' => $user]); 

        return $this->render('liste_rv/index.html.twig', [
            'rendezvous' => $rendezvous,
        ]);
    }
}
