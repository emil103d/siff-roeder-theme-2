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



img {
  max-width: 100%;
  height: auto;
}

#produkter-oversigt {
	display: grid;
	justify-content: center;
	gap: 25px;
	margin: auto;
	grid-template-columns: 1fr 1fr 1fr;
} 

.enkelt_produkt{
	max-width: 1200px;
	display: grid;
	text-align: center;
	margin: auto;
}

/*------------ Filter knapper------------ */

 .valgt {
        background-color: red;
        border-color: #FFC502;
        border-style: solid;
      }

.container {
  padding: 4rem;
  width: 48rem;
  grid-column: 2;
  grid-row: 2 / 3;
}

.filter .filter-item { /*Linje under knap*/
  border-bottom: 1px solid var(--grey);
}
.filter .filter-item button[aria-expanded='true'] { /*Linje under tekst når knappen er expanded*/
  border-bottom: 1px solid var(--green);
}
.filter button { /*basis layout af knappen*/
  position: relative;
  display: block;
  text-align: left;
  width: 100%;
  padding: 1em 0;
  border: none;
  background: none;
  outline: none;
}
.filter button:hover, .filter button:focus { /*Pseudo elementer der gør at når man har klikket eller kører musen over skifter den farve */
  cursor: pointer;
  color: var(--green);
}
.filter button:hover::after, .filter button:focus::after {
  cursor: pointer;
  color: var(--green);
  border: 1px solid #03b5d2;
}
.filter button .filter-title {
  padding: 1em 1.5em 1em 0;
}
.filter button .icon { /*Her bliver ikonet bygget (cirklen)*/
  display: inline-block;
  position: absolute;
  top: 14px;
  right: 0;
  width: 22px;
  height: 22px;
  border: 1px solid;
  border-radius: 22px;
}
.filter button .icon::before { /*Vertikal stregen inden i cirklen */
  display: block;
  position: absolute;
  content: '';
  top: 9px;
  left: 5px;
  width: 10px;
  height: 2px;
  background: currentColor; /*parent elementets farve */
}
.filter button .icon::after { /*Horizontal stregen inden i cirklen*/
  display: block;
  position: absolute;
  content: '';
  top: 5px;
  left: 9px;
  width: 2px;
  height: 10px;
  background: currentColor;
}
.filter button[aria-expanded='true'] { /*Dette virker kun hvis aria-expeneded er true*/
  color: var(--green);
}
.filter button[aria-expanded='true'] .icon::after { /*Inden i knappen går man til ikonet og ændre after så hvis man har trykket på knapper forsvinder stregen*/
  width: 0;
}
.filter button[aria-expanded='true'] + .filter-content { /*Hvis aria expanded er true skal harmonika content kunne ses (teksten)*/
  opacity: 1;
  max-height: 10em;
  transition: all 200ms linear;
} 
.filter .filter-content { /*Som default (grundlæggende) skal teksten ikke kunne ses*/
  opacity: 0;
  max-height: 0;
  overflow: hidden;
  transition: opacity 200ms linear, max-height 200ms linear;
}



</style>


<main>
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

	<div class="filter-item">
	<button id="filter-button-2" aria-expanded="false">
		<span class="filter-title>">Farver</span>
		<span class="icon" aria-hidden="true"></span>
		</button>
	<div class="filter-content">
	  <div class="dropdown-content2">
		</div>
</div>

<div class="filter-item">
	<button id="filter-button-2" aria-expanded="false">
		<span class="filter-title>">Farver</span>
		<span class="icon" aria-hidden="true"></span>
		</button>
	<div class="filter-content">
	  <div class="dropdown-content3">
		</div>
</div>

</div>
</div>

<!-- ----------produkter-oversigt ------------->

<section id="produkter-oversigt"></section>
<template>
<article class="enkelt_produkt">
<img src="" alt="">
<div class="beskriv">
<h3 class="navn"></h3>
<p class="koster"></p>
</div>

