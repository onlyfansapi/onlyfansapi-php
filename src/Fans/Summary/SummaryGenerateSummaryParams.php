<?php

declare(strict_types=1);

namespace Onlyfansapi\Fans\Summary;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Queue generation or regeneration of an AI profile summary for a fan. Costs 200 credits (charged on completion). Use the GET endpoint to poll for results. To regenerate an existing summary, pass `regenerate: true`.
 *
 * @see Onlyfansapi\Services\Fans\SummaryService::generateSummary()
 *
 * @phpstan-type SummaryGenerateSummaryParamsShape = array{
 *   account: string, regenerate?: bool|null
 * }
 */
final class SummaryGenerateSummaryParams implements BaseModel
{
    /** @use SdkModel<SummaryGenerateSummaryParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * Set to true to regenerate an existing completed summary.
     */
    #[Optional]
    public ?bool $regenerate;

    /**
     * `new SummaryGenerateSummaryParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SummaryGenerateSummaryParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SummaryGenerateSummaryParams)->withAccount(...)
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
    public static function with(string $account, ?bool $regenerate = null): self
    {
        $self = new self;

        $self['account'] = $account;

        null !== $regenerate && $self['regenerate'] = $regenerate;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * Set to true to regenerate an existing completed summary.
     */
    public function withRegenerate(bool $regenerate): self
    {
        $self = clone $this;
        $self['regenerate'] = $regenerate;

        return $self;
    }
}
