<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/31/15
 * Time: 7:45 AM
 */

namespace api\controllers;

use common\modules\reporting\models\ItemChild;
use common\modules\reporting\models\ItemSubType;
use common\modules\reporting\models\ItemType;
use common\modules\tracking\models\Status;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\db\Query;

class SiteController extends \yii\rest\Controller
{
    public function actionIndex()
    {
        /*SELECT COUNT(*), "status" FROM  "tracking"."status" GROUP BY "status" ORDER BY "status" DESC*/
        $query = new Query();
        $query->select(['COUNT(*)','value'=>'status']);
        $query->from([Status::tableName()]);
        $query->groupBy('value');
        $query->orderBy(['count'=>SORT_ASC]);
        return $query->all();
       // return $query->createCommand()->sql;
    }

    public function actionItems()
    {
        $eventItems = ItemType::find()->where('type=:type', [':type' => ItemType::TYPE_EVENT])->all();
        $incidentItems = ItemType::find()->where('type=:type', [':type' => ItemType::TYPE_INCIDENT])->all();
        $damageItems = ItemType::find()->where('type=:type', [':type' => ItemType::TYPE_DAMAGE])->all();
        $needItems = ItemType::find()->where('type=:type', [':type' => ItemType::TYPE_NEED])->all();

        $lookupItemChild = ItemChild::find()->all();
        $lookupItemSubtype = ItemSubType::find()->all();

        $data = [
            'eventItems' => $eventItems,
            'incidentItems' => $incidentItems,
            'damageItems' => $damageItems,
            'needItems' => $needItems,
            'llokupItemChild' => $lookupItemChild,
            'lookupItemSubType' => $lookupItemSubtype,

        ];
        return [$data];
    }
}