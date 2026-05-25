<?php

declare(strict_types=1);

namespace OnlyFansAPI\Messages;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Attach Tags (Release Forms) to a message that has already been sent. Please note, that this is a "sync" operation - for example, if you provide empty `rfTag` it will remove all existing tags already attached to the message.
 *
 * @see OnlyFansAPI\Services\MessagesService::attachTags()
 *
 * @phpstan-type MessageAttachTagsParamsShape = array{
 *   account: string,
 *   rfGuest?: string|null,
 *   rfPartner?: string|null,
 *   rfTag?: string|null,
 * }
 */
final class MessageAttachTagsParams implements BaseModel
{
    /** @use SdkModel<MessageAttachTagsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * Array of OnlyFans Release Form Guest IDs to tag in your message.
     */
    #[Optional]
    public ?string $rfGuest;

    /**
     * Array of OnlyFans Release Form Partners IDs to tag in your message.
     */
    #[Optional]
    public ?string $rfPartner;

    /**
     * Array of OnlyFans Creator User IDs to tag in your message.
     */
    #[Optional]
    public ?string $rfTag;

    /**
     * `new MessageAttachTagsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageAttachTagsParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageAttachTagsParams)->withAccount(...)
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
        string $account,
        ?string $rfGuest = null,
        ?string $rfPartner = null,
        ?string $rfTag = null,
    ): self {
        $self = new self;

        $self['account'] = $account;

        null !== $rfGuest && $self['rfGuest'] = $rfGuest;
        null !== $rfPartner && $self['rfPartner'] = $rfPartner;
        null !== $rfTag && $self['rfTag'] = $rfTag;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }

    /**
     * Array of OnlyFans Release Form Guest IDs to tag in your message.
     */
    public function withRfGuest(string $rfGuest): self
    {
        $self = clone $this;
        $self['rfGuest'] = $rfGuest;

        return $self;
    }

    /**
     * Array of OnlyFans Release Form Partners IDs to tag in your message.
     */
    public function withRfPartner(string $rfPartner): self
    {
        $self = clone $this;
        $self['rfPartner'] = $rfPartner;

        return $self;
    }

    /**
     * Array of OnlyFans Creator User IDs to tag in your message.
     */
    public function withRfTag(string $rfTag): self
    {
        $self = clone $this;
        $self['rfTag'] = $rfTag;

        return $self;
    }
}
