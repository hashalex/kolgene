<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;

/**
 * SignUp is the model behind the contact form.
 */
class SignUp extends Model
{
    public $username;
    public $email;
    public $phone;
    public $sms_code;
    public $password;   
    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['username', 'email', 'password', 'phone', 'sms_code'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // phone number has to be a valid phone
            ['phone', 'validatePhone'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
            // password is validated by validatePasswordSignUp()
            ['password', 'validatePasswordSignUp'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    public function validatePhone($attribute, $params)
    {      
           echo '<div style="padding-top:150px;">';
        VarDumper::dump($attribute).'<br/>'; 
        VarDumper::dump($params).'<br/>';       
        echo '</div>';
        
        $this->addError($attribute, 'Incorrect username or password1212.');
        return false;
    }
    
    public function validatePasswordSignUp($attribute, $params)
    {                
        
    }
    
    
            
    /**
     * Add new user with email
     */
    public function signupUser()
    {      
         $user = new User();
         $user->user_full_name = $this->username;
         if(!empty($this->phone)) {
            $user->phone_number = $this->phone;
          }
         if(!empty($this->email)) {  
           $user->email = $this->email;
         }
         $user->password_hash = md5($this->password);
         $user->login_method = 'email';
         $user->save();
         return true;
    }
    
    
    
 
}
