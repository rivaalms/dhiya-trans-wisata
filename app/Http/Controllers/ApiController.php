<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Price;
use App\Models\Vehicle;
use App\Models\Destination;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
      $query = Price::latest()->paginate(10)->withQueryString();
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

      foreach ($prices as &$p) {
         if (isset($vehicleNameMap[$p["vehicle_uuid"]])) {
            $p["vehicle"] = $vehicleNameMap[$p["vehicle_uuid"]];
         }

         if (isset($destinationsNameMap[$p['destination_uuid']])) {
            $p['destination'] = $destinationsNameMap[$p['destination_uuid']];
         }
      }

      return $this->apiResponse([
         'data' => $prices,
         'laravelData' => $query
      ]);
   }

   public function postPrices(Request $request) {
      $validator = Validator::make($request->all(), [
         'vehicle_uuid' => 'required',
         'destination_uuid' => 'required',
         'duration' => 'required',
         'price' => 'required'
      ]);

      if ($validator->fails()) return redirect('/admin/prices')->withErrors($validator)->withInput();

      $data = $validator->validated();
      $data['uuid'] = Str::uuid()->toString();
      Price::create($data);

      return redirect()->back();
   }

   public function putPrices(Request $request, $uuid) {
      $validator = Validator::make($request->all(), [
         'vehicle_uuid' => 'required',
         'destination_uuid' => 'required',
         'duration' => 'required',
         'price' => 'required'
      ]);

      if ($validator->fails()) return redirect('/admin/prices')->withErrors($validator)->withInput();

      $data = $validator->validated();
      Price::where('uuid', $uuid)->update($data);

      return back(303);
   }

   public function deletePrices($uuid) {
      Price::where('uuid', $uuid)->delete();
      return back(303);
   }

   public function getProductOptions() {
      $data = Vehicle::select('uuid', 'name')->get();
      return $this->apiResponse($data);
   }

   public function getDestinationOptions() {
      $data = Destination::select('uuid', 'name')->get();
      return $this->apiResponse($data);
   }

   public function getProductDetails($slug) {
      $query = Vehicle::where('slug', $slug)->get();
      $data = Vehicle::mapVehicles($query)->first();
      return $this->apiResponse($data);
   }

   public function postProductImage(Request $request) {
      $store = $request->file('image')->store('img', 'public');
      $path = env('APP_URL') . "/storage/" . $store;
      $uuid = Str::uuid()->toString();
      $vehicle_uuid = Vehicle::where('slug', $request->slug)->first()->uuid;
      $image = Image::create(compact('vehicle_uuid', 'path', 'uuid'));

      return redirect()->back();
   }

   public function putProductImage(Request $request) {
      $image = Image::where('uuid', $request->uuid);

      $oldPath = "/img/" . $this->lastArrayItem(explode('/', $image->first()->path));

      if (Storage::disk('public')->exists($oldPath)) {
         Storage::disk('public')->delete($oldPath);
      }

      $store = $request->file('image')->store('img', 'public');
      $path = env('APP_URL') . "/storage/" . $store;

      $image->update(compact('path'));
      return back(303);
   }

   public function deleteProductImage($uuid) {
      $image = Image::where('uuid', $uuid);
      $path = "/img/" . $this->lastArrayItem(explode('/', $image->first()->path));

      if (Storage::disk('public')->exists($path)) Storage::disk('public')->delete($path);

      $image->delete();
      return back(303);
   }
}
