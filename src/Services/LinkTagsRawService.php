<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\LinkTags\LinkTagListParams;
use OnlyFansAPI\LinkTags\LinkTagListParams\Type;
use OnlyFansAPI\LinkTags\LinkTagListResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\LinkTagsRawContract;

/**
 * APIs for managing tags on free trial links and tracking links.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class LinkTagsRawService implements LinkTagsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get all existing tags that have been used on free trial links and/or tracking links for this account. This is a free endpoint.
     *
     * @param array{type?: Type|value-of<Type>}|LinkTagListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LinkTagListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|LinkTagListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LinkTagListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'api/link-tags',
            query: $parsed,
            options: $options,
            convert: LinkTagListResponse::class,
        );
    }
}
