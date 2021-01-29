<?php

namespace App\Http\Controllers;

use App\Ratings;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;

class AdminReviewController extends Controller
{
    use DeleteModelTrait;
    private $ratings;
    public function __construct(Ratings $ratings)
    {
        $this->ratings = $ratings;
    }
    public function index(){
        $review = Ratings::get();
        return view('admin.rating.index',
            array(
                'review' => $review,
            )
        );
    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->ratings);

    }
}
