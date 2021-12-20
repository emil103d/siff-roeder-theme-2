<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<style>

.mere {
  background-color: #66745A; 
  padding: 0.5rem;
  color: white;
  font-weight: 900;
}

.mere:hover {
  transform: scale(1.1);
  background-color: #C3C8BE; 
  text-decoration: none;
}

.koster {
  margin-bottom: 0;
}

#filter-button-1:hover {
    background-color: #b38b7329;
}

#filter-button-1 {	
    background-color: transparent;
	color: black;
}

button:focus {
	background-color: transparent;
}

}


 @media (min-width: 600px) {
  #page_wrapper {
    display: grid;
    grid-template-columns: 1fr 7fr;
  }

}

 

</style>


<main class="alle_produkter">
	<h1>Tøj</h1>
<section id="page_wrapper">
<!-- ----------Filter knapper ------------->

<div class="parent">
		<div class="filter">
			<div class="filter-item">
			<button id="filter-button-1" aria-expanded="false">
			<span class="filter-title>">Sortér</span>
			<span class="icon" aria-hidden="true"></span>
			</button>
				<div class="filter-content">
					<div class="dropdown-content1">
						<button class="mest_popu">Mest populære</button>
						<button class="lav_pris">Laveste pris</button>
						<button class="high_pris">Højeste pris</button>
					</div>
				</div>
			</div>

		<div class="filter-item">
			<button id="filter-button-4" aria-expanded="false">
				<span class="filter-title>">Type</span>
				<span class="icon" aria-hidden="true"></span>
				</button>
			<div class="filter-content">
			<div class="dropdown-content6">
				</div>
		</div> 
	</div>

	<div class="filter-item">
		<button id="filter-button-2" aria-expanded="false">
			<span class="filter-title>">Farve</span>
			<span class="icon" aria-hidden="true"></span>
			</button>
		<div class="filter-content">
		<div class="dropdown-content2">
			</div>
	</div> 
	</div> 

	<div class="filter-item">
		<button id="filter-button-3" aria-expanded="false">
			<span class="filter-title>">Mærke</span>
			<span class="icon" aria-hidden="true"></span>
			</button>
		<div class="filter-content">
		<div class="dropdown-content3">
			</div>
	</div> 
	</div> 

	<div class="filter-item">
		<button id="filter-button-4" aria-expanded="false">
			<span class="filter-title>">Størrelse</span>
			<span class="icon" aria-hidden="true"></span>
			</button>
		<div class="filter-content">
		<div class="dropdown-content4">
			</div>
	</div> 
</div>

	<div class="filter-item">
			<button id="filter-button-4" aria-expanded="false">
				<span class="filter-title>">Pris</span>
				<span class="icon" aria-hidden="true"></span>
				</button>
			<div class="filter-content">
			<div class="dropdown-content5">
				</div>
		</div> 
	</div>
	  <button class="nulstil">Nulstil</button>
</div> 
</div> 

<!-- ----------produkter-oversigt ------------->

<section id="produkter-oversigt"></section>
</section>
<template>
<article class="enkelt_produkt">
<img src="" alt="">
<div class="beskriv">
<h3 class="navn"></h3>
<p class="koster"></p>
</div>

<div class="knapper">
<!-- <button class="reserver">Reserver </button> -->
<button class="mere">Læs mere</button>
</div>
</article>
</template>

</div>

  <button id="btnScrollToTop">
        <i class="material-icons">arrow_upward</i>
      </button>

</main>


<script>

let temp = document.querySelector("template");
const liste = document.querySelector("#produkter-oversigt");

let filterTojer = "alle";
let filterFarve = "alle";
let filterMrke = "alle";
let filterStr = "alle";
let filterPris = "alle";

