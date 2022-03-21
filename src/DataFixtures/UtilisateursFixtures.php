<?php

namespace App\DataFixtures;

//use App\Entity\;
use Faker; 

//use new\DateTime;
use Faker\Factory;
//use DateTime;

use App\Entity\Utilisateurs;
use Doctrine\Persistence\ObjectManager;
//use Symfony\Component\Security\Core\Role\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UtilisateursFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        
        // Liste des utilisateurs :
        for ($i = 1; $i < 700; $i++) 
        {
            $utilisateurs = new Utilisateurs();
            $civilite = ["Femme", "Homme"];
            shuffle($civilite);
            $status = ['connecter', 'déconnecter', 'anonyme'];
            shuffle($status);
            
            $departements = ['Limousin', 'Bourg-en-Bresse', 'Rhône-Alpes', 'Picardie', 'Moulins', 'Auvergne', 'Alpes de Haute-Provence', 'Digne-les-Bains', 'Provence-Alpes-Côte d Azur', 'Hautes-Alpes', 'Provence-Alpes-Côte d Azur', 'Alpes-Maritimes', 'Nice', 'Provence-Alpes-Côte d Azur', 'Ardêche', 'Rhône-Alpes', 'Ardennes', 'Charleville-Mézières', 'Champagne-Ardenne', 'Ariège', 'Foix', 'Midi-Pyrénées', 'Troyes', 'Champagne-Ardenne', 'Aude', 'Carcassonne', 'Languedoc-Roussillon', 'Aveyron', 'Rodez', 'Midi-Pyrénées', 'Bouches-du-Rhône', 'Marseille', 'Provence-Alpes-Côte d Azur', 'Calvados', 'Basse-Normandie', 'Cantal', 'Aurillac', 'Auvergne'];
shuffle($departements );

            $pays = ['France', 'Espagne', 'Royaume-Uni', 'Italie', 'Allemagne', 'Russie', 'Nigeria', 'Danemark', 'Irlande', 'Argentine', ];
            shuffle($pays);

            $role = ['utilisateur', 'ROLE_ANONYMOUSE', 'ROLE_USER', 'ROLE_ADMIN', 'ROLE_ABONNER'];
            shuffle($role);


$email = $faker->email;

            $utilisateurs
            ->setNom($faker->lastName)
            ->setPrenom($faker->firstName)
    ->setCivilite($civilite[0])
                ->setDate(new \DateTime())
        ->setTelephone($faker->phoneNumber)
        ->setFax($faker->phoneNumber)
        ->setEmail($email)
        ->setAdresse($faker->address)
        ->setCodePostal($faker->postcode)
        ->setVilles($faker->city)
        ->setDepartements($departements[0])
            ->setPays($pays[0])
                                ->setStatus($status[0])
                                ->setRole($role[0])
                                ->setImageName($faker->name);

            $manager->persist($utilisateurs);

       $manager->flush();  
    }
    }     
}
