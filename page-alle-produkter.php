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
<h3 class="title"></h3>
<p class="kort_beskrivelse"></p>
</div>

<div class="knapper">
<button class="reserver">Reserver </button>
<button class="mere">Læs mere</button>
</div>
</article>
</template>

</main>


<script>
</script>




<?php get_footer(); ?>
