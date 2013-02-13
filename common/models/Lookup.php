<?php

/**
 * This is the model class for table "lookup".
 *
 * The followings are the available columns in table 'lookup':
 * @property integer $id
 * @property string $name
 * @property integer $code
 * @property string $type
 * @property integer $position
 */
class Lookup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return lookup the static model class
	 */
    
     private static $_items=array();
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'lookup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, code, type, position', 'required'),
			array('position', 'numerical', 'integerOnly'=>true),
			array('name, type', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, code, type, position', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'code' => 'Code',
			'type' => 'Type',
			'position' => 'Position',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('code',$this->code);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('position',$this->position);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public static function items($type)
	{
		if(!isset(self::$_items[$type]))
			self::loadItems($type);
		return self::$_items[$type];
	}

	/**
	 * Returns the item name for the specified type and code.
	 * @param string the item type (e.g. 'PostStatus').
	 * @param integer the item code (corresponding to the 'code' column value)
	 * @return string the item name for the specified the code. False is returned if the item type or code does not exist.
	 */
	public static function item($type,$code)
	{
		if(!isset(self::$_items[$type]))
			self::loadItems($type);
		return isset(self::$_items[$type][$code]) ? self::$_items[$type][$code] : false;
	}

	/**
	 * Loads the lookup items for the specified type from the database.
	 * @param string the item type
	 */
	private static function loadItems($type)
	{
		self::$_items[$type]=array();
		$models=self::model()->findAll(array(
			'condition'=>'type=:type',
			'params'=>array(':type'=>$type),
			'order'=>'position',
		));
		foreach($models as $model)
			self::$_items[$type][$model->code]=$model->name;
	}
        
        public static function getCountryOption() {
            //Lookup::getCountryOption()
            //            echo $form->dropDownList($model, 'country', Lookup::getCountryOption(), array('empty' => 'please select'));

           return array(
            "Afghanistan" => "Afghanistan",
            "Albania" => "Albania",
            "Algeria" => "Algeria",
            "Algeria" => "Algeria",
            "Algeria" => "Algeria",
            "Antigua and Barbuda" => "Antigua and Barbuda",
            "Argentina" => "Argentina",
            "Armenia" => "Armenia",
            "Australia" => "Australia",
            "Austria" => "Austria",
            "Azerbaijan" => "Azerbaijan",
            "Bahamas" => "Bahamas",
            "Bahrain" => "Bahrain",
            "Bangladesh" => "Bangladesh",
            "Barbados" => "Barbados",
            "Belarus" => "Belarus",
            "Belgium" => "Belgium",
            "Belize" => "Belize",
            "Benin" => "Benin",
            "Bhutan" => "Bhutan",
            "Bolivia" => "Bolivia",
            "Bosnia and Herzegovina" => "Bosnia and Herzegovina",
            "Botswana" => "Botswana",
            "Brazil" => "Brazil",
            "Brunei" => "Brunei",
            "Bulgaria" => "Bulgaria",
            "Burkina Faso" => "Burkina Faso",
            "Burundi" => "Burundi",
            "Cambodia" => "Cambodia",
            "Cameroon" => "Cameroon",
            "Canada" => "Canada",
            "Cape Verde" => "Cape Verde",
            "Central African Republic" => "Central African Republic",
            "Chad" => "Chad",
            "Chile" => "Chile",
            "China" => "China",
            "Colombi" => "Colombi",
            "Comoros" => "Comoros",
            "Congo (Brazzaville)" => "Congo (Brazzaville)",
            "Congo" => "Congo",
            "Costa Rica" => "Costa Rica",
            "Cote d'Ivoire" => "Cote d'Ivoire",
            "Croatia" => "Croatia",
            "Cuba" => "Cuba",
            "Cyprus" => "Cyprus",
            "Czech Republic" => "Czech Republic",
            "Denmark" => "Denmark",
            "Djibouti" => "Djibouti",
            "Dominica" => "Dominica",
            "Dominican Republic" => "Dominican Republic",
            "East Timor (Timor Timur)" => "East Timor (Timor Timur)",
            "Ecuador" => "Ecuador",
            "Egypt" => "Egypt",
            "El Salvador" => "El Salvador",
            "Equatorial Guinea" => "Equatorial Guinea",
            "Eritrea" => "Eritrea",
            "Estonia" => "Estonia",
            "Ethiopia" => "Ethiopia",
            "Fiji" => "Fiji",
            "Finland" => "Finland",
            "France" => "France",
            "Gabon" => "Gabon",
            "Gambia, The" => "Gambia, The",
            "Georgia" => "Georgia",
            "Germany" => "Germany",
            "Ghana" => "Ghana",
            "Greece" => "Greece",
            "Grenada" => "Grenada",
            "Guatemala" => "Guatemala",
            "Guinea" => "Guinea",
            "Guinea-Bissau" => "Guinea-Bissau",
            "Guyana" => "Guyana",
            "Haiti" => "Haiti",
            "Honduras" => "Honduras",
            "Hungary" => "Hungary",
            "Iceland" => "Iceland",
            "India" => "India",
            "Indonesia" => "Indonesia",
            "Iran" => "Iran",
            "Iraq" => "Iraq",
            "Ireland" => "Ireland",
            "Israel" => "Israel",
            "Italy" => "Italy",
            "Jamaica" => "Jamaica",
            "Japan" => "Japan",
            "Jordan" => "Jordan",
            "Kazakhstan" => "Kazakhstan",
            "Kenya" => "Kenya",
            "Kiribati" => "Kiribati",
            "Korea, North" => "Korea, North",
            "Korea, South" => "Korea, South",
            "Kuwait" => "Kuwait",
            "Kyrgyzstan" => "Kyrgyzstan",
            "Laos" => "Laos",
            "Latvia" => "Latvia",
            "Lebanon" => "Lebanon",
            "Lesotho" => "Lesotho",
            "Liberia" => "Liberia",
            "Libya" => "Libya",
            "Liechtenstein" => "Liechtenstein",
            "Lithuania" => "Lithuania",
            "Luxembourg" => "Luxembourg",
            "Macedonia" => "Macedonia",
            "Madagascar" => "Madagascar",
            "Malawi" => "Malawi",
            "Malaysia" => "Malaysia",
            "Maldives" => "Maldives",
            "Mali" => "Mali",
            "Malta" => "Malta",
            "Marshall Islands" => "Marshall Islands",
            "Mauritania" => "Mauritania",
            "Mauritius" => "Mauritius",
            "Mexico" => "Mexico",
            "Micronesia" => "Micronesia",
            "Moldova" => "Moldova",
            "Monaco" => "Monaco",
            "Mongolia" => "Mongolia",
            "Morocco" => "Morocco",
            "Mozambique" => "Mozambique",
            "Myanmar" => "Myanmar",
            "Namibia" => "Namibia",
            "Nauru" => "Nauru",
            "Nepa" => "Nepa",
            "Netherlands" => "Netherlands",
            "New Zealand" => "New Zealand",
            "Nicaragua" => "Nicaragua",
            "Niger" => "Niger",
            "Nigeria" => "Nigeria",
            "Norway" => "Norway",
            "Oman" => "Oman",
            "Pakistan" => "Pakistan",
            "Palau" => "Palau",
            "Panama" => "Panama",
            "Papua New Guinea" => "Papua New Guinea",
            "Paraguay" => "Paraguay",
            "Peru" => "Peru",
            "Philippines" => "Philippines",
            "Poland" => "Poland",
            "Portugal" => "Portugal",
            "Qatar" => "Qatar",
            "Romania" => "Romania",
            "Russia" => "Russia",
            "Rwanda" => "Rwanda",
            "Saint Kitts and Nevis" => "Saint Kitts and Nevis",
            "Saint Lucia" => "Saint Lucia",
            "Saint Vincent" => "Saint Vincent",
            "Samoa" => "Samoa",
            "San Marino" => "San Marino",
            "Sao Tome and Principe" => "Sao Tome and Principe",
            "Saudi Arabia" => "Saudi Arabia",
            "Senegal" => "Senegal",
            "Serbia and Montenegro" => "Serbia and Montenegro",
            "Seychelles" => "Seychelles",
            "Sierra Leone" => "Sierra Leone",
            "Singapore" => "Singapore",
            "Slovakia" => "Slovakia",
            "Slovenia" => "Slovenia",
            "Solomon Islands" => "Solomon Islands",
            "Somalia" => "Somalia",
            "South Africa" => "South Africa",
            "Spain" => "Spain",
            "Sri Lanka" => "Sri Lanka",
            "Sudan" => "Sudan",
            "Suriname" => "Suriname",
            "Swaziland" => "Swaziland",
            "Sweden" => "Sweden",
            "Switzerland" => "Switzerland",
            "Syria" => "Syria",
            "Taiwan" => "Taiwan",
            "Tajikistan" => "Tajikistan",
            "Tanzania" => "Tanzania",
            "Thailand" => "Thailand",
            "Togo" => "Togo",
            "Tonga" => "Tonga",
            "Trinidad and Tobago" => "Trinidad and Tobago",
            "Tunisia" => "Tunisia",
            "Turkey" => "Turkey",
            "Turkmenistan" => "Turkmenistan",
            "Tuvalu" => "Tuvalu",
            "Uganda" => "Uganda",
            "Ukraine" => "Ukraine",
            "United Arab Emirates" => "United Arab Emirates",
            "United Kingdom" => "United Kingdom",
            "United States" => "United States",
            "Uruguay" => "Uruguay",
            "Uzbekistan" => "Uzbekistan",
            "Vanuatu" => "Vanuatu",
            "Vatican City" => "Vatican City",
            "Venezuela" => "Venezuela",
            "Vietnam" => "Vietnam",
            "Yemen" => "Yemen",
            "Zambia" => "Zambia",
            "Zimbabwe" => "Zimbabwe"
        );
    }
}