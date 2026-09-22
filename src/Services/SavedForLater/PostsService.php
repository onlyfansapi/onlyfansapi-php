<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\SavedForLater;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\SavedForLater\Posts\PostListResponse;
use OnlyFansAPI\ServiceContracts\SavedForLater\PostsContract;
use OnlyFansAPI\Services\SavedForLater\Posts\SettingsService;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class PostsService implements PostsContract
{
    /**
     * @api
     */
    public PostsRawService $raw;

    /**
     * @api
     */
    public SettingsService $settings;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PostsRawService($client);
        $this->settings = new SettingsService($client);
    }

    /**
     * @api
     *
     * List all posts that are marked as "Save For Later".
     *
     * @param string $account The Account ID
     * @param int $limit Maximum number of posts to return (default = 10)
     * @param int $offset Offset for pagination (default = 0)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        int $limit,
        int $offset,
        RequestOptions|array|null $requestOptions = null,
    ): PostListResponse {
        $params = Util::removeNulls(['limit' => $limit, 'offset' => $offset]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
