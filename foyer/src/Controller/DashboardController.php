<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class DashboardController extends AbstractController
{
    public function index()
    {
        $url = $this->get('router')->generate(
            'platform_view', // 1er argument : le nom de la route
            array('id' => 5),
             UrlGeneratorInterface::ABSOLUTE_URL    // 2e argument : les valeurs des paramètres
        );

        // return new Response("L'URL de l'annonce d'id 5 est : ".$url);

        return $this->render('dashboard/index.html.twig', array ('url' => $url));
    }
    public function view($id)
    {
        // affiche l'article $id
        return $this->render('dashboard/view.html.twig', array('advert_id' => 4));
    }
    public function JSONtest($id)
    {
        return new JsonResponse(array('id' => $id));
    }
    public function menu()
    {
        // On fixe en dur une liste ici, bien entendu par la suite
        // on la récupérera depuis la BDD !
        $listAdverts = array(
          array('id' => 2, 'title' => 'Recherche développeur Symfony'),
          array('id' => 5, 'title' => 'Mission de webmaster'),
          array('id' => 9, 'title' => 'Offre de stage webdesigner')
        );

        return $this->render('dashboard/menu.html.twig', array(
          // Tout l'intérêt est ici : le contrôleur passe
          // les variables nécessaires au template !
          'listAdverts' => $listAdverts
        ));
    }
}
