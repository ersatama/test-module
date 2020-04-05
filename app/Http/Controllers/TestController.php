<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\test;
use App\User;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    public function test() {

        $limit = 1000;
        $start = 0;
        $start = $limit * $start;

        $tests = test::all()->toArray();
        //echo '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225';
//        echo 'INSERT INTO `users` VALUES(NULL,`status`,`juridical`,`name`,`full_name`,`iin`,`work_phone`,`email`,`fact_address`,`jur_address`,`nds_number`,`bank_account`,`contract`,`code`,`manager`,`password`,`is_deleted`,`remember_token`,`created_at`,`updated_at`)';
        foreach ($tests as $test) {
            /*
            $table->rememberToken();
            $table->timestamps();
             */
            $name = str_replace("'","\'",$test['name']);
            //$full_name = htmlspecialchars($test['full_name']);
            //str_replace("'","\'",$test['full_name']);
            $work_phone = str_replace("'","\'",$test['work_phone']);
            $fact_address = str_replace("'","\'",$test['fact_address']);
            $jur_address = str_replace("'","\'",$test['jur_address']);
            $manager = str_replace("'","\'",$test['manager']);
            if ($test['password']) {
                User::create([
                    'juridical' => $test['juridical'],
                    'name' => trim($test['name']),
                    'full_name' => trim($test['full_name']),
                    'iin' => trim($test['id']),
                    'work_phone' => trim($test['work_phone']),
                    'email' => trim($test['email']),
                    'fact_address' => trim($test['fact_address']),
                    'jur_address' => trim($test['jur_address']),
                    'nds_number' => trim($test['nds_number']),
                    'bank_account' => trim($test['bank_account']),
                    'contract' => trim($test['contract']),
                    'code' => trim($test['code']),
                    'manager' => trim($test['manager']),
                    'password' => $test['password'],
                    'is_deleted' => $test['is_deleted']
                ]);
            } else {
                echo $start++.'--'.$test['name'].'--'.$test['id'].'<br><br>';
            }

            //str_replace("'","\'",$str)

//            echo 'VALUES(NULL,\'entity\','.$test['juridical'].',\''.$name.'\',\''.$full_name.'\',\''.$test['id'].'\',\''.$work_phone.'\',\''.$test['email'].'\',\''.$fact_address.'\',\''.$jur_address.'\',\''.$test['nds_number'].'\',\''.$test['bank_account'].'\',\''.$test['contract'].'\',\''.$test['code'].'\',\''.$manager.'\',\''.$test['password'].'\',\''.$test['is_deleted'].'\',NULL,now(),now()),';
        }
        /*echo '<pre>';
        foreach($tests as $test) {
            echo hash();
        }
        print_r($test);*/
    }
}
