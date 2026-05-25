<?php

declare(strict_types=1);

namespace OnlyFansAPI\Chats;

use OnlyFansAPI\Chats\ChatListMediaParams\Type;
use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * List media files shared in a specific chat.
 *
 * @see OnlyFansAPI\Services\ChatsService::listMedia()
 *
 * @phpstan-type ChatListMediaParamsShape = array{
 *   account: string,
 *   limit?: string|null,
 *   offset?: string|null,
 *   skipUsers?: string|null,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class ChatListMediaParams implements BaseModel
{
    /** @use SdkModel<ChatListMediaParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * Number of medias to return. Default = 20.
     */
    #[Optional]
    public ?string $limit;

    /**
     * Number of medias to skip for pagination.
     */
    #[Optional]
    public ?string $offset;

    /**
     * Whether to skip user details in response (all or none). Default = all.
     */
    #[Optional]
    public ?string $skipUsers;

    /**
     * Filter by specific media types. Keep empty to return all.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class, nullable: true)]
    public ?string $type;

    /**
     * `new ChatListMediaParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChatListMediaParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChatListMediaParams)->withAccount(...)
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
     *
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        string $account,
        ?string $limit = null,
        ?string $offset = null,
        ?string $skipUsers = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        $self['account'] = $account;

        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $skipUsers && $self['skipUsers'] = $skipUsers;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * Number of medias to return. Default = 20.
     */
    public function withLimit(string $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Number of medias to skip for pagination.
     */
    public function withOffset(string $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Whether to skip user details in response (all or none). Default = all.
     */
    public function withSkipUsers(string $skipUsers): self
    {
        $self = clone $this;
        $self['skipUsers'] = $skipUsers;

        return $self;
    }

    /**
     * Filter by specific media types. Keep empty to return all.
     *
     * @param Type|value-of<Type>|null $type
     */
    public function withType(Type|string|null $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
