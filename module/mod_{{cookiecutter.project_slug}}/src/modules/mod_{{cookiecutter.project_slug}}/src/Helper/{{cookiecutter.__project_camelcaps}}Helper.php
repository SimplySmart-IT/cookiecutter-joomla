<?php
{% include "docHeader.txt" ignore missing %}

namespace {{cookiecutter.namespace}}\Module\{{cookiecutter.__project_camelcaps}}\Site\Helper;

use Joomla\CMS\Application\SiteApplication;
use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Content\Administrator\Extension\ContentComponent;
use Joomla\Database\DatabaseAwareInterface;
use Joomla\Database\DatabaseAwareTrait;
use Joomla\Database\ParameterType;
use Joomla\Registry\Registry;

// phpcs:disable PSR1.Files.SideEffects
\defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

/**
 * Helper for mod_{{cookiecutter.project_slug}}
 *
 * @since  __DEPLOY_VERSION__
 */

 class {{cookiecutter.__project_camelcaps}}Helper implements DatabaseAwareInterface
{
    use DatabaseAwareTrait;

    /**
     * Retrieve a list of articles
     *
     * @param   Registry         $moduleParams  The module parameters.
     * @param   SiteApplication  $app           The current application.
     *
     * @return  \stdClass[]
     *
     * @since   __DEPLOY_VERSION__
     */
    public function getArticles(Registry $moduleParams, SiteApplication $app): array
    {
        $db        = $this->getDatabase();
        $query     = $db->createQuery();

        $query->select('*')
            ->from($db->quoteName('#__content', 'c'))
            ->order($db->quoteName('c.created') . ' DESC');

        // Filter by language
        if ($app->getLanguageFilter()) {
            $query->whereIn($db->quoteName('language'), [$app->getLanguage()->getTag(), '*'], ParameterType::STRING);
        }

        $query->setLimit((int) $moduleParams->get('count'));
        $db->setQuery($query);

        try {
            $rows = (array) $db->loadObjectList();
        } catch (\RuntimeException $e) {
            $app->enqueueMessage(Text::_('JERROR_AN_ERROR_HAS_OCCURRED'), 'error');

            return [];
        }

        return $row;

    }

}