<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Price;
use App\Models\Vehicle;
use App\Models\Destination;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
   public function getProducts(Request $request) {
      $data = Vehicle::latest()->paginate(10)->withQueryString();
      $data->setHidden(['id']);
      return $this->apiResponse($data);
   }

   public function postProducts(Request $request) {
      $validator = Validator::make($request->all(), [
         'name' => 'required',
         'slug' => 'required',
         'capacity' => 'required',
         'price' => 'required'
      ]);

      if ($validator->fails()) return redirect('/admin/products')->withErrors($validator)->withInput();

      $data = $validator->validated();
      $data['uuid'] = Str::uuid()->toString();
      $product = Vehicle::create($data);

      return redirect()->back()->with([
         'data' => $product->setHidden(['uuid', 'id'])
      ]);
   }

   public function putProducts(Request $request, $uuid) {
      $validator = Validator::make($request->all(), [
         'name' => 'required',
         'slug' => 'required',
         'capacity' => 'required',
         'price' => 'required'
      ]);

      if ($validator->fails()) return redirect('/admin/products')->withErrors($validator)->withInput();

      $data = $validator->validated();
      Vehicle::where('uuid', $uuid)->update($data);

      return back(303);
   }

   public function deleteProducts($uuid) {
      Vehicle::where('uuid', $uuid)->delete();
      Image::where('vehicle_uuid', $uuid)->delete();
      Price::where('vehicle_uuid', $uuid)->delete();

      return back(303);
   }

   public function getDestinations(Request $request) {
      $data = Destination::latest()->paginate(10)->withQueryString();
      $data->setHidden(['id']);
      return $this->apiResponse($data);
   }

   public function postDestinations(Request $request) {
      $validator = Validator::make($request->all(), [
         'name' => 'required',
         'slug' => 'required'
      ]);

      if ($validator->fails()) return redirect('/admin/destinations')->withErrors($validator)->withInput();

      $data = $validator->validated();
      $data['uuid'] = Str::uuid()->toString();
      $destination = Destination::create($data);

      return redirect()->back();
   }

   public function putDestinations(Request $request, $uuid) {
      $validator = Validator::make($request->all(), [
         'name' => 'required',
         'slug' => 'required'
      ]);

      if ($validator->fails()) return redirect('/admin/destinations')->withErrors($validator)->withInput();

      $data = $validator->validated();
      Destination::where('uuid', $uuid)->update($data);

      return back(303);
   }

   public function deleteDestinations($uuid) {
      Destination::where('uuid', $uuid)->delete();
      Price::where('destination_uuid', $uuid)->delete();

      return back(303);
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
