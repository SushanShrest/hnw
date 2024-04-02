@extends('backend.layouts.master')

@section('backend-title', 'Pharmacies List')

@section('page-specific-css')
    <!-- Additional CSS specific to this page -->
@endsection

@section('backend-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Pharmacies
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Search form -->
            <div class="form-group row">
                <div class="box-body col-md-3">
                    <form action="{{ route('pharmacies.display') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="PharmacySearch" class="form-control" placeholder="Search pharmacies...">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Default box -->
            <div class="box no-padding">
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">S.N</th>
                                <th>Name</th>
                                <th>District</th>
                                <th>Contact</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($pharmacies->isNotEmpty())
                                @foreach ($pharmacies as $pharmacy)
                                    <tr onclick="showMap({{ $pharmacy->latitude }}, {{ $pharmacy->longitude }})">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $pharmacy->name }}</td>
                                        <td>{{ $pharmacy->district }}</td>
                                        <td>{{ $pharmacy->contact }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">No Pharmacies!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box -->

            <!-- Include Google Maps JavaScript API -->
            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1o6-3uZwjEypw8203VsReL1i0npeUO_g"></script>
            <div id="map" style="width:100%; height: 500px;"></div>
        </section>
        <!-- /.content -->
    </div>

    {{-- map code --}}
    <script>
        var map;
        var markers = [];

        function showMap(lat, long) {
            // Initialize the map if not already initialized
            if (!map) {
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15 
                });
            }

            // Clear existing markers
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }
            markers = [];

            // Add marker for the clicked pharmacy
            var marker = new google.maps.Marker({
                position: {lat: lat, lng: long},
                map: map,
            });
            markers.push(marker);

            // Center the map on the clicked marker
            map.setCenter({lat: lat, lng: long});
        }
    </script>
@endsection
