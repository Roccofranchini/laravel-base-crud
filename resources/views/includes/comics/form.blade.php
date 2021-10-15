 {{-- FORM CREATE, con i name = alle colonne del nostro DB, con metodo Post e una volta inserito @csrf per il token di
Laravel, specificato "submit" come type del nostro button e indicando nell'action del Form la route comics.store del controller che "salverà questi dati" --}}
 @if ($errors->any())
     <div class="alert alert-danger my-4">
         <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
 @endif
 @if ($comic->exists)
     <form class="d-flex flex-wrap justify-content-center" method='POST'
         action="{{ route('comics.update', $comic->id) }}">
         @method('PATCH')
     @else
         <form class="d-flex flex-wrap justify-content-center" method='POST' action="{{ route('comics.store') }}">
 @endif
 @csrf
 <div class="mb-3 col-6 px-4">
     <label for="title" class="form-label">Title</label>
     <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
         value="{{ old('title', $comic->title) }}" placeholder="">
     <div class="invalid-feedback">Inserire il titolo del fumetto</div>
 </div>
 <div class="mb-3 col-6 px-4">
     <label for="series" class="form-label">Serie</label>
     <input type="text" class="form-control" id="series" name="series" value="{{ old('series', $comic->series) }}"
         placeholder="">
 </div>
 <div class="mb-3 col-8 px-4">
     <label for="description" class="form-label">Descrizione</label>
     <textarea class="form-control @error('title') is-invalid @enderror" id="description" name="description"
         rows="3">{{ old('description', $comic->description) }}</textarea>
     <div class="invalid-feedback">Inserire la descrizione del fumetto</div>
 </div>
 <div class="mb-3 col-4 px-4">
     <label for="thumb" class="form-label">Img</label>
     <input type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb"
         value="{{ old('thumb', $comic->thumb) }}" placeholder="">
     <div class="invalid-feedback">Inserire l'immagine del fumetto</div>
 </div>
 <div class="mb-3 col-4 px-4">
     <label for="price" class="form-label">Prezzo</label>
     <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
         value="{{ old('price', $comic->price) }}">
     <div class="invalid-feedback">Inserire il prezzo del fumetto</div>
 </div>
 <div class="mb-3 col-4 px-4">
     <label for="type" class="form-label">Tipo</label>
     <input type="text" class="form-control" id="type" name="type" value="{{ old('type', $comic->type) }}">
 </div>
 <div class="mb-3 col-4 px-4">
     <label for="sale_date" class="form-label">Venduto il:</label>
     <input type="text" class="form-control" id="sale_date" name="sale_date"
         value="{{ old('sale_date', $comic->sale_date) }}" placeholder="">
 </div>
 <button type="submit" class="btn btn-dark text-center d-block">@yield('aggiungi-modifica')</button>
 </form>
