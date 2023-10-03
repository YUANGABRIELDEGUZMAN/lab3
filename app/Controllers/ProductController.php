<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProductController extends BaseController
{
      private $product;

public function __construct()
{
  $this->product = new \App\Models\ProductModel();
}
public function ProductDetails($id)
{
  $product = $this->product->find($id);
  if ($product) {
    $data = [
      'products' => $product
    ];
    return view('jhome', $data);
  } else {
    return redirect()->to('/home');
  }
}

public function home()
{
  $data = [
    'products' => $this->product->findAll()
  ];
  return view('jhome', $data);
}
    }
