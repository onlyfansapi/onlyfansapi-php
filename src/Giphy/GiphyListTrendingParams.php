<?php

declare(strict_types=1);

namespace Onlyfansapi\Giphy;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Get trending GIFs from the OnlyFans Giphy proxy. Use the returned `id` as the `giphyId` body param when sending a chat or mass message.
 *
 * @see Onlyfansapi\Services\GiphyService::listTrending()
 *
 * @phpstan-type GiphyListTrendingParamsShape = array{
 *   limit?: int|null, offset?: int|null
 * }
 */
final class GiphyListTrendingParams implements BaseModel
{
    /** @use SdkModel<GiphyListTrendingParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Number of GIFs to return (default = 10, max = 50).
     */
    #[Optional]
    public ?int $limit;

    /**
     * Number of GIFs to skip for pagination (default = 0).
     */
    #[Optional]
    public ?int $offset;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $limit = null, ?int $offset = null): self
    {
        $self = new self;

        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;

        return $self;
    }

    /**
     * Number of GIFs to return (default = 10, max = 50).
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Number of GIFs to skip for pagination (default = 0).
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }
}
