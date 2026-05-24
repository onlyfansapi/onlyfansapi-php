<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Bundles\BundleCreateParams;
use Onlyfansapi\Bundles\BundleCreateParams\Discount;
use Onlyfansapi\Bundles\BundleCreateParams\Duration;
use Onlyfansapi\Bundles\BundleDeleteParams;
use Onlyfansapi\Bundles\BundleDeleteResponse;
use Onlyfansapi\Bundles\BundleListResponse;
use Onlyfansapi\Bundles\BundleNewResponse;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\BundlesRawContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class BundlesRawService implements BundlesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new bundle for the account.
     *
     * @param string $account The Account ID
     * @param array{
     *   discount: Discount|value-of<Discount>, duration: Duration|value-of<Duration>
     * }|BundleCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BundleNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $account,
        array|BundleCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BundleCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/bundles', $account],
            query: $parsed,
            options: $options,
            convert: BundleNewResponse::class,
        );
    }

    /**
     * @api
     *
     * List all bundles for the account.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BundleListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/bundles', $account],
            options: $requestOptions,
            convert: BundleListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a bundle for the account.
     *
     * @param string $bundleID the ID of the bundle to delete
     * @param array{account: string}|BundleDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BundleDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $bundleID,
        array|BundleDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BundleDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/%1$s/bundles/%2$s', $account, $bundleID],
            options: $options,
            convert: BundleDeleteResponse::class,
        );
    }
}
