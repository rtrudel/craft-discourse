<?php
/**
 * Discourse plugin for Craft CMS
 *
 * Discourse SSO
 *
 *
 * @author    Richard Trudel
 * @copyright Copyright (c) 2016 Richard Trudel
 * @link      http://trudel.ninja
 * @package   Discourse
 * @since     1.0.0
 */

namespace Craft;

class DiscoursePlugin extends BasePlugin
{
    public function getName()
    {
         return Craft::t('Discourse');
    }

    public function getDescription()
    {
        return Craft::t('Discourse SSO');
    }

    public function getVersion()
    {
        return '1.0.0';
    }

    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    public function getDeveloper()
    {
        return 'Richard Trudel';
    }

    public function getDeveloperUrl()
    {
        return 'http://trudel.ninja';
    }

    public function hasCpSection()
    {
        return false;
    }

    public function onBeforeInstall()
    {
    }

    public function onAfterInstall()
    {
    }

    public function onBeforeUninstall()
    {
    }

    public function onAfterUninstall()
    {
    }

    protected function defineSettings()
    {
        return array(
            'discourseUrl' => array(AttributeType::String, 'label' => 'Discourse URL', 'default' => ''),
            'discourseSecret' => array(AttributeType::String, 'label' => 'Discourse SSO Secret', 'default' => ''),
        );
    }

    public function getSettingsHtml()
    {
       return craft()->templates->render('discourse/Discourse_Settings', array(
           'settings' => $this->getSettings()
       ));
    }

    public function prepSettings($settings)
    {
        // Modify $settings here...

        return $settings;
    }

}
