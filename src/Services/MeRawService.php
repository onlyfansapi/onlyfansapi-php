<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Me\MeGetModelStartDateResponse;
use Onlyfansapi\Me\MeGetResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\MeRawContract;

/**
 * Endpoints for your linked accounts.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
}
