<?php
{% include "docHeader.txt" ignore missing %}

 \defined('_JEXEC') or die;

 use Joomla\CMS\Extension\PluginInterface;
 use Joomla\CMS\Factory;
 use Joomla\CMS\Plugin\PluginHelper;
 use Joomla\Database\DatabaseInterface;
 use Joomla\DI\Container;
 use Joomla\DI\ServiceProviderInterface;
 use Joomla\Event\DispatcherInterface;
 use {{cookiecutter.namespace}}\Plugin\{{cookiecutter.plugin_type.title()}}\{{cookiecutter.project_slug.title()}}\Extension\{{cookiecutter.project_slug.title()}};

 return new class () implements ServiceProviderInterface {
    /**
     * Registers the service provider with a DI container.
     *
     * @param   Container  $container  The DI container.
     *
     * @return  void
     *
     * @since   __DEPLOY_VERSION__
     */
    public function register(Container $container)
    {
        $container->set(
            PluginInterface::class,
            function (Container $container) {
                $plugin     = new {{cookiecutter.project_slug.title()}}(
                    $container->get(DispatcherInterface::class),
                    (array) PluginHelper::getPlugin('{{cookiecutter.plugin_type}}', '{{cookiecutter.project_slug}}')
                );
                $plugin->setApplication(Factory::getApplication());
                $plugin->setDatabase($container->get(DatabaseInterface::class));

                return $plugin;
            }
        );
    }
};