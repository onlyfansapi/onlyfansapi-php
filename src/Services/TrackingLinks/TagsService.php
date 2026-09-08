<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\TrackingLinks;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\TrackingLinks\TagsContract;
use OnlyFansAPI\TrackingLinks\Tags\TagAddResponse;
use OnlyFansAPI\TrackingLinks\Tags\TagListResponse;
use OnlyFansAPI\TrackingLinks\Tags\TagRemoveResponse;

/**
 * APIs for managing tracking links.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class TagsService implements TagsContract
{
    /**
     * @api
     */
    public TagsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TagsRawService($client);
    }

    /**
     * @api
     *
     * Get tags for a specific tracking link. This is a free endpoint.
     *
     * @param int $trackingLinkID The ID of the tracking link
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        int $trackingLinkID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): TagListResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($trackingLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Add tags to a specific tracking link. Existing tags are preserved. This is a free endpoint.
     *
     * @param int $trackingLinkID Path param: The ID of the tracking link
     * @param string $account Path param: The Account ID
     * @param list<string> $tags body param: Array of tag names to add to the tracking link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function add(
        int $trackingLinkID,
        string $account,
        array $tags,
        RequestOptions|array|null $requestOptions = null,
    ): TagAddResponse {
        $params = Util::removeNulls(['account' => $account, 'tags' => $tags]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->add($trackingLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove tags from a specific tracking link. This is a free endpoint.
     *
     * @param int $trackingLinkID Path param: The ID of the tracking link
     * @param string $account Path param: The Account ID
     * @param list<string> $tags body param: Array of tag names to remove from the tracking link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function remove(
        int $trackingLinkID,
        string $account,
        array $tags,
        RequestOptions|array|null $requestOptions = null,
    ): TagRemoveResponse {
        $params = Util::removeNulls(['account' => $account, 'tags' => $tags]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->remove($trackingLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
