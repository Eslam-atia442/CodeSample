<?php

namespace App\Enums;
use App\Enums\Interfaces\EnumInterface;
use App\Traits\ConstantsTrait;

enum BooleanEnum : int implements EnumInterface
{
    use ConstantsTrait;


    case true = 1;
    case false = 0;

    public function label():string
    {
        return $this->getLabels()[$this->value];
    }

    public static function getLabels():array
    {
        return [
            self::true->value => __('True'),
            self::false->value => __('False'),
        ];
    }


}
