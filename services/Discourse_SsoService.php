<?php
/**
 * Discourse plugin for Craft CMS
 *
 * Discourse_Sso Service
 *
 * --snip--
 * All of your plugin’s business logic should go in services, including saving data, retrieving data, etc. They
 * provide APIs that your controllers, template variables, and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 * --snip--
 *
 * @author    test
 * @copyright Copyright (c) 2016 test
 * @link      test.com
 * @package   Discourse
 * @since     1.0.0
 */

namespace Craft;

class Discourse_SsoService extends BaseApplicationComponent
{
    /**
     * This function can literally be anything you want, and you can have as many service functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     craft()->discourse_Sso->exampleService()
     */
    public function sso()
    {
      include(dirname(__file__).'/../include/SSOHelper.php');
    }

}
