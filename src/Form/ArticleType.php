<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => "Titre de l'article",
                 "attr" => ["class"=>"text-info",
                 "placeholder" => "Le titre de votre article"]
            ])
            ->add('intro', TextType::class, [
                'label' => "Introduction de l'article",
                 "attr" => ["class"=>"text-info",
                 "placeholder" => "intro de l'article"]
            ])
            ->add('content', TextareaType::class, [
                'label' => "Déscription de l'article",
                 "attr" => ["class"=>"text-info",
                 "placeholder" => "Déscription de l'article"]
            ])
            ->add('image', TextType::class, [
                'label' => "Url de l'image",
                 "attr" => ["class"=>"text-info",
                 "placeholder" => "Url de l'image"]
            ])
            ->add('Envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}