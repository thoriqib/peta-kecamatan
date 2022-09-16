@extends('layout.app')       
        @section('style-peta')
        <link rel="stylesheet" href="{{asset('asset_peta/panyileukan/css/leaflet.css')}}">
        <link rel="stylesheet" href="{{asset('asset_peta/panyileukan/css/qgis2web.css')}}"><link rel="stylesheet" href="{{asset('asset_peta/panyileukan/css/fontawesome-all.min.css')}}">
        @endsection

        @section('script-peta')
        <script src="{{asset('asset_peta/panyileukan/js/qgis2web_expressions.js')}}"></script>
        <script src="{{asset('asset_peta/panyileukan/js/leaflet.js')}}"></script>
        <script src="{{asset('asset_peta/panyileukan/js/leaflet.rotatedMarker.js')}}"></script>
        <script src="{{asset('asset_peta/panyileukan/js/leaflet.pattern.js')}}"></script>
        <script src="{{asset('asset_peta/panyileukan/js/leaflet-hash.js')}}"></script>
        <script src="{{asset('asset_peta/panyileukan/js/Autolinker.min.js')}}"></script>
        <script src="{{asset('asset_peta/panyileukan/js/rbush.min.js')}}"></script>
        <script src="{{asset('asset_peta/panyileukan/js/labelgun.min.js')}}"></script>
        <script src="{{asset('asset_peta/panyileukan/js/labels.js')}}"></script>
        <script src="{{asset('asset_peta/panyileukan/data/kdkec_111_1.js')}}"></script>
        <script>
        var highlightLayer;
        function highlightFeature(e) {
            highlightLayer = e.target;
            highlightLayer.openPopup();
        }
        var map = L.map('map', {
            zoomControl:true, maxZoom:28, minZoom:1
        }).fitBounds([[-6.973076858399929,107.52521515360526],[-6.83273447159993,107.76023828939474]]);
        var hash = new L.Hash(map);
        map.attributionControl.setPrefix('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a> &middot; <a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> &middot; <a href="https://qgis.org">QGIS</a>');
        var autolinker = new Autolinker({truncate: {length: 30, location: 'smart'}});
        var bounds_group = new L.featureGroup([]);
        function setBounds() {
        }
        map.createPane('pane_GoogleRoad_0');
        map.getPane('pane_GoogleRoad_0').style.zIndex = 400;
        var layer_GoogleRoad_0 = L.tileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
            pane: 'pane_GoogleRoad_0',
            opacity: 1.0,
            attribution: '<a href="https://www.google.at/permissions/geoguidelines/attr-guide.html">Map data ©2015 Google</a>',
            minZoom: 1,
            maxZoom: 28,
            minNativeZoom: 0,
            maxNativeZoom: 20
        });
        layer_GoogleRoad_0;
        map.addLayer(layer_GoogleRoad_0);
        map.setView(new L.LatLng(-6.940115649999939, 107.706582292000064), 14);
        function pop_kdkec_111_1(feature, layer) {
            layer.on({
                mouseout: function(e) {
                    if (typeof layer.closePopup == 'function') {
                        layer.closePopup();
                    } else {
                        layer.eachLayer(function(feature){
                            feature.closePopup()
                        });
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['kddesa'] !== null ? autolinker.link(feature.properties['kddesa'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['nmdesa'] !== null ? autolinker.link(feature.properties['nmdesa'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['kdsls'] !== null ? autolinker.link(feature.properties['kdsls'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['nmsls'] !== null ? autolinker.link(feature.properties['nmsls'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_kdkec_111_1_0() {
            return {
                pane: 'pane_kdkec_111_1',
                opacity: 1,
                color: 'rgba(227,26,28,1.0)',
                dashArray: '',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 1.0,
                fillOpacity: 0,
                interactive: true,
            }
        }
        map.createPane('pane_kdkec_111_1');
        map.getPane('pane_kdkec_111_1').style.zIndex = 401;
        map.getPane('pane_kdkec_111_1').style['mix-blend-mode'] = 'normal';
        var layer_kdkec_111_1 = new L.geoJson(json_kdkec_111_1, {
            attribution: '',
            interactive: true,
            dataVar: 'json_kdkec_111_1',
            layerName: 'layer_kdkec_111_1',
            pane: 'pane_kdkec_111_1',
            onEachFeature: pop_kdkec_111_1,
            style: style_kdkec_111_1_0,
        });
        bounds_group.addLayer(layer_kdkec_111_1);
        map.addLayer(layer_kdkec_111_1);
        setBounds();
        </script>
        @endsection
