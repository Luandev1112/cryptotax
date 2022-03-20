<?php

namespace App\Models;

use App\Models\Traits\HasName;
use App\Services\CreditCodeService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spark\Billable;

/**
 * Class User
 *
 * @package App\Models
 *
 * @property int $user_account_type_id
 * @property int $datacenter_id
 * @property int $tax_year
 * @property string|null $fb_id
 * @property string|null $google_id
 *
 * @property \Illuminate\Support\Collection<CryptoExchangeAccount> $cryptoExchangeAccounts
 * @property \Illuminate\Support\Collection<BlockchainAccount> $blockchainAccounts
 * @property \Illuminate\Support\Collection<UserCreditLog> $creditLogs
 * @property \App\Models\UserAccountType $userAccountType
 * @property \App\Models\Datacenter $datacenter
 * @property \App\Models\Timezone $timezone
 * @property \App\Models\TaxCountry $taxCountry
 * @property \App\Models\TaxCurrency $taxCurrency
 * @property \App\Models\TaxCostModel $taxCostModel
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasName;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'trial_ends_at' => 'datetime',
    ];
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public static function boot()
    {
        parent::boot();

        static::creating(function (self $item) {
            if (! $item->user_account_type_id) {
                $item->user_account_type_id = UserAccountType::TYPE_CUSTOMER_FREE;
            }
        });

        static::created(function( self $item){
            if($item->userAccountType->is_customer) {
                $item->creditAction(CreditCodeService::ACTION_REGISTER);
            }
        });

        static::deleting(function (self $item) {
            $item->blockchainAccounts()->cascadeDelete();
            $item->cryptoExchangeAccounts()->cascadeDelete();
            $item->creditLogs()->cascadeDelete();
        });
    }


    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCustomersOnly(Builder $query): Builder
    {
        return $query->whereIn('user_account_type_id', UserAccountType::customerTypes());
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userAccountType(): BelongsTo
    {
        return $this->belongsTo(UserAccountType::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function creditLogs(): HasMany
    {
        return $this->hasMany(UserCreditLog::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function datacenter(): BelongsTo
    {
        return $this->belongsTo(Datacenter::class);
    }


    /**
     * @return HasMany
     */
    public function cryptoExchangeAccounts(): HasMany
    {
        return $this->hasMany(CryptoExchangeAccount::class);
    }


    /**
     * @return HasMany
     */
    public function blockchainAccounts(): HasMany
    {
        return $this->hasMany(BlockchainAccount::class);
    }


    /**
     * @return HasManyThrough
     */
    public function cryptoExchangeTransactions(): HasManyThrough
    {
        return $this->hasManyThrough(CryptoExchangeTransaction::class, CryptoExchangeAccount::class);
    }


    /**
     * @return HasManyThrough
     */
    public function blockchainTransactions(): HasManyThrough
    {
        return $this->hasManyThrough(BlockchainTransaction::class, BlockchainAccount::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function taxCostModel(): BelongsTo
    {
        return $this->belongsTo(TaxCostModel::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function taxCurrency(): BelongsTo
    {
        return $this->belongsTo(TaxCurrency::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function taxCountry(): BelongsTo
    {
        return $this->belongsTo(TaxCountry::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function timezone(): BelongsTo
    {
        return $this->belongsTo(Timezone::class);
    }


    /**
     * @return bool
     */
    public function isAdminPanelAccount(): bool
    {
        return in_array($this->user_account_type_id, UserAccountType::adminPanelTypes());
    }


    /**
     * @return bool
     */
    public function isCustomerPanelAccount(): bool
    {
        return in_array($this->user_account_type_id, UserAccountType::customerPanelTypes());
    }


    /**
     * @return bool
     */
    public function isAdminAccount(): bool
    {
        return $this->user_account_type_id === UserAccountType::TYPE_ADMIN;
    }


    /**
     * @return bool
     */
    public function isCustomerAccount(): bool
    {
        return $this->userAccountType->is_customer;
    }


    /**
     * @return bool
     */
    public function isSupportAccount(): bool
    {
        return $this->user_account_type_id === UserAccountType::TYPE_SUPPORT;
    }


    /**
     * @return bool
     */
    public function isEditorAccount(): bool
    {
        return $this->user_account_type_id === UserAccountType::TYPE_EDITOR;
    }


    /**
     * @return bool
     */
    public function isTaxAdvisorAccount(): bool
    {
        return $this->user_account_type_id === UserAccountType::TYPE_TAX_ADVISOR;
    }


    /**
     * @return bool
     */
    public function isAffiliateAccount(): bool
    {
        return $this->user_account_type_id === UserAccountType::TYPE_AFFILIATE;
    }


    /**
     * Checks if the user has filled out all necessary data
     *
     * @return bool
     */
    public function setupFinished(): bool
    {
        return $this->timezone_id && $this->tax_cost_model_id && $this->tax_currency_id && $this->tax_country_id;
    }


    public function getName(): ?string
    {
        return $this->name . " (ID=" . $this->id . ")";
    }


    /**
     * @param string|\App\Models\UserCreditAction $actionOrActionCode
     * @param float|null $value
     * @return $this
     */
    public function creditAction(string|UserCreditAction $actionOrActionCode, ?float $value = null): self
    {
        // Get action and value
        if(is_string($actionOrActionCode)) {
            $action = UserCreditAction::findAction($actionOrActionCode);
        }
        else {
            $action = $actionOrActionCode;
        }
        $value = !is_null($value) ? $value : $action->value;

        // Log it and add it to user table
        UserCreditLog::log($this->id, $value, $action->action_code, $action->id);
        $this->credits += $value;
        $this->save();

        return $this;
    }
}