start();

	function start() {
		 getJson();
      }

	async function getJson() {

	// hent produkt
	const url = "https://www.amadeusnoah.dk/kea/semester_2/10_eksamensprojekt/siff_roeder_v2/wp-json/wp/v2/produkt/?per_page=100"; 
	let data = await fetch(url);
	produkter = await data.json();

	// hent tøj produkt
  	const tojUrl = "https://www.amadeusnoah.dk/kea/semester_2/10_eksamensprojekt/siff_roeder_v2/wp-json/wp/v2/toj";
    const tojData = await fetch(tojUrl);
    tojer = await tojData.json();   

	// hent farve produkt
	const farveUrl = "https://www.amadeusnoah.dk/kea/semester_2/10_eksamensprojekt/siff_roeder_v2/wp-json/wp/v2/farve"; // indsæt url for at hente alle farve 
	let farveData = await fetch(farveUrl);
	farver = await farveData.json();

	// hent brand produkt 
	const brandUrl = "https://www.amadeusnoah.dk/kea/semester_2/10_eksamensprojekt/siff_roeder_v2/wp-json/wp/v2/mrke";
	const brandData = await fetch(brandUrl);
	maerker = await brandData.json();	

	// hent størrelser produkt 
	const strUrl = "https://www.amadeusnoah.dk/kea/semester_2/10_eksamensprojekt/siff_roeder_v2/wp-json/wp/v2/strrelse";
	const strData = await fetch(strUrl);
	storrelser = await strData.json();	

	// hent pris produkt 
	const prisUrl = "https://www.amadeusnoah.dk/kea/semester_2/10_eksamensprojekt/siff_roeder_v2/wp-json/wp/v2/pris";
	const prisData = await fetch(prisUrl);
	priser = await prisData.json();	

	


	visProdukter();
	opretKnapper();	
	  }

	
function visProdukter() { 
	console.log("hej");
	liste.textContent= ""; //Tøm visningscontainer efter hver visning/ filtering klik 
	produkter.forEach(produkt => {
		if ((filterFarve == "alle" || produkt.farve.includes(parseInt(filterFarve))) &&
			 (filterMrke == "alle" || produkt.mrke.includes(parseInt(filterMrke))) &&
			 (filterStr == "alle" || produkt.strrelse.includes(parseInt(filterStr))) &&
			 (filterPris == "alle" || produkt.pris.includes(parseInt(filterPris))) &&
			 (filterTojer == "alle" || produkt.toj.includes(parseInt(filterTojer))))    { //parseInt= laver datatypen om til et helt tal
		const klon = temp.cloneNode(true).content;
		klon.querySelector("img").src = produkt.main_billede.guid;
		klon.querySelector(".navn").textContent = produkt.title.rendered;
		klon.querySelector(".koster").textContent = produkt.koster + " kr. ";
		klon.querySelector("article").addEventListener("click", () => 
			{location.href = produkt.link;
			});
		liste.appendChild(klon);
		}
	});
}

//-- ----------Opret knapper ------------->

 function opretKnapper(){

	farver.forEach(farve=>{
		  if(farve.name != "Ikke-kategoriseret"){
    	 document.querySelector(".dropdown-content2").innerHTML += `<button class="filter" data-produkt="${farve.id}">${farve.name}</button>`
                }
            })
			  addEventListenersToButtons();

	maerker.forEach(mrke=>{
		  if(mrke.name != "Ikke-kategoriseret"){
    	 document.querySelector(".dropdown-content3").innerHTML += `<button class="filter" data-mrke="${mrke.id}">${mrke.name}</button>`
                }
            })
			  addEventListenersToButtons();


		sorterFunc(storrelser).forEach(strrelse=>{
		  if(strrelse.name != "Ikke-kategoriseret"){
     		document.querySelector(".dropdown-content4").innerHTML += `<button class="filter" data-strrelse="${strrelse.id}">${strrelse.name}</button>`
                }
            })
			  addEventListenersToButtons();
	
		priser.forEach(pris=>{
		  if(pris.name != "Ikke-kategoriseret"){
     		document.querySelector(".dropdown-content5").innerHTML += `<button class="filter" data-pris="${pris.id}">${pris.name}</button>`
                }
            })
			  addEventListenersToButtons();
		
		   tojer.forEach(toj=>{
          if(toj.name != "Ikke-kategoriseret"){
            document.querySelector(".dropdown-content6").innerHTML += `<button class="filter" data-toj="${toj.id}">${toj.name}</button>`
                }
            })
              addEventListenersToButtons();   

		}


// Her skal storrelser løbes igennem og sorteres som i single produkt
function sorterFunc(array){
	array.sort((a,b) => {
	return a.id - b.id;
});
return array;
}
	

//-- ----------Lav harmonika ------------->

const items = document.querySelectorAll(".filter button"); //Få fat i alle knapper 

items.forEach((item) => item.addEventListener("click", toggleFilter)); //  For hvery item skal den "lytte" efter et klik som starter en funktion 

