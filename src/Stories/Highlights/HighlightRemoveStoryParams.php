<?php

declare(strict_types=1);

namespace Onlyfansapi\Stories\Highlights;

use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Remove a specific story from a story highlight.
 *
 * @see Onlyfansapi\Services\Stories\HighlightsService::removeStory()
 *
 * @phpstan-type HighlightRemoveStoryParamsShape = array{
 *   account: string, highlightID: int
 * }
 */
final class HighlightRemoveStoryParams implements BaseModel
{
    /** @use SdkModel<HighlightRemoveStoryParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    #[Required]
    public int $highlightID;

    /**
     * `new HighlightRemoveStoryParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HighlightRemoveStoryParams::with(account: ..., highlightID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HighlightRemoveStoryParams)->withAccount(...)->withHighlightID(...)
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
    public static function with(string $account, int $highlightID): self
    {
        $self = new self;

        $self['account'] = $account;
        $self['highlightID'] = $highlightID;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    public function withHighlightID(int $highlightID): self
    {
        $self = clone $this;
        $self['highlightID'] = $highlightID;

        return $self;
    }
}
