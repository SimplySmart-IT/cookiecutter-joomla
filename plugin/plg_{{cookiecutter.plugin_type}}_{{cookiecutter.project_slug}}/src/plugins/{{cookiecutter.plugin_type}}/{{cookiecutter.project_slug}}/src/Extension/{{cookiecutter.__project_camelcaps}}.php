<?php
{% include "docHeader.txt" ignore missing %}

namespace {{cookiecutter.namespace}}\Plugin\{{cookiecutter.plugin_type.title()}}\{{cookiecutter.project_slug.title()}}\Extension;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\Database\DatabaseAwareTrait;
use Joomla\Registry\Registry;
use Joomla\CMS\Event\Result\ResultAwareInterface;
use Joomla\Event\SubscriberInterface;


// phpcs:disable PSR1.Files.SideEffects
\defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

/**
 * {{cookiecutter.project_slug.title()}} {{cookiecutter.plugin_type.title()}} Plugin
 *
 * @since  __DEPLOY_VERSION__
 */
final class {{cookiecutter.__project_camelcaps}} extends CMSPlugin implements SubscriberInterface
{
    use DatabaseAwareTrait;

    /**
	 * Affects constructor behavior. If true, language files will be loaded automatically.
	 * Note this is only available in Joomla 3.1 and higher.
	 * If you want to support 3.0 series you must override the constructor
	 *
	 * @var    boolean
	 * @since  __DEPLOY_VERSION__
	 */
	protected $autoloadLanguage = true;

    /**
	 * Returns an array of events this subscriber will listen to.
	 *
	 * @return  array
     * 
	 * @since   __DEPLOY_VERSION__
     * 
     * @see libraries/src/Event/CoreEventAware.php
	 */
	public static function getSubscribedEvents(): array
	{
		return [
			'onContentPrepare'	     => ['prepareContent', \Joomla\Event\Priority::MIN],
		];
	}

    /**
     * Plugin that ???
     *
     * @param   \Joomla\Event\Event $event
     *
     * @return  void
     */
    public function prepareContent(\Joomla\Event\Event $event)
    {
        $allowed_contexts = ['com_content.category', 'com_content.article', 'com_content.featured'];

        /** @var string   $context  The context of the content being passed to the plugin */
        /** @var mixed    $row      An object with a "text" property */
        /** @var mixed    $params   Additional parameters. See {@see PlgContentContent()}. */
        /** @var integer  $page     Optional page number. Unused. Defaults to zero. */
        
        [$context, $row, $params, $page] = array_values($event->getArguments());

        if (!\in_array($context, $allowed_contexts)) {
            return;
        }

        // Return if we don't have valid params
        if (!($params instanceof Registry)) {
            return;
        }

        // Return if we don't have a valid article id
        if (!isset($row->id) || !(int) $row->id) {
            return;
        }

        // ... do something

        //Return $value
        // if ($event instanceof ResultAwareInterface) {
            // $event->addResult($value);
            // return;
        // } else {
            // use GenericEvent approach
            // $result = $event->getArgument('result') ?: [];   // get the result argument from GenericEvent
            // $result[] = $value;                              // add your return value into the array
            // $event->setArgument('result', $result);          // write back the updated result into the GenericEvent instance
        // }

        // stop the propagation to other plugins if nessesary - optional
        // $event->stopPropagation();
    }

}