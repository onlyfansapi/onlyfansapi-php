<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\StoredRawContract;
use Onlyfansapi\Stored\StoredListSharedTrackingLinksParams;
use Onlyfansapi\Stored\StoredListSharedTrackingLinksParams\Filter;
use Onlyfansapi\Stored\StoredListSharedTrackingLinksResponse;
use Onlyfansapi\Stored\StoredListSharedTrialLinksParams;
use Onlyfansapi\Stored\StoredListSharedTrialLinksResponse;
use Onlyfansapi\Stored\StoredListTrackingLinksParams;
use Onlyfansapi\Stored\StoredListTrackingLinksResponse;
use Onlyfansapi\Stored\StoredListTrialLinksParams;
use Onlyfansapi\Stored\StoredListTrialLinksResponse;

/**
 * @phpstan-import-type FilterShape from \Onlyfansapi\Stored\StoredListSharedTrackingLinksParams\Filter
 * @phpstan-import-type FilterShape from \Onlyfansapi\Stored\StoredListSharedTrialLinksParams\Filter as FilterShape1
 * @phpstan-import-type FilterShape from \Onlyfansapi\Stored\StoredListTrackingLinksParams\Filter as FilterShape2
 * @phpstan-import-type FilterShape from \Onlyfansapi\Stored\StoredListTrialLinksParams\Filter as FilterShape3
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class StoredRawService implements StoredRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List all shared Tracking Links from the OnlyFansAPI Cache. This is a free endpoint that does not call the OnlyFans API.
     *
     * @param string $account The Account ID
     * @param array{
     *   filter?: Filter|FilterShape, limit?: int, offset?: int
     * }|StoredListSharedTrackingLinksParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<StoredListSharedTrackingLinksResponse>
     *
     * @throws APIException
     */
    public function listSharedTrackingLinks(
        string $account,
        array|StoredListSharedTrackingLinksParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StoredListSharedTrackingLinksParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/stored/shared-tracking-links', $account],
            query: $parsed,
            options: $options,
            convert: StoredListSharedTrackingLinksResponse::class,
        );
    }

    /**
     * @api
     *
     * List all shared Free Trial Links from the OnlyFansAPI Cache. This is a free endpoint that does not call the OnlyFans API.
     *
     * @param string $account The Account ID
     * @param array{
     *   filter?: StoredListSharedTrialLinksParams\Filter|FilterShape1,
     *   limit?: int,
     *   offset?: int,
     * }|StoredListSharedTrialLinksParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<StoredListSharedTrialLinksResponse>
     *
     * @throws APIException
     */
    public function listSharedTrialLinks(
        string $account,
        array|StoredListSharedTrialLinksParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StoredListSharedTrialLinksParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/stored/shared-trial-links', $account],
            query: $parsed,
            options: $options,
            convert: StoredListSharedTrialLinksResponse::class,
        );
    }

    /**
     * @api
     *
     * List all stored tracking links from the OnlyFansAPI Cache. This is a free endpoint that does not call the OnlyFans API.
     *
     * @param string $account The Account ID
     * @param array{
     *   filter?: StoredListTrackingLinksParams\Filter|FilterShape2,
     *   limit?: int,
     *   offset?: int,
     * }|StoredListTrackingLinksParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<StoredListTrackingLinksResponse>
     *
     * @throws APIException
     */
    public function listTrackingLinks(
        string $account,
        array|StoredListTrackingLinksParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StoredListTrackingLinksParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/stored/tracking-links', $account],
            query: $parsed,
            options: $options,
            convert: StoredListTrackingLinksResponse::class,
        );
    }

    /**
     * @api
     *
     * List all stored free trial links from the OnlyFansAPI Cache. This is a free endpoint that does not call the OnlyFans API.
     *
     * @param string $account The Account ID
     * @param array{
     *   filter?: StoredListTrialLinksParams\Filter|FilterShape3,
     *   limit?: int,
     *   offset?: int,
     * }|StoredListTrialLinksParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<StoredListTrialLinksResponse>
     *
     * @throws APIException
     */
    public function listTrialLinks(
        string $account,
        array|StoredListTrialLinksParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StoredListTrialLinksParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/stored/trial-links', $account],
            query: $parsed,
            options: $options,
            convert: StoredListTrialLinksResponse::class,
        );
    }
}
