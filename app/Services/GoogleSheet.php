<?php

namespace App\Services;

use Google_Client;
use Google_Service_Sheets;
use Google_Service_Sheets_ValueRange;
use Illuminate\Support\Facades\Log;

class GoogleSheet
{
    private $spreadsheetId;
    private $sheetName;
    private $client;
    private $googleSheetService;

    public function __construct()
    {
        $this->spreadsheetId = config('gazamadadflow.google_sheet_id');
        $this->sheetName = "Gaza_Madad_Flow";

        $this->client = new Google_Client();
        $this->client->setAuthConfig(base_path('storage/credentials.json'));
        $this->client->addScope("https://www.googleapis.com/auth/spreadsheets");

        $this->googleSheetService = new Google_Service_Sheets($this->client);
    }

    /**
     * Append data to the sheet
     */
    public function saveDataToSheet(array $data)
    {
        Log::info("Appending " . count($data) . " rows to Google Sheet...");

        $rows = array_map(function ($row) {
            return array_map(function ($value) {
                if (is_array($value)) {
                    return implode(',', $value); // flatten
                }
                if (is_object($value)) {
                    return json_encode($value, JSON_UNESCAPED_UNICODE);
                }
                return (string)$value; // force string
            }, array_values($row)); // ensure numeric keys
        }, $data); // don't wrap again with array_values

        $dimensions = $this->getDimensions($this->spreadsheetId);

        $body = new Google_Service_Sheets_ValueRange([
            'values' => $rows
        ]);

        $params = [
            'valueInputOption' => 'RAW',
            'insertDataOption' => 'INSERT_ROWS'
        ];

        $range = "A" . ($dimensions['rowCount'] + 1); // start appending after existing data

        try {
            return $this->googleSheetService->spreadsheets_values
                ->append($this->spreadsheetId, $range, $body, $params);
        } catch (\Throwable $e) {
            Log::error("Google Sheet export failed: " . $e->getMessage());
            Log::error($e->getTraceAsString());
            throw $e;
        }
    }

    /**
     * Read the full sheet
     */
    public function readGoogleSheet()
    {
        try {
            $data = $this->googleSheetService->spreadsheets_values
                ->get($this->spreadsheetId, $this->sheetName)
                ->getValues();

            return $data;
        } catch (\Throwable $e) {
            Log::error("GoogleSheet read failed: " . $e->getMessage());
            Log::error($e->getTraceAsString());
            throw $e;
        }
    }

    private function getDimensions($spreadSheetId)
    {
        $rowDimensions = $this->googleSheetService->spreadsheets_values->batchGet(
            $spreadSheetId,
            ['ranges' => 'Sheet1!A:A','majorDimension'=>'COLUMNS']
        );

        //if data is present at nth row, it will return array till nth row
        //if all column values are empty, it returns null
        $rowMeta = $rowDimensions->getValueRanges()[0]->values;
        if (! $rowMeta) {
            return [
                'error' => true,
                'message' => 'missing row data'
            ];
        }

        $colDimensions = $this->googleSheetService->spreadsheets_values->batchGet(
            $spreadSheetId,
            ['ranges' => 'Sheet1!1:1','majorDimension'=>'ROWS']
        );
        
        //if data is present at nth col, it will return array till nth col
        //if all column values are empty, it returns null
        $colMeta = $colDimensions->getValueRanges()[0]->values;
        if (! $colMeta) {
            return [
                'error' => true,
                'message' => 'missing row data'
            ];
        }

        return [
            'error' => false,
            'rowCount' => count($rowMeta[0]),
            'colCount' => $this->colLengthToColumnAddress(count($colMeta[0]))
        ];
    }

    public  function colLengthToColumnAddress($number)
    {
        if ($number <= 0) return null;

        $temp; $letter = '';
        while ($number > 0) {
            $temp = ($number - 1) % 26;
            $letter = chr($temp + 65) . $letter;
            $number = ($number - $temp - 1) / 26;
        }
        return $letter;
    }
}
