<?php

namespace ContainerFJxe2yG;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCategoryOptionRepositoryService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Repository\CategoryOptionRepository' shared autowired service.
     *
     * @return \App\Repository\CategoryOptionRepository
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectRepository.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/collections/lib/Doctrine/Common/Collections/Selectable.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityRepository.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/doctrine-bundle/Repository/ServiceEntityRepositoryInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/doctrine-bundle/Repository/ServiceEntityRepository.php';
        include_once \dirname(__DIR__, 4).'/src/Repository/CategoryOptionRepository.php';

        return $container->privates['App\\Repository\\CategoryOptionRepository'] = new \App\Repository\CategoryOptionRepository(($container->services['doctrine'] ?? $container->load('getDoctrineService')));
    }
}
