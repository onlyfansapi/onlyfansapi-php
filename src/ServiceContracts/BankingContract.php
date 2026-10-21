<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Banking\BankingListAvailablePayoutSystemsResponse;
use OnlyFansAPI\Banking\BankingListCountriesResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface BankingContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listAvailablePayoutSystems(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BankingListAvailablePayoutSystemsResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listCountries(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BankingListCountriesResponse;
}
