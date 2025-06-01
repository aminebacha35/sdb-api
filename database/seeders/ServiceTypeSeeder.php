<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_types')->insert([
            [
                'name' => 'Carrosserie',
                'description' => 'Nous intervenons sur tous les types de dommages liés à la carrosserie : démontage, réparation ou remplacement des éléments abîmés. Grâce au travail de redressage, votre véhicule retrouve son apparence d’origine. Nos ateliers sont équipés de carrossiers peintres pour assurer une remise en peinture complète si nécessaire.',
                'image' => '/service1.png'
            ],
            [
                'name' => 'Protection longue durée',
                'description' => 'Nous mettons un point dhonneur à proposer des réparations durables. Pour cela, nous appliquons des traitements spécifiques afin de prolonger la protection de votre carrosserie contre les agressions extérieures.',
                'image' => '/service2.png'
            ],
            [
                'name' => 'Simonizage',
                'description' => 'Pour redonner à votre carrosserie tout son éclat, nous utilisons la méthode du simonizage. Cette technique avancée complète les réparations classiques de peinture et permet un résultat bluffant, même sur des véhicules anciens.',
                'image' => '/service3.png'
            ],
            [
                'name' => 'Polish',
                'description' => 'Dans les zones urbaines, les carrosseries sont fréquemment exposées aux rayures. Grâce à notre service de polish, nous estompons ces imperfections sans passer par un remplacement des éléments, pour un résultat rapide et efficace.',
                'image' => '/service4.png'
            ],
            [
                'name' => 'Lustrage',
                'description' => 'Un véhicule brillant attire toujours lœil. Cest pourquoi nous proposons un service de lustrage professionnel pour raviver la brillance naturelle de votre carrosserie.',
                'image' => '/service5.png'
            ],
            [
                'name' => 'Rénovation de jantes',
                'description' => 'Que ce soit sur route ou en milieu urbain, vos jantes sont constamment exposées aux chocs et à lusure. Nous les remettons à neuf à travers un nettoyage en profondeur, suivi dun ponçage et dune rénovation complète.',
                'image' => '/service6.png'
            ],
            [
                'name' => 'Rénovation d’optique',
                'description' => 'Des phares ternis peuvent nuire à votre sécurité. Plutôt que de les remplacer systématiquement, nous les rénovons pour restaurer leur transparence et leur efficacité d’origine.',
                'image' => '/service7.png'
            ],
            [
                'name' => 'Car and Protect',
                'description' => 'Nous proposons une solution de protection supplémentaire pour votre carrosserie. Grâce à notre traitement "Car and Protect", la peinture et les surfaces extérieures sont mieux protégées contre les agressions du quotidien.',
                'image' => '/service8.png'
            ],
            [
                'name' => 'Vitres teintées',
                'description' => 'Envie de discrétion ou de protection solaire ? Nos films teintés s’adaptent à tous les véhicules pour améliorer votre confort tout en rehaussant l’esthétique de votre voiture.',
                'image' => '/service9.png'
            ],
            [
                'name' => 'Film anti-effraction',
                'description' => 'Pour renforcer la sécurité de votre véhicule, nous posons des films spécifiques sur les vitres afin de les rendre plus résistantes face aux tentatives d’effraction.',
                'image' => '/service10.png'
            ],
            [
                'name' => 'Covering',
                'description' => 'Grâce à la technique du covering, vous pouvez entièrement personnaliser votre voiture. Choisissez parmi une large gamme de films pour donner un nouveau style à votre carrosserie, sans la repeindre.',
                'image' => '/service11.png'
            ],
            [
                'name' => 'Restauration de véhicule',
                'description' => 'Vous possédez un véhicule ancien ou de collection ? Notre service de restauration complète vous permet de lui redonner son allure d’antan, tout en prolongeant sa durée de vie.',
                'image' => '/service12.png'
            ],

  
        ]);
    }
}
