<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Item;
use Illuminate\Support\Facades\File;

class ImportJson extends Command
{
    protected $signature = 'import:json {file}';
    protected $description = 'Import JSON data into the items table';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $file = $this->argument('file');

        if (!File::exists($file)) {
            $this->error("File not found: $file");
            return 1;
        }

        $jsonData = File::get($file);
        $data = json_decode($jsonData, true);

        if ($data === null) {
            $this->error("Invalid JSON data in file: $file");
            return 1;
        }

        foreach ($data as $item) {
            Item::create([
                'BranchCode' => $item['BranchCode'],
                'SI_NO' => $item['SI_NO'],
                'CUT_OFF' => $item['CUT_OFF'] ?? null,
                'SI_DATE' => date('Y-m-d H:i:s', strtotime($item['SI_DATE'])),
                'DR_NO' => $item['DR_NO'] ?? null,
                'CustomerCode' => $item['CustomerCode'],
                'CustomerName' => $item['CustomerName'],
                'REF_SINO' => $item['REF_SINO'] ?? null,
                'GROSS_AMT' => floatval($item['GROSS_AMT']),
                'DISC_AMT' => floatval($item['DISC_AMT']),
                'VAT_CODE' => $item['VAT_CODE'] ?? null,
                'VAT_DESC' => $item['VAT_DESC'] ?? null,
                'VAT_AMT' => floatval($item['VAT_AMT']),
                'NET_AMT' => floatval($item['NET_AMT']),
            ]);
        }

        $this->info("Data imported successfully from $file");

        return 0;
    }
}
