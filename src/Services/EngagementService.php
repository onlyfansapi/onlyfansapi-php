<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\ServiceContracts\EngagementContract;
use Onlyfansapi\Services\Engagement\MessagesService;

final class EngagementService implements EngagementContract
{
    /**
     * @api
     */
    public EngagementRawService $raw;

    /**
     * @api
     */
    public MessagesService $messages;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EngagementRawService($client);
        $this->messages = new MessagesService($client);
    }
}
