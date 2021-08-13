<?php

namespace ContainerLKLLOlf;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCategoryOptionTypeService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'App\Form\CategoryOptionType' shared autowired service.
     *
     * @return \App\Form\CategoryOptionType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractType.php';
        include_once \dirname(__DIR__, 4).'/src/Form/CategoryOptionType.php';

        return $container->privates['App\\Form\\CategoryOptionType'] = new \App\Form\CategoryOptionType();
    }
}
