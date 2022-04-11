<?php

namespace App\Entity;

use App\Repository\InvoiceLinesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceLinesRepository::class)]
class InvoiceLines
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\Column(type: 'integer')]
    private $quantity;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private $amount;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private $VATAmount;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private $TotalWithVAT;

    #[ORM\ManyToOne(targetEntity: Invoice::class, inversedBy: 'invoiceLines')]
    private $invoiceId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getVATAmount(): ?int
    {
        return $this->VATAmount;
    }

    public function setVATAmount(int $VATAmount): self
    {
        $this->VATAmount = $VATAmount;

        return $this;
    }

    public function getTotalWithVAT(): ?string
    {
        return $this->TotalWithVAT;
    }

    public function setTotalWithVAT(string $TotalWithVAT): self
    {
        $this->TotalWithVAT = $TotalWithVAT;

        return $this;
    }

    public function getInvoiceId(): ?Invoice
    {
        return $this->invoiceId;
    }

    public function setInvoiceId(?Invoice $invoiceId): self
    {
        $this->invoiceId = $invoiceId;

        return $this;
    }
}
