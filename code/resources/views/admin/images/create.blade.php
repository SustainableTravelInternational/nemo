@extends('admin.layouts.master')

@section('title', 'Images')
@section('title.description', 'Create a new image')

@section('head')
	<link rel="stylesheet" href="/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
    <style>
      .map {
        height: 400px;
        width: 100%;
      }
    </style>
@endsection

@section('content')

<div class="box box-primary">
	<!-- form start -->
	<form role="form" action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="latitude" id="latitude" value="{{ old('latitude') }}">
		<input type="hidden" name="longitude" id="longitude"  value="{{ old('longitude') }}">
	  <div class="box-body">
	  	<div class="row">
	  		<div class="col-xs-6">
	  			<div class="form-group">
				    <label for="photo">{{ __('Photo') }}</label>
				    <input type="file" class="form-control" name="photo" placeholder="{{ __('Upload your picture') }}">
		    	</div>
	  			<div class="form-group">
	                <label>Date:</label>

	                <div class="input-group date">
	                  <div class="input-group-addon">
	                    <i class="fa fa-calendar"></i>
	                  </div>
	                  <input type="text" class="form-control pull-right" id="datepicker" name="date" autocomplete="off"  value="{{ old('date') }}">
	                </div>
	                <!-- /.input group -->
	            </div>
			    <div class="row">
			    	<div class="col-xs-3">
			    		<div class="form-group">
				    		<label>{{ __('Categories:') }}</label>
				    	</div>
			    	</div>
			    	<div class="col-xs-9">
					    <div class="form-group">
					    	@foreach ($categories as $category)
					    		<div class="checkbox">
				                    <label>
				                      <input type="checkbox" name="categories[]" value="{{ $category->id }}"
				                      @if(is_array(old('categories')) && in_array($category->id, old('categories'))) checked @endif>
				                      {{ $category->name }}
				                    </label>
				                </div>
					    	@endforeach
				        </div>
					</div>
			    </div>
	  			<div class="form-group">
				    <label for="notes">{{ __('Notes') }}</label>
				    <textarea class="form-control" name="notes" id="notes" placeholder="{{ __('Photo notes') }}">{{ old('notes') }}</textarea>
		    	</div>
			</div>
	  		<div class="col-xs-6">
	  			<div class="form-group">
    				<div id="map" class="map"></div>
	  			</div>
	  		</div>
	  	</div>

	  <!-- /.box-body -->

	  <div class="box-footer">
	    <button type="submit" class="btn btn-primary">Submit</button>
	  </div>
	</form>
</div>

@endsection

@section('footer')
	<script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>

	<script>
		$(function () {

			var layer;

			var initialLongitude = $('#longitude').val() == '' ? 8.338730335235596 : Number($('#longitude').val());
			var initialLatitude = $('#latitude').val() == '' ? 52.514222977691304 : Number($('#latitude').val());

			console.log('Longitude: ' , initialLongitude, 'latitude: ', initialLatitude);

			var map = new ol.Map({
		        target: 'map',
		        layers: [
		          new ol.layer.Tile({
		            source: new ol.source.OSM()
		          })
		        ],
		        view: new ol.View({
		        	center: ol.proj.fromLonLat([initialLongitude,initialLatitude]),
		          	zoom: 8
		        })
	      	});

	      	if(initialLongitude != 8.338730335235596 && initialLatitude != 52.514222977691304) {
	      		layer = new ol.layer.Vector({
					source: new ol.source.Vector({
						features: [
							new ol.Feature({
								geometry: new ol.geom.Point(ol.proj.fromLonLat([initialLongitude, initialLatitude]))
							})
						]
					})
			 	});
				map.addLayer(layer);
	      	}

			map.on('singleclick', function (event) {
				if (typeof layer !== 'undefined') {
					map.removeLayer(layer);
				}
				var coordinates = event.coordinate;
				var lonlat  = ol.proj.toLonLat(coordinates);
				// Reference => "latitude : " + lonlat[1] + ", longitude : " + lonlat[0]
				layer = new ol.layer.Vector({
					source: new ol.source.Vector({
						features: [
							new ol.Feature({
								geometry: new ol.geom.Point(ol.proj.fromLonLat([lonlat[0], lonlat[1]]))
							})
						]
					})
			 	});
				map.addLayer(layer);
				$('#longitude').val(lonlat[0]);
				$('#latitude').val(lonlat[1]);
			});

			//Date picker
			$('#datepicker').datepicker({
			  autoclose: true
			});
		});

	</script>
@endsection