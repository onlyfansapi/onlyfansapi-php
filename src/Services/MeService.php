<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Me\MeGetModelStartDateResponse;
use Onlyfansapi\Me\MeGetResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\MeContract;

/**
 * Endpoints for your linked accounts.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class MeService implements MeContract
{
    /**
     * @api
     */
    public MeRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MeRawService($client);
    }

    /**
     * @api
     *
     * Get OnlyFans Profile details for the currently used Account
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): MeGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($account, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the start date of the model (the date+time monetization was enabled)
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getModelStartDate(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): MeGetModelStartDateResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getModelStartDate($account, requestOptions: $requestOptions);

        return $response->parse();
    }
}
