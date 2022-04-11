<?php

namespace App\Controller;

use App\Entity\Invoice;
use App\Form\InvoiceForm;
use App\Entity\InvoiceLines;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InvoiceController extends AbstractController
{
    #[Route('/', name: 'app')]
    public function index(Request $request,ManagerRegistry $doctrine): Response
    {
        $invoice = new Invoice();
        $invoiceLine = new InvoiceLines();
        $invoice->getInvoiceLines()->add($invoiceLine);
        $form = $this->createForm(InvoiceForm::class, $invoice);

        $em = $doctrine->getManager();


        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $invoicesLines = $invoice->getInvoiceLines();
            $last_id_record =  $em->getRepository(Invoice::class)->findOneBy([], ['id' => 'desc']);
            $invoice->setInvoiceNumber($last_id_record ?  (int)$last_id_record->getId() + 1 : 1);
            $em->persist($invoice);

            $tva = 0.18;
            foreach ($invoicesLines as $invoiceLine) {
                $amount = ($invoiceLine->getQuantity()) * ($invoiceLine->getAmount());
                $amount_vat = ($amount)*($tva) ;
                $total = $amount + $amount_vat;
                $invoiceLine->setInvoiceId($invoice);
                $invoiceLine->setVATAmount($amount_vat);
                $invoiceLine->setTotalWithVAT($total);
                $em->persist($invoiceLine);
            }
            $em->flush();
            unset($form);
            unset($invoice);
            unset($invoiceLine);

            $invoice = new Invoice();
            $invoiceLine = new InvoiceLines();
            $invoice->getInvoiceLines()->add($invoiceLine);
            $form = $this->createForm(InvoiceForm::class, $invoice);
        }

        return $this->render('invoice/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
