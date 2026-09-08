<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\TrialLinks;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\TrialLinks\TagsContract;
use OnlyFansAPI\TrialLinks\Tags\TagAddResponse;
use OnlyFansAPI\TrialLinks\Tags\TagListResponse;
use OnlyFansAPI\TrialLinks\Tags\TagRemoveResponse;

/**
 * APIs for managing Free Trial Links.
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
     * Get tags for a specific free trial link. This is a free endpoint.
     *
     * @param int $trialLinkID The ID of the trial link
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        int $trialLinkID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): TagListResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($trialLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Add tags to a specific free trial link. Existing tags are preserved. This is a free endpoint.
     *
     * @param int $trialLinkID Path param: The ID of the trial link
     * @param string $account Path param: The Account ID
     * @param list<string> $tags body param: Array of tag names to add to the trial link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function add(
        int $trialLinkID,
        string $account,
        array $tags,
        RequestOptions|array|null $requestOptions = null,
    ): TagAddResponse {
        $params = Util::removeNulls(['account' => $account, 'tags' => $tags]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->add($trialLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove tags from a specific free trial link. This is a free endpoint.
     *
     * @param int $trialLinkID Path param: The ID of the trial link
     * @param string $account Path param: The Account ID
     * @param list<string> $tags body param: Array of tag names to remove from the trial link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function remove(
        int $trialLinkID,
        string $account,
        array $tags,
        RequestOptions|array|null $requestOptions = null,
    ): TagRemoveResponse {
        $params = Util::removeNulls(['account' => $account, 'tags' => $tags]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->remove($trialLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
