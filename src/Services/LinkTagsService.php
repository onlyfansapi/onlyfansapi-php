<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\LinkTags\LinkTagListParams\Type;
use OnlyFansAPI\LinkTags\LinkTagListResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\LinkTagsContract;

/**
 * APIs for managing tags on free trial links, tracking links, and Smart Links.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class LinkTagsService implements LinkTagsContract
{
    /**
     * @api
     */
    public LinkTagsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new LinkTagsRawService($client);
    }

    /**
     * @api
     *
     * Get all existing tags that have been used on free trial links, tracking links, and/or Smart Links for this account. This is a free endpoint.
     *
     * @param Type|value-of<Type> $type Filter by link type. If not provided, returns tags for all types.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null
    ): LinkTagListResponse {
        $params = Util::removeNulls(['type' => $type]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
