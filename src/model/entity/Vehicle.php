<?php


namespace MyApp\model\entity;


use Optikos\controller\service\Validator;
use Optikos\model\map\EntityControlMap;
use Optikos\model\map\EntityControlMapInterface;
use Optikos\model\map\PropertyControl;
use Optikos\model\OptikosEntity;
use Optikos\view\components\InputControlType;

class Vehicle extends OptikosEntity {

    public $vinNumber;
    public $currentLocation;
    public $vector;
    public $speed;
    public $fleetId;
    public $ownCargoList;     // redbean one-to-many convention


    public function getPropertyFriendlyNameDisplayMap():array {
        return [
            'vinNumber' => 'VIN Number'
            ,'currentLocation' => 'Current Location'
            ,'vector' => 'Vector'
            ,'speed' => 'Speed'
        ];
    }

    public function update(): void {
        parent::onUpdateValidate();
    }


    public function validate(): array {


        $validator = new Validator();


        $validator->addErrorIf(
            $validator->containsIllegalStrings('/[^A-Za-z0-9.#\\-$]/',$this->bean->vinNumber) // condition
            ,"Vin Number cannot contain special characters"    // error message
            ,"vinNumber"                                      // related property
        );


        $validator->addErrorIf(
            !isset($this->bean->vinNumber)
            ,"Vin Number is required"
            ,"vinNumber"
        );


        $validator->addErrorIf(
            count(parent::enforceUnique(['vinNumber'=>$this->bean->tailNumber])) > 0
            ,"Vin number must be unique"
            ,"vinNumber"
        );


        return $validator->getValidationErrors();

    }


    public function getControlMap():EntityControlMapInterface{

        // return an EntityControlMapInterface with a Unique Property Map if you entity has unique fields
        $map = new EntityControlMap();
        return $map->withUniquePropertyMap(
            [
                'vinNumber'         => new PropertyControl('vinNumber',InputControlType::INPUT_TEXT,1)
                ,'currentLocation'  => new PropertyControl('currentLocation',InputControlType::INPUT_TEXT,2)
                ,'vector'           => new PropertyControl('vector',InputControlType::INPUT_TEXT,3)
                ,'speed'            => new PropertyControl('speed',InputControlType::INPUT_TEXT,4)
            ]
        );
    }




    public function getPropertyList():array {

        // the names of the properties that the optikos entity helper will create form fields for
        // names must match the names of the model's properties
        return array_keys(get_class_vars(self::class));

    }



    public function getUniqueIdentifyingNameLikeProperty(): string {

        // return the human readable 'name' of the entity
        return $this->bean->vinNumber;

    }


}
