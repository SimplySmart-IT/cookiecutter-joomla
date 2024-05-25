<?php
{% include "docHeader.txt" ignore missing %}

\defined('_JEXEC') or die;

use Joomla\CMS\Extension\Service\Provider\HelperFactory;
use Joomla\CMS\Extension\Service\Provider\Module;
use Joomla\CMS\Extension\Service\Provider\ModuleDispatcherFactory;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

/**
 * The {{cookiecutter.project_slug}} module service provider.
 *
 * @since   __DEPLOY_VERSION__
 */
return new class () implements ServiceProviderInterface {
    /**
     * Registers the service provider with a DI container.
     *
     * @param   Container  $container  The DI container.
     *
     * @return  void
     *
     * @since    __DEPLOY_VERSION__
     */
    public function register(Container $container): void
    {
        $container->registerServiceProvider(new ModuleDispatcherFactory('\\{{cookiecutter.namespace}}\\Module\\{{cookiecutter.__project_camelcaps}}'));
        $container->registerServiceProvider(new HelperFactory('\\{{cookiecutter.namespace}}\\Module\\{{cookiecutter.__project_camelcaps}}\\Site\\Helper'));

        $container->registerServiceProvider(new Module());
    }
};