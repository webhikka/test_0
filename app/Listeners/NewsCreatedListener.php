<?php

namespace App\Listeners;

use App\Events\NewsCreatedEvent;
use App\Mail\NewsCreatedMail;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

/**
 * Class NewsCreatedListener
 * @package App\Listeners
 */
class NewsCreatedListener
{
    /** @var User */
    private $userModel;
    /** @var Employee */
    private $employeeModel;

    /**
     * NewsCreatedListener constructor.
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
     * @param NewsCreatedEvent $event
     * @return void
     */
    public function handle(NewsCreatedEvent $event): void
    {
        /** @var User $currentUser */
        $currentUser = $this->userModel::findOrFail($event->currentUserId);
        $employee = $this->employeeModel::where('user_id', '=', $event->currentUserId)->first();

        if ($employee !== null) {
            Mail::to($currentUser)->send(new NewsCreatedMail($event->createdCompanyNews));
        } elseif ($currentUser->subscribed_to_company_news === true) {
            Mail::to($currentUser)->send(new NewsCreatedMail($event->createdCompanyNews));
        }
    }
}
