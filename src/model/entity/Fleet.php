<?php
namespace MyApp\model\entity;


use Optikos\model\map\EntityControlMap;
use Optikos\model\map\EntityControlMapInterface;
use Optikos\model\OptikosEntity;

class Fleet extends OptikosEntity {

    public $name;
    public $ownVehicleList;

    public function getPropertyFriendlyNameDisplayMap():array {
        return [ 'name' => 'Name' ];
    }

    public function getPropertyList(): array
    {
        return array_keys(get_class_vars(self::class));
    }

    public function getUniqueIdentifyingNameLikeProperty(): string
    {
        return $this->bean->name;
    }


    public function getControlMap():EntityControlMapInterface{

        // return a generic EntityControlMap and see if your field names are generic enough to map properly
        return new EntityControlMap();
    }
}