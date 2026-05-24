<?php

declare(strict_types=1);

namespace Onlyfansapi\Settings\SocialMediaButtons;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Deletes a social media button from the account.
 *
 * @see Onlyfansapi\Services\Settings\SocialMediaButtonsService::delete()
 *
 * @phpstan-type SocialMediaButtonDeleteParamsShape = array{account: string}
 */
final class SocialMediaButtonDeleteParams implements BaseModel
{
    /** @use SdkModel<SocialMediaButtonDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new SocialMediaButtonDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SocialMediaButtonDeleteParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SocialMediaButtonDeleteParams)->withAccount(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $account): self
    {
        $self = new self;

        $self['account'] = $account;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }
}
