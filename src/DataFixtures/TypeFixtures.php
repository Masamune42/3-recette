<?php

namespace App\DataFixtures;

use App\Entity\Aliment;
use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $t1 = new Type();
        $t1->setLibelle("Fruits")
            ->setImage("fruits.jpg");
        $manager->persist($t1);

        $t2 = new Type();
        $t2->setLibelle("Legumes")
            ->setImage("legumes.jpg");
        $manager->persist($t2);

        $alimentRepository = $manager->getRepository(Aliment::class);

        $a1 = $alimentRepository->findOneBy(["nom" => "Patate"]);
        $a1->setType($t2);
        $manager->persist($a1);

        $alimentRepository = $manager->getRepository(Aliment::class);
        $a2 = $alimentRepository->findOneBy(["nom" => "Carotte"]);
        $a2->setType($t2);
        $manager->persist($a2);

        $alimentRepository = $manager->getRepository(Aliment::class);
        $a3 = $alimentRepository->findOneBy(["nom" => "Tomate"]);
        $a3->setType($t2);
        $manager->persist($a3);

        $alimentRepository = $manager->getRepository(Aliment::class);
        $a4 = $alimentRepository->findOneBy(["nom" => "Pomme"]);
        $a4->setType($t1);
        $manager->persist($a4);

        $manager->flush();
    }
}
