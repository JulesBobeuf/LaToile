<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Salle
 *
 * @property int $id
 * @property string $nom
 * @property string $theme
 * @property string $description
 * @property string $plan_url
 * @property int $exposition_id
 * @property-read \App\Models\Exposition $exposition
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Oeuvre[] $oeuvres
 * @property-read int|null $oeuvres_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Salle[] $suivantes
 * @property-read int|null $suivantes_count
 * @method static \Database\Factories\SalleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Salle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Salle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Salle query()
 * @method static \Illuminate\Database\Eloquent\Builder|Salle whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salle whereExpositionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salle whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salle wherePlanUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Salle whereTheme($value)
 * @mixin \Eloquent
 */
class Salle extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom' => 'required',
        'theme' => 'required',
        'description' => 'required',
        'plan_url' => 'required',
        'entree' => 'required',
        'editable' => 'required',
    ];

    public $timestamps = false;

    public function suivantes() {
        return $this->belongsToMany(Salle::class, 'parcours', 'salle_courante_id', 'salle_suivante_id');
    }

    public function oeuvres() {
        return $this->hasMany(Oeuvre::class);
    }

    public function premiere() {
        return $this->entree;
    }
}
