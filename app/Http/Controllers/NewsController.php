<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    protected $apiUrl;

    public function __construct() {
        $this->apiUrl = env('API_ENDPOINT');
    }

    public function allPosts() {
        $response = Http::get("{$this->apiUrl}posts");
        return $this->processResponse($response);
    }

    public function findPost($post_id) {
        $response = Http::get("{$this->apiUrl}posts/{$post_id}");
        return $this->processResponse($response);
    }

    public function postComments($post_id) {
        $response = Http::get("{$this->apiUrl}posts/{$post_id}/commets");
        return $this->processResponse($response);
    }

    public function allAlbumsPhotos($album_id) {
        $response = Http::get("{$this->apiUrl}posts/{$album_id}/photos");
        return $this->processResponse($response);
    }

    private function success($data){
        return [
            'data'=> $data,
            'status' => 'success',
            'code' => 200
        ];
    }

    private function failed($code){
        return [
            'messaje'=> 'A ocurrido un error',
            'status' => 'error',
            'code' => $code
        ];
    }

    private function processResponse($response) {
        if($response->failed()) {
            return response()->json($this->failed(404));
        }
        return response()->json($this->success($response->json()));
    }
}
