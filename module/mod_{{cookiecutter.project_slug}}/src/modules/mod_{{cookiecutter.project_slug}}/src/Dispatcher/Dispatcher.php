<?php
{% include "docHeader.txt" ignore missing %}

namespace {{cookiecutter.namespace}}\Module\{{cookiecutter.__project_camelcaps}}\Dispatcher;

use Joomla\CMS\Dispatcher\AbstractModuleDispatcher;
use Joomla\CMS\Helper\HelperFactoryAwareInterface;
use Joomla\CMS\Helper\HelperFactoryAwareTrait;

// phpcs:disable PSR1.Files.SideEffects
\defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

/**
 * Dispatcher class for mod_{{cookiecutter.project_slug}}
 *
 * @since  __DEPLOY_VERSION__
 */
class Dispatcher extends AbstractModuleDispatcher implements HelperFactoryAwareInterface
{
    use HelperFactoryAwareTrait;

    /**
     * Returns the layout data.
     *
     * @return  array
     *
     * @since   __DEPLOY_VERSION__
     */
    protected function getLayoutData(): array
    {
        $data = parent::getLayoutData();

        $data['list'] = $this->getHelperFactory()->getHelper('{{cookiecutter.project_slug.title()}}Helper')->getArticles($data['params'], $data['app']);

        return $data;
    }
}