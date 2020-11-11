<?php

namespace App\Listeners;

use App\Events\ProductCreatedEvent;
use App\Mail\ProductCreatedMail;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

/**
 * Class ProductCreatedListener
 * @package App\Listeners
 */
class ProductCreatedListener
{
    /** @var User */
    private $userModel;
    /** @var Employee */
    private $employeeModel;

    /**
     * ProductCreatedListener constructor.
     * @param User $userModel
     * @param Employee $employeeModel
     */
    public function __construct(User $userModel, Employee $employeeModel)
    {
        $this->userModel = $userModel;
        $this->employeeModel = $employeeModel;
    }

    /**
     * Handle the event.
     *
     * @param ProductCreatedEvent $event
     * @return void
     */
    public function handle(ProductCreatedEvent $event): void
    {
        /** @var User $currentUser */
        $currentUser = $this->userModel::findOrFail($event->currentUserId);
        $employee = $this->employeeModel::where('user_id', '=', $event->currentUserId)->first();

        if ($employee !== null) {
            Mail::to($currentUser)->send(new ProductCreatedMail($event->createdCompanyProduct));
        } elseif ($currentUser->subscribed_to_company_product === true) {
            Mail::to($currentUser)->send(new ProductCreatedMail($event->createdCompanyProduct));
        }
    }
}
