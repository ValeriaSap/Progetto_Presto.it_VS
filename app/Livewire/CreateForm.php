<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLableImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateForm extends Component
{
    use WithFileUploads;
    
    public $image;
    public $article;
    public $images = [];
    public $temporary_images;
    public $title;
    public $description;
    public $price;
    public $category_id;
    public $categories;
    
    protected $rules=[
        'title' => "required|min:5",
        'description'=> "required|min:10",
        'price'=> "required|numeric",
        'images.*'=>"image|max:1024",
        'temporary_images.*'=>"image|max:1024"
    ];
    
    
    protected $messages=[
        // 'title.required'=>"Il titolo è obbligatorio",
        // 'title.min'=>"Il titolo deve avere almeno cinque caratteri",
        // 'description.required'=>"La descrizione è obbligatoria",
        // 'description.min'=>"La descrizione deve avere almeno dieci caratteri",
        // 'price.required'=>"Il prezzo è obbligatorio",
        // 'price.numeric'=>"Il prezzo deve essere un numero",
        // 'temporary_images.required'=>"L'immagine è richiesta",
        // 'temporary_images.*.image'=>"I file devono essere immagini!",
        // 'temporary_images.*.max'=>"L'immagine deve essere massimo di 1mb",
        // 'images.image'=>"L'immagine dev'essere un immagine",
        // 'images.max'=>"L'immagine dev'essere di 1mb",
        
        
    ];
    
    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*'=>'image|max:1024'
            ])) {
                foreach($this->temporary_images as $image){
                    $this->images[]= $image;
                }
            }
        }
        
        public function removeImage($key){
            if (in_array($key, array_keys($this->images)))
            {
                unset($this->images[$key]);
            }
        }
        public function store()
        {
            $this->validate();
            $article = Category::find($this->category_id)->articles()->create([
                'title' => $this->title,
                'description' => $this->description,
                'price' => $this->price,
                'user_id' => Auth::user()->id,
            ]);
            $article->save();
            
            if(count($this->images)){
                foreach($this->images as $image){
                    // $article->images()->create(['path'=>$image->store('images','public')]);
                    $newFileName = "articles/{$article->id}";
                    $newImage = $article->images()->create(['path'=>$image->store($newFileName,'public')]);
                    
                    RemoveFaces::withChain([
                        (new ResizeImage($newImage->path, 300, 300)),
                        (new GoogleVisionSafeSearch($newImage->id)),
                        (new GoogleVisionLableImage($newImage->id))

                    ])->dispatch($newImage->id);
                    
                }
                
                File::deleteDirectory(storage_path('/app/livewire-tmp'));
            }
            
            
            return redirect(route('welcome'))->with('message', __('ui.artInviato'));
            $this->reset();
            
        }
        
        public function updated($propertyName){
            $this->validateOnly($propertyName);
        }
        
        
        // public function store(){
            
            //     $this->validate();
            
            //     $article = Category::find($this->category_id)->articles()->create([
                //         'title' => $this->title,
                //         'description' => $this->description,
                //         'price' => $this->price,
                //         'user_id' => Auth::user()->id,
                //     ]);
                
                //     if(count($article->images)){
                    //         foreach($this->images as $image){
                        //             $this->article->images()->create(['path'=>$image->store('public/images')]);
                        //         }
                        //     }
                        
                        //     $this->reset();
                        //    return redirect(route('welcome'))->with('message', "Articolo inviato! Verrà revisionato a breve!");
                        // }
                        
                        public function cleanForm(){
                            $this->title = '';
                            $this->description = '';
                            $this->price = '';
                        }
                        
                        public function render()
                        {
                            return view('livewire.create-form');
                        }
                        
                        
                    }
                    