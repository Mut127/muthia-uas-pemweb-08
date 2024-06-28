<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Reservasi </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('reservasis.update', $reservasi->id) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Tanggal Checkin</label>
                                <input type="date" class="form-control @error('tanggal_checkin') is-invalid @enderror" name="tanggal_checkin" value="{{ old('tanggal_checkin', $reservasi->tanggal_checkin) }}" placeholder="Masukkan Tanggal Checkin">

                                <!-- error message untuk title -->
                                @error('tanggal_checkin')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Tanggal Checkout</label>
                                <input type="date" class="form-control @error('tanggal_checkout') is-invalid @enderror" name="tanggal_checkout" value="{{ old('tanggal_checkout', $reservasi->tanggal_checkout) }}" placeholder="Masukkan Tanggal Checkout">

                                <!-- error message untuk description -->
                                @error('tanggal_checkout')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Tamu</label>
                                <select class="form-control @error('tamu_id') is-invalid @enderror" id="tamu_id" name="tamu_id" required>
                                    @foreach($tamus as $tamu)
                                    <option value="{{ $tamu->id }}" {{ $reservasi->tamu_id == $tamu->id ? 'selected' : '' }}>{{ $tamu->nama }}</option>
                                    @endforeach
                                </select>

                                @error('tamu_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Kamar</label>
                                <select class="form-control @error('kamar_id') is-invalid @enderror" id="kamar_id" name="kamar_id" required>
                                    @foreach($kamars as $kamar)
                                    <option value="{{ $kamar->id }}" {{ $reservasi->kamar_id == $kamar->id ? 'selected' : '' }}>{{ $kamar->nomor_kamar }}</option>
                                    @endforeach
                                </select>

                                @error('kamar_id')
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