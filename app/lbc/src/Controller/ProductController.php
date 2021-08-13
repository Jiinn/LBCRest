<?php

namespace App\Controller;

use App\Entity\CategoryOption;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormInterface;


use App\Entity\Product;

use App\Form\ProductType;

class ProductController extends AbstractController
{

    /**
     * @Route("/api/v1/product/", name="product_all", methods={"GET"})
     */
    public function productAll()
    {
        // Get Product
        $product = $this->getDoctrine()->getManager()->getRepository(Product::class)->findAll();
        $productJson = Product::createJsonAll($product);

        return new JsonResponse(
            [["Message" => "OK"], $productJson],
            Response::HTTP_OK
        );
    }

    /**
     * @Route("/api/v1/product/search/{search}", name="product_search", methods={"GET"})
     */
    public function productSearch($search)
    {
        $manager = $this->getDoctrine()->getManager();

        $search = $manager->getRepository(Product::class)->search($search);
        
        $productJson = Product::createJsonAll($search);

        return new JsonResponse(
            [["Message" => "OK"], $productJson],
            Response::HTTP_OK
        );
    }

    /**
     * @Route("/api/v1/product/{id}", name="product_by_id", methods={"GET"})
     */
    public function productById($id)
    {
        // Get Product
        $product = $this->getDoctrine()->getManager()->getRepository(Product::class)->find($id);

        // Bad Request
        if ($product == NULL)
            return new JsonResponse(
                ["Message" => "This product do not exist, Retry again."],
                Response::HTTP_BAD_REQUEST
            );

        // Else
        $productJson = $product->createJson();

        return new JsonResponse(
            $productJson,
            Response::HTTP_OK
        );
    }

