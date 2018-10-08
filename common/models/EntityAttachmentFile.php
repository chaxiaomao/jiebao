<?php

namespace common\models\entity;

use common\models\EntityAttachmentType;
use Yii;

class EntityAttachmentFile extends EntityAttachment {

    public function loadDefaultValues($skipIfSet = true) {
        parent::loadDefaultValues($skipIfSet);
        $this->type = EntityAttachmentType::TYPE_FILE;
    }


}
