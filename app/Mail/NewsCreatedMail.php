<?php

namespace App\Mail;

use App\Models\CompanyNews;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class NewsCreatedMail
 * @package App\Mail
 */
class NewsCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    /** @var CompanyNews */
    private $companyNews;

    /**
     * NewsCreatedMail constructor.
     * @param CompanyNews $companyNews
     */
    public function __construct(CompanyNews $companyNews)
    {
        $this->companyNews = $companyNews;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('example@example.com')->markdown('news.created');
    }
}
