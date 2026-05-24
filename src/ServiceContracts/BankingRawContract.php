<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Banking\BankingListAvailablePayoutSystemsResponse;
use Onlyfansapi\Banking\BankingListCountriesResponse;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
