<?php

declare(strict_types=1);

namespace Onlyfansapi\Giphy;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Search GIFs from the OnlyFans Giphy proxy. Use the returned `id` as the `giphyId` body param when sending a chat or mass message.
 *
 * @see Onlyfansapi\Services\GiphyService::search()
 *
 * @phpstan-type GiphySearchParamsShape = array{
 *   q: string, limit?: int|null, offset?: int|null
 * }
 */
final class GiphySearchParams implements BaseModel
{
    /** @use SdkModel<GiphySearchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The search query.
     */
    #[Required]
    public string $q;

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

    /**
     * `new GiphySearchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GiphySearchParams::with(q: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GiphySearchParams)->withQ(...)
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
    public static function with(
        string $q,
        ?int $limit = null,
        ?int $offset = null
    ): self {
        $self = new self;

        $self['q'] = $q;

        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;

        return $self;
    }

    /**
     * The search query.
     */
    public function withQ(string $q): self
    {
        $self = clone $this;
        $self['q'] = $q;

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
