<?
namespace app\models;
use yii\base\Model;

class SignupForm extends Model{

public $username;
public $password;

    public function rules() { // создаем правила для формы
        return [
            [['username', 'password'], 'required', 'message' => 'Заполните поле'], // поля должны быть обязательно заполнены
            ['username', 'unique', 'targetClass' => User::className(),  'message' => 'Этот логин уже занят'], // логин должен быть уникален
        ];
    }


public function attributeLabels() { // названия для полей
return [
'username' => 'Логин',
'password' => 'Пароль',
];
}





}
?>