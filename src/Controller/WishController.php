<?php

namespace App\Controller;

use App\Entity\Wish;
use App\Repository\WishRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/wish", name="wish_")
 */
class WishController extends AbstractController
{
    /**
     * @Route("/list", name="list")
     */
    public function list(WishRepository $wishRepository): Response
    {
        $wishes = $wishRepository -> findBy([], ['dateCreated'=>'DESC']);
        return $this->render('wish/list.html.twig', ['wishes'=>$wishes]);
    }

    /**
     * @Route("/detail/{id}", name="detail")
     */
    public function detail(int $id, WishRepository $wishRepository): Response
    {
        $wish = $wishRepository->find($id);
        return $this->render('wish/detail.html.twig',['wish'=>$wish]);
    }


    /**
     * @Route("/create", name="create")
     */
    public function create(EntityManagerInterface $entityManager): Response
    {
        $wish1 = new Wish();

        $wish1->setTitle('Premiere idee');
        $wish1->setAuthor('Moi');
        $wish1->setDescription('Une idée comme ça');
        $wish1->setIsPublished(true);
        $wish1->setDateCreated(new \DateTime());

        $entityManager->persist($wish1);

        $wish2 = new Wish();

        $wish2->setTitle('Deuxième idee');
        $wish2->setAuthor('Un autre');
        $wish2->setDescription('Une autre idée comme ça');
        $wish2->setIsPublished(true);
        $wish2->setDateCreated(new \DateTime('- 5 day'));

        $entityManager->persist($wish2);


        $wish3 = new Wish();

        $wish3->setTitle('Troisième idee');
        $wish3->setAuthor('Encore un autre');
        $wish3->setDescription('Une autre idée de plus comme ça');
        $wish3->setIsPublished(true);
        $wish3->setDateCreated(new \DateTime('- 5 week'));

        $entityManager->persist($wish3);

        $entityManager->flush();

        return $this->render('wish/create.html.twig');
    }


}
