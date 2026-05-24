<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\StoredRawContract;
use Onlyfansapi\Stored\StoredListSharedTrackingLinksParams;
use Onlyfansapi\Stored\StoredListSharedTrackingLinksResponse;
use Onlyfansapi\Stored\StoredListSharedTrialLinksParams;
use Onlyfansapi\Stored\StoredListSharedTrialLinksResponse;
use Onlyfansapi\Stored\StoredListTrackingLinksParams;
use Onlyfansapi\Stored\StoredListTrackingLinksResponse;
use Onlyfansapi\Stored\StoredListTrialLinksParams;
use Onlyfansapi\Stored\StoredListTrialLinksResponse;

/**
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
     *   filterSearch?: string, filterTags?: string, limit?: int, offset?: int
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
            query: Util::array_transform_keys(
                $parsed,
                ['filterSearch' => 'filter[search]', 'filterTags' => 'filter[tags]'],
            ),
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
     *   filterSearch?: string, filterTags?: string, limit?: int, offset?: int
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
            query: Util::array_transform_keys(
                $parsed,
                ['filterSearch' => 'filter[search]', 'filterTags' => 'filter[tags]'],
            ),
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
     *   filterIncludeSmartLinks?: bool,
     *   filterSearch?: string,
     *   filterTags?: string,
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
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterIncludeSmartLinks' => 'filter[include_smart_links]',
                    'filterSearch' => 'filter[search]',
                    'filterTags' => 'filter[tags]',
                ],
            ),
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
     *   filterIncludeSmartLinks?: bool,
     *   filterSearch?: string,
     *   filterTags?: string,
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
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterIncludeSmartLinks' => 'filter[include_smart_links]',
                    'filterSearch' => 'filter[search]',
                    'filterTags' => 'filter[tags]',
                ],
            ),
            options: $options,
            convert: StoredListTrialLinksResponse::class,
        );
    }
}
