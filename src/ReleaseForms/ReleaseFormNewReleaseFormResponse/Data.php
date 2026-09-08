<?php

declare(strict_types=1);

namespace OnlyFansAPI\ReleaseForms\ReleaseFormNewReleaseFormResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\ReleaseForms\ReleaseFormNewReleaseFormResponse\Data\User;

/**
 * @phpstan-import-type UserShape from \OnlyFansAPI\ReleaseForms\ReleaseFormNewReleaseFormResponse\Data\User
 *
 * @phpstan-type DataShape = array{
 *   id?: int|null,
 *   approvedAt?: string|null,
 *   code?: string|null,
 *   createdAt?: string|null,
 *   name?: string|null,
 *   signature?: string|null,
 *   signed?: list<mixed>|null,
 *   signersCount?: int|null,
 *   submissionURL?: string|null,
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

    #[Optional(nullable: true)]
    public ?string $approvedAt;

    #[Optional]
    public ?string $code;

    #[Optional]
    public ?string $createdAt;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $signature;

    /** @var list<mixed>|null $signed */
    #[Optional(list: 'mixed')]
    public ?array $signed;

    #[Optional]
    public ?int $signersCount;

    #[Optional('submissionUrl')]
    public ?string $submissionURL;

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
     * @param list<mixed>|null $signed
     * @param User|UserShape|null $user
     */
    public static function with(
        ?int $id = null,
        ?string $approvedAt = null,
        ?string $code = null,
        ?string $createdAt = null,
        ?string $name = null,
        ?string $signature = null,
        ?array $signed = null,
        ?int $signersCount = null,
        ?string $submissionURL = null,
        ?string $type = null,
        User|array|null $user = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $approvedAt && $self['approvedAt'] = $approvedAt;
        null !== $code && $self['code'] = $code;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $name && $self['name'] = $name;
        null !== $signature && $self['signature'] = $signature;
        null !== $signed && $self['signed'] = $signed;
        null !== $signersCount && $self['signersCount'] = $signersCount;
        null !== $submissionURL && $self['submissionURL'] = $submissionURL;
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

    public function withApprovedAt(?string $approvedAt): self
    {
        $self = clone $this;
        $self['approvedAt'] = $approvedAt;

        return $self;
    }

    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withSignature(string $signature): self
    {
        $self = clone $this;
        $self['signature'] = $signature;

        return $self;
    }

    /**
     * @param list<mixed> $signed
     */
    public function withSigned(array $signed): self
    {
        $self = clone $this;
        $self['signed'] = $signed;

        return $self;
    }

    public function withSignersCount(int $signersCount): self
    {
        $self = clone $this;
        $self['signersCount'] = $signersCount;

        return $self;
    }

    public function withSubmissionURL(string $submissionURL): self
    {
        $self = clone $this;
        $self['submissionURL'] = $submissionURL;

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
