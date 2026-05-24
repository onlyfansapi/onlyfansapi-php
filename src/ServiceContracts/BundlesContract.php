<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Bundles\BundleCreateParams\Discount;
use Onlyfansapi\Bundles\BundleCreateParams\Duration;
use Onlyfansapi\Bundles\BundleDeleteResponse;
use Onlyfansapi\Bundles\BundleListResponse;
use Onlyfansapi\Bundles\BundleNewResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface BundlesContract
{
    /**
     * @api
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
    ): BundleNewResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BundleListResponse;

    /**
     * @api
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
    ): BundleDeleteResponse;
}
