<?php

declare(strict_types=1);

namespace Onlyfansapi\TrialLinks;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Get individual Free Trial Link details and it's revenue data.
 *
 * @see Onlyfansapi\Services\TrialLinksService::retrieve()
 *
 * @phpstan-type TrialLinkRetrieveParamsShape = array{account: string}
 */
final class TrialLinkRetrieveParams implements BaseModel
{
    /** @use SdkModel<TrialLinkRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new TrialLinkRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TrialLinkRetrieveParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TrialLinkRetrieveParams)->withAccount(...)
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
