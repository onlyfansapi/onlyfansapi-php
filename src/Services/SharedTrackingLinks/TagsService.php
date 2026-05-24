<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\SharedTrackingLinks;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\SharedTrackingLinks\TagsContract;
use Onlyfansapi\SharedTrackingLinks\Tags\TagAddResponse;
use Onlyfansapi\SharedTrackingLinks\Tags\TagListResponse;
use Onlyfansapi\SharedTrackingLinks\Tags\TagRemoveResponse;

/**
 * APIs for Tracking Links (campaigns) that other OF creators have shared with this account. Revenue, cost, and spender data are not available for shared campaigns.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
     * Get tags for a specific shared Tracking Link. Tag namespace is shared with owned Tracking Links. This is a free endpoint.
     *
     * @param int $sharedTrackingLinkID The OnlyFans-side ID of the shared tracking link
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        int $sharedTrackingLinkID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): TagListResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($sharedTrackingLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Add tags to a shared Tracking Link. Existing tags are preserved. Tag namespace is shared with owned Tracking Links. This is a free endpoint.
     *
     * @param int $sharedTrackingLinkID Path param: The OnlyFans-side ID of the shared tracking link
     * @param string $account Path param: The Account ID
     * @param list<string> $tags body param: Array of tag names to add to the shared tracking link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function add(
        int $sharedTrackingLinkID,
        string $account,
        array $tags,
        RequestOptions|array|null $requestOptions = null,
    ): TagAddResponse {
        $params = Util::removeNulls(['account' => $account, 'tags' => $tags]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->add($sharedTrackingLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove tags from a shared Tracking Link. Tag namespace is shared with owned Tracking Links. This is a free endpoint.
     *
     * @param int $sharedTrackingLinkID Path param: The OnlyFans-side ID of the shared tracking link
     * @param string $account Path param: The Account ID
     * @param list<string> $tags body param: Array of tag names to remove from the shared tracking link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function remove(
        int $sharedTrackingLinkID,
        string $account,
        array $tags,
        RequestOptions|array|null $requestOptions = null,
    ): TagRemoveResponse {
        $params = Util::removeNulls(['account' => $account, 'tags' => $tags]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->remove($sharedTrackingLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
