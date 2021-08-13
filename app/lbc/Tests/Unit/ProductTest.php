<?php

namespace App\Tests\Unit;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\CategoryOption;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

use App\Entity\Product;
use App\Entity\ProductCategory;

// require './vendor/autoload.php';

class ProductTest extends TestCase
{
    public function testValidArrayJson(): void
    {
        $productTest = new Product();

        $productCategory = new ProductCategory();
        $productCategory->setName('Voiture de luxe');
        
        $option = new CategoryOption();
        $option->setName('RS7');

        $productTest->setTitle('Audi A7');
        $productTest->setContent('Une voiture magnifique');
        $productTest->setProductCategory($productCategory);
        $productTest->setOption1($option);
        $productTest->setOption1($option);

        $this->assertInstanceOf(
            Product::class,
            Product::createJsonAll([$productTest,$productTest])
        );
    }

    // public function testCannotBeCreatedFromInvalidEmailAddress(): void
    // {
    //     $this->expectException(InvalidArgumentException::class);

    //     Email::fromString('invalid');
    // }

    // public function testCanBeUsedAsString(): void
    // {
    //     $this->assertEquals(
    //         'user@example.com',
    //         Email::fromString('user@example.com')
    //     );
    // }
    // private Product  $product;

    // public function testGetTitle(): void
    // {
    //     // This calls KernelTestCase::bootKernel(), and creates a
    //     // "client" that is acting as the browser
    //     $client = static::createClient();

    //     // Request a specific page
    //     $crawler = $client->request('GET', '/api/v1/product/');

    //     // Validate a successful response and some content
    //     $this->assertResponseIsSuccessful();
    //     $this->assertSelectorTextContains('h1', 'Hello World');

    //     // // (1) boot the Symfony kernel
    //     // self::bootKernel();

    //     // // (2) use static::getContainer() to access the service container
    //     // $container = static::getContainer();

    //     // // (3) run some service & test the result
    //     // $product = $container->get(Product::class);
    //     // $setName = $product->setTitle();

    //     // $this->assertEquals('Audi A7', $setName->getTitle());

    // }

}
