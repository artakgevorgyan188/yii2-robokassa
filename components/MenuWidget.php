<?php

namespace app\components;

use Yii;
use yii\base\Widget;
use app\models\Category;

class MenuWidget extends Widget
{
    public $tpl;//template
    public $model;
    public $data;//array all category in db
    public $tree;//is array will create tree and we will se inserted(вложенный) categories too
    public $menuHtml;//Html code in $tpl , <ul>  or <select>

    public function init(){
        parent::init();
        if($this->tpl === null){
            $this->tpl = 'menu';
        }
        $this->tpl.= '.php';
    }

    public function run(){
        //get cache in user part , but in admin part not ,in directory runtime->cache will be create automatic, and data don`t go from db
        if($this->tpl == 'menu.php'){
            $menu = Yii::$app->cache->get('menu');
            if($menu) return $menu;
        }
        $this->data = Category::find()->indexBy('id')->asArray()->all();//indexBy('id') - key of array the same as id
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
        //set cache we set in menu $this->menuHtml in 60 seconds
        if($this->tpl == 'menu.php'){
            Yii::$app->cache->set('menu',$this->menuHtml,60);
        }
        return $this->menuHtml;
    }
    protected function getTree(){
        $tree = [];
        foreach($this->data as $id=>&$node){
            if(!$node['parent_id'])
                 $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }
    protected function getMenuHtml($tree,$tab = ' '){
        $str = '';
        foreach($tree as $category){
            $str.= $this->catToTemplate($category,$tab);
        }
        return $str;
    }
    protected function catToTemplate($category,$tab){
        ob_start();//don`t echo in browser we are buffering
        include  __DIR__ . '/menu_tpl/'. $this->tpl;
        return ob_get_clean();
    }
}