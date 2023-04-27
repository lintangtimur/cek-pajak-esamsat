<?php

namespace Stelin\CekPajakApi;

class PajakResponse
{
    public string $status;
    public string $kdWilayah;
    public string $kodeAngka;
    public string $kdSeri;
    public string $merek;
    public string $tipe;
    public string $model;
    public string $bbm;
    public string $warnaKb;
    public string $warnaTnkb;
    public string $milikke;
    public string $thnBuat;
    public string $cylinder;
    public string $jmlSumbu;
    public string $stsBlokir;
    public string $tglStnk;
    public string $infoNik;
    public string $thn;
    public string $bulan;
    public string $hari;
    public string $bbn2Pokok;
    public string $thn2;
    public string $pnbp;
    public string $kp;
    public string $lamaTunggakan;
    public string $tglJatuhTempo;
    public string $totalPkbPokok;
    public string $totalPkbDenda;
    public string $jumlahPkb;
    public string $totalJrPokok;
    public string $totalJrDenda;
    public string $jumlahJr;
    public string $total;
    public string $lokasiSamsat;
    public string $tglBlokir;
    public string $ketBlokir;
    public string $lokasiPad;
    public string $telpSamsat;
    public string $tglPengenaan;
    public string $stsPajak;
    public string $thTgk;

    /**
     * @var \Stelin\CekPajakApi\Rincian
     */
    public \Stelin\CekPajakApi\Rincian $rincian;

    /**
     * @param \stdClass $data
     * @return self
     */
    public static function fromJson(\stdClass $data): self
    {
        $instance                = new self();
        $instance->status        = $data->Status;
        $instance->kdWilayah     = $data->kd_wilayah;
        $instance->kodeAngka     = $data->kode_angka;
        $instance->kdSeri        = $data->kd_seri;
        $instance->merek         = $data->merek;
        $instance->tipe          = $data->tipe;
        $instance->model         = $data->model;
        $instance->bbm           = $data->bbm;
        $instance->warnaKb       = $data->WarnaKB;
        $instance->warnaTnkb     = $data->warna_tnkb;
        $instance->milikke       = $data->milikke;
        $instance->thnBuat       = $data->thn_buat;
        $instance->cylinder      = $data->cylinder;
        $instance->jmlSumbu      = $data->jml_sumbu;
        $instance->stsBlokir     = $data->sts_blokir;
        $instance->tglStnk       = $data->tgl_stnk;
        $instance->infoNik       = $data->info_nik;
        $instance->thn           = $data->thn;
        $instance->bulan         = $data->bulan;
        $instance->hari          = $data->hari;
        $instance->bbn2Pokok     = $data->bbn2_pokok;
        $instance->thn2          = $data->thn2;
        $instance->pnbp          = $data->pnbp;
        $instance->kp            = $data->kp;
        $instance->lamaTunggakan = $data->lama_tunggakan;
        $instance->tglJatuhTempo = $data->tgl_jatuh_tempo;
        $instance->totalPkbPokok = $data->total_pkb_pokok;
        $instance->totalPkbDenda = $data->total_pkb_denda;
        $instance->jumlahPkb     = $data->jumlah_pkb;
        $instance->totalJrPokok  = $data->total_jr_pokok;
        $instance->totalJrDenda  = $data->total_jr_denda;
        $instance->jumlahJr      = $data->jumlah_jr;
        $instance->total         = $data->total;
        $instance->lokasiSamsat  = $data->lokasi_samsat;
        $instance->tglBlokir     = $data->tgl_blokir;
        $instance->ketBlokir     = $data->ket_blokir;
        $instance->lokasiPad     = $data->lokasi_pad;
        $instance->telpSamsat    = $data->telp_samsat;
        $instance->tglPengenaan  = $data->tgl_pengenaan;
        $instance->stsPajak      = $data->sts_pajak;
        $instance->thTgk         = $data->th_tgk;
        // $instance->rincian       = array_map(static function ($data) {
        //     return Rincian::fromJson($data);
        // }, $data->rincian);
        
        $instance->rincian = Rincian::fromJson($data->rincian[0]);

        return $instance;
    }
}
