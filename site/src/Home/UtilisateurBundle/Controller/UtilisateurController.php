<?php

namespace Home\UtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Home\UtilisateurBundle\Entity\Utilisateur;
use Home\UtilisateurBundle\Entity\Groupe;

class UtilisateurController extends Controller
{
    public function indexAction()
    {
        $em = $this->get('doctrine')->getManager();
        $repo = $this->get('doctrine')->getRepository('HomeUtilisateurBundle:Utilisateur');

        // $utilisateur = new Utilisateur('Kerguelen', '0000', 'anthony.dusart@icloud.com', '658881505', new \DateTime('now'));
        // $utilisateur = $repo->find(1);
        // $utilisateur->setGroupe(new Groupe('Developpeur'));
        $em->persist($utilisateur);
        $em->flush();


        return $this->render('HomeUtilisateurBundle:Default:index.html.twig');
    }
}
