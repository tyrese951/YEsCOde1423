<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    #[Route('/articles', name: 'articles_index')]
    public function index(ArticleRepository $articleRepository): Response{
        return $this->render('article/index.html.twig', ["articles" => $articleRepository->findAll()]);
    }
    
    #[Route('/articles/new', name: 'article_create')]
    public function create(Request $request, EntityManagerInterface $manager){

        $article = new Article();

        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        // dump($article);

<<<<<<< HEAD
        if ( $form->isSubmitted() && $form->isValid() ) {
            $manager->persist($article);
            $manager->flush();

            return $this->redirectToRoute('article_show', ['slug' => $article->getSlug() ]);
=======
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($article);
            $manager->flush();

            $this->addFlash("success", "L'article<strong>{$article->getTitle()}</strong> a bien été crée");

            return $this->redirectToRoute('article_show',['slug'=>$article->getSlug()]);
>>>>>>> 1728f283ee0526c18e1daf6b0540b669e0feb059
        }

        return $this->render('article/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/articles/{slug}', name: 'article_show')]
    public function show($slug, ArticleRepository $articleRepository){
        $article = $articleRepository->findOneBySlug($slug);
        return $this->render('article/show.html.twig', ["article" => $article,]);
    }
<<<<<<< HEAD
    


}

=======
    #[Route('/articles/{slug}/edit', name: 'article_edit')]
    public function edit(Request $request, Article $article, EntityManagerInterface $manager)
    {
        $form = $this->createForm(ArticleType::class, $article);
        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){

            $manager->flush();
            
            $this->addFlash('info',"L'article <strong>{$article->getTitle()}</strong> a bien été modifié");
            
            return $this->redirectToRoute('article_show', [
                'slug'=>$article->getSlug()
            ]);
        }
        
        return $this->render('article/edit.html.twig',[
            'article' => $article,
            'form' => $form->createView()
        ]);
    }
    #[Route('/articles/{slug}/delete', name: 'article_delete')]
    public function delete(Article $article, EntityManagerInterface $manager)
    {
        $manager->remove($article);
        $manager->flush();

        $this->addFlash('danger',"Larticle a bien été supprimé");

        return $this->redirectToRoute('articles_index');
    
    }
}
>>>>>>> 1728f283ee0526c18e1daf6b0540b669e0feb059
