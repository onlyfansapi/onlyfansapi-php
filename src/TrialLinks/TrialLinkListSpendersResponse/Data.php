<?php

declare(strict_types=1);

namespace Onlyfansapi\TrialLinks\TrialLinkListSpendersResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\TrialLinks\TrialLinkListSpendersResponse\Data\Revenue;

/**
 * @phpstan-import-type RevenueShape from \Onlyfansapi\TrialLinks\TrialLinkListSpendersResponse\Data\Revenue
 *
 * @phpstan-type DataShape = array{
 *   onlyfansID?: string|null,
 *   revenue?: null|Revenue|RevenueShape,
 *   username?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional('onlyfans_id')]
    public ?string $onlyfansID;

    #[Optional]
    public ?Revenue $revenue;

    #[Optional]
    public ?string $username;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Revenue|RevenueShape|null $revenue
     */
    public static function with(
        ?string $onlyfansID = null,
        Revenue|array|null $revenue = null,
        ?string $username = null,
    ): self {
        $self = new self;

        null !== $onlyfansID && $self['onlyfansID'] = $onlyfansID;
        null !== $revenue && $self['revenue'] = $revenue;
        null !== $username && $self['username'] = $username;

        return $self;
    }

    public function withOnlyfansID(string $onlyfansID): self
    {
        $self = clone $this;
        $self['onlyfansID'] = $onlyfansID;

        return $self;
    }

    /**
     * @param Revenue|RevenueShape $revenue
     */
    public function withRevenue(Revenue|array $revenue): self
    {
        $self = clone $this;
        $self['revenue'] = $revenue;

        return $self;
    }

    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }
}
