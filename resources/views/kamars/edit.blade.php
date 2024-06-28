<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Hotels </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('kamars.update', $kamar->id) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">NO KAMAR</label>
                                <input type="text" class="form-control @error('nomor_kamar') is-invalid @enderror" name="nomor_kamar" value="{{ old('nomor_kamar', $kamar->nomor_kamar) }}" placeholder="Masukkan Nomor Kamar">

                                <!-- error message untuk title -->
                                @error('nomor_kamar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Tipe Kamar</label>
                                <input type="text" class="form-control @error('tipe_kamar') is-invalid @enderror" name="tipe_kamar" value="{{ old('tipe_kamar', $kamar->tipe_kamar) }}" placeholder="Masukkan Tipe Kamar">

                                <!-- error message untuk description -->
                                @error('tipe_kamar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Harga</label>
                                        <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga', $kamar->harga) }}" placeholder="Masukkan Harga">

                                        <!-- error message untuk price -->
                                        @error('harga')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Hotel</label>
                                <select class="form-control @error('hotel_id') is-invalid @enderror" id="hotel_id" name="hotel_id" required>
                                    @foreach($hotels as $hotel)
                                    <option value="{{ $hotel->id }}" {{ $kamar->hotel_id == $hotel->id ? 'selected' : '' }}>{{ $hotel->nama }}</option>
                                    @endforeach
                                </select>

                                @error('hotel_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('alamat');
    </script>
</body>

</html>