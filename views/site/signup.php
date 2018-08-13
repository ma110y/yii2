<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<?php $form = ActiveForm::begin(); //создаем форму ?>
<?= $form->field($model, 'username'); // форма для ввода логина ?>
<?= $form->field($model, 'password')->passwordInput(); // форма для ввода пароля  ?>
    <div class="form-group">
        <div>
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']); // кнопка отправки ?>
        </div>
    </div>
<?php ActiveForm::end(); //акрываем созданную форму   ?>