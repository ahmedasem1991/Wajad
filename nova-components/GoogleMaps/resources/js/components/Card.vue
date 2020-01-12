<template>
  <card class="flex flex-col">
    <div class="hello">
    <h1 style="margin:20px">{{ msg }}</h1>

   
  </div>
   <div style="width: 98%; height: 700px;margin:20px" id="myMap"></div>
    </card>
</template>

 <script>
import MarkerClusterer from '@google/markerclusterer';
import gmaps from './gmaps';
export default {
  name: 'hello',
  props: ['card'],

  data () {
    return {
      msg: 'Corporates Map'
    }},
  async mounted() {
   
   
    try {
      const google = await gmaps();
      const geocoder = new google.maps.Geocoder();
      const map = new google.maps.Map(document.getElementById('myMap'));
      const InforObj = [];
      geocoder.geocode({ address: 'Saudi' }, (results, status) => {
         
        if (status !== 'OK' || !results[0]) {
          throw new Error(status);
        }


        map.setCenter([ 24.6749245,42.9322867]);
        map.fitBounds(results[0].geometry.viewport);
        
      });
       const locations = [];
       this.card.markers.forEach(element => {
        console.log(element.name_en);
      // var contentString = '<div id="content"><h1>' +element.name_en +
      //               '</h1><p>'+element.details_en+'</p></div>';
 
        locations.push({
           label: element.name_en,
           title:element.name_en+' Corporate',
           position :{
             lat:element.latitude,
             lng:element.longitude
           }
        });
      });
            // const infowindow = new google.maps.InfoWindow({
            // content: contentString,
            // maxWidth: 200
            // });

       const offices = [];
       this.card.offices.forEach(element => {
        console.log(element.name_en);
        locations.push({
           label: element.name_en ,
           title:element.name_en+' Office',
           icon :'../office_mark.png',
           position :{
             lat:element.latitude,
             lng:element.longitude
           }
        });
      });
        


   

       const markerClickHandler = (marker) => {
        map.setZoom(13);
        map.setCenter(marker.getPosition());
        // closeOtherInfo();
        // infowindow.open(map, marker);
        // InforObj[0] = infowindow;

      };
              function closeOtherInfo() {
            if (InforObj.length > 0) {
                /* detach the info-window from the marker ... undocumented in the API docs */
                InforObj[0].set("marker", null);
                /* and close it */
                InforObj[0].close();
                /* blank the array */
                InforObj.length = 0;
            }
        }
        const markers = locations
        // .map(x => new google.maps.Marker({ ...x, map }));
       .map((location) => {
          const marker = new google.maps.Marker({ ...location, map });
          marker.addListener('click', () => markerClickHandler(marker));

          return marker;
        });
      new MarkerClusterer(map, markers, {
        imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m',
       });
    } catch (error) {
      console.error(error);
    }
  },

}
</script>
<style scoped>
    /* #myMap {
    
 
   } */
</style>