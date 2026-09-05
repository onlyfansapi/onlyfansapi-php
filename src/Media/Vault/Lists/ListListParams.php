<?php

declare(strict_types=1);

namespace OnlyFansAPI\Media\Vault\Lists;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * List your Vault lists (categories).
 *
 * Every response carries an `ETag` computed over the `data` payload. Send it back as `If-None-Match` on your next
 * call and you will get a `304 Not Modified` with an empty body when nothing changed, so you can keep serving your
 * cached copy instead of re-parsing the full list. Credits are debited either way — we still have to ask OnlyFans
 * for the current state to know whether it changed.
 *
 * The `ETag` covers `data` only, never `_meta` — your credits balance changes on every call, so including it would
 * mean the `ETag` never matches. Because a `304` has no body, it also has no `_meta`: read the current credits and
 * rate-limit counters from the `X-OFAPI-Credits-Used`, `X-OFAPI-Credits-Balance`, `X-Rate-Limit-Limit-Minute` and
 * `X-Rate-Limit-Remaining-Minute` response headers, which are sent on `304` responses too. The `_meta` inside a
 * body you cached earlier is stale by definition.
 *
 * @see OnlyFansAPI\Services\Media\Vault\ListsService::list()
 *
 * @phpstan-type ListListParamsShape = array{
 *   lightweight?: bool|null,
 *   limit?: int|null,
 *   offset?: int|null,
 *   query?: string|null,
 * }
 */
final class ListListParams implements BaseModel
{
    /** @use SdkModel<ListListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Set to `true` to return only `id`, `name`, `type`, `canUpdate` and a rolled-up `mediaCount` per list, dropping the `medias` previews. Much smaller payload — ideal for rendering a folder picker. Default: `false`.
     */
    #[Optional]
    public ?bool $lightweight;

    /**
     * Number of media to return per page. Default: `24`.
     */
    #[Optional]
    public ?int $limit;

    /**
     * The offset used for pagination. Default `0`.
     */
    #[Optional]
    public ?int $offset;

    /**
     * Optionally, find a list by its name.
     */
    #[Optional]
    public ?string $query;

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
        ?bool $lightweight = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $query = null,
    ): self {
        $self = new self;

        null !== $lightweight && $self['lightweight'] = $lightweight;
        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $query && $self['query'] = $query;

        return $self;
    }

    /**
     * Set to `true` to return only `id`, `name`, `type`, `canUpdate` and a rolled-up `mediaCount` per list, dropping the `medias` previews. Much smaller payload — ideal for rendering a folder picker. Default: `false`.
     */
    public function withLightweight(bool $lightweight): self
    {
        $self = clone $this;
        $self['lightweight'] = $lightweight;

        return $self;
    }

    /**
     * Number of media to return per page. Default: `24`.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * The offset used for pagination. Default `0`.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Optionally, find a list by its name.
     */
    public function withQuery(string $query): self
    {
        $self = clone $this;
        $self['query'] = $query;

        return $self;
    }
}
