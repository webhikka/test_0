<?php

namespace App\Events;

use App\Models\CompanyNews;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Class NewsCreatedEvent
 * @package App\Events
 */
class NewsCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var CompanyNews */
    public $createdCompanyNews;
    /** @var int */
    public $currentUserId;

    /**
     * NewsCreatedEvent constructor.
     * @param CompanyNews $createdCompanyNews
     * @param int $currentUserId
     */
    public function __construct(CompanyNews $createdCompanyNews, int $currentUserId)
    {
        $this->createdCompanyNews = $createdCompanyNews;
        $this->currentUserId = $currentUserId;
    }
}
