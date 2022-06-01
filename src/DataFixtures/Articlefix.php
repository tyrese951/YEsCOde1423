<?php

namespace App\DataFixtures;

use Faker;
use DateTime;
use App\Entity\Article;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class Articlefix extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Faker\Factory::create();

        $faker = Faker\Factory::create(fr_FR);


        for ($i=0; $i < 10 ; $i++) { 
            $article = new Article();
            $article->setTitle($faker->word($faker->randomDigit()));
            $article->setIntro($faker->word($faker->randomDigit()));
            $article->setContent('<span>'. implode('</span><span>', $faker->words(80)) . '<span>');
            $article->setImage("https://picsum.photos/200/300?random=".$i);
            $article->setCreatedAt(new DateTime());
            // $article->setCreatedAt($faker->dateTimeBetween('- 3 months'));
            $manager->persist($article);
            
            
                    // dump($faker->imageUrl(250));
        }

        $manager->flush();
    }
}
