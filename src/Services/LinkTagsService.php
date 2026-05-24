<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\LinkTags\LinkTagListParams\Type;
use Onlyfansapi\LinkTags\LinkTagListResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\LinkTagsContract;

/**
 * APIs for managing tags on free trial links and tracking links.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
     * Get all existing tags that have been used on free trial links and/or tracking links for this account. This is a free endpoint.
     *
     * @param Type|value-of<Type> $type Filter by link type. If not provided, returns tags for both types.
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
