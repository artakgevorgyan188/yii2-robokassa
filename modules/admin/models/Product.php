<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "sh_product".
 *
 * @property string $id
 * @property string $category_id
 * @property string $name
 * @property string $content
 * @property double $price
 * @property string $keywords
 * @property string $description
 * @property string $img
 * @property string $cart_img
 * @property string $medium_img
 * @property string $recommend_img
 * @property string $hit
 * @property string $new
 * @property string $sale
 * @property string $stock
 * @property string $rating
 * @property string $recommend
 *
 * @property OrderItems[] $orderItems
 * @property Category $category
 */
class Product extends \yii\db\ActiveRecord
{
    public $imageFile;//one image
    public $imageFiles;//gallery

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sh_product';
    }

    public function upload()
    {
        if ($this->validate()) {
            $path = 'upload/store/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs($path);
            $this->attachImage($path,true);//true because one image and it will be main and attach this
            @unlink($path);//@ if has errors we can`t see it
            return true;
        } else {
            return false;
        }
    }
    public function uploadGalery()
    {
        if ($this->validate()) {
            foreach($this->imageFiles as $file){
                $path = 'upload/store/' . $file->baseName . '.' . $file->extension;
                $file->saveAs($path);
                $this->attachImage($path);
                @unlink($path);
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id','price','hit', 'new', 'sale', 'stock', 'recommend'], 'required'],
            [['category_id'], 'integer'],
            [['content', 'hit', 'new', 'sale', 'stock', 'recommend'], 'string'],
            [['price'], 'number'],
            [['name', 'keywords', 'description', 'img', 'cart_img', 'medium_img', 'recommend_img', 'rating'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['category_id','name','content','price', 'keywords', 'description', 'img', 'cart_img', 'medium_img', 'recommend_img', 'hit', 'new', 'sale', 'stock', 'rating', 'recommend'], 'trim'],
            [['imageFile'], 'file', 'extensions' => 'png, jpg'],// 'skipOnEmpty' => false
            [['imageFiles'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '№ товара',
            'category_id' => 'Категория',
            'name' => 'Наименование',
            'content' => 'Контент',
            'price' => 'Цена',
            'keywords' => 'Ключевое слово',
            'description' => 'Мета-описание',
            //'img' => 'Фото',
            'imageFile' => 'Фото',//our field in db img
            'imageFiles' => 'Галерея',
            'cart_img' => 'Фото корзинки',
            'medium_img' => 'Фото средного размера',
            'recommend_img' => 'Фото рекомендуемые',
            'hit' => 'Хит',
            'new' => 'Новинка',
            'sale' => 'Распродажа',
            'stock' => 'Акция',
            'rating' => 'Фото для рейтинга',
            'recommend' => 'Рекомендуемые',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
