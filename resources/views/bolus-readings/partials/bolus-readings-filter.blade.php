<form action="{{request()->getRequestUri()}}" method="get">
    <div class="row">
        <div class="col-2">
            <div class="mb-3">
                <label for="date_gt">Date from:</label>
                <input type="datetime-local" name="date_gt" id="date_gt" class="form-control form-control-sm" value="{{old('date_gt')}}">
            </div>
        </div>
        <div class="col-2">
            <div class="mb-3">
                <label for="date_lte">Date to:</label>
                <input type="datetime-local" name="date_lte" id="date_lte" class="form-control form-control-sm" value="{{old('date_lte')}}">
            </div>
        </div>
        <div class="col-2">
            <div class="mb-3">
                <label for="animal_ids">Animal:</label>
                <select name="animal_ids[]" id="animal_ids" class="form-select form-select-sm">
                    <option value="">All</option>
                    @foreach($animals as $animal)
                    <option value="{{$animal->id}}" {{in_array($animal->id, old('animal_ids') ?? []) ? 'selected' : ''}}>{{$animal->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>


    <button type="submit" class="btn btn-sm btn-outline-primary">Submit</button>
</form>
