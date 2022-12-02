<?php

// namespace App\Http\Livewire\Course;

// use Livewire\Component;
// use App\Models\Course;
// use App\Models\Category;
// use App\Models\Level;
// use App\Models\Price;
// use App\Models\Platform;
// use App\Models\Modality;
// use Livewire\WithPagination;

// class CourseIndex extends Component
// {
//     use WithPagination;
//     protected $paginationTheme = 'bootstrap';

//     protected $queryString = ['filters'];

//     public array $filterOptions = [
//         'prices' => ['Gratis'],
//         'modalities' => ['E-learning', 'B-learning', 'Face-to-Face'],
//         'levels' => ['Principiante', 'Intermedio', 'Avanzado'],
//         'platforms' => ['Microsoft Learn', 'LinkedIn Learning'],
//         'types' => ['Course', 'Modulo'],
//         'ratings' => [4,3,2,1],
//     ];

//     public array $filters = array();

//     public array $filtersToMerge = [
//         'price' => [],
//         'modality' => [],
//         'level' => [],
//         'platform' => [],
//         'type' => [],
//         'rating' => []
//     ];

//     public $orderSelect;

//     public $orderBy = [
//         'key' => 'created_at',
//         'direction' => 'desc'
//     ];

//     public $category_id = 1;
//     public $level_id = 2;

//     public function render()
//     {
//         return view('livewire.course.course-index', ['courses' => Course::filter($this->filters)->orderBy($this->orderBy['key'], $this->orderBy['direction'])->paginate(12)]);
//     }

//     public function mount(){
//         $this->filters = array_merge($this->filtersToMerge, $this->filters);
//     }

//     public function updated($name, $value)
//     {
//         $this->resetPage();
//     }

//     public function updatedFiltersPrice($value){
//         $this->filters['price'] = explode(',', $this->filters['price']);
//     }

//     public function updatedFiltersRating($value){
//         $this->filters['rating'] = explode(',', $this->filters['rating']);
//     }

//     public function updatedOrderSelect($value){
//         $this->orderBy = json_decode($this->orderSelect, true);
//     }

//     public function clearFilter($filterType){
//         $this->filters[$filterType] = [];
//     }
// }
