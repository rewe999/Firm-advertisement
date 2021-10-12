<?php

namespace App\Http\Controllers;

use App\Firm;

class FirmController extends Controller
{
    public function getFirms(){
        $firms = Firm::with(["advertisement","advertisement.click"])->get();

        return response()->json($firms->map(function ($firm){
            return [
                "firm" => [
                    "firm_id" => $firm->id,
                    "url" => $firm->url,
                    "tags" => $firm->tags,
                    "date" => $firm->date,
                ],

                "advertisement" => [
                    "advertisement_id" => $firm->advertisement->id,
                    "Estimated Revenue" => $firm->advertisement->Estimated_revenue,
                    "Ad Impressions" => $firm->advertisement->Ad_impressions,
                    "Ad eCPM" => $firm->advertisement->Ad_eCPM,
                ],

                "click" => [
                    "click_id" => $firm->advertisement->click->id,
                    "clicks" => $firm->advertisement->click->clicks,
                    "Ad CTR" => $firm->advertisement->click->Ad_CTR,
                ]
            ];
        }));
    }
}
