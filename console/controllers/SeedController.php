<?php

namespace console\controllers;
use yii\console\Controller;
use common\models\User;
use common\models\Type;

class SeedController extends Controller
{
    public function actionIndex()
    {

        $admin = new User();
        $admin->email = "ado@ado.com";
        $admin->username = "Admin";
        $admin->status = 10;
        $admin->setPassword("123123123");
        $admin->generateAuthKey();

        
        $admin->first_name = "Admin";
        $admin->last_name = "Admin";
        $admin->address = "Bikodze";
        $admin->state = "Lukavac";
        $admin->id_card = "789789789";
        $admin->zip_code = "456456456";


        $admin->save();



    }
}