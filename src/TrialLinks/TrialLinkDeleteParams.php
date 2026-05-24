<?php

declare(strict_types=1);

namespace Onlyfansapi\TrialLinks;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Delete a free trial link by its ID.
 *
 * @see Onlyfansapi\Services\TrialLinksService::delete()
 *
 * @phpstan-type TrialLinkDeleteParamsShape = array{account: string}
 */
final class TrialLinkDeleteParams implements BaseModel
{
    /** @use SdkModel<TrialLinkDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new TrialLinkDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TrialLinkDeleteParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TrialLinkDeleteParams)->withAccount(...)
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
