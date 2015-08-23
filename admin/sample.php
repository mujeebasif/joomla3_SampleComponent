<?php
/*------------------------------------------------------------------------
# com_sample  Joomla 3 Extenson
# ------------------------------------------------------------------------
# author    mmamjb Web Designs & Development
# copyright Copyright (C) 2010 http://www.mmamjb.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.mmamjb.com
# Technical Support:  Contact - http://www.mmamjb.com/contact.html
-------------------------------------------------------------------------*/
defined('_JEXEC') or die('Restricted access');
define('DS', DIRECTORY_SEPARATOR);
if (!JFactory::getUser()->authorise('core.manage', 'com_sample')) {
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}
 
// require helper file
//JLoader::register('SampleHelper', dirname(__FILE__) . DS . 'helpers' . DS . 'sample.php');




// Get an instance of the controller prefixed by ChefsNews
// this line will create sampleController.
// Joomla will look for the declaration of that class in an aptly named file called controller.php (it's a default behavior).
$controller = JControllerLegacy::getInstance('sample');

// Perform the Request task
$controller->execute(JRequest::getCmd('task'));

// Redirect if set by the controller
$controller->redirect();
?>