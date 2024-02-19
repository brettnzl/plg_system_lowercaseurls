<?php
defined('_JEXEC') or die;

// License: GNU General Public License version 2 or later; see LICENSE.txt

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;

class PlgSystemLowercaseurls extends CMSPlugin
{
    public function onAfterInitialise()
    {
        $app = Factory::getApplication();
        
        // Only proceed if we are on the site application
        if ($app->isClient('site')) {
            $uri = Uri::getInstance();
            $originalPath = $uri->getPath();
            $lowerPath = strtolower($originalPath);
            
            // Check if the path needs to be redirected
            if ($originalPath !== $lowerPath) {
                $uri->setPath($lowerPath);
                $app->redirect((string)$uri, 301);
            }
        }
    }
}
