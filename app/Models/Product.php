<?php

namespace App\Models;

class Product {
    
    /**
     * Retorna el listado de productos de prueba
     */
    public function getAll(): array {
        return [
            [
                'code' => 'SF-8092',
                'name' => 'Sofá Seccional Borgia',
                'category' => 'Sofás y Seccionales',
                'description' => 'Diseño modular de alta densidad con tapizado en lino poliéster.',
                'image' => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'code' => 'BT-4011',
                'name' => 'Butaca Minimalista Siena',
                'category' => 'Butacas',
                'description' => 'Estructura de madera de roble con cojines de espuma viscoelástica.',
                'image' => 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'code' => 'SF-1020',
                'name' => 'Sofá 3 Cuerpos Valdivia',
                'category' => 'Sofás',
                'description' => 'Elegante acabado en terciopelo gris con patas metálicas doradas.',
                'image' => 'https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'code' => 'ST-9033',
                'name' => 'Ottoman Redondo Loft',
                'category' => 'Complementos',
                'description' => 'Acolchado premium ideal para salas de estar o recámaras.',
                'image' => 'https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?auto=format&fit=crop&w=800&q=80',
            ]
        ];
    }

    public function getByCode(string $code): ?array {
        $products = $this->getAll();
        foreach ($products as $product) {
            if ($product['code'] === $code) {
                return $product;
            }
        }
        return null;
    }
}