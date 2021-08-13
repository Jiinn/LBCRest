<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\ProductCategory;

class ProductCategoryController extends AbstractController
{
    
    /**
     * @Route("/api/v1/category/", name="category_all", methods={"GET"})
     */
    public function categoryAll()
    {
        // Get Product
        $category = $this->getDoctrine()->getManager()->getRepository(ProductCategory::class)->findAll();

         // Bad Request
         if($category == NULL)
         return new JsonResponse(
             ["Message" => "Oops .. the database not contain category"],
             Response::HTTP_BAD_REQUEST
         );
 
         // Else
        $categoryJson = ProductCategory::createJsonAll($category);

        return new JsonResponse(
           [ ["Message" => "OK"],$categoryJson],
            Response::HTTP_OK
        );
    }
}
