<?php

namespace common\models\base;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * Entity Model Status
 *
 * @author ben
 */
class EntityModelStatus {

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

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
                static::STATUS_ACTIVE => ['id' => static::STATUS_ACTIVE, 'label' => Yii::t('app', 'Active')],
                static::STATUS_INACTIVE => ['id' => static::STATUS_INACTIVE, 'label' => Yii::t('app', 'Inactive')],
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

    public static function getLabel($id) {
        return static::getData($id, 'label');
    }

    public static function getHashMap($keyField, $valField) {
        $key = __CLASS__ . Yii::$app->language . $keyField . $valField;
        $data = Yii::$app->cache->get($key);

        if ($data === false) {
            $data = ArrayHelper::map(static::getData(), $keyField, $valField);
            Yii::$app->cache->set($key, $data);
        }

        return $data;
    }

}
