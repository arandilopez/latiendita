<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\OrdenCompra;

class OrdenCompraCreada extends Mailable
{
    use Queueable, SerializesModels;
    private $orden;
    private $pdf;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(OrdenCompra $orden, $pdf)
    {
        $this->orden = $orden;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('arandilopez.93@gmail.com')
            ->to($this->orden->cliente->email, $this->orden->cliente->nombre)
            ->subject('Nueva orden de compra ODC-' . $this->orden->id)
            ->attachData($this->pdf, 'OrdenDeCompra.pdf', [
                'mime' => 'application/pdf'
            ])->view('ordenes_compra.mail', [
                'orden' => $this->orden
            ]);
    }
}
