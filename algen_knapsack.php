<?php

class Catalogue
{
    function createProductColumn($columns, $listOfRawProducts){
        foreach (array_keys($listOfRawProducts) as $listOfRawProductsKey){
            $listOfRawProducts[$columns[$listOfRawProductsKey]] = $listOfRawProducts[$listOfRawProductsKey];
            unset($listOfRawProducts[$listOfRawProductsKey]);
        }
        return $listOfRawProducts;

    }

    function products($parameters){
            $collectionOfListProducts = [];
            
            $raw_data = file($parameters['file_name']);
            foreach ($raw_data as $listOfRawProducts) {
                $collectionOfListProducts[]= $this ->createProductColumn($parameters['columns'], explode(",", $listOfRawProducts));
            }

            foreach ($collectionOfListProducts as $listOfRawProducts){
                print_r($listOfRawProducts);
                echo '<br>';
            }

            

            return $collectionOfListProducts;
    
    }
}

$parameters = [ 
    'file_name' => 'products.txt',
    'columns' => ['item','price']
];

$katalog = new Catalogue;
print_r($katalog->products($parameters));

