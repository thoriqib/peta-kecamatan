@extends('layout.app')       
        @section('style-peta')
        <link rel="stylesheet" href="{{asset('asset_peta/babakan_ciparay/css/leaflet.css')}}">
        <link rel="stylesheet" href="{{asset('asset_peta/babakan_ciparay/css/qgis2web.css')}}"><link rel="stylesheet" href="{{asset('asset_peta/babakan_ciparay/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{asset('asset_peta/babakan_ciparay/css/filter.css')}}">
        <link rel="stylesheet" href="{{asset('css/nouislider.min.css')}}">
        @endsection

        @section('script-peta')
        <script src="{{asset('asset_peta/babakan_ciparay/js/qgis2web_expressions.js')}}"></script>
        <script src="{{asset('asset_peta/babakan_ciparay/js/leaflet.js')}}"></script>
        <script src="{{asset('asset_peta/babakan_ciparay/js/leaflet.rotatedMarker.js')}}"></script>
        <script src="{{asset('asset_peta/babakan_ciparay/js/leaflet.pattern.js')}}"></script>
        <script src="{{asset('asset_peta/babakan_ciparay/js/leaflet-hash.js')}}"></script>
        <script src="{{asset('asset_peta/babakan_ciparay/js/Autolinker.min.js')}}"></script>
        <script src="{{asset('asset_peta/babakan_ciparay/js/rbush.min.js')}}"></script>
        <script src="{{asset('asset_peta/babakan_ciparay/js/labelgun.min.js')}}"></script>
        <script src="{{asset('asset_peta/babakan_ciparay/js/labels.js')}}"></script>
        <script src="{{asset('asset_peta/babakan_ciparay/js/tailDT.js')}}"></script>
        <script src="{{asset('asset_peta/babakan_ciparay/js/nouislider.min.js')}}"></script>
        <script src="{{asset('asset_peta/babakan_ciparay/js/wNumb.js')}}"></script>
        <script src="{{asset('asset_peta/babakan_ciparay/data/kdkec_020_1.js')}}"></script>
        <script>
        var highlightLayer;
        function highlightFeature(e) {
            highlightLayer = e.target;
            highlightLayer.openPopup();
        }
        var map = L.map('map', {
            zoomControl:true, maxZoom:28, minZoom:1
        }).fitBounds([[-6.954610486349971,107.52563748663873],[-6.9092254396499495,107.60164115336126]]);
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
        map.setView(new L.LatLng(-6.953884516999949, 107.585434087000067), 14);
        function pop_kdkec_020_1(feature, layer) {
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

        function style_kdkec_020_1_0() {
            return {
                pane: 'pane_kdkec_020_1',
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
        map.createPane('pane_kdkec_020_1');
        map.getPane('pane_kdkec_020_1').style.zIndex = 401;
        map.getPane('pane_kdkec_020_1').style['mix-blend-mode'] = 'normal';
        var layer_kdkec_020_1 = new L.geoJson(json_kdkec_020_1, {
            attribution: '',
            interactive: true,
            dataVar: 'json_kdkec_020_1',
            layerName: 'layer_kdkec_020_1',
            pane: 'pane_kdkec_020_1',
            onEachFeature: pop_kdkec_020_1,
            style: style_kdkec_020_1_0,
        });
        bounds_group.addLayer(layer_kdkec_020_1);
        map.addLayer(layer_kdkec_020_1);
        setBounds();
        var mapDiv = document.getElementById('map');
        var row = document.createElement('div');
        row.className="row";
        row.id="all";
        row.style.height = "100%";
        var col1 = document.createElement('div');
        col1.className="col9";
        col1.id = "mapWindow";
        col1.style.height = "99%";
        col1.style.width = "80%";
        col1.style.display = "inline-block";
        var col2 = document.createElement('div');
        col2.className="col3";
        col2.id = "menu";
        col2.style.display = "inline-block";
        mapDiv.parentNode.insertBefore(row, mapDiv);
        document.getElementById("all").appendChild(col1);
        document.getElementById("all").appendChild(col2);
        col1.appendChild(mapDiv)
        var Filters = {"nmdesa": "str"};
        function filterFunc() {
          map.eachLayer(function(lyr){
          if ("options" in lyr && "dataVar" in lyr["options"]){
            features = this[lyr["options"]["dataVar"]].features.slice(0);
            try{
              for (key in Filters){
                keyS = key.replace(/[^a-zA-Z0-9_]/g, "")
                if (Filters[key] == "str" || Filters[key] == "bool"){
                  var selection = [];
                  var options = document.getElementById("sel_" + keyS).options
                  for (var i=0; i < options.length; i++) {
                    if (options[i].selected) selection.push(options[i].value);
                  }
                    try{
                      if (key in features[0].properties){
                        for (i = features.length - 1;
                          i >= 0; --i){
                          if (selection.indexOf(
                          features[i].properties[key])<0
                          && selection.length>0) {
                          features.splice(i,1);
                          }
                        }
                      }
                    } catch(err){
                  }
                }
                if (Filters[key] == "int"){
                  sliderVals =  document.getElementById(
                    "div_" + keyS).noUiSlider.get();
                  try{
                    if (key in features[0].properties){
                    for (i = features.length - 1; i >= 0; --i){
                      if (parseInt(features[i].properties[key])
                          < sliderVals[0]
                          || parseInt(features[i].properties[key])
                          > sliderVals[1]){
                            features.splice(i,1);
                          }
                        }
                      }
                    } catch(err){
                    }
                  }
                if (Filters[key] == "real"){
                  sliderVals =  document.getElementById(
                    "div_" + keyS).noUiSlider.get();
                  try{
                    if (key in features[0].properties){
                    for (i = features.length - 1; i >= 0; --i){
                      if (features[i].properties[key]
                          < sliderVals[0]
                          || features[i].properties[key]
                          > sliderVals[1]){
                            features.splice(i,1);
                          }
                        }
                      }
                    } catch(err){
                    }
                  }
                if (Filters[key] == "date"
                  || Filters[key] == "datetime"
                  || Filters[key] == "time"){
                  try{
                    if (key in features[0].properties){
                      HTMLkey = key.replace(/[&\/\\#,+()$~%.'":*?<>{} ]/g, '');
                      startdate = document.getElementById("dat_" +
                        HTMLkey + "_date1").value.replace(" ", "T");
                      enddate = document.getElementById("dat_" +
                        HTMLkey + "_date2").value.replace(" ", "T");
                      for (i = features.length - 1; i >= 0; --i){
                        if (features[i].properties[key] < startdate
                          || features[i].properties[key] > enddate){
                          features.splice(i,1);
                        }
                      }
                    }
                  } catch(err){
                  }
                }
              }
            } catch(err){
            }
          this[lyr["options"]["layerName"]].clearLayers();
          this[lyr["options"]["layerName"]].addData(features);
          }
          })
        }
            document.getElementById("menu").appendChild(
                document.createElement("div"));
            var div_nmdesa = document.createElement('div');
            div_nmdesa.id = "div_nmdesa";
            div_nmdesa.className= "filterselect";
            document.getElementById("menu").appendChild(div_nmdesa);
            sel_nmdesa = document.createElement('select');
            sel_nmdesa.multiple = true;
            sel_nmdesa.size = 6;
            sel_nmdesa.id = "sel_nmdesa";
            var nmdesa_options_str = "<option value='' unselected></option>";
            sel_nmdesa.onchange = function(){filterFunc()};
            nmdesa_options_str  += '<option value="BABAKAN">BABAKAN</option>';
            nmdesa_options_str  += '<option value="BABAKAN CIPARAY">BABAKAN CIPARAY</option>';
            nmdesa_options_str  += '<option value="CIRANGRANG">CIRANGRANG</option>';
            nmdesa_options_str  += '<option value="MARGAHAYU UTARA">MARGAHAYU UTARA</option>';
            nmdesa_options_str  += '<option value="MARGASUKA">MARGASUKA</option>';
            nmdesa_options_str  += '<option value="SUKAHAJI">SUKAHAJI</option>';
            sel_nmdesa.innerHTML = nmdesa_options_str;
            div_nmdesa.appendChild(sel_nmdesa);
            var lab_nmdesa = document.createElement('div');
            lab_nmdesa.innerHTML = 'nmdesa';
            lab_nmdesa.className = 'filterlabel';
            div_nmdesa.appendChild(lab_nmdesa);
            var reset_nmdesa = document.createElement('div');
            reset_nmdesa.innerHTML = 'clear filter';
            reset_nmdesa.className = 'filterlabel';
            reset_nmdesa.onclick = function() {
                var options = document.getElementById("sel_nmdesa").options;
                for (var i=0; i < options.length; i++) {
                    options[i].selected = false;
                }
                filterFunc();
            };
            div_nmdesa.appendChild(reset_nmdesa);
        </script>
      @endsection