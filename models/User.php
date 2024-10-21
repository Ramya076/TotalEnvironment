<?php

namespace app\models;
use yii\web\IdentityInterface;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $email_id
 * @property string|null $password
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $display_name
 * @property int|null $gender 0->Transgender,  1->Male, 2->Female 
 * @property string|null $dob
 * @property string|null $country_code
 * @property int|null $mobile_no
 * @property int|null $signup_type 1->Web, 2->Facebook, 3->Google
 * @property string|null $signup_social_ref_id reference id  from  facebook or google
 * @property string|null $profile_img
 * @property string|null $created_at
 * @property int|null $created_by
 * @property int|null $status 0->In active, 1->Active
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $authKey;
    public $accessToken;
    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;
    public const STATUS_DELETED = -1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender', 'mobile_no', 'signup_type', 'created_by', 'status'], 'integer'],
            [['dob', 'created_at'], 'safe'],
            [['email_id', 'first_name', 'last_name', 'display_name', 'signup_social_ref_id'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 250],
            [['country_code'], 'string', 'max' => 10],
            [['profile_img'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email_id' => 'Email ID',
            'password' => 'Password',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'display_name' => 'Display Name',
            'gender' => 'Gender',
            'dob' => 'Dob',
            'country_code' => 'Country Code',
            'mobile_no' => 'Mobile No',
            'signup_type' => 'Signup Type',
            'signup_social_ref_id' => 'Signup Social Ref ID',
            'profile_img' => 'Profile Img',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'status' => 'Status',
        ];
    }
    public function getId()
    {
        return $this->id;
    }
    public static function findIdentity($id)
    {
        return self::findOne(['id'=>$id]);
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['access_token' => $token]);
    }
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
    public function getAuthKey()
    {
        return $this->authKey;
    }



    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::find()
            ->where(['email_id' => $username,'status'=> self::STATUS_ACTIVE])
            ->one();
    }
    
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === sha1($password);
    }
    public static function password_pattern()
    {
        $reply = array("min_length"=>8, "min_length_msg"=>"Password must contain minimum 8 characters", "max_length"=>50, "max_length_msg"=>"Password must contain maximum 50 characters", "policy"=>'/^.*(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/', "policy_msg"=>'Password must contain at least one lower and upper case character and a digit'); 
        
        return (object)$reply;
    }
    
    /*
     * Check whether the contact number already exists or not
     * return       boolean         true if not exists
     *                              add error and if exists
     */

    public function validateMobilenumber() {
        $phone_no = trim($this->mobile_no);
        $usermob = User::find()
                ->where(['mobile_no' => $phone_no])
                ->andWhere(['<>', 'id', $this->id])
                ->all();

        if (count($usermob) > 0) {
            $this->addError('mobile_no', 'Mobile number already exits');
            return false;
        }
        return TRUE;
    }

    /*
     * Check whether the email_id already exists or not
     * return       boolean         true if not exists
     *                              add error and if exists
     */

    public function validateEmail() {
        $email_id = trim($this->email_id);
        $user = User::find()
                ->where(['email_id' => $email_id])
                ->andWhere(['<>', 'id', $this->id])
                ->all();

        if (count($user) > 0) {
            $this->addError('email_id', 'Email ID already exits');
            return false;
        }
        return TRUE;
    }

    public function beforeSave($insert) {
        
        if($this->scenario == 'createUser'){
            $this->password = sha1($this->password); //encrypt password only for create
            return parent::beforeSave($insert);
        }else{
            return parent::beforeSave($insert);

        }
    }
}
