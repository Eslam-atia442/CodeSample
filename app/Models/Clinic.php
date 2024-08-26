<?php

namespace App\Models;

use App\Traits\ModelTrait;
use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Clinic extends Model
{
    use ModelTrait, SearchTrait, HasTranslations, HasFactory;

//    protected $fillable = ['name', 'number_of_doctors', 'duration', 'shift_type', 'location', 'start_time', 'end_time'];
    protected $guarded = ['id'];
    protected array $filters = ['keyword'];
    protected array $searchable = ['name',  'location' ];
    protected array $dates = [];
    public array $filterModels = [];
    public array $filterCustom = [];
    public array $translatable = [];
    public array $restrictedRelations = [];
    public array $cascadedRelations = [];
    public const ADDITIONAL_PERMISSIONS = [];
    public const PERMISSIONS_NOT_APPLIED = false;
    public const DISABLE_LOG = false;

    //--------------------- casting  -------------------------------------

    //--------------------- relations -------------------------------------

    //--------------------- functions -------------------------------------

    //--------------------- scopes -------------------------------------

}
