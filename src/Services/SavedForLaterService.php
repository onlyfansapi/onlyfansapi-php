<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\ServiceContracts\SavedForLaterContract;
use OnlyFansAPI\Services\SavedForLater\MessagesService;
use OnlyFansAPI\Services\SavedForLater\PostsService;

final class SavedForLaterService implements SavedForLaterContract
{
    /**
     * @api
     */
    public SavedForLaterRawService $raw;

    /**
     * @api
     */
    public MessagesService $messages;

    /**
     * @api
     */
    public PostsService $posts;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SavedForLaterRawService($client);
        $this->messages = new MessagesService($client);
        $this->posts = new PostsService($client);
    }
}
