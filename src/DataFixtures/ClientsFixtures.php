<?php

namespace App\DataFixtures;

//use App\Entity\;
use Faker; 

//use new\DateTime;
use Faker\Factory;
//use DateTime;

use App\Entity\Clients;
use Doctrine\Persistence\ObjectManager;
//use Symfony\Component\Security\Core\Role\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ClientsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        
        // Liste des clients :
        for ($i = 1; $i < 500; $i++) 
        {
            $clients = new Clients();


            $civilite = ["Femme", "Homme"];
            shuffle($civilite);
            $status = ['Entreprise', 'Etablicement scolaire', 'Hospital', 'Mairie de Toulouse', 'Préfecture de Paris', 'Centre Guinot'];
            shuffle($status);
            
            $departements = ['Limousin', 'Bourg-en-Bresse', 'Rhône-Alpes', 'Picardie', 'Moulins', 'Auvergne', 'Alpes de Haute-Provence', 'Digne-les-Bains', 'Provence-Alpes-Côte d Azur', 'Hautes-Alpes', 'Provence-Alpes-Côte d Azur', 'Alpes-Maritimes', 'Nice', 'Provence-Alpes-Côte d Azur', 'Ardêche', 'Rhône-Alpes', 'Ardennes', 'Charleville-Mézières', 'Champagne-Ardenne', 'Ariège', 'Foix', 'Midi-Pyrénées', 'Troyes', 'Champagne-Ardenne', 'Aude', 'Carcassonne', 'Languedoc-Roussillon', 'Aveyron', 'Rodez', 'Midi-Pyrénées', 'Bouches-du-Rhône', 'Marseille', 'Provence-Alpes-Côte d Azur', 'Calvados', 'Basse-Normandie', 'Cantal', 'Aurillac', 'Auvergne'];

            shuffle($departements );

            $pays = ['France', 'Espagne', 'Royaume-Uni', 'Italie', 'Allemagne', 'Russie', 'Nigeria', 'Danemark', 'Irlande', 'Argentine', ];
            shuffle($pays);

            $role = ['utilisateur', 'ROLE_ANONYMOUSE', 'ROLE_USER', 'ROLE_ADMIN', 'ROLE_ABONNER'];
            shuffle($role);
$service = [' Entretien d espaces verts ', 'Nettoyage de vitre ',  'Nettoyage  industriel ', 'Nettoyage de bureaux ', 'Nettoyage  d appartements ', 'Nettoyage  de maisons', 'Nettoyage de fin de chantier', 'Entretien des vitres', 'Remise en état', 'Traitement des sols '];
shuffle($service);


$email = $faker->email;

            $clients
            ->setNom_client($faker->lastName)
            ->setStatus($status[0])
            ->setService($service[0])
                            ->setDate(new \DateTime())
        ->setFacture($faker->phoneNumber);
    
            $manager->persist($clients);

       $manager->flush();  
    }
    }     
}
