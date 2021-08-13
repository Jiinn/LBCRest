<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\CategoryOption;

class CategoryOptionController extends AbstractController
{
    
    /**
     * @Route("/api/v1/options/", name="options_all", methods={"GET"})
     */
    public function optionsAll()
    {
        // Get Product
        $options = $this->getDoctrine()->getManager()->getRepository(CategoryOption::class)->findAll();

         // Bad Request
         if($options == NULL)
         return new JsonResponse(
             ["Message" => "This product do not exist, Retry again."],
             Response::HTTP_BAD_REQUEST
         );
 
         // Else
         $optionsJson = CategoryOption::createJsonAll($options);

        return new JsonResponse(
           [ ["Message" => "OK"],$optionsJson],
            Response::HTTP_OK
        );
    }
}
