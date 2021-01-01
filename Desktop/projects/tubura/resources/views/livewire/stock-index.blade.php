<div>
    <div class="col-auto my-1">
        <label class="mr-sm-2" for="inlineFormCustomSelect">Choose season</label>
        <select x-on:change="$wire.stock()"  class="custom-select mr-sm-2" id="inlineFormCustomSelect">
          <option selected>Choose...</option>

          @foreach($seasons as $key => $season)
          <option wire:model="season" value="{{$season->id}}">{{$season->year->name}}-{{$season->season_type->name}} </option>
          @endforeach
          
          
        </select>
      </div>
</div>
