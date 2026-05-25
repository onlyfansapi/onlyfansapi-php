<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\SharedTrialLinks;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\SharedTrialLinks\TagsContract;
use OnlyFansAPI\SharedTrialLinks\Tags\TagAddResponse;
use OnlyFansAPI\SharedTrialLinks\Tags\TagListResponse;
use OnlyFansAPI\SharedTrialLinks\Tags\TagRemoveResponse;

/**
 * APIs for Free Trial Links that other OF creators have shared with this account. Revenue, cost, and spender data are not available for shared links.
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
     * Get tags for a specific shared Free Trial Link. Tag namespace is shared with owned Free Trial Links. This is a free endpoint.
     *
     * @param int $sharedTrialLinkID The OnlyFans-side ID of the shared trial link
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        int $sharedTrialLinkID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): TagListResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($sharedTrialLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Add tags to a shared Free Trial Link. Existing tags are preserved. Tag namespace is shared with owned Free Trial Links. This is a free endpoint.
     *
     * @param int $sharedTrialLinkID Path param: The OnlyFans-side ID of the shared trial link
     * @param string $account Path param: The Account ID
     * @param list<string> $tags body param: Array of tag names to add to the shared trial link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function add(
        int $sharedTrialLinkID,
        string $account,
        array $tags,
        RequestOptions|array|null $requestOptions = null,
    ): TagAddResponse {
        $params = Util::removeNulls(['account' => $account, 'tags' => $tags]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->add($sharedTrialLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove tags from a shared Free Trial Link. Tag namespace is shared with owned Free Trial Links. This is a free endpoint.
     *
     * @param int $sharedTrialLinkID Path param: The OnlyFans-side ID of the shared trial link
     * @param string $account Path param: The Account ID
     * @param list<string> $tags body param: Array of tag names to remove from the shared trial link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function remove(
        int $sharedTrialLinkID,
        string $account,
        array $tags,
        RequestOptions|array|null $requestOptions = null,
    ): TagRemoveResponse {
        $params = Util::removeNulls(['account' => $account, 'tags' => $tags]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->remove($sharedTrialLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
