<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\StoredRawContract;
use OnlyFansAPI\Stored\StoredListSharedTrackingLinksParams;
use OnlyFansAPI\Stored\StoredListSharedTrackingLinksParams\Filter;
use OnlyFansAPI\Stored\StoredListSharedTrackingLinksResponse;
use OnlyFansAPI\Stored\StoredListSharedTrialLinksParams;
use OnlyFansAPI\Stored\StoredListSharedTrialLinksResponse;
use OnlyFansAPI\Stored\StoredListTrackingLinksParams;
use OnlyFansAPI\Stored\StoredListTrackingLinksResponse;
use OnlyFansAPI\Stored\StoredListTrialLinksParams;
use OnlyFansAPI\Stored\StoredListTrialLinksResponse;

/**
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Stored\StoredListSharedTrackingLinksParams\Filter
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Stored\StoredListSharedTrialLinksParams\Filter as FilterShape1
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Stored\StoredListTrackingLinksParams\Filter as FilterShape2
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Stored\StoredListTrialLinksParams\Filter as FilterShape3
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