    /**
     * @Route("/api/v1/product/", name="product_create", methods={"POST"})
     */
    public function productCreate(Request $request)
    {

        $mode = 0;

        // Get Data 
        $data = $request->request->all();
        // is Vehicule ?
        if ($request->request->get('product_category') == 1) $mode = 1;
        // var_dump($data);
        // Create form
        $product = new Product;
        $form = $this->createForm(ProductType::class, $product);
        $form->submit($data);

        // Check form 
        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                $manager = $this->getDoctrine()->getManager();

                // Search option
                if ($mode == 1) {

                    // Get Search  and exit if null
                    $search = $request->request->get('model');
                    if ($search === null)
                        return new JsonResponse(
                            [["Message" => "The Model is not filled"], "errors" => $this->getErrorsFromForm($form)],
                            Response::HTTP_BAD_REQUEST
                        );

                    $option = $manager->getRepository(CategoryOption::class)->findOption($search);

                    if (is_array($option) && array_key_exists(0, $option)) {
                        $option1 = $manager->getRepository(CategoryOption::class)->find($option[0]['id']);
                        $product->setOption1($option1);
                        if ($option[0]['parent_option'] !== null) {
                            $option2 = $manager->getRepository(CategoryOption::class)->find($option[0]['parent_option']);
                            $product->setOption2($option2);
                        } else {
                            return new JsonResponse(
                                [["Message" => "We do not have a vehicle model corresponding to your model"], "errors" => $this->getErrorsFromForm($form)],
                                Response::HTTP_BAD_REQUEST
                            );
                        }
                    } else {
                        return new JsonResponse(
                            [["Message" => "We do not have a vehicle brand corresponding to your model"], "errors" => $this->getErrorsFromForm($form)],
                            Response::HTTP_BAD_REQUEST
                        );
                    }
                }

                $manager->persist($product);
                $manager->flush();

                $productJson = $product->createJson();

                return new JsonResponse(
                    ["Message" => "OK", $productJson],
                    Response::HTTP_OK
                );
            } else
                return new JsonResponse(
                    [["Message" => "Your request does not contain the correct type of form"], "errors" => $this->getErrorsFromForm($form)],
                    Response::HTTP_BAD_REQUEST
                );
        }
    }

    /**
     * @Route("/api/v1/product/{id}", name="product_update", methods={"PUT"})
     */
    public function productUpdate(Request $request, $id)
    {

        $mode = 0;

        // Get Put body
        $data = json_decode($request->getContent(), true);

        // Check PUT body
        if (!is_array($data)) {
            return new JsonResponse(
                ["Message" => "Your body do not contain a good json"],
                Response::HTTP_BAD_REQUEST
            );
        }

        // is Vehicule ?
        if ($data[0]['product_category'] == 1) $mode = 1;

        // Get Product
        $product = $this->getDoctrine()->getManager()->getRepository(Product::class)->find($id);

        // Check if product exist
        if ($product == null) {
            return new JsonResponse(
                ["Message" => "This product id not exist, please check list of product"],
                Response::HTTP_BAD_REQUEST
            );
        }

        // Create form and submit
        $form = $this->createForm(ProductType::class, $product);
        $form->submit($data[0]);

        // Check form 
        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                $manager = $this->getDoctrine()->getManager();

                // Search option
                if ($mode == 1) {

                    // Get Search  and exit if null
                    $search = $data[0]['model'];
                    if ($search === null)
                        return new JsonResponse(
                            [["Message" => "The Model is not filled"], "errors" => $this->getErrorsFromForm($form)],
                            Response::HTTP_BAD_REQUEST
                        );

                    $option = $manager->getRepository(CategoryOption::class)->findOption($search);
              
                    if (is_array($option) && array_key_exists(0, $option)) {
                        $option1 = $manager->getRepository(CategoryOption::class)->find($option[0]['id']);
                        $product->setOption1($option1);
                        if ($option[0]['parent_option'] !== null) {
                            $option2 = $manager->getRepository(CategoryOption::class)->find($option[0]['parent_option']);
                            $product->setOption2($option2);
                        } else {
                            return new JsonResponse(
                                [["Message" => "We do not have a vehicle model corresponding to your model"], "errors" => $this->getErrorsFromForm($form)],
                                Response::HTTP_BAD_REQUEST
                            );
                        }
                    } else {
                        return new JsonResponse(
                            [["Message" => "We do not have a vehicle brand corresponding to your model"], "errors" => $this->getErrorsFromForm($form)],
                            Response::HTTP_BAD_REQUEST
                        );
                    }
                }


                // update
                $manager->persist($product);
                $manager->flush();

                $productJson = $product->createJson();

                return new JsonResponse(
                    ["Message" => "OK", $productJson],
                    Response::HTTP_OK
                );
            } else
                return new JsonResponse(
                    [["Message" => "Your request does not contain the correct type of form"], "errors" => $this->getErrorsFromForm($form)],
                    Response::HTTP_BAD_REQUEST
                );
        }
    }

    /**
     * @Route("/api/v1/product/{id}", name="product_delete", methods={"DELETE"})
     */
    public function productDelete($id)
    {

        // Get Product
        $product = $this->getDoctrine()->getManager()->getRepository(Product::class)->find($id);

        // Check if product exist
        if ($product == null) {
            return new JsonResponse(
                ["Message" => "This product id not exist, please check list of product"],
                Response::HTTP_BAD_REQUEST
            );
        }


        // Remove
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($product);
        $manager->flush();


        return new JsonResponse(
            ["Message" => "OK"],
            Response::HTTP_OK
        );
    }

    private function getErrorsFromForm(FormInterface $form)
    {
        $errors = array();
        foreach ($form->getErrors() as $error) {
            $errors[] = $error->getMessage();
        }
        foreach ($form->all() as $childForm) {
            if ($childForm instanceof FormInterface) {
                if ($childErrors = $this->getErrorsFromForm($childForm)) {
                    $errors[$childForm->getName()] = $childErrors;
                }
            }
        }
        return $errors;
    }
}
