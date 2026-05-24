<?php

declare(strict_types=1);

namespace Onlyfansapi\Stories\Highlights;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Delete a specific story highlight by its ID.
 *
 * @see Onlyfansapi\Services\Stories\HighlightsService::delete()
 *
 * @phpstan-type HighlightDeleteParamsShape = array{account: string}
 */
final class HighlightDeleteParams implements BaseModel
{
    /** @use SdkModel<HighlightDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new HighlightDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HighlightDeleteParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HighlightDeleteParams)->withAccount(...)
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
