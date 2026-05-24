<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\ServiceContracts\SavedForLaterContract;
use Onlyfansapi\Services\SavedForLater\MessagesService;
use Onlyfansapi\Services\SavedForLater\PostsService;

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
