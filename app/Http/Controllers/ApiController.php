<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Vehicle;
use App\Models\Destination;
use Illuminate\Http\Request;

class ApiController extends Controller
{
   public function getProducts(Request $request) {
      $data = Vehicle::paginate(10)->withQueryString();
      $data->setHidden(['id', 'uuid']);
      return $this->apiResponse($data);
   }

   public function getDestinations(Request $request) {
      $data = Destination::paginate(10)->withQueryString();
      $data->setHidden(['id', 'uuid']);
      return $this->apiResponse($data);
   }

   public function getPrices(Request $request) {
      $query = Price::paginate(10)->withQueryString();
      $prices = $this->jsonify($query->items());
      $vehicle_uuid = [];
      $destination_uuid = [];

      foreach ($query->items() as $q) {
         if (!in_array($q->vehicle_uuid, $vehicle_uuid)) {
            array_push($vehicle_uuid, $q->vehicle_uuid);
         }

         if (!in_array($q->destination_uuid, $destination_uuid)) {
            array_push($destination_uuid, $q->destination_uuid);
         }
      }
      $vehicles = $this->jsonify(Vehicle::select('uuid', 'name')->whereIn('uuid', $vehicle_uuid)->get());
      $destinations = $this->jsonify(Destination::select('uuid', 'name')->whereIn('uuid', $destination_uuid)->get());

      $vehicleNameMap = [];
      foreach ($vehicles as $v) {
         $vehicleNameMap[$v["uuid"]] = $v["name"];
      }

      $destinationsNameMap = [];
      foreach ($destinations as $d) {
         $destinationsNameMap[$d['uuid']] = $d['name'];
      }

      $unsetKeys = ['vehicle_uuid', 'destination_uuid'];

      foreach ($prices as &$p) {
         if (isset($vehicleNameMap[$p["vehicle_uuid"]])) {
            $p["vehicle"] = $vehicleNameMap[$p["vehicle_uuid"]];
         }

         if (isset($destinationsNameMap[$p['destination_uuid']])) {
            $p['destination'] = $destinationsNameMap[$p['destination_uuid']];
         }

         foreach ($unsetKeys as $unsetKey) {
            unset($p[$unsetKey]);
         }
      }

      return $this->apiResponse([
         'data' => $prices,
         'laravelData' => $query
      ]);
   }
}
