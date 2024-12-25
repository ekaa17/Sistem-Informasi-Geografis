@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Maps</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Maps</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">

        <div class="col-12">
            <div class="card">
                <div class="card-body pt-3">

                    <div class="table-responsive">
                        <div id="map" style="width: 100%; height: 750px;"></div>
                    </div>
                    <script>

                        const map = L.map('map').setView([-6.3732812,106.6241473,9.39], 13);

                        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 19,
                            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                        }).addTo(map);

                        $(document).ready(function() {
                            $.getJSON('data-titik', function(data) {
                                $.each(data, function(index) {
                                    var marker = L.marker([parseFloat(data[index].longitude),parseFloat(data[index].latitude)]).addTo(map);

                                    var popupContent = `
                                        <b>Bidang:</b> ${data[index].nama_bidang}<br>
                                        <b>Pemilik:</b> ${data[index].nama_pemilik}<br>
                                        <b>Luas Lahan:</b> ${data[index].luas_lahan} m²<br>
                                        <b>Atas Hak:</b> ${data[index].atas_hak}<br>
                                        <b>Tanggal Transaksi:</b> ${data[index].tanggal_transaksi}
                                    `;

                                    // Menambahkan popup ke marker
                                    marker.bindPopup(popupContent);

            
                                    // Event ketika marker diklik
                                    marker.on('click', function() {
                                        this.openPopup();
                                    });
                                })
                            })
                        });

                    </script>


                </div>
            </div>
        </div>

    </section>
@endsection
