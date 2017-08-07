<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\helpers\VarDumper;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    public static $id;
    public static $email;
    public static $password_hash;
    public static $phone_number;
    public static $firebase_user_id;
    public static $firebase_auth_token;
    public static $login_method;
    public static $user_full_name;
    public static $time_created;

    public static function tableName() { return 'users'; }


    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        $user = self::find()
            ->where([
                "id" => $id
            ])
            ->one();
            if (!count($user)) {
                return null;
            }
            return new static($user);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user = self::find()
            ->where(["firebase_auth_token" => $token])
            ->one();
        if (!count($user)) {
            return null;
        }
        return new static($user);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user = self::find()
            ->where([
                "user_full_name" => $username
            ])
            ->one();
        if (!count($user)) {
            return null;
        }
        return new static($user);
    }
    
    
      /**
     * Finds user by Firebas ID
     *
     * @param string $username
     * @return static|null
     */
    public static function findByFirebaseId($id)
    {
        $user = self::find()
            ->where([
                "firebase_user_id" => $id
            ])
            ->one();
        if (!count($user)) {
            return null;
        }
        return new static($user);
    }
    

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->firebase_auth_token;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->firebase_auth_token === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {         
        return $this->password_hash === $password;
    }
}
