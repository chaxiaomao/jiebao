<?php

namespace common\models\entity;

use common\models\base\ActiveRecord;
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\FileHelper;
/**
 * This is the model class for table "{{%entity_attachment}}".
 *
 * @property string $id
 * @property string $entity_id
 * @property string $entity_class
 * @property string $entity_attribute
 * @property int $type
 * @property string $name
 * @property string $label
 * @property string $content
 * @property string $hash
 * @property string $extension
 * @property int $size
 * @property string $mime_type
 * @property string $logic_path
 * @property int $status
 * @property int $position
 * @property int $created_at
 * @property int $updated_at
 */
class EntityAttachment extends ActiveRecord
{

    protected $_debug = false;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{entity_attachment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entity_id', 'type', 'size', 'position', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
            [['status'],'safe'],
            [['entity_class', 'entity_attribute', 'name', 'label', 'hash', 'extension', 'mime_type', 'logic_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'entity_id' => Yii::t('app', 'Entity ID'),
            'entity_class' => Yii::t('app', 'Entity Class'),
            'entity_attribute' => Yii::t('app', 'Entity Attribute'),
            'type' => Yii::t('app', 'Type'),
            'name' => Yii::t('app', 'Name'),
            'label' => Yii::t('app', 'Label'),
            'content' => Yii::t('app', 'Content'),
            'hash' => Yii::t('app', 'Hash'),
            'extension' => Yii::t('app', 'Extension'),
            'size' => Yii::t('app', 'Size'),
            'mime_type' => Yii::t('app', 'Mime Type'),
            'logic_path' => Yii::t('app', 'Logic Path'),
            'status' => Yii::t('app', 'Status'),
            'position' => Yii::t('app', 'Position'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\EntityAttachmentQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\query\EntityAttachmentQuery(get_called_class());
    }

    public function getDownloadUrl() {
        return Url::to(['/attachments/file/download', 'id' => $this->id]);
    }

    public function getHashFileName() {
        return "{$this->hash}.{$this->extension}";
    }

    public function getFileName() {
        return "{$this->name}.{$this->extension}";
    }

    public function getStoreUrl() {
        if (!isset($this->_data['storeUrl'])) {
            $this->_data['storeUrl'] = Yii::$app->params['config']['upload']['accessUrl'];
        }
        return $this->_data['storeUrl'];
    }

    public function setStoreUrl($val) {
        $this->_data['storeUrl'] = $val;
    }

    public function getStorePath() {
        if (!isset($this->_data['storePath'])) {
            $this->_data['storePath'] = Yii::$app->folderOrganizer->getFullUploadStorePath($this);
        }
        return $this->_data['storePath'];
    }

    public function getStoreDir() {
        if (!isset($this->_data['storeDir'])) {
            $this->_data['storeDir'] = dirname($this->getStorePath());
        }
        return $this->_data['storeDir'];
    }

    public function getLogicPath() {
        return $this->logic_path;
    }

    public function getFilelUrl() {
        if (!isset($this->_data['fileUrl'])) {
            $this->_data['fileUrl'] = $this->getStoreUrl() . '/' . $this->getLogicPath() . $this->getHashFileName();
        }
        return $this->_data['fileUrl'];
    }

    public function beforeDelete() {
        $filePath = $this->getStorePath();
        if (@\file_exists($filePath)) {
            $dir = dirname($filePath);
            FileHelper::removeDirectory($dir);
        } else {
            if ($this->_debug) {
//                throw new Exception("Can not detect {$filePath}");
            }
        }
        return parent::beforeDelete();
    }

    /**
     * for avatar preview
     * @return type
     */
    public function getInitialPreview() {
        $initialPreview = [];
        $initialPreview[] = Html::img($this->renderlink(), ['class' => 'file-preview-image', 'style' => 'width:300px;height:250px']);
        return $initialPreview;
    }

    public function renderlink() {
//        $entity = EntityAttachment::find()->andWhere(['hash'=>$this->link])->one();
        $link = Yii::$app->jkcx->image_base_url . '/' . $this->logic_path . $this->hash . '.' . $this->extension;
        return $link;
    }
}
