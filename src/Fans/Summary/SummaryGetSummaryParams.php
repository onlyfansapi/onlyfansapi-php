<?php

declare(strict_types=1);

namespace Onlyfansapi\Fans\Summary;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Retrieve the AI profile summary for a fan. Poll this endpoint after triggering a generation to check for completion.
 *
 * @see Onlyfansapi\Services\Fans\SummaryService::getSummary()
 *
 * @phpstan-type SummaryGetSummaryParamsShape = array{account: string}
 */
final class SummaryGetSummaryParams implements BaseModel
{
    /** @use SdkModel<SummaryGetSummaryParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new SummaryGetSummaryParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SummaryGetSummaryParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SummaryGetSummaryParams)->withAccount(...)
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
