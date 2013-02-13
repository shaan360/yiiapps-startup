<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property integer $user_type
 * @property string $first_name
 * @property string $last_name
 * @property string $user_name
 * @property string $email
 * @property string $paypal_email
 * @property string $password
 * @property string $image
 * @property string $gender
 * @property string $birth_date
 * @property string $address
 * @property string $city
 * @property string $country
 * @property string $state
 * @property string $zip
 * @property string $phone
 * @property string $mobile
 * @property string $facebook
 * @property string $twitter
 * @property string $website
 * @property string $github
 * @property string $yii_profile
 * @property string $bio
 * @property string $is_subscribed
 * @property string $is_blocked
 * @property string $is_confirmed
 * @property string $active_key
 * @property string $salt
 * @property string $last_login
 * @property integer $views
 * @property string $timestamp
 */
class Members extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Members the static model class
     */
    public $newPassword;
    private $_oldTags;
    public $new_password;


    /**
     * @var string attribute used to confirmation fields
     */
    public $passwordConfirm;
    const STATUS_ACTIVE = 1;
    public $terms=true;
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user';
    }

    public function behaviors() {
        Yii::import('common.extensions.behaviors.password.*');
        return array(
            // Password behavior strategy
            "APasswordBehavior" => array(
                "class" => "APasswordBehavior",
                "defaultStrategyName" => "bcrypt",
                "strategies" => array(
                    "bcrypt" => array(
                        "class" => "ABcryptPasswordStrategy",
                        "workFactor" => 14,
                        "minLength" => 8
                    ),
                    "legacy" => array(
                        "class" => "ALegacyMd5PasswordStrategy",
                        'minLength' => 8
                    )
                ),
            )
        );
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_name,password, email, terms', 'required'),
            //array('active_key',' required', 'on'=> 'register'),
            array('email', 'email', 'message' => 'Invalid email address!'),
            array('email', 'unique', 'message' => 'No way! You are already registered'),
            array('user_name', 'unique', 'message' => 'Sory mate! User name is already taken'),
            array('user_type, views', 'numerical', 'integerOnly' => true),
            array('first_name, last_name, user_name, email, paypal_email, password, image, gender, address, city, country, state, zip, phone, mobile, active_key, salt, last_login', 'length', 'max' => 256),
            array('paypal_email', 'email'),
            array('facebook, twitter, website, github', 'length', 'max' => 100),
            array('website', 'url'),
            array('passwordConfirm', 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('validation', "Passwords don't match"), 'on' => 'register'),
            array('email,active_key,password, salt', 'length', 'max' => 255),
            array('newPassword, password_strategy ', 'length', 'max' => 50, 'min' => 8, 'on' => 'register'),
            array('email, password, salt', 'length', 'max' => 255),
            array('requires_new_password, login_attempts', 'numerical', 'integerOnly' => true),
            array('yii_profile', 'length', 'max' => 200),
            array('is_subscribed, is_blocked, is_confirmed', 'length', 'max' => 1),
            array('birth_date, bio', 'safe'),
            array('skills', 'safe'),
            array('skills', 'match', 'pattern' => '/^[\w\s,]+$/', 'message' => 'Skills can only contain word characters.'),
            array('skills', 'normalizeTags'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, user_type, first_name, last_name, user_name, email, paypal_email, password, image, gender, birth_date, address, city, country, state, zip, phone, mobile, facebook, twitter, website, github, yii_profile, bio, is_subscribed, is_blocked, is_confirmed, active_key, salt, last_login, views, timestamp', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'domain' => array(self::HAS_MANY, 'Websites', 'domain_id'),
        );
    }

    public function getUrl() {
        return Yii::app()->createUrl('members/view', array(
                    'id' => $this->id,
                    'title' => $this->user_name,
                ));
    }

    /**
     * @return array a list of links that point to the post list filtered by every tag of this post
     */
    public function getTagLinks() {
        $links = array();
        foreach (Tag::string2array($this->skills) as $tag)
            $links[] = CHtml::link(CHtml::encode($tag), array('members/index', 'skills' => $skills));
        return $links;
    }

    /**
     * Normalizes the user-entered skills.
     */
    public function normalizeTags($attribute, $params) {
        $this->skills = Tag::array2string(array_unique(Tag::string2array($this->skills)));
    }

    protected function afterFind() {
        parent::afterFind();
        $this->_oldTags = $this->skills;
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
               // $this->timestamp = date("Y-m-d H:i:S");
                  $this->update_time = date("Y-m-d H:i:S");
                $this->image = 'no_yii_user.png';
            }
            else
                $this->update_time = date("Y-m-d H:i:S");

            return true;
        }
        else
            return false;
    }

    /**
     * This is invoked after the record is saved.
     */
    protected function afterSave() {
        parent::afterSave();
        Tag::model()->updateFrequency($this->_oldTags, $this->skills);
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'user_type' => 'User Type',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'user_name' => 'Username',
            'email' => 'Email',
            'terms' => 'I agree to the terms and conditions..',
            'paypal_email' => 'Paypal Email',
            'password' => 'Password',
            'passwordConfirm' => 'Confirm password',
            'image' => 'Image',
            'gender' => 'Gender',
            'birth_date' => 'Birth Date',
            'address' => 'Address',
            'city' => 'City',
            'country' => 'Country',
            'state' => 'State',
            'zip' => 'Zip',
            'phone' => 'Phone',
            'mobile' => 'Mobile',
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'website' => 'Website',
            'github' => 'Github',
            'yii_profile' => 'Yii Profile',
            'bio' => 'Bio',
            'skills' => 'Skills',
            'is_subscribed' => 'Is Subscribed',
            'is_blocked' => 'Is Blocked',
            'is_confirmed' => 'Is Confirmed',
            'active_key' => 'Active Key',
            'salt' => 'Salt',
            'last_login' => 'Last Login',
            'views' => 'Views',
            'timestamp' => 'Created on',
        );
    }

    public function beforeValidate() {
        if (!empty($this->user_name)) {
            $this->user_name = strtolower($this->user_name);
            $this->active_key = md5(mt_rand() . mt_rand() . mt_rand());
        }
        return parent::beforeValidate();
    }

    /**
     * Generates a new validation key (additional security for cookie)
     */
    public function regenerateValidationKey() {
        $this->saveAttributes(array(
            'active_key' => md5(mt_rand() . mt_rand() . mt_rand()),
        ));
        
    }

    public function changepassword($id, $password) {
        $model = self::model()->findByPk($id);
        $model->password = $password;
        if ($model->update('password'))
            return true;
        else
            return false;
    }

    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('user_type', $this->user_type);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('user_name', $this->user_name, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('paypal_email', $this->paypal_email, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('gender', $this->gender, true);
        $criteria->compare('birth_date', $this->birth_date, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('city', $this->city, true);
        $criteria->compare('country', $this->country, true);
        $criteria->compare('state', $this->state, true);
        $criteria->compare('zip', $this->zip, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('mobile', $this->mobile, true);
        $criteria->compare('facebook', $this->facebook, true);
        $criteria->compare('twitter', $this->twitter, true);
        $criteria->compare('website', $this->website, true);
        $criteria->compare('github', $this->github, true);
        $criteria->compare('yii_profile', $this->yii_profile, true);
        $criteria->compare('bio', $this->bio, true);
        $criteria->compare('skills', $this->skills, true);
        $criteria->compare('is_subscribed', $this->is_subscribed, true);
        $criteria->compare('is_blocked', $this->is_blocked, true);
        $criteria->compare('is_confirmed', $this->is_confirmed, true);
        $criteria->compare('active_key', $this->active_key, true);
        $criteria->compare('salt', $this->salt, true);
        $criteria->compare('last_login', $this->last_login, true);
        $criteria->compare('views', $this->views);
        $criteria->compare('timestamp', $this->timestamp, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                    'sort' => array(
                        'defaultOrder' => 'timestamp desc',
                    ),
                ));
    }
}