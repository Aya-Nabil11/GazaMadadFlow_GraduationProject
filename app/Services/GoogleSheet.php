<?php

namespace App\Services;
use Google_Client;
use Google_Service_Sheets;
use Google_Service_Sheets_ValueRange;

class GoogleSheet
{
    private $spreadsheetId;
    private $client;
    private $googleSheetService;

    public function __construct(){
        $this->spreadsheetId = config('gazamadadflow.google_sheet_id');

        $this->client = new Google_Client();
        $this->client->setAuthConfig(base_path('storage/credentials.json'));
        $this->client->addScope("https://www.googleapis.com/auth/spreadsheets");

        $this->googleSheetService = new Google_Service_Sheets($this->client);
    }

    public function readGoogleSheet(){
        $dimensions = $this->getDimensions($this->spreadsheetId);
        //dd($dimensions);

        $range = 'Sheet1!A1:' . $dimensions['colCount'];

        $data = $this->googleSheetService->spreadsheets_values
        ->batchGet($this->spreadsheetId, ['ranges' => $range]);

        //dd($data->getValueRanges()[0]->values);
        return $data->getValueRanges()[0]->values;
    }

    public function saveDataToSheet(array $data){
      
        \Log::info("Appending " . count($data) . " rows to Google Sheet...");
        $dimensions = $this->getDimensions($this->spreadsheetId);

        $body = new Google_Service_Sheets_ValueRange([
            'values' => $data
        ]);

        $params = [
            'valueInputOption' => 'USER_ENTERED',
            'insertDataOption' => 'INSERT_ROWS'
        ];

        $range = 'A' . ($dimensions['rowCount'] + 1);

        try{
        return $this->googleSheetService->spreadsheets_values
        ->append($this->spreadsheetId, $range, $body, $params);

        \Log::info("Google API response: " . json_encode($response));
        }catch(\Throwable $e) {
            \Log::error("GoogleSheet append failed: " . $e->getMessage());
            \Log::error($e->getTraceAsString());
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

    private function colLengthToColumnAddress($number)
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