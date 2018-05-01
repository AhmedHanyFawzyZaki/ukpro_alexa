<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2013
 */

class HtmlHelper
 {
 	/**
 	 * Helper::HtmlPageLink()
 	 *
 	 * @param mixed $page_id
 	 * @param mixed $class
 	 * @return
 	 */
 	public static function HtmlPageLink($page_id, $class='')
 	{
            $page= Pages::model()->findByPk($page_id);
            if($page  === null)
            {
                return 'Not-Found';
            }
            return Yii::app()->request->getBaseUrl(true)."/page-".$page->slug;
 	}
  }
?>