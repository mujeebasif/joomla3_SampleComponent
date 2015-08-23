

<?php
// No direct access

/*------------------------------------------------------------------------
# com_sample  mod_sample
# ------------------------------------------------------------------------
# author    mmamjb Web Designs & Development
# copyright Copyright (C) 2010 http://www.mmamjb.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.mmamjb.com
# Technical Support:  Contact - http://www.mmamjb.com/contact.html
-------------------------------------------------------------------------*/
defined('_JEXEC') or die('Restricted access');


/**
 * HTML View class for the ChefsNews Component
 */
class SampleViewsample extends JViewLegacy // <Component-name>View<View-name>
{
    // Overwriting JView display method
	function display($tpl = null)
    {
		
		$app = JFactory::getApplication();
		
		 //$app->redirect('index.php?option=com_sample&view=samplelist');
		 //exit;
		
        JToolBarHelper::title(   JText::_( 'Sample' ), 'banners.png' );
		
		// Assign data to the view
		$this->msg = 'Welcome To the Component\'s main Interface.';
		// Display the view
        parent::display($tpl);
		JToolBarHelper::preferences('com_sample');
    }
}



?>