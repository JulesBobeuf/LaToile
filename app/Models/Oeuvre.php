<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Oeuvre
 *
 * @property int $id
 * @property string $nom
 * @property string $media_url
 * @property string $thumbnail_url
 * @property string $description
 * @property string $date_creation
 * @property int $coord_x
 * @property int $coord_y
 * @property int $salle_id
 * @property string $auteur
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Commentaire[] $commentaires
 * @property-read int|null $commentaires_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $likes
 * @property-read int|null $likes_count
 * @property-read \App\Models\Salle $salle
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Database\Factories\OeuvreFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Oeuvre newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Oeuvre newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Oeuvre query()
 * @method static \Illuminate\Database\Eloquent\Builder|Oeuvre whereAuteurId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Oeuvre whereCoordX($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Oeuvre whereCoordY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Oeuvre whereDateCreation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Oeuvre whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Oeuvre whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Oeuvre whereMediaUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Oeuvre whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Oeuvre whereSalleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Oeuvre whereThumbnailUrl($value)
 * @mixin \Eloquent
 */
class Oeuvre extends Model {
    use HasFactory;

    public $timestamps = false;

    public function tags() {
        return $this->belongsToMany(Tag::class, 'oeuvre_tag');
    }
    public function likes() {
        return $this->belongsToMany(User::class, 'likes');
    }

    public function commentaires() {
        return $this->hasMany(Commentaire::class);
    }

    public function salle() {
        return $this->belongsTo(Salle::class);
    }
}
