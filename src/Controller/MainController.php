<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use function MongoDB\BSON\fromJSON;

class MainController extends AbstractController
{
    /**
     * @Route("/","name=main_home");
     */
    public function home(){
        return $this->render('/main/home.html.twig');
    }
    /**
     * @Route("/about-us","name=main_about-us");
     */
    public function aboutUs(){
        $teamString = file_get_contents('../data/team.json', false);
        $teamObject = json_decode($teamString, true);
        return $this->render('/main/about-us.html.twig',['teamObject' => $teamObject]);
    }
}