<?php

namespace App\Services;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    /**
     * Get all products.
     *
     * @return Collection
     */
    public function getAllProducts(): Collection
    {
        return Product::all();
    }

    /**
     * Create a new product.
     *
     * @param array $data
     * @return Product
     */
    public function createProduct(array $data): Product
    {
        return Product::create($data);
    }

    /**
     * Update an existing product.
     *
     * @param Product $product
     * @param array $data
     * @return Product
     */

    public function updateProduct(Product $product, array $data): Product
    {
        $product->update($data);
        return $product;
    }
    /**
     * Delete a product.
     *
     * @param Product $product
     * @return bool|null
     * @throws \Exception
     */
    public function deleteProduct(Product $product): ?bool
    {
        return $product->delete();
    }
    
}