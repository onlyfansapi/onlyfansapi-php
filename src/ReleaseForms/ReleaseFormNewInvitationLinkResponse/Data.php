<?php

declare(strict_types=1);

namespace Onlyfansapi\ReleaseForms\ReleaseFormNewInvitationLinkResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\ReleaseForms\ReleaseFormNewInvitationLinkResponse\Data\User;

/**
 * @phpstan-import-type UserShape from \Onlyfansapi\ReleaseForms\ReleaseFormNewInvitationLinkResponse\Data\User
 *
 * @phpstan-type DataShape = array{
 *   id?: int|null,
 *   token?: string|null,
 *   date?: string|null,
 *   invitationURL?: string|null,
 *   name?: string|null,
 *   type?: string|null,
 *   user?: null|User|UserShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?string $token;

    #[Optional]
    public ?string $date;

    #[Optional('invitationUrl')]
    public ?string $invitationURL;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $type;

    #[Optional]
    public ?User $user;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param User|UserShape|null $user
     */
    public static function with(
        ?int $id = null,
        ?string $token = null,
        ?string $date = null,
        ?string $invitationURL = null,
        ?string $name = null,
        ?string $type = null,
        User|array|null $user = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $token && $self['token'] = $token;
        null !== $date && $self['date'] = $date;
        null !== $invitationURL && $self['invitationURL'] = $invitationURL;
        null !== $name && $self['name'] = $name;
        null !== $type && $self['type'] = $type;
        null !== $user && $self['user'] = $user;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withToken(string $token): self
    {
        $self = clone $this;
        $self['token'] = $token;

        return $self;
    }

    public function withDate(string $date): self
    {
        $self = clone $this;
        $self['date'] = $date;

        return $self;
    }

    public function withInvitationURL(string $invitationURL): self
    {
        $self = clone $this;
        $self['invitationURL'] = $invitationURL;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param User|UserShape $user
     */
    public function withUser(User|array $user): self
    {
        $self = clone $this;
        $self['user'] = $user;

        return $self;
    }
}
