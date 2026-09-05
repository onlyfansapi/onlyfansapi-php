<?php

declare(strict_types=1);

namespace OnlyFansAPI;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use OnlyFansAPI\Core\BaseClient;
use OnlyFansAPI\Core\Implementation\StreamingHttpClient;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Services\AccountsService;
use OnlyFansAPI\Services\AnalyticsService;
use OnlyFansAPI\Services\AuthenticateService;
use OnlyFansAPI\Services\BankingService;
use OnlyFansAPI\Services\BundlesService;
use OnlyFansAPI\Services\ChargebacksService;
use OnlyFansAPI\Services\ChatsService;
use OnlyFansAPI\Services\ClientSessionsService;
use OnlyFansAPI\Services\DataExportsService;
use OnlyFansAPI\Services\EngagementService;
use OnlyFansAPI\Services\FansService;
use OnlyFansAPI\Services\FollowingService;
use OnlyFansAPI\Services\GiphyService;
use OnlyFansAPI\Services\LinkTagsService;
use OnlyFansAPI\Services\MassMessagingService;
use OnlyFansAPI\Services\MediaService;
use OnlyFansAPI\Services\MeService;
use OnlyFansAPI\Services\MessagesService;
use OnlyFansAPI\Services\NotificationsService;
use OnlyFansAPI\Services\PayoutsService;
use OnlyFansAPI\Services\PostsService;
use OnlyFansAPI\Services\ProfilesService;
use OnlyFansAPI\Services\PromotionsService;
use OnlyFansAPI\Services\QueueService;
use OnlyFansAPI\Services\ReleaseFormsService;
use OnlyFansAPI\Services\SavedForLaterService;
use OnlyFansAPI\Services\SearchService;
use OnlyFansAPI\Services\SettingsService;
use OnlyFansAPI\Services\SharedTrackingLinksService;
use OnlyFansAPI\Services\SharedTrialLinksService;
use OnlyFansAPI\Services\SmartLinkPostbacksService;
use OnlyFansAPI\Services\SmartLinksService;
use OnlyFansAPI\Services\StatisticsService;
use OnlyFansAPI\Services\StoredService;
use OnlyFansAPI\Services\StoriesService;
use OnlyFansAPI\Services\SubscribersService;
use OnlyFansAPI\Services\TrackingLinksService;
use OnlyFansAPI\Services\TransactionsService;
use OnlyFansAPI\Services\TrialLinksService;
use OnlyFansAPI\Services\UserListsService;
use OnlyFansAPI\Services\UsersService;
use OnlyFansAPI\Services\WebhooksService;
use OnlyFansAPI\Services\WhoamiService;

/**
 * @phpstan-import-type NormalizedRequest from \OnlyFansAPI\Core\BaseClient
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
    public AnalyticsService $analytics;

    /**
     * @api
     */
    public BankingService $banking;

    /**
     * @api
     */
    public ChargebacksService $chargebacks;

    /**
     * @api
     */
    public ChatsService $chats;

    /**
     * @api
     */
    public MessagesService $messages;

    /**
     * @api
     */
    public ClientSessionsService $clientSessions;

    /**
     * @api
     */
    public AuthenticateService $authenticate;

    /**
     * @api
     */
    public DataExportsService $dataExports;

    /**
     * @api
     */
    public EngagementService $engagement;

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
    public GiphyService $giphy;

    /**
     * @api
     */
    public LinkTagsService $linkTags;

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
    public PromotionsService $promotions;

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
    public ReleaseFormsService $releaseForms;

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
    public SharedTrialLinksService $sharedTrialLinks;

    /**
     * @api
     */
    public SharedTrackingLinksService $sharedTrackingLinks;

    /**
     * @api
     */
    public SmartLinkPostbacksService $smartLinkPostbacks;

    /**
     * @api
     */
    public SmartLinksService $smartLinks;

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
    public StoredService $stored;

    /**
     * @api
     */
    public StoriesService $stories;

    /**
     * @api
     */
    public BundlesService $bundles;

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
    public UserListsService $userLists;

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
            'ONLY_FANS_API_BASE_URL'
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
            'User-Agent' => sprintf('OnlyFansAPI/PHP %s', VERSION),
            'X-Stainless-Lang' => 'php',
            'X-Stainless-Package-Version' => '0.0.1',
            'X-Stainless-Arch' => Util::machtype(),
            'X-Stainless-OS' => Util::ostype(),
            'X-Stainless-Runtime' => php_sapi_name(),
            'X-Stainless-Runtime-Version' => phpversion(),
        ];

        $customHeadersEnv = Util::getenv('ONLY_FANS_API_CUSTOM_HEADERS');
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
        $this->analytics = new AnalyticsService($this);
        $this->banking = new BankingService($this);
        $this->chargebacks = new ChargebacksService($this);
        $this->chats = new ChatsService($this);
        $this->messages = new MessagesService($this);
        $this->clientSessions = new ClientSessionsService($this);
        $this->authenticate = new AuthenticateService($this);
        $this->dataExports = new DataExportsService($this);
        $this->engagement = new EngagementService($this);
        $this->fans = new FansService($this);
        $this->following = new FollowingService($this);
        $this->trialLinks = new TrialLinksService($this);
        $this->giphy = new GiphyService($this);
        $this->linkTags = new LinkTagsService($this);
        $this->massMessaging = new MassMessagingService($this);
        $this->media = new MediaService($this);
        $this->notifications = new NotificationsService($this);
        $this->payouts = new PayoutsService($this);
        $this->posts = new PostsService($this);
        $this->promotions = new PromotionsService($this);
        $this->profiles = new ProfilesService($this);
        $this->search = new SearchService($this);
        $this->queue = new QueueService($this);
        $this->releaseForms = new ReleaseFormsService($this);
        $this->savedForLater = new SavedForLaterService($this);
        $this->settings = new SettingsService($this);
        $this->sharedTrialLinks = new SharedTrialLinksService($this);
        $this->sharedTrackingLinks = new SharedTrackingLinksService($this);
        $this->smartLinkPostbacks = new SmartLinkPostbacksService($this);
        $this->smartLinks = new SmartLinksService($this);
        $this->statistics = new StatisticsService($this);
        $this->subscribers = new SubscribersService($this);
        $this->stored = new StoredService($this);
        $this->stories = new StoriesService($this);
        $this->bundles = new BundlesService($this);
        $this->trackingLinks = new TrackingLinksService($this);
        $this->transactions = new TransactionsService($this);
        $this->userLists = new UserListsService($this);
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
