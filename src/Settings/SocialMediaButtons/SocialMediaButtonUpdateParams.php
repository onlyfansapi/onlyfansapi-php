<?php

declare(strict_types=1);

namespace Onlyfansapi\Settings\SocialMediaButtons;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Updates a social media button from the account.
 *
 * @see Onlyfansapi\Services\Settings\SocialMediaButtonsService::update()
 *
 * @phpstan-type SocialMediaButtonUpdateParamsShape = array{
 *   account: string, label: string
 * }
 */
final class SocialMediaButtonUpdateParams implements BaseModel
{
    /** @use SdkModel<SocialMediaButtonUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * The new label for the button.
     */
    #[Required]
    public string $label;

    /**
     * `new SocialMediaButtonUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SocialMediaButtonUpdateParams::with(account: ..., label: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SocialMediaButtonUpdateParams)->withAccount(...)->withLabel(...)
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
    public static function with(string $account, string $label): self
    {
        $self = new self;

        $self['account'] = $account;
        $self['label'] = $label;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * The new label for the button.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }
}
