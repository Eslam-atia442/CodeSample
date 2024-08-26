<?php

namespace App\Models;

use App\Enums\GenderEnum;
use App\Enums\ReservationTypeEnum;
use App\Traits\ModelTrait;
use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Reservation extends Model
{
    use SoftDeletes, ModelTrait, SearchTrait, HasTranslations,HasFactory ;

    protected $guarded = ['id'];
    protected array $filters = ['keyword','user'];
    protected array $searchable = [];
    protected array $dates = [];
    public array $filterModels = [];
    public array $filterCustom = [];
    public array $translatable = [];
    public array $restrictedRelations = [];
    public array $cascadedRelations = [];
    public const ADDITIONAL_PERMISSIONS = [];
    public const PERMISSIONS_NOT_APPLIED = false;
    public const DISABLE_LOG = false;
    protected $appends = ['type_text', 'gender_text'];

    //--------------------- casting  -------------------------------------

    public function getTypeTextAttribute()
    {
        return match ($this->type) {
            ReservationTypeEnum::onsite->value => __('messages.responses.onsite'),
            ReservationTypeEnum::online->value => __('messages.responses.online'),
            default => null
        };
    }
    public function getGenderTextAttribute()
    {
        return match ($this->gender) {
            GenderEnum::male->value => __('messages.responses.male'),
            GenderEnum::female->value => __('messages.responses.female'),
            default => null
        };
    }

    //--------------------- relations -------------------------------------

    //--------------------- functions -------------------------------------

    //--------------------- scopes -------------------------------------

    public function scopeOfUser($query, $id)
    {
        return $query->wherein('user_id', (array)$id);
    }
}
