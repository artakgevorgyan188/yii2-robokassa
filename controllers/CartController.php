<?php

namespace app\controllers;

use app\models\Product;
use app\models\Cart;
use app\models\Order;
use app\models\OrderItems;
use Yii;
use yii\helpers\Html;

/*
Array
(
        [1] => Array
    (
        [qty] => QTY
        [name] => Name
        [price] => PRICE
        [img] => IMG
    )
        [10] => Array
    (
        [qty] => QTY
        [name] => Name
        [price] => PRICE
        [img] => IMG
    )
)
       [qty] =>QTY,
       [sum] =>SUM
*/

class CartController extends AppController
{
    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
        $qty = (int)Yii::$app->request->get('qty');//if not int will be 0
        $qty = !$qty ? 1 : $qty;//if 0 we write default 1 else qty with write`n by user
        $product = Product::findOne($id);
        if (empty($product)) return false;
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product, $qty);
        if (!Yii::$app->request->isAjax) {//if user closed javascript
            return $this->redirect(Yii::$app->request->referrer);//referrer - go to back(link)
        }
        $this->layout = false;
        return $this->render('cart-modal', [
            'session' => $session
        ]);
    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $this->layout = false;//we don`t need layout we need view cart-modal
        return $this->render('cart-modal', [
            'session' => $session
        ]);
    }

    public function actionDelItem()
    {
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        return $this->render('cart-modal', [
            'session' => $session
        ]);
    }

    public function actionDelItemBasket()
    {
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        echo $this->render('view', [
            'session' => $session
        ]);exit;
    }

    public function actionShow()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('cart-modal', [
            'session' => $session
        ]);
    }

    public function actionView()
    {
        $session = Yii::$app->session;
        $session->open();
        $order = new Order();
        if ($order->load(Yii::$app->request->post()) && $order->validate()) {
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];
            $order->name = Html::encode(strip_tags($order->name));
            $order->email = Html::encode(strip_tags($order->email));
            $order->phone = Html::encode(strip_tags($order->phone));
            $order->address = Html::encode(strip_tags($order->address));
            if ($order->save()) {
                $this->saveOrderItems($session['cart'], $order->id);//$order->id is the new creating id
                Yii::$app->session->setFlash('success', 'Ваш заказ принят. В ближайшее время наш Менеджер свяжется с Вами.');

                /*Yii::$app->mailer->compose()
                ->setFrom('from@domain.com')
                ->setTo('to@domain.com')
                ->setSubject('Тема сообщения')
                ->setTextBody('Текст сообщения')
                ->setHtmlBody('<b>текст сообщения в формате HTML</b>')
                ->send();*/
                //in compose we set view with we will send client and admin(as html),if body not very big we will write ->setHtmlBody('<b>текст сообщения в формате HTML</b>')and in compose(), if text ->setTextBody('Текст сообщения')
                Yii::$app->mailer->compose('order', ['session' => $session])
                    //it will be username in config->web.php->mailer->transport, else message may be ignore as spam or canceled or setFrom(Yii::$app->user->identity->email)
                    ->setFrom(['artakgevorgyan188@mail.ru'=>'yii2-robokassa.loca'])//"yiishopper.local" <artakgevorgyan188@mail.ru> with our domain or we can try this setFrom('artakgevorgyan188@mail.ru')
                    ->setTo($order->email)//if we send admin setTo(Yii::$app->params['adminEmail']) in config -> params
                    ->setSubject('Заказ сайта...')
                    ->send();
                Yii::$app->mailer->compose('order', ['session' => $session])
                    ->setFrom(['artakgevorgyan188@mail.ru'=>'yii2-robokassa.loca'])
                    ->setTo(Yii::$app->params['adminEmail'])
                    ->setSubject('Заказ сайта...')
                    ->send();
                $session->remove('cart');//good way delete session if not all true , it will make by activeRecord transaction
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка оформления заказа!');
            }
        }
        return $this->render('view', [
            'session' => $session,
            'order' => $order
        ]);
    }

    protected function saveOrderItems($items, $order_id)
    {//this function we are create for get id for just now created
        foreach ($items as $id => $item) {
            $order_items = new OrderItems();//we will create object for each string in db, ActiveRecord work`s in this way
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['qty'] * $item['price'];
            $order_items->save();
        }
    }
}