<?php

namespace App\DataFixtures;

// use App\Entity\ProductCategory;
// use App\Entity\CategoryOption;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
// use Doctrine\ORM\EntityManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        
        $conn = $manager->getConnection();

        $sql = "ALTER TABLE `product_category` AUTO_INCREMENT = 1;
                INSERT INTO `product_category` (`id`, `name`) VALUES
                (1, 'Automobile'),
                (2, 'Emploi'),
                (3, 'Immobilier');
                COMMIT;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
   
        
        

        $sql = "ALTER TABLE `category_option` AUTO_INCREMENT = 1;
                INSERT INTO `category_option` (`id`, `category_id`, `name`, `parent_option`) VALUES
                (1, 1, 'Audi', NULL),
                (2, 1, 'BMW', NULL),
                (3, 1, 'Citroen', NULL),
                (27, NULL, 'V8', 1),
                (28, NULL, 'Cabriolet', 1),
                (29, NULL, 'Q2', 1),
                (30, NULL, 'Q3', 1),
                (31, NULL, 'Q5', 1),
                (32, NULL, 'Q7', 1),
                (33, NULL, 'Q8', 1),
                (34, NULL, 'R8', 1),
                (35, NULL, 'Rs3', 1),
                (36, NULL, 'Rs4', 1),
                (37, NULL, 'Rs5', 1),
                (38, NULL, 'Rs7', 1),
                (39, NULL, 'S3', 1),
                (40, NULL, 'S4', 1),
                (41, NULL, 'S4 Avant', 1),
                (42, NULL, 'S4 Cabriolet', 1),
                (43, NULL, 'S5', 1),
                (44, NULL, 'S7', 1),
                (45, NULL, 'S8', 1),
                (46, NULL, 'SQ5', 1),
                (47, NULL, 'SQ7', 1),
                (48, NULL, 'Tt', 1),
                (49, NULL, 'Tts', 1),
                (50, NULL, 'M3', 2),
                (51, NULL, 'M4', 2),
                (52, NULL, 'M5', 2),
                (53, NULL, 'M535', 2),
                (54, NULL, 'M6', 2),
                (55, NULL, 'M635', 2),
                (56, NULL, 'Serie 1', 2),
                (57, NULL, 'Serie 2', 2),
                (58, NULL, 'Serie 3', 2),
                (59, NULL, 'Serie 4', 2),
                (60, NULL, 'Serie 5', 2),
                (61, NULL, 'Serie 6', 2),
                (62, NULL, 'Serie 7', 2),
                (63, NULL, 'Serie 8', 2),
                (64, NULL, 'C1', 3),
                (65, NULL, 'C15', 3),
                (66, NULL, 'C2', 3),
                (67, NULL, 'C25', 3),
                (68, NULL, 'C25D', 3),
                (69, NULL, 'C25E', 3),
                (70, NULL, 'C25TD', 3),
                (71, NULL, 'C3', 3),
                (72, NULL, 'C3 Aircross', 3),
                (73, NULL, 'C3 Picasso', 3),
                (74, NULL, 'C4', 3),
                (75, NULL, 'C4 Picasso', 3),
                (76, NULL, 'C5', 3),
                (77, NULL, 'C6', 3),
                (78, NULL, 'C8', 3),
                (79, NULL, 'Ds3', 3),
                (80, NULL, 'Ds4', 3),
                (81, NULL, 'Ds5', 3);
                COMMIT;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
}