<div class="knapper">
<button class="reserver">Reserver </button>
<button class="mere">Læs mere</button>
</div>
</article>
</template>

</main>


<script>

let temp = document.querySelector("template");
const liste = document.querySelector("#produkter-oversigt");
let produkter = [];
let kategorier = [];
let farver = [];
let filterCat = "alle";
let filterFarve = "alle";

start();

	function start() {
		 getJson();
		
      }

	async function getJson() {

	const url = "https://www.amadeusnoah.dk/kea/semester_2/10_eksamensprojekt/siff_roeder_v2/wp-json/wp/v2/produkt/?per_page=100"; // indsæt url for at hente alle produkter
	let data = await fetch(url);
	produkter = await data.json();

	const farveUrl = "https://www.amadeusnoah.dk/kea/semester_2/10_eksamensprojekt/siff_roeder_v2/wp-json/wp/v2/farve"; // indsæt url for at hente alle farve 
	let farveData = await fetch(farveUrl);
	farver = await farveData.json();

	const catUrl = "https://www.amadeusnoah.dk/kea/semester_2/10_eksamensprojekt/siff_roeder_v2/wp-json/wp/v2/kategori"; // indsæt url for at hente alle farve 
	let catData = await fetch(catUrl);
	kategorier = await catData.json();

	visProdukter();
	opretKnapper();	
	  }

	
function visProdukter() { 
	console.log("hej");
	liste.textContent= "";
	produkter.forEach(produkt => {
		if ((filterCat == "alle" || produkt.kategorier.includes(parseInt(filterCat))) && (filterFarve == "alle" || produkt.farver.includes(parseInt(filterFarve)))) { //parseInt= laver datatypen om til et helt tal
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

function opretKnapper(){

		kategorier.forEach(kategori=>{
		  if(kategori.name != "Ikke-kategoriseret"){
     document.querySelector(".dropdown-content3").innerHTML += `<button class="filter" data-produkt="${kategori.id}">${kategori.name}</button>`
                }
            })

	farver.forEach(farve=>{
		  if(farve.name != "Ikke-kategoriseret"){
     document.querySelector(".dropdown-content2").innerHTML += `<button class="filter" data-produkt="${farve.id}">${farve.name}</button>`
                }
            })
			  addEventListenersToButtons();
		}
	

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

function addEventListenersToButtons() {
            document.querySelectorAll(".dropdown-content3 button").forEach(elm => {
                elm.addEventListener("click", filtreringCat);
            })
             document.querySelectorAll(".dropdown-content2 button").forEach(elm => {
                elm.addEventListener("click", filtreringFarver);
            })
        }

// document.querySelector(".mest_popu").addEventListener("click", funcMestPopu);
document.querySelector(".lav_pris").addEventListener("click", funcLavPris);
// document.querySelector(".high_pris").addEventListener("click", funcHighPris);

function funcLavPris(){
	console.log("Pris filter");
	filterprodukter= this.dataset.koster;
	filterprodukter.sort((a,b) => {
	return b.koster < a.koster;
});
}


function filtreringCat() {
	console.log("hej med dig");
            filterCat = this.dataset.kategori;
		console.log(filterCat);
            // document.querySelector("h1").textContent = this.textContent; TROR ikke det skal bruges
           // fjern .valgt fra alle
            document.querySelectorAll("dropdown-content3 .filter").forEach(elm => {
                elm.classList.remove("valgt");
            });
    
           // tilføj .valgt til den valgte
            this.classList.add("valgt");
            visProdukter();
        }

function filtreringFarver() {
            filterFarve = this.dataset.farve;
		console.log(filterFarve);
            // document.querySelector("h1").textContent = this.textContent; HVad er det her???
           // fjern .valgt fra alle
            document.querySelectorAll("dropdown-content2 .filter").forEach(elm => {
                elm.classList.remove("valgt");
            });
    
           // tilføj .valgt til den valgte
            this.classList.add("valgt");
            visProdukter();
        }
	

</script>




<?php get_footer(); ?>
