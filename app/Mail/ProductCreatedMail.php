<?php

namespace App\Mail;

use App\Models\CompanyProduct;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class ProductCreatedMail
 * @package App\Mail
 */
class ProductCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    /** @var CompanyProduct */
    private $companyProduct;

    /**
     * ProductCreatedMail constructor.
     * @param CompanyProduct $companyProduct
     */
    public function __construct(CompanyProduct $companyProduct)
    {
        $this->companyProduct = $companyProduct;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('example@example.com')->markdown('product.created');
    }
}
