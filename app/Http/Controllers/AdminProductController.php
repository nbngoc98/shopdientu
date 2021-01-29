<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Product_Tag;
use App\ProductImage;
use App\Products;
use App\Tag;
use App\Traits\StorageImageTrait;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $products;
    private $category;
    private $tag;
    private $product_Tag;
    private $productImage;
    public function __construct(Category $category, Products $products,Tag $tag, Product_Tag $product_Tag, ProductImage $productImage) //Khai báo để dùng chung dữ liệu data Category
    {
        $this ->category = $category;
        $this ->products = $products;
        $this ->tag = $tag;
        $this ->product_Tag = $product_Tag;
        $this ->productImage = $productImage;
    }
    public function getCategory($parent_id){

        $data = $this ->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryDEQUY($parent_id);
        return $htmlOption;
    }
    public function index(){
        $products = $this->products->latest()->get();
        return view('admin.product.index', compact('products'));
    }
    public function add(){
        $htmlOption = $this ->getCategory($parent_id = '');
        return view('admin.product.add',compact('htmlOption'));
    }
    public function store(ProductAddRequest $request){
        if ($request->status === 'on') {
            $status = 1;
        }else{
            $status = 0;
        }


        try {
            DB::beginTransaction();

            $file = $request->avata_image_path;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
            $file->move('storage/product/' . auth()->id(), $fileNameHash);
            $filePath = "/storage/product/".auth()->id()."/$fileNameHash";
            $dataUploadAdd= [
                'name'=> $request->name,
                'price'=>$request->price,
                'content'=>$request->contents,
                'amount'=>$request->amount,
                'pro_sale'=>$request->sale,
                'user_id'=> auth()->id(),
                'category_id'=>$request->category_id,
                'slug' => str_slug($request->name),
                'status' => $status,
                'avata_image_path'=> $filePath,
                'feature_image_name'=> $filePath,
            ];

            // $product là data của dữ liệu mới thêm vào
            $product= $this->products->create($dataUploadAdd);



            foreach ($request->image_path as $fileItem){
                $fileNameOrigin = $fileItem->getClientOriginalName();
                $fileNameHash = str_random(20) . '.' . $fileItem->getClientOriginalExtension();
                $fileItem->move('storage/product/' . auth()->id(), $fileNameHash);
                $filePath = "/storage/product/".auth()->id()."/$fileNameHash";

                $product->images()->create([
                            'image_path' => $filePath,
                            'image_name' => $filePath,
                        ]);

            }
            // Insert data tags for product
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem){
                    // firstOrCreate kiểm tra dữ liệu để insert tránh trùng  data
                    $tagInstance= $this->tag->firstOrCreate(['name'=>$tagItem]);
                    $tag_Ids[] = $tagInstance->id;
                }
            }

            // Insert Product_tags data quan hệ nhiều nhiều
            // Table tag có quan hệ vơi table Product qua table trung gian Product_tags(product_id,tag_id)
            // $product->tags() lấy được id for product -> truyền id vào  attach() đẻ insert vào Product_tags
            $product->tags()->attach($tag_Ids);
            DB::commit();
            return redirect()->route('product.index');

        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message: '.$exception->getMessage().'Line:'.$exception->getLine());
        }
    }
    public function edit($id){
        $products = $this->products->find($id);
        $htmlOption = $this ->getCategory($products->category_id);
        return view('admin.product.edit',compact('products','htmlOption'));
    }

    public function update($id, Request $request){
        if ($request->status === 'on') {
            $status = 1;
        }else{
            $status = 0;
        }


        try {
            DB::beginTransaction();
            $dataUploadUpdate= [
                'name'=> $request->name,
                'price'=>$request->price,
                'content'=>$request->contents,
                'amount'=>$request->amount,
                'pro_sale'=>$request->sale,
                'user_id'=> auth()->id(),
                'category_id'=>$request->category_id,
                'slug' => str_slug($request->name),
                'status' => $status,
            ];

            if ($request->hasFile('avata_image_path')) {
                // $file = upload_image('avata_image_path');
                $file = $request->avata_image_path;
                $fileNameOrigin = $file->getClientOriginalName();
                    $fileNameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
                    $file->move('public/uploads/product/' . auth()->id(), $fileNameHash);
                    $filePath = "/uploads/product/".auth()->id()."/$fileNameHash";
                    $dataUploadUpdate= [
                        'name'=> $request->name,
                        'price'=>$request->price,
                        'content'=>$request->contents,
                        'amount'=>$request->amount,
                        'pro_sale'=>$request->sale,
                        'user_id'=> auth()->id(),
                        'category_id'=>$request->category_id,
                        'slug' => str_slug($request->name),
                        'status' => $status,
                        'avata_image_path'=> $filePath,
                        'feature_image_name'=> $filePath,
                    ];
            }
            // dd($dataUploadUpdate);
            $this->products->find($id)->update($dataUploadUpdate);
            $product = $this->products->find($id);

            //Insert data product_images
            if ($request->hasFile('image_path')) {
                $this->productImage->where('product_id',$id)->delete();

                foreach ($request->image_path as $fileItem){
                    $fileNameOrigin = $fileItem->getClientOriginalName();
                    $fileNameHash = str_random(20) . '.' . $fileItem->getClientOriginalExtension();
                    $fileItem->move('public/uploads/product/' . auth()->id(), $fileNameHash);
                    $filePath = "/uploads/product/".auth()->id()."/$fileNameHash";

                    $product->images()->create([
                                'image_path' => $filePath,
                                'image_name' => $filePath,
                            ]);

                }
            }

            // Insert data tags for product
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem){
                    // firstOrCreate kiểm tra dữ liệu để insert tránh trùng  data
                    $tagInstance= $this->tag->firstOrCreate(['name'=>$tagItem]);
                    $tag_Ids[] = $tagInstance->id;
                }
            }

            // Insert Product_tags data quan hệ nhiều nhiều  truyền vào 1 cái mảng sử dụng attach()
            // Table tag có quan hệ vơi table Product qua table trung gian Product_tags(product_id,tag_id)
            // $product->tags() lấy được id for product -> truyền id vào  attach() đẻ insert vào Product_tags
            $product->tags()->sync($tag_Ids);
            DB::commit();
            return redirect()->route('product.index');

        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('Message: '.$exception->getMessage().'Line:'.$exception->getLine());
        }
    }
    public function delete($id){
        try {
            $this->products->find($id)->delete();
            return response()->json([
                'code'=>200,
                'message'=>'success'
            ],200);
        }catch (\Exception $exception){
            Log::error('Message: '.$exception->getMessage().'Line:'.$exception->getLine());
            return response()->json([
                'code'=>500,
                'message'=>'fail'
            ],500);
        }
    }
    public function onstatus($id){
        $this->products->find($id)->update(['status' => 1]);
        return redirect()->route('product.index');
    }
    public function offstatus($id){
        $this->products->find($id)->update(['status' => 0]);
        return redirect()->route('product.index');
    }
    public function on_pro_hot($id){
        $this->products->find($id)->update(['pro_hot' => 1]);
        return redirect()->route('product.index');
    }
    public function off_pro_hot($id){
        $this->products->find($id)->update(['pro_hot' => 0]);
        return redirect()->route('product.index');
    }
}
