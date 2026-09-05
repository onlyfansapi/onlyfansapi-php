<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Bundles\BundleCreateParams\Discount;
use OnlyFansAPI\Bundles\BundleCreateParams\Duration;
use OnlyFansAPI\Bundles\BundleDeleteResponse;
use OnlyFansAPI\Bundles\BundleListResponse;
use OnlyFansAPI\Bundles\BundleNewResponse;
use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\BundlesContract;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class BundlesService implements BundlesContract
{
    /**
     * @api
     */
    public BundlesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BundlesRawService($client);
    }

    /**
     * @api
     *
     * Create a new bundle for the account.
     *
     * @param string $account The Account ID
     * @param Discount|value-of<Discount> $discount the bundle's discount percentage
     * @param Duration|value-of<Duration> $duration the bundle's duration in months
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $account,
        Discount|int $discount,
        Duration|int $duration,
        RequestOptions|array|null $requestOptions = null,
    ): BundleNewResponse {
        $params = Util::removeNulls(
            ['discount' => $discount, 'duration' => $duration]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all bundles for the account.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BundleListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($account, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a bundle for the account.
     *
     * @param string $bundleID the ID of the bundle to delete
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $bundleID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): BundleDeleteResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($bundleID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
