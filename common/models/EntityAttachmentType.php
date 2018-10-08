<?php

namespace common\models;

use Yii;

/**
 * EntityAttachmentType
 *
 * @author ben
 */
class EntityAttachmentType extends AbstractStaticClass {

    const TYPE_DEFAULT = 0;  // load in when demand
    const TYPE_FILE = 1;  // file
    const TYPE_IMAGE = 2;  // image
    
    protected static $_data;

    /**
     * 
     * @param type $id
     * @param type $attr
     * @return string|array
     */
    public static function getData($id = '', $attr = '') {
        if (is_null(static::$_data)) {
            static::$_data = [
                static::TYPE_DEFAULT => ['id' => static::TYPE_DEFAULT, 'label' => Yii::t('app', 'Default')],
                static::TYPE_FILE => ['id' => static::TYPE_FILE, 'label' => Yii::t('app', 'File')],
                static::TYPE_IMAGE => ['id' => static::TYPE_IMAGE, 'label' => Yii::t('app', 'Image')],
            ];
        }
        if (!empty($id) && !empty($attr)) {
            return static::$_data[$id][$attr];
        }
        if (!empty($id) && empty($attr)) {
            return static::$_data[$id];
        }
        return static::$_data;
    }

}
