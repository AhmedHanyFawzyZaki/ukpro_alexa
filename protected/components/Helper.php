<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2013
 */
class Helper {

    public static function PlayVideo($model) {
        $player = Yii::app()->controller->widget('ext.Yiitube', array('v' => $model->video, 'size' => 'small'));


        return '<div class="VideoPlay">' . $player->play() . '</div>';
    }

    public static function yiiparam($name, $default = null) {
        if (isset(Yii::app()->params[$name]))
            return Yii::app()->params[$name];
        else
            return $default;
    }

    public static function DrawPageLink($page_id) {
        $page = Pages::model()->findByPk($page_id);
        if ($page === null) {
            return 'Not-Found';
        }

        return 'home/page/view/' . $page->url;
    }

    public static function GenerateRandomKey($length = 10) {

        $chars = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
        shuffle($chars);
        $password = implode(array_slice($chars, 0, $length));

        return $password;
    }

    public static function getGalleryImages($gallery_id) {

        $criteria = new CDbCriteria();

        $criteria->condition = 'gallery_id=:UID';

        $criteria->params = array(':UID' => $gallery_id);
        $criteria->order = 'rank';

        $gallery = GalleryPhoto::model()->findAll($criteria);

        return $gallery;
    }

    public static function slugify($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

        // trim
        $text = trim($text, '-');

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // lowercase
        $text = strtolower($text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public static function active_admin($controller_id) {
        if (Yii::app()->controller->id == $controller_id) {
            return 'active';
        }
        return '';
    }

    public static function getStatus($status, $yes = 'yes', $no = 'no') {
        if ($status == 1) {
            return $yes;
        } else {
            return $no;
        }
    }

}

?>