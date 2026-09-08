<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Banking\BankingListAvailablePayoutSystemsResponse;
use OnlyFansAPI\Banking\BankingListCountriesResponse;
use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\BankingRawContract;

/**
 * Operations related to user banking details, payout methods, legal and tax information, and account country settings.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class BankingRawService implements BankingRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns a list of available payout systems for the account, including details such as payout method codes, titles, descriptions, minimum payout amounts, processing times, and the currently selected payout method.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/banking/available-payout-systems', $account],
            options: $requestOptions,
            convert: BankingListAvailablePayoutSystemsResponse::class,
        );
    }

    /**
     * @api
     *
     * List countries, their internal OnlyFans IDs, and their payment & tax information.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/banking/countries', $account],
            options: $requestOptions,
            convert: BankingListCountriesResponse::class,
        );
    }
}
