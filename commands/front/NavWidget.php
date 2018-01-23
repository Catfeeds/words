<?php
/**
 * 头部灰字组件
 * obelisk
 */
    namespace app\commands\front;
    use yii\base\Widget;
    use yii;
	class NavWidget extends Widget  {
        public $userData;
        public $userId;
        public $level;
        public $controller;
        /**
         * 定义函数
         * */
        public function init()
        {
            $this->controller = Yii::$app->controller->id;
            $this->userData = Yii::$app->session->get('userData');
            $this->userId = Yii::$app->session->get('userId');
            $this->level = Yii::$app->session->get('level');
        }

        /**
         * 运行覆盖程序
         * */
        public function run(){
            return $this->render('nav',['controller' => $this->controller,'level' => $this->level,'userData' => $this->userData,'userId' => $this->userId]);
        }
	}
?>