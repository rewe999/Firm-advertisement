<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Click;
use App\Firm;
use Illuminate\Support\Facades\Http;

class ConsumeAPIController extends Controller
{
    public function getAPI(){
        $url = 'http://api.optad360.com/get?key=HJGHcZvJHZhjgew6qe67q6GHcZv3fdsAqxbvB33fdV&startDate=2021-08-11&endDate=2021-08-11&output=json';
        $firms = Http::get($url)->json();

        foreach ($firms['data'] as $firm) {
            $clickID = $this->insertClickToDatabase(array($firm[6],$firm[7]));
            $adID = $this->insertAdvertisementToDatabase(array($firm[5],$firm[4],$firm[3]),$clickID);
            $this->insertFirmToDatabase(array($firm[0],$firm[1],$firm[2]),$adID);
        }

        return response()->json([
            'success' => 'Data insert to database'
        ]);
    }

    private function insertClickToDatabase($requestClick){
        $click = new Click();
        $click->clicks = $requestClick[0];
        $click->Ad_CTR = $requestClick[1];
        $click->save();

        return $click->id;
    }

    private function insertAdvertisementToDatabase($requestAd,$clickID){
        $advertisement = new Advertisement();
        $advertisement->Estimated_revenue = $requestAd[0];
        $advertisement->Ad_impressions = $requestAd[1];
        $advertisement->Ad_eCPM = $requestAd[2];
        $advertisement->click_id = $clickID;
        $advertisement->save();

        return $advertisement->id;
    }

    private function insertFirmToDatabase($requestFirm,$advertisementID){
        $factory = new Firm();
        $factory->url = $requestFirm[0];
        $factory->tags = $requestFirm[1];
        $factory->date = $requestFirm[2];
        $factory->advertisement_id = $advertisementID;
        $factory->save();
    }

}
