<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Me\MeGetModelStartDateResponse;
use OnlyFansAPI\Me\MeGetResponse;
use OnlyFansAPI\Me\MeGetTopPercentageResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\MeRawContract;

/**
 * Endpoints for your linked accounts.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class MeRawService implements MeRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get OnlyFans Profile details for the currently used Account
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MeGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/me', $account],
            options: $requestOptions,
            convert: MeGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the start date of the model (the date+time monetization was enabled)
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MeGetModelStartDateResponse>
     *
     * @throws APIException
     */
    public function getModelStartDate(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/me/model-start-date', $account],
            options: $requestOptions,
            convert: MeGetModelStartDateResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the top percentage of the model (e.g., top 0.02% of all creators)
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MeGetTopPercentageResponse>
     *
     * @throws APIException
     */
    public function getTopPercentage(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/me/top-percentage', $account],
            options: $requestOptions,
            convert: MeGetTopPercentageResponse::class,
        );
    }
}
