<?php

namespace Stelin\CekPajakApi;

class Rincian
{
    public string $masaAkhirBerlakuPajak;
    public string $jatuhTempoPembayaran;
    public string $lamaTunggakan;
    public string $pokokPkb;
    public string $pokokJr;
    public string $dendaPkb;
    public string $dendaJr;
    public string $pnbp;
    public string $total;
    public int $terlambat;

    /**
     * @param \stdClass $data
     * @return self
     */
    public static function fromJson(\stdClass $data): self
    {
        $instance                        = new self();
        $instance->masaAkhirBerlakuPajak = $data->masa_akhir_berlaku_pajak;
        $instance->jatuhTempoPembayaran  = $data->jatuh_tempo_pembayaran;
        $instance->lamaTunggakan         = $data->lama_tunggakan;
        $instance->pokokPkb              = $data->pokok_pkb;
        $instance->pokokJr               = $data->pokok_jr;
        $instance->dendaPkb              = $data->denda_pkb;
        $instance->dendaJr               = $data->denda_jr;
        $instance->pnbp                  = $data->pnbp;
        $instance->total                 = $data->total;
        $instance->terlambat             = $data->terlambat;

        return $instance;
    }
}
