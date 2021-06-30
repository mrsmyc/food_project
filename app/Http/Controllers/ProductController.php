<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Validator;


class ProductController extends Controller
{
    public function index() {

        $products = Product::orderBy('name')->paginate(16);        
        return view('pages.products.index', [
            'products' => $products,
        ]);
    }

    public function import() {

        return view('pages.products.import');
    }

    public function importExcel(Request $request) {
        if ($request->hasFile('file')) {
            $inputFileType = 'Xlsx';
            $reader = IOFactory::createReader($inputFileType);
            $path = $request->file('file')->getPathName();
            $file = $reader->load($path);
            $fileWorksheet = $file->getActiveSheet()->toArray();
            unset($fileWorksheet[0]);
            foreach($fileWorksheet as $item) {
                $product = new Product();
                $existedProduct = Product::where('name', $item[0])->first();
                if($existedProduct) {
                    
                }else {
                    $product->name = $item[0];                
                    $product->calorie_content = $item[1];
                    $product->protein = $item[2];
                    $product->fat = $item[3];
                    $product->carb = $item[4];
                    $product->price = $item[5];
                    $product->save();
                }                
                
            }
        }else {
            return back();
        }
        
        return back();
        
    }

    public function destroy(Product $product) {
        $product->delete();

        return back();
    }
}
