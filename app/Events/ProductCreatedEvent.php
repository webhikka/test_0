<?php

namespace App\Events;

use App\Models\CompanyProduct;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Class ProductCreatedEvent
 * @package App\Events
 */
class ProductCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var CompanyProduct */
    public $createdCompanyProduct;
    /** @var int */
    public $currentUserId;

    /**
     * ProductCreatedEvent constructor.
     * @param CompanyProduct $createdCompanyProduct
     * @param int $currentUserId
     */
    public function __construct(CompanyProduct $createdCompanyProduct, int $currentUserId)
    {
        $this->createdCompanyProduct = $createdCompanyProduct;
        $this->currentUserId = $currentUserId;
    }
}
