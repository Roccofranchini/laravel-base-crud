 {{-- FORM CREATE, con i name = alle colonne del nostro DB, con metodo Post e una volta inserito @csrf per il token di
Laravel, specificato "submit" come type del nostro button e indicando nell'action del Form la route comics.store del controller che "salverà questi dati" --}}

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
     <input type="text" class="form-control" id="title" name="title" value="{{ $comic->title }}" placeholder="">
 </div>
 <div class="mb-3 col-6 px-4">
     <label for="series" class="form-label">Serie</label>
     <input type="text" class="form-control" id="series" name="series" value="{{ $comic->series }}" placeholder="">
 </div>
 <div class="mb-3 col-8 px-4">
     <label for="description" class="form-label">Descrizione</label>
     <textarea class="form-control" id="description" name="description"
         rows="3">{{ $comic->description }}</textarea>
 </div>
 <div class="mb-3 col-4 px-4">
     <label for="thumb" class="form-label">Img</label>
     <input type="text" class="form-control" id="thumb" name="thumb" value="{{ $comic->thumb }}" placeholder="">
 </div>
 <div class="mb-3 col-4 px-4">
     <label for="price" class="form-label">Prezzo</label>
     <input type="text" class="form-control" id="price" name="price" value="{{ $comic->price }}">
 </div>
 <div class="mb-3 col-4 px-4">
     <label for="type" class="form-label">Tipo</label>
     <input type="text" class="form-control" id="type" name="type" value="{{ $comic->type }}">
 </div>
 <div class="mb-3 col-4 px-4">
     <label for="sale_date" class="form-label">Venduto il:</label>
     <input type="text" class="form-control" id="sale_date" name="sale_date" value="{{ $comic->sale_date }}"
         placeholder="">
 </div>
 <button type="submit" class="btn btn-dark text-center d-block">@yield('aggiungi-modifica')</button>
 </form>