function toggleFilter() {
  const itemToggle = this.getAttribute("aria-expanded"); // Opretter en variabel,  Når klik er aktiveret skal have attributen aria-expanded (enten er den sand eller falsk ) 
  
  // Der skal laves en "for" loop, så der bliver kigget igennem hele loppet og kun den der er klikket på bliver aktiveret f.eks. hvis en anden er åben bliver denne lukket  
  for (let item of items) { 
    item.setAttribute("aria-expanded", false); // kun den der bliver klikket på skal være åben alle andre skal være lukket (false)
  }

  if (itemToggle === "false") {   // Derudover skal den KUN åbne hvis knappen er false  
    this.setAttribute("aria-expanded", true); // åbner harmonikaen op og man kan se content
  }
}

//-- ----------Tilføj addeventlistener ------------->

function addEventListenersToButtons() {

             document.querySelectorAll(".dropdown-content2 button").forEach(elm => {
                elm.addEventListener("click", filtreringFarver);
            })

			 document.querySelectorAll(".dropdown-content3 button").forEach(elm => {
                elm.addEventListener("click", filtreringMrke);
            })

			document.querySelectorAll(".dropdown-content4 button").forEach(elm => {
                elm.addEventListener("click", filtreringStr);
            })

			document.querySelectorAll(".dropdown-content5 button").forEach(elm => {
                elm.addEventListener("click", filtreringPris);
            })

			document.querySelectorAll(".dropdown-content6 button").forEach(elm => {
                elm.addEventListener("click", filtreringToj);
            })

       }


//-- ----------Sortér filtrering ------------->

document.querySelector(".mest_popu").addEventListener("click", funcMestPopu);
document.querySelector(".lav_pris").addEventListener("click", funcLavPris);
document.querySelector(".high_pris").addEventListener("click", funcHighPris);

function funcLavPris(){
	produkter.sort((a,b) => {
	return a.koster - b.koster;
});
visProdukter();
}

function funcHighPris(){
	produkter.sort((a,b) => {
	return b.koster - a.koster;
});
visProdukter();
}

function funcMestPopu(){
	produkter.sort((a,b) => {
	return a.id - b.id;
});
visProdukter();
}



//-- ----------Farve filtrering ------------->

function filtreringFarver() {
        filterFarve = this.dataset.produkt;
            document.querySelectorAll("dropdown-content2 .filter").forEach(elm => {
                elm.classList.remove("valgt");
            });
    
           // tilføj .valgt til den valgte
            this.classList.add("valgt");
            visProdukter();
        }
	//-- ----------Mærke filtrering ------------->

function filtreringMrke() {
        filterMrke = this.dataset.mrke;
            document.querySelectorAll("dropdown-content3 .filter").forEach(elm => {
                elm.classList.remove("valgt");
            });
    
           // tilføj .valgt til den valgte
            this.classList.add("valgt");
            visProdukter();
        }

	//-- ----------Str. filtrering ------------->

function filtreringStr() {
        filterStr = this.dataset.strrelse;
            document.querySelectorAll("dropdown-content4 .filter").forEach(elm => {
                elm.classList.remove("valgt");
            });
    
           // tilføj .valgt til den valgte
            this.classList.add("valgt");
            visProdukter();
        }


	//-- ----------Pris filtrering ------------->

function filtreringPris() {
        filterPris = this.dataset.pris;
            document.querySelectorAll("dropdown-content5 .filter").forEach(elm => {
                elm.classList.remove("valgt");
            });
    
           // tilføj .valgt til den valgte
            this.classList.add("valgt");
            visProdukter();
        }

	//-- ----------Type filtrering ------------->

function filtreringToj() {
        filterTojer = this.dataset.toj;
            document.querySelectorAll("dropdown-content6 .filter").forEach(elm => {
                elm.classList.remove("valgt");
            });
    
           // tilføj .valgt til den valgte
            this.classList.add("valgt");
            visProdukter();
        }


	//-- ----------Nulstil ------------->

document.querySelector(".nulstil").addEventListener("click", funcNulstil);

function funcNulstil() {
  filterPris = "alle";
  filterTojer = "alle";
  filterStr = "alle";
  filterMrke = "alle";
  filterFarve = "alle";

  visProdukter()
}

	//-- ----------ScrollToTop ------------->
const ScrollToTop = document.querySelector("#btnScrollToTop");

ScrollToTop.addEventListener("click", () => {
  // window.scrollTo(0, 0);
  window.scrollTo({
    top: 0,
    left: 0,
    behavior: "smooth",
  });
});

</script>

<?php get_footer(); ?>
