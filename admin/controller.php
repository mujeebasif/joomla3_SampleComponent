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
// import Joomla controller library

/**
 * ChefsNews Component Controller
 */
class SampleController extends JControllerLegacy
{
	function display()
	  {
		//echo 'Welcome To the Component \'s main Interface. ';
		parent::display();
		
		// Set the submenu
		//SampleHelper::addSubmenu(JRequest::getCmd('view'));
	  }
}

?>