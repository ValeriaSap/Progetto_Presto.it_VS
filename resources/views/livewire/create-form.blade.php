<div>
  <section class="h-100 h-custom bgS bgRepeat m-0">
    <div class="container p-3 h-100 mt-5">
      <div class="row d-flex justify-content-center align-items-center h-100 mt-5">
        <div class="col-md-8 col-lg-8">
          <div class="card rounded-3 border border-0 shadow-lg p-3">
            <img src="/media/create-form.jpg"
            class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
            alt="Sample photo">
            <div class="card-body p-4 p-md-5">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">{{__('ui.aggArticoli')}}</h3>
              @if ($errors->any())
              <div class="alert alert-danger mb-0">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>
                    {{$error}}
                  </li>
                  @endforeach
                </ul>
              </div>        
              @endif
              
              <form  wire:submit.prevent='store' class="px-md-2 mt-5">
                
                <div class="form-outline mb-4">
                  <input wire:model.live='title' type="text" id="title" class="form-control @error('title') is-invalid @enderror"  />
                  <label class="form-label" for="title">{{__('ui.creTitolo')}}</label>
                </div>
                
                <div class="form-floating">
                  <textarea wire:model.live='description' class="form-control @error('description') is-invalid @enderror" placeholder="Leave a description here" id="floatingTextarea" style="height: 100px">{{__('ui.creDesc')}}</textarea>
                  <label class="desc" for="floatingTextarea">{{__('ui.crePlace')}}</label>
                </div>
                <label for="floatingTextarea">{{__('ui.creDesc')}}</label>

                <div class="row">
                  <div class="col-md-6 mb-4 mt-4">
                    <div class="form-outline datepicker">
                      <input wire:model.live='price' type="longtext" class="form-control @error('price') is-invalid @enderror" id="price" />
                      <label for="price" class="form-label">{{__('ui.crePrez')}}</label>
                    </div>
                    
                  </div>
                </div>
                <div class="container mb-3">
                  <div class="row justify-content-between">
                    @foreach ($categories as $category)
                    <div class="form-check col-6">
                      <input wire:model.live.defer="category_id" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked value="{{$category->id}}" >
                      <label class="form-check-label desc" for="flexRadioDefault2">
                        {{__("ui.$category->name")}}
                      </label>
                    </div>
                    @endforeach
                  </div>

                </div>
                
                <div>
                  <input type="file" wire:model="temporary_images" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img"/>
                  @error('temporary_images.*')
                  <p class="text-danger mt-2">{{$message}}</p>
                  @enderror
                </div>
                
                @if(!empty($images))
                <div class="row mt-3">
                  <div class="col-12">
                    <div class="row">
                      @foreach($images as $key=>$image)
                      <div class="col">
                        <div class="img-preview mx-auto shadow rounded"  style="background-image: url({{$image->temporaryUrl()}}); background-position:center;">
                        </div>
                        <button type="button" class="btn bgC shadow d-block text-center my-4 mx-auto" wire:click="removeImage({{$key}})">{{__('ui.creBot1')}}</button>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
              @endif
              <button type="submit" class="btn bgA btn-lg mt-5 mb-1">{{__('ui.creBot2')}}</button>
            
              
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="divAltezza"></div>
</section>
</div>
