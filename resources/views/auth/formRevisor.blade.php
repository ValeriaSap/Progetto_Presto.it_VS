<x-layout>
  <div class="bgS pt-5">
    <div class="container bgE borderRev shadow rounded mt-5 ">
      <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-8 col-lg-6 mt-5">
          <h2 class=" mt-5 mb-5 text-center">{{__('ui.revTitolo')}}</h2>
          <h1 class=" display-3 mt-5 mb-5 mx-5 text-center colorC">{{__('ui.rev')}}</h1>
          <h4 class="text-center mb-5">{{__('ui.revSlogan')}}</h4>
          <h5 class="text-center mb-5 colorC border-bottom border-secondary">{{__('ui.revSlogan2')}}</h5>
        </div>
        <div class="row justify-content-center">
          <div class="col-12 col-md-6 col-lg-8 ">
            <form method="POST" action="{{route('becomerevisor.submit')}}">
              @csrf
              <!-- Name input -->
              <div class="form-outline mb-4 ">
                <input name="name" type="text" id="form4Example1" class="form-control" />
                <label class="form-label" for="form4Example1">{{__('ui.reName')}}</label>
              </div>
              
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input name="email" type="email" id="form4Example2" class="form-control" />
                <label class="form-label" for="form4Example2">Email</label>
              </div>
              
              <!-- Message input -->
              <div class="form-outline mb-4">
                <textarea name="body" class="form-control" id="form4Example3" rows="4"></textarea>
                <label class="form-label" for="form4Example3">{{__('ui.reMes')}}</label>
              </div>
              
              <!-- Submit button -->
              <div class="text-center mb-5">
                <button type="submit" class="btn bgA btn-block btn-lg mb-4">{{__('ui.reBot')}}</button>
              </div>
            </form>
          </div>
        </div>
        
      </div>
    </div>
    <div class="divAltezza"></div>
  </div>
</x-layout>