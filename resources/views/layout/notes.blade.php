<div class="card">
    <h5 class="mt-3 mx-3"><i class="fas fa-sticky-note"></i> Catatan</h5>
    <div class="card-body">
      @if ($catatan->isEmpty())
        <p class="text-center">Tidak ada catatan</p>
      @else
        @foreach ($catatan as $c)
        <div class="card">
            <div class="card-body">
              {{$c->isi}}
            </div>
        </div>
        @endforeach
      @endif
    </div>
    <form action="{{ route('catatan.store') }}" method="POST">
      @csrf
      <input type="hidden" name="kecamatan_id" value={{$data->id}}>
      <div class="m-3">
          <label for="exampleFormControlTextarea1" class="form-label">Masukan Catatan</label>
          <textarea class="form-control" id="isi" rows="3" name="isi" required></textarea>
          <button class="btn btn-primary float-right my-2" type="submit">Submit</button>
      </div>
    </form>
  </div>