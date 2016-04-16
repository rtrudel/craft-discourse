<?php
/**
 * Discourse plugin for Craft CMS
 *
 * Discourse_Sso Controller
 *
 * @author    Richard Trudel
 * @copyright Copyright (c) 2016 Richard Trudel
 * @link      http://trudel.ninja
 * @package   Discourse
 * @since     1.0.0
 */

namespace Craft;

class Discourse_SsoController extends BaseController
{

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     * @access protected
     */
    protected $allowAnonymous = array('actionIndex',
        );
    
    public function actionIndex()
    {
      $settings = craft()->plugins->getPlugin('discourse')->getSettings();

      if (($user = craft()->userSession->getUser())&&($settings->discourseSecret)&&($settings->discourseUrl))
      {

        include(dirname(__file__).'/../include/SSOHelper.php');

        $sso = new \Cviebrock\DiscoursePHP\SSOHelper();

        // this should be the same in your code and in your Discourse settings:
        $secret = $settings->discourseSecret;
        $sso->setSecret( $secret );

        // load the payload passed in by Discourse
        $payload = $_GET['sso'];
        $signature = $_GET['sig'];

        // validate the payload
        if (!($sso->validatePayload($payload,$signature))) {
            // invaild, deny
            header("HTTP/1.1 403 Forbidden");
            echo("Bad SSO request");
            die();
        }

        $nonce = $sso->getNonce($payload);



        // Required and must be unique to your application
        $userId = $user->id;

        // Required and must be consistent with your application
        $userEmail = $user->email;

        // Optional - if you don't set these, Discourse will generate suggestions
        // based on the email address

        $extraParameters = array(
            'username' => $user->username,
            'name'     => $user->fullName
        );

        // build query string and redirect back to the Discourse site
        $query = $sso->getSignInString($nonce, $userId, $userEmail, $extraParameters);
        header('Location: '.$settings->discourseUrl.'/session/sso_login?' . $query);
        exit(0);
      }
      else
      {
        $this->redirect('/connexion');
      }
    }
}
