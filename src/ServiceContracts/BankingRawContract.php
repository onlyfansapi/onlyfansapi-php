<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Banking\BankingListAvailablePayoutSystemsResponse;
use OnlyFansAPI\Banking\BankingListCountriesResponse;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface BankingRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BankingListAvailablePayoutSystemsResponse>
     *
     * @throws APIException
     */
    public function listAvailablePayoutSystems(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BankingListCountriesResponse>
     *
     * @throws APIException
     */
    public function listCountries(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
