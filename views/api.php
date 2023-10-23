<html>
  <head>
    <title>LinkoPharm | Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style>
      /* 
      css
      */
      h1{
        text-align: center;
        color:rgb(80, 122, 162) ;
        font-size: xx-large;
        top:0;
        left:0;
        justify-content: center;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.25);
        font-weight: bold;
        justify-content: space-between;
      }

   #map {
            
        height: 60%;
        width: 80%;
        left:150px;
        border-left: 5px solid rgb(80, 122, 162);
        border-right: 5px solid rgb(80, 122, 162);

        border-bottom: 5px solid rgb(80, 122, 162);

        border-top:5px solid rgb(80, 122, 162) ;
            }

        /* 
        * Optional: Makes the sample page fill the window. 
        */
        html,
        body {
        height: 100%;
        margin: 0;
        padding: 0;
        background-color:beige
   
        }
    </style>

   
   <link rel="stylesheet" href="https://kit.fontawesome.com/e390cab89c.css">
    <script type="module" src="./index.js"></script>
  </head>
  <body>
     <!--titlefor the map -->

    
    <br>
    <br>
    <br>
    <h1><b>Our location</b></h1>
    <br>
    <br>
    <br>
    <!--The div element for the map -->
    <div id="map"></div>

    <!-- prettier-ignore -->
    <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="_ib",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>""+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "AIzaSyBx7CdxF5ge7fkkHAUpi1WlPTX4YwvQ0Fo", v: "beta"});</script>
        <br><br><br><br>

   
  </body>
  <script>
    let map;

async function initMap() {
  // The location of Uluru
  const position =  { lat: 30.126017477570016, lng: 31.37645715980152};
  // Request needed libraries.
  //@ts-ignore
  const { Map } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

  // The map, centered at Uluru
  map = new Map(document.getElementById("map"), {
    zoom: 15,
    center: position,
    mapId: "DEMO_MAP_ID",
  });

  // The marker, positioned at Uluru
  const marker = new AdvancedMarkerElement({
    map: map,
    position: position,
    title: "Uluru",
  });
}

initMap();
  </script>
</html>