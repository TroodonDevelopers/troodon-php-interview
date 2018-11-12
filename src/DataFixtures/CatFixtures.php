<?php

namespace App\DataFixtures;

use App\Entity\Cat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CatFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 30; $i++) {
            echo $i.' cat added'.PHP_EOL;
            $cat = new Cat();
            $cat->setName($faker->firstName());
            $cat->setImage($this->getCatPhoto());
            $manager->persist($cat);
        }

        $manager->flush();
    }

    protected function getCatPhoto()
    {
        return json_decode(file_get_contents('https://api.thecatapi.com/v1/images/search'))[0]->url;
    }
}
