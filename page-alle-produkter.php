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
</style>


<main>

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

start();

	function start() {
		 getJson();
		
      }

	  async function getJson() {
	const url = "https://www.amadeusnoah.dk/kea/semester_2/10_eksamensprojekt/siff_roeder_v2/wp-json/wp/v2/produkt/?per_page=100"; // indsæt url for at hente alle produkter 
	let data = await fetch(url);
	visProdukter();
	  }

	
function visProdukter() { 
	liste.textContent= "";
	produkter.forEach(produkt => {
		// if ((filterCat == "alle" || kursus.categories.includes(parseInt(filterCat))) && (filterTemaer == "alle" || kursus.temaer.includes(parseInt(filterTemaer)))) { //parseInt= laver datatypen om
		// const klon = temp.cloneNode(true).content;
		klon.querySelector("img").src = produkt.main_billede;
		klon.querySelector(".navn").textContent = produkt.title.rendered;
		klon.querySelector(".koster").textContent = produkt.koster + " kr. ";
		klon.querySelector("article").addEventListener("click", () => 
			{location.href = kursus.link;
			});
		liste.appendChild(klon);
		} 
	});
}



</script>




<?php get_footer(); ?>
