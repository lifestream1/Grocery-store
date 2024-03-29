<?php

namespace app\components;

use app\models\Category;


Class TreeCatigories
{

		public $element_id;


		public static function listCategoriesTree($element_id)
		{
				$list_id = [];
				while($element_id > 0){
					array_unshift($list_id, $element_id);
					$parent_id = Category::find()->select('parent_id')->where(['id' => $element_id])->asArray()->all();
					$element_id = $parent_id[0]['parent_id'];
				}
		

					$list_title = '';
				foreach($list_id as $el_id){
						$element_title = Category::find()->select('title')->where(['id' => $el_id])->asArray()->all();
						$list_title .= $element_title[0]['title']. ' > ';
				}
				$list_title = rtrim($list_title, " > ");
				return $list_title;
		}

}


