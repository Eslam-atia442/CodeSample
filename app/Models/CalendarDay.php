<?php

namespace App\Models;

use App\Traits\ModelTrait;
use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class CalendarDay extends Model
{
    use ModelTrait, SearchTrait, HasTranslations;
    protected $fillable = ['day_date', 'clinic_id'];
    protected array $filters = ['keyword', 'month'];
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

    //--------------------- casting  -------------------------------------

    //--------------------- relations -------------------------------------
    public function clinic(): BelongsTo
    {
        return $this->belongsTo(Clinic::class);
    }

    //--------------------- functions -------------------------------------

    //--------------------- scopes -------------------------------------
    public function scopeOfMonth(Builder $query): Builder
    {
        return $query->whereMonth('day_date', request('month'))->whereYear('day_date', request('year'));
    }

}
