<?php

namespace App\Http\Controllers\Api;

use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Epresence;

class EpresenceController extends Controller
{
    public function getAllEpresences() {
      $epresences = Epresence::get()->toJson(JSON_PRETTY_PRINT);
      return response($epresences, 200);
    }

    public function getEpresence($id) {
      if (Epresence::where('id', $id)->exists()) {
        $epresences = Epresences::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
        return response($epresences, 200);
      } else {
        return response()->json([
          "message" => "epresences not found"
        ], 404);
      }
    }

    public function createEpresence(Request $request) {
      $epresences = new Epresence;
      $epresences->id_users = $request->id_users;
      $epresences->type = $request->type;
      $epresences->is_approve = $request->is_approve;
      $epresences->waktu = $request->waktu;
      $epresences->save();

      return response()->json([
        "message" => "epresences record created"
      ], 201);
    }

    public function updateEpresence(Request $request, $id) {
      if (Epresence::where('id', $id)->exists()) {
        $epresences = Epresence::find($id);

        $epresences->id_users = is_null($request->id_users) ? $epresences->id_users : $epresences->id_users;
        $epresences->type = is_null($request->type) ? $epresences->type : $epresences->type;
        $epresences->is_approve = is_null($request->is_approve) ? $epresences->is_approve : $epresences->is_approve;
        $epresences->waktu = is_null($request->waktu) ? $epresences->waktu : $epresences->waktu;
        $epresences->save();

        return response()->json([
          "message" => "records updated successfully"
        ], 200);
      } else {
        return response()->json([
          "message" => "epresences not found"
        ], 404);
      }
    }

    public function deleteEpresence ($id) {
      if(Epresence::where('id', $id)->exists()) {
        $Epresence = Epresence::find($id);
        $Epresence->delete();

        return response()->json([
          "message" => "records deleted"
        ], 202);
      } else {
        return response()->json([
          "message" => "Epresene not found"
        ], 404);
      }
    }
}
