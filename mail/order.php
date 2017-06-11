<div class="table-responsive">
    <table style="width: 100%;border: 1px solid #ddd;border-collapse: collapse">
        <thead>
        <tr style="background: #f9f9f9">
            <th style="padding: 8px;border: 1px solid #ddd;">Наименование</th>
            <th style="padding: 8px;border: 1px solid #ddd;">Кол-во</th>
            <th style="padding: 8px;border: 1px solid #ddd;">Цена</th>
            <th style="padding: 8px;border: 1px solid #ddd;">Сумма</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($_SESSION['cart'] as $id => $item): ?>
            <tr>
                <td style="padding: 8px;border: 1px solid #ddd;"><a style="color: #696763" href="<?=\yii\helpers\Url::to(['product/view','id' => $id],true)?>"><?=$item['name']?></a></td><!--,true will send aur domain-->
                <td style="padding: 8px;border: 1px solid #ddd;"><?= $item['qty'] ?></td>
                <td style="padding: 8px;border: 1px solid #ddd;">$<?= $item['price'] ?></td>
                <td style="padding: 8px;border: 1px solid #ddd;">$<?= $item['qty'] * $item['price'] ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td style="padding: 8px;border: 1px solid #ddd;" colspan="3"><strong>Итого: </strong></td>
            <td style="padding: 8px;border: 1px solid #ddd;"><strong><?= $_SESSION['cart.qty'] ?></strong></td>
        </tr>
        <tr>
            <td style="padding: 8px;border: 1px solid #ddd;" colspan="3"><strong>На сумму: </strong></td>
            <td style="padding: 8px;border: 1px solid #ddd;"><strong><?= $_SESSION['cart.sum'] ?></strong></td>
        </tr>
        </tbody>
    </table>
</div>
