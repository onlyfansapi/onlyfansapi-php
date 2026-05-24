<?php

declare(strict_types=1);

namespace Onlyfansapi\Promotions\PromotionNewResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: int|null,
 *   canClaim?: bool|null,
 *   claimsCount?: int|null,
 *   createdAt?: string|null,
 *   finishedAt?: string|null,
 *   hasRelatedPromo?: bool|null,
 *   isFinished?: bool|null,
 *   message?: string|null,
 *   price?: int|null,
 *   rawMessage?: string|null,
 *   subscribeCounts?: int|null,
 *   subscribeDays?: int|null,
 *   type?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?bool $canClaim;

    #[Optional]
    public ?int $claimsCount;

    #[Optional]
    public ?string $createdAt;

    #[Optional]
    public ?string $finishedAt;

    #[Optional]
    public ?bool $hasRelatedPromo;

    #[Optional]
    public ?bool $isFinished;

    #[Optional]
    public ?string $message;

    #[Optional]
    public ?int $price;

    #[Optional]
    public ?string $rawMessage;

    #[Optional]
    public ?int $subscribeCounts;

    #[Optional]
    public ?int $subscribeDays;

    #[Optional]
    public ?string $type;

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
        ?int $id = null,
        ?bool $canClaim = null,
        ?int $claimsCount = null,
        ?string $createdAt = null,
        ?string $finishedAt = null,
        ?bool $hasRelatedPromo = null,
        ?bool $isFinished = null,
        ?string $message = null,
        ?int $price = null,
        ?string $rawMessage = null,
        ?int $subscribeCounts = null,
        ?int $subscribeDays = null,
        ?string $type = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $canClaim && $self['canClaim'] = $canClaim;
        null !== $claimsCount && $self['claimsCount'] = $claimsCount;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $finishedAt && $self['finishedAt'] = $finishedAt;
        null !== $hasRelatedPromo && $self['hasRelatedPromo'] = $hasRelatedPromo;
        null !== $isFinished && $self['isFinished'] = $isFinished;
        null !== $message && $self['message'] = $message;
        null !== $price && $self['price'] = $price;
        null !== $rawMessage && $self['rawMessage'] = $rawMessage;
        null !== $subscribeCounts && $self['subscribeCounts'] = $subscribeCounts;
        null !== $subscribeDays && $self['subscribeDays'] = $subscribeDays;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCanClaim(bool $canClaim): self
    {
        $self = clone $this;
        $self['canClaim'] = $canClaim;

        return $self;
    }

    public function withClaimsCount(int $claimsCount): self
    {
        $self = clone $this;
        $self['claimsCount'] = $claimsCount;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withFinishedAt(string $finishedAt): self
    {
        $self = clone $this;
        $self['finishedAt'] = $finishedAt;

        return $self;
    }

    public function withHasRelatedPromo(bool $hasRelatedPromo): self
    {
        $self = clone $this;
        $self['hasRelatedPromo'] = $hasRelatedPromo;

        return $self;
    }

    public function withIsFinished(bool $isFinished): self
    {
        $self = clone $this;
        $self['isFinished'] = $isFinished;

        return $self;
    }

    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    public function withPrice(int $price): self
    {
        $self = clone $this;
        $self['price'] = $price;

        return $self;
    }

    public function withRawMessage(string $rawMessage): self
    {
        $self = clone $this;
        $self['rawMessage'] = $rawMessage;

        return $self;
    }

    public function withSubscribeCounts(int $subscribeCounts): self
    {
        $self = clone $this;
        $self['subscribeCounts'] = $subscribeCounts;

        return $self;
    }

    public function withSubscribeDays(int $subscribeDays): self
    {
        $self = clone $this;
        $self['subscribeDays'] = $subscribeDays;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
