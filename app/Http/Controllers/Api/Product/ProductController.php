<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Resources\Products\ProductCollection;
use App\Http\Resources\Products\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\HttpResponseController;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

class ProductController extends HttpResponseController
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    private $fields = [
        'description',
    ];

    public function index(): ProductCollection|JsonResponse
    {
        try{
            $products = $this->productService->getAllProducts();
            return new ProductCollection($products);
        } catch (\Exception $e) {
            return $this->respondWithError($e->getMessage());
        }
    }

    public function store(StoreProductRequest $request)
    {
        try{
            $product = $this->productService->createProduct($request->validated());
            return $this->respondSuccess(new ProductResource($product), 'Product created successfully', 201);
        } catch (\Exception $e) {
            return $this->respondWithError($e->getMessage());
        }
    }

    public function show(Product $product): ProductResource|JsonResponse
    {
        try{
            return $this->respondSuccess(new ProductResource($product));
        } catch (\Exception $e) {
            return $this->respondWithError($e->getMessage());
        };
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        try{
            $product = $this->productService->updateProduct($product, $request->validated());
            return $this->respondSuccess(new ProductResource($product));
        } catch (\Exception $e) {
            return $this->respondWithError($e->getMessage());
        }
    }

    public function destroy(Product $product): JsonResponse
    {
        try{
            $this->productService->deleteProduct($product);
            return $this->respondSuccess(["message" => 'Product deleted successfully']);
        } catch (\Exception $e) {
            return $this->respondWithError($e->getMessage());
        }
    }
}

