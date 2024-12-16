<?php

namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Forms;
use App\Models\Center;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nid',
        'name',
        'email',
        'phone',
        'scheduled_date',
        'status',
        'center_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'center_id' => 'integer',
    ];

    public function center(): BelongsTo
    {
        return $this->belongsTo(Center::class);
    }

    public static function getForm(){
        return  [
            Forms\Components\TextInput::make('nid')
                ->label('NID')
                ->required()
                ->maxLength(14),

            Forms\Components\TextInput::make('name')
                ->label('Full Name')
                ->required()
                ->maxLength(100),

            Forms\Components\TextInput::make('email')
                ->label('Email Address')
                ->email()
                ->required()
                ->maxLength(100),

            Forms\Components\TextInput::make('phone')
                ->label('Phone Number')
                ->tel()
                ->required()
                ->maxLength(15),
            Forms\Components\Select::make('center_id')
                ->label('Vaccine Center')
                ->options(Center::all()->pluck('name', 'id'))
                ->required(),
        ];
    }
}
