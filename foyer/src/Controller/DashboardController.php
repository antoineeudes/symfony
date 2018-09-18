<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends AbstractController
{
    public function index()
    {
        $number = random_int(0, 100);

        return $this->render('dashboard/index.html.twig', array (
            'number' => $number,
        ));
    }
}
