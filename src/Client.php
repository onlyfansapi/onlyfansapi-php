<?php

declare(strict_types=1);

namespace Onlyfansapi;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Onlyfansapi\Core\BaseClient;
use Onlyfansapi\Core\Implementation\StreamingHttpClient;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Services\AccountsService;
use Onlyfansapi\Services\AuthenticateService;
use Onlyfansapi\Services\BankingService;
use Onlyfansapi\Services\ChatsService;
use Onlyfansapi\Services\ClientSessionsService;
use Onlyfansapi\Services\FansService;
use Onlyfansapi\Services\FollowingService;
use Onlyfansapi\Services\MassMessagingService;
use Onlyfansapi\Services\MediaService;
use Onlyfansapi\Services\MeService;
use Onlyfansapi\Services\NotificationsService;
use Onlyfansapi\Services\PayoutsService;
use Onlyfansapi\Services\PostsService;
use Onlyfansapi\Services\ProfilesService;
use Onlyfansapi\Services\QueueService;
use Onlyfansapi\Services\SavedForLaterService;
use Onlyfansapi\Services\SearchService;
use Onlyfansapi\Services\SettingsService;
use Onlyfansapi\Services\StatisticsService;
use Onlyfansapi\Services\SubscribersService;
use Onlyfansapi\Services\TrackingLinksService;
use Onlyfansapi\Services\TransactionsService;
use Onlyfansapi\Services\TrialLinksService;
use Onlyfansapi\Services\UserListsService;
use Onlyfansapi\Services\UsersService;
use Onlyfansapi\Services\WebhooksService;
use Onlyfansapi\Services\WhoamiService;
use Onlyfansapi\Services\WorkflowsService;

/**
 * @phpstan-import-type NormalizedRequest from \Onlyfansapi\Core\BaseClient
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
class Client extends BaseClient
{
    public string $apiKey;

    /**
     * @api
     */
    public WhoamiService $whoami;

    /**
     * @api
     */
    public AccountsService $accounts;

    /**
     * @api
     */
    public MeService $me;

    /**
     * @api
     */
    public BankingService $banking;

    /**
     * @api
     */
    public ChatsService $chats;

    /**
     * @api
     */
    public ClientSessionsService $clientSessions;

    /**
     * @api
     */
    public UserListsService $userLists;

    /**
     * @api
     */
    public AuthenticateService $authenticate;

    /**
     * @api
     */
    public WorkflowsService $workflows;

    /**
     * @api
     */
    public FansService $fans;

    /**
     * @api
     */
    public FollowingService $following;

    /**
     * @api
     */
    public TrialLinksService $trialLinks;

    /**
     * @api
     */
    public MassMessagingService $massMessaging;

    /**
     * @api
     */
    public MediaService $media;

    /**
     * @api
     */
    public NotificationsService $notifications;

    /**
     * @api
     */
    public PayoutsService $payouts;

    /**
     * @api
     */
    public PostsService $posts;

    /**
     * @api
     */
    public ProfilesService $profiles;

    /**
     * @api
     */
    public SearchService $search;

    /**
     * @api
     */
    public QueueService $queue;

    /**
     * @api
     */
    public SavedForLaterService $savedForLater;

    /**
     * @api
     */
    public SettingsService $settings;

    /**
     * @api
     */
    public StatisticsService $statistics;

    /**
     * @api
     */
    public SubscribersService $subscribers;

    /**
     * @api
     */
    public TrackingLinksService $trackingLinks;

    /**
     * @api
     */
    public TransactionsService $transactions;

    /**
     * @api
     */
    public UsersService $users;

    /**
     * @api
     */
    public WebhooksService $webhooks;

    /**
     * @param RequestOpts|null $requestOptions
     */
    public function __construct(
        ?string $apiKey = null,
        ?string $baseUrl = null,
        RequestOptions|array|null $requestOptions = null,
    ) {
        $this->apiKey = (string) ($apiKey ?? Util::getenv('ONLYFANSAPI_API_KEY'));

        $baseUrl ??= Util::getenv(
            'ONLYFANSAPI_BASE_URL'
        ) ?: 'https://app.onlyfansapi.com';

        $options = RequestOptions::parse(
            RequestOptions::with(
                uriFactory: Psr17FactoryDiscovery::findUriFactory(),
                streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
                requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
                transporter: Psr18ClientDiscovery::find(),
            ),
            $requestOptions,
        );

        if (is_null($options->streamingTransporter)) {
            assert(!is_null($options->transporter));
            $options->streamingTransporter = new StreamingHttpClient($options->transporter);
        }

        /** @var array<string, string|null> $headers */
        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'User-Agent' => sprintf('onlyfansapi/PHP %s', VERSION),
            'X-Stainless-Lang' => 'php',
            'X-Stainless-Package-Version' => '0.0.1',
            'X-Stainless-Arch' => Util::machtype(),
            'X-Stainless-OS' => Util::ostype(),
            'X-Stainless-Runtime' => php_sapi_name(),
            'X-Stainless-Runtime-Version' => phpversion(),
        ];

        $customHeadersEnv = Util::getenv('ONLYFANSAPI_CUSTOM_HEADERS');
        if (null !== $customHeadersEnv) {
            foreach (explode("\n", $customHeadersEnv) as $line) {
                $colon = strpos($line, ':');
                if (false !== $colon) {
                    $headers[trim(substr($line, 0, $colon))] = trim(substr($line, $colon + 1));
                }
            }
        }

        parent::__construct(
            headers: $headers,
            baseUrl: $baseUrl,
            options: $options
        );

        $this->whoami = new WhoamiService($this);
        $this->accounts = new AccountsService($this);
        $this->me = new MeService($this);
        $this->banking = new BankingService($this);
        $this->chats = new ChatsService($this);
        $this->clientSessions = new ClientSessionsService($this);
        $this->userLists = new UserListsService($this);
        $this->authenticate = new AuthenticateService($this);
        $this->workflows = new WorkflowsService($this);
        $this->fans = new FansService($this);
        $this->following = new FollowingService($this);
        $this->trialLinks = new TrialLinksService($this);
        $this->massMessaging = new MassMessagingService($this);
        $this->media = new MediaService($this);
        $this->notifications = new NotificationsService($this);
        $this->payouts = new PayoutsService($this);
        $this->posts = new PostsService($this);
        $this->profiles = new ProfilesService($this);
        $this->search = new SearchService($this);
        $this->queue = new QueueService($this);
        $this->savedForLater = new SavedForLaterService($this);
        $this->settings = new SettingsService($this);
        $this->statistics = new StatisticsService($this);
        $this->subscribers = new SubscribersService($this);
        $this->trackingLinks = new TrackingLinksService($this);
        $this->transactions = new TransactionsService($this);
        $this->users = new UsersService($this);
        $this->webhooks = new WebhooksService($this);
    }

    /** @return array<string,string> */
    protected function authHeaders(): array
    {
        return $this->apiKey ? ['Authorization' => "Bearer {$this->apiKey}"] : [];
    }

    /**
     * @internal
     *
     * @param string|list<string> $path
     * @param array<string,mixed> $query
     * @param array<string,string|int|list<string|int>|null> $headers
     * @param RequestOpts|null $opts
     *
     * @return array{NormalizedRequest, RequestOptions}
     */
    protected function buildRequest(
        string $method,
        string|array $path,
        array $query,
        array $headers,
        mixed $body,
        RequestOptions|array|null $opts,
    ): array {
        return parent::buildRequest(
            method: $method,
            path: $path,
            query: $query,
            headers: [...$this->authHeaders(), ...$headers],
            body: $body,
            opts: $opts,
        );
    }
}